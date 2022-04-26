<?php

namespace App\Http\Livewire\User\Product;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{
    public $qty = 1;
    public $productId = '';

    public function mount(int $productId): void
    {
        $this->productId = $productId;
    }

    public function add()
    {
        $product = Product::where('id', $this->productId)->first();

        $cart = Cart::add(
            $product->id,
            $product->name,
            $this->qty,
            $product->countDiscount(),
            0,
            [
                'product_name_ar' => $product->translate('ar')->name,
                'product_description_ar' => $product->translate('ar')->description,
                'product_name_en' => $product->translate('en')->name,
                'product_description_en' => $product->translate('en')->description,
                'price_before_discount' => ($product->productCampaigns()->where('status', 'active')->first() != null) ? $product->price : null,
                'image' => $product->image,
                'description' => $product->description,
                'admin' => $product->admin_id,
            ]);
        $this->emit('basketUpdated');
        session()->flash('message', 'successfully Added.');
    }

    public function render()
    {
        return view('livewire.user.product.add-to-cart');
    }
}
