<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryFoodMenu extends Component
{

    public $foods, $category;

    public function mount($foods, $category){
        $this->foods = $foods;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category-food-menu');
    }
}
