<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Filament\Notifications\Notification;

class FoodMenu extends Component
{

    use WithPagination;

    public $search = '';
    public $perPage = 12;
    public $orderBy = 'id';
    public $orderAsc = true;
    // public $food;

    public $quantityCount = 1;

    public function render()
    {
        $category = Category::all();
        $foods = Food::where('name', 'like', '%' .  $this->search . '%')
            ->orWhere('price', 'like', '%' .  $this->search . '%')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.food-menu', [
            'category' => $category,
            'foods' => $foods,
        ]);
    }


    public function addToCart(int $food_id)
    {
        //first check if the user is autheniicatted
        if (Auth::check()) {

            if (Cart::where('user_id', auth()->user()->id)->where('food_id', $food_id)->exists()) {
                session()->flash('message', 'Food Already in Cart');

            } else {
               Cart::create([
                    'user_id' => auth()->user()->id,
                    'food_id' => $food_id,
                    'quantity' => $this->quantityCount,
                ]);
                //broadcast an event or tell the app that something has happened
                $this->emit('CartAddedOrUpdated');
                session()->flash('message', 'Food has been added to Cart');
            }
        } else {
            session()->flash('message', 'Plase Login to Continue');
            // notify()->success('Please Login to Continue');
        }
    }
}



/*
  public function foodOfCategory($cateName)
    {
        $category = Category::where('name', $cateName)->first();

        if ($category) {

            $foods = $category->foods()->get();
            return $foods;
        } else {
            notify()->warning('the category could not be found');
            return redirect('/menu');
        }
    }
 */