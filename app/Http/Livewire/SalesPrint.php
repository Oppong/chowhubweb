<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SalesPrint extends Component
{
    public $orderId;

    public function mount($orderId){
        $this->orderId = $orderId;
    }

    public function render()
    {
        return view('livewire.sales-print');
    }

    public function refreshSales(){
        $this->emit(' ');
    }
}
