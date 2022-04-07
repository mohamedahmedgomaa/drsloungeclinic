<?php

namespace App\Http\Livewire\User\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class BasketButton extends Component
{
    /**
     * @var int
     */
    public $qty = 0;
    /**
     * @var array
     */
    protected $listeners = [ 'basketUpdated' => 'update' ];


    public function mount(): void {
        $this->update();
    }

    public function update(): void {
        $this->qty = Cart::count();
    }

    public function render()
    {
        return view('livewire.user.product.basket-button');
    }
}
