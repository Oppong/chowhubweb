<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CategoryFoodMenu extends Component
{

    public $foods, $category;
    public $quantityCount = 1;

    public function mount($foods, $category){
        $this->foods = $foods;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category-food-menu');
    }

    public function addToCart(int $food_id)
    {
        //first check if the user is autheniicatted
        if (Auth::check()) {

            if (Cart::where('user_id', auth()->user()->id)->where('food_id', $food_id)->exists()) {
                session()->flash('message', 'Food Already in Cart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Food Already in Cart',
                    'type' => 'error'
                ]);

            } else {
               Cart::create([
                    'user_id' => auth()->user()->id,
                    'food_id' => $food_id,
                    'quantity' => $this->quantityCount,
                ]);
                //broadcast an event or tell the app that something has happened
                $this->emit('CartAddedOrUpdated');
                session()->flash('message', 'Food has been added to Cart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Food has been added to Cart',
                    'type' => 'success'
                ]);
            }
        } else {
            session()->flash('message', 'Plase Login to Continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info'
            ]);
        }
    }
}
