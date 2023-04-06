<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class CartCount extends Component
{

    public $cartCount;

    //we listen  for emited events using listeners
    //the key is the event emitted name, and the value is the function you want to run
    protected $listeners = [
        'CartAddedOrUpdated' =>  'checkCartCount'
    ];

    public function checkCartCount()
    {
        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->cartCount = 0;
        }
    }

    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.cart-count', [
            'cartCount' => $this->cartCount,
        ]);
    }
}
