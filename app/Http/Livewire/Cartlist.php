<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class Cartlist extends Component
{
    public $totalPrice = 0;

    // public function mount($carts){
    //     $this->carts = $carts;
    // }

    public $quantityCount = 1;

    public function incrementQuantity(int $cartId)
    {

        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            $cartData->increment('quantity');
        } else {
        }
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData->quantity > 1) {
            $cartData->decrement('quantity');
        } else {
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData){
            $cartData->delete();
            $this->emit('CartAddedOrUpdated');
        }
        session()->flash('message', 'Food Item has been deleted From Cart');
    }



    public function render()
    {
        $cartlist = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.cartlist', [
            'cartlist' => $cartlist,
        ]);
    }
}


  // if ($this->quantityCount > 1) {
        //     $this->quantityCount--;
        // }
 // $this->quantityCount++;
