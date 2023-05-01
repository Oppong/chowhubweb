<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use Livewire\Component;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class EmployeeSales extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;
    public $orderBy = 'id';
    public $orderAsc = true;

    public $quantityCount = 1;
    public $totalPrice = 0;
    public $checkSuccess;
    public $cartlist;

    // protected $listeners = ['Food Ordered', 'render'];

    public function render()
    {
        $startDate = Carbon::today()->startOfDay();
        $endDate = Carbon::today()->endOfDay();

        $newOrdersCount  = Order::whereBetween('created_at', [$startDate, $endDate])
        ->where('order_status', '=', 'new' )
        ->count();

        $category = Category::all();

        $this->cartlist = Cart::where('user_id', auth()->user()->id)->get();

        $foods = Food::where('name', 'like', '%' .  $this->search . '%')
            ->orWhere('price', 'like', '%' .  $this->search . '%')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.employee-sales', [
            'category' => $category,
            'foods' => $foods,
            'cartlist' => $this->cartlist,
            'newOrdersCount' => $newOrdersCount,
        ]);
    }

    public function addToCart($food_id)
    {

        if (Auth::check()) {

            if (Cart::where('user_id', auth()->user()->id)->where('food_id', $food_id)->exists()) {
                session()->flash('message', 'Food Already in Cart');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Food Already in Cart',
                    'type' => 'warning'
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
            session()->flash('message', 'Please Login to Continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'info'
            ]);
        }
    }

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

        if ($cartData) {
            $cartData->delete();
            $this->emit('CartAddedOrUpdated');
        }
        session()->flash('message', 'Food Item has been deleted From Cart');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Food Item has been deleted From Cart',
            'type' => 'error',
        ]);
    }


    public function paidWithCash()
    {

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'phone' => auth()->user()->phone,
            'order_id' => 'chow-' . Str::random(5),
            'payment_mode' => 'Cash',
            'order_type' => 'POS',
            'order_status' => 'old',
            'status' => 'Delivered',
        ]);

        foreach ($this->cartlist as $cartItems) {

            $this->checkSuccess =  $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $cartItems->food_id,
                'quantity' => $cartItems->quantity,
                'price' => $cartItems->food->price,
            ]);
        }

        if ($this->checkSuccess) {
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->emit('CartAddedOrUpdated');
            session()->flash('message', 'Your Order has been placed successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Processed Successfully',
                'type' => 'success'
            ]);

            return redirect()->route('saleprint', $order);
        } else {
            session()->flash('message', 'Failed to place your order please try again later');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Failed to process the order please try again later',
                'type' => 'error'
            ]);
        }

        // return 'i have been taped';
    }

    public function paidWithMomo()
    {

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'phone' => auth()->user()->phone,
            'order_id' => 'chow-' . Str::random(5),
            'payment_mode' => 'Mobile Money',
            'order_type' => 'POS',
            'order_status' => 'old',
            'status' => 'Delivered',
        ]);

        foreach ($this->cartlist as $cartItems) {

            $this->checkSuccess =  $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'food_id' => $cartItems->food_id,
                'quantity' => $cartItems->quantity,
                'price' => $cartItems->food->price,
            ]);
        }

        if ($this->checkSuccess) {
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->emit('CartAddedOrUpdated');
            session()->flash('message', 'Your Order has been placed successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Processed Successfully',
                'type' => 'success'
            ]);

            return redirect()->route('saleprint', $order);
        } else {
            session()->flash('message', 'Failed to place your order please try again later');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Failed to process the order please try again later',
                'type' => 'error'
            ]);
        }

        // return 'i have been taped';
    }
}
