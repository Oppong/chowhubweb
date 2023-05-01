<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EmpOrders extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'id';
    public $orderAsc = true;

    public Order $orderOne;
    public $showView = false;

    protected $rules = [
        'allOrders.id' => 'required',
    ];

    // public function mount()
    // {
    //     $this->allOrders = OrderItem::make();
    // }

    public function render()
    {
        $startDate = Carbon::today()->startOfDay();
        $endDate = Carbon::today()->endOfDay();

        $orders  = Order::whereBetween('created_at', [$startDate, $endDate])
        ->orderBy($this->orderBy, $this->orderAsc ? 'desc' : 'asc')
        ->get();
        // ->paginate($this->perPage);

        $totalOrders = Order::all()->count();


        $totalSales = OrderItem::all()->sum(function($row){
            return $row->price * $row->quantity;
        });

        //getting sales for a day
        $totalSalesToday = OrderItem::whereBetween('created_at', [$startDate, $endDate])->get()->sum(function($row){
            return $row->price * $row->quantity;
        });

        //get orders for the day
        $totalOrdersToday = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        //get web order count
        $webOrderCount =  Order::whereBetween('created_at', [$startDate, $endDate])
        ->where('order_type', '=', 'Web App')
        ->where('order_status', '=', 'new' )
        ->get();

        //get mobile order count
        $mobileOrderCount =  Order::whereBetween('created_at', [$startDate, $endDate])
        ->where('order_type', '=', 'Mobile App')
        ->where('order_status', '=', 'new' )
        ->get();



        return view('livewire.emp-orders',  [
            'orders' => $orders,
            'totalSales' => $totalSales,
            'totalSalesToday' =>  $totalSalesToday,
            'totalOrdersToday' => $totalOrdersToday,
            'webOrderCount' => $webOrderCount,
            'mobileOrderCount' => $mobileOrderCount,
            'totalOrders' => $totalOrders,

        ]);


    }

    public function view(Order $orderId){
        // dd($orderId);
       $this->orderOne = $orderId;
       $this->showView = true;
    }

    public function accepted(Order $order){

       $check = $order->update([
            'status' => 'accepted',
        ]);

        if($check){
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order accepted successfully',
                'type' => 'success'
            ]);
        }else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong, try again',
                'type' => 'error'
            ]);
        }
    }

    public function ready(Order $order){

        $check = $order->update([
             'status' => 'ready',
         ]);

         if($check){
             $this->dispatchBrowserEvent('message', [
                 'text' => 'Order is ready for pickup',
                 'type' => 'success'
             ]);
         }else {

             $this->dispatchBrowserEvent('message', [
                 'text' => 'Something went wrong, try again',
                 'type' => 'error'
             ]);
         }
     }

     public function delivered(Order $order){

        $check = $order->update([
             'status' => 'Delivered',
             'order_status' => 'old',
         ]);

         if($check){
             $this->dispatchBrowserEvent('message', [
                 'text' => 'Order has been delivered successfully',
                 'type' => 'success'
             ]);
         }else {

             $this->dispatchBrowserEvent('message', [
                 'text' => 'Something went wrong, try again',
                 'type' => 'error'
             ]);
         }
     }


}


// $ordTo = DB::table('order_items')->sum(DB::raw('price * quantity'));
// 'ordTo' => $ordTo,

// $orders  = Order::where('name', 'like', '%' . $this->search . '%')
// ->orWhere('phone', 'like', '%' . $this->search . '%')
// ->orWhere('order_id', 'like', '%' . $this->search . '%')
// ->orWhere('payment_mode', 'like', '%' . $this->search . '%')
// ->orderBy($this->orderBy, $this->orderAsc ? 'desc' : 'asc')
// ->paginate($this->perPage);

