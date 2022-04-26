<?php

namespace App\Http\Livewire\User;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Products extends Component
{
    public $qty = 1;

    public function add($productId)
    {
        $product = Product::where('id', $productId)->first();

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

        $this->emit('add');
//        $this->dispatchBrowserEvent('add');
        session()->flash('message', 'successfully Added.');
    }

    public function render()
    {
        $products = Product::latest()->take(20)->get();

        return view('livewire.user.products', [
            'products' => $products,
        ]);
    }
}
