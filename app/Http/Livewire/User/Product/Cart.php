<?php

namespace App\Http\Livewire\User\Product;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UserBook;
use Gloudemans\Shoppingcart\Facades\Cart as CartShoppingCart;
use Livewire\Component;

class Cart extends Component
{
    public $qty = 0;

    public $basket = [];
    public $total = 0.00;
    public $name = '';
    public $phone = '';
    public $email = '';

    private function resetForm()
    {
        $this->resetValidation();
        $this->email = "";
        $this->phone = "";
        $this->name = "";
    }

    protected $listeners = [
        'basketUpdated' => 'update',
        'emptyCart' => 'destroyCard',
    ];

    protected function messages()
    {

        if (app()->getLocale() == 'ar') {
            return [
                'name.required' => 'مطلوب حقل الاسم الأول.',
                'phone.required' => 'مطلوب حقل الاسم الثاني.',
                'email.required' => 'مطلوب حقل البريد الالكتروني.',
                'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
            ];
        } else {
            return [
                'name.required' => 'The firstname field is required.',
                'phone.required' => 'The phone field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
            ];
        }

    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
        ];
    }

    public function bookCart()
    {
        $data = $this->validate();

        $order = Order::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'order_status_id' => 1,
            'platform' => 'web',
        ]);

        foreach ($this->basket as $product) {

            $orderDetails = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name_ar' => $product->options->product_name_ar,
                'product_name_en' => $product->options->product_name_en,
                'product_description_ar' => $product->options->product_description_ar,
                'product_description_en' => $product->options->product_description_en,
                'price' => $product->price,
                'image' => $product->options->image,
                'price_before_discount' => $product->options->price_before_discount,
                'qty' => $product->qty,
            ]);
        }

        $this->destroyCard();

        $this->resetForm();
        $this->render();

        session()->flash('message', trans('users.bookingSuccessfullyAdded'));
        return redirect()->route('dashboard');
    }

    public function mount(): void
    {
        $this->update();
    }

    public function increase($rowId, $qty): void
    {
        CartShoppingCart::update($rowId, $qty + 1);
        $this->emit('basketUpdated');
        $this->update();
    }

    /**
     * Update quantity
     *
     * @param $rowId
     * @param $qty
     *
     * @return void
     */
    public function decrease($rowId, $qty): void
    {
        if ($qty == 1) {
            $cart = CartShoppingCart::get($rowId);

            $this->remove($rowId);
        } else {
            CartShoppingCart::update($rowId, $qty - 1);

            $this->update();
        }
        $this->emit('basketUpdated');
    }

    public function destroyCard()
    {
        CartShoppingCart::destroy();

        $this->emit('basketUpdated');
        $this->emit('destroyCard');
    }

    /**
     * hydrate Component
     *
     * @return void
     */
    public function hydrate(): void
    {
        $this->basket = CartShoppingCart::content();
    }

    public function remove($rowId): void
    {

        $cart = CartShoppingCart::get($rowId);
        CartShoppingCart::remove($rowId);

        $this->emit('basketUpdated');

        $this->update();
    }

    public function update(): void
    {
        $this->qty = CartShoppingCart::count();
    }

    public function render()
    {
        $this->basket = CartShoppingCart::content();

        return view('livewire.user.product.cart')
            ->extends('users.layout.index')
            ->section('content');
    }
}
