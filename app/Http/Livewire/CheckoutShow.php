<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;


class CheckoutShow extends Component
{
    public $carts;
    public $totalFoodAmount = 0;
    public $checkSuccess;

    public $name;
    public $phone;
    public $payment_mode;


    public function rules()
    {

        return [
            'name' => 'required',
            'phone' => 'required',
            'payment_mode' => 'required'
        ];
    }


    public function confirmOrder(){
        $validatedData = $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'order_id' => 'chow-'.Str::random(5),
            'payment_mode' =>$this->payment_mode,
            'status' => 'not_pickedup',
        ]);

        foreach ($this->carts as $cartItems){

            $this->checkSuccess =  $orderItems = OrderItem::create([
            'order_id' => $order->id,
            'food_id' => $cartItems->food_id,
            'quantity' => $cartItems->quantity,
            'price' => $cartItems->food->price,
        ]);

        }


        if($this->checkSuccess){
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Your Order has been placed successfully');
            return redirect('/thankyou');
        }else{
            session()->flash('message', 'Failed to place your order please try again later');
        }



    }

    public function totalProductAmount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($this->carts as $cartItems) {
            $this->totalFoodAmount += $cartItems->food->price * $cartItems->quantity;
        }

        return $this->totalFoodAmount;
    }


    public function render()
    {
        $this->totalFoodAmount = 0;
        $this->name = auth()->user()->name;
        $this->phone = auth()->user()->phone;

        $this->totalFoodAmount = $this->totalProductAmount();
        return view('livewire.checkout-show', [
            'totalFoodAmount' => $this->totalFoodAmount,
        ]);
    }
}
