<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function dashboard(){
        return view('employees.dashboard');
    }

    public function sale(){
        return view('employees.sale');
    }

    public function emporders(){
        return view('employees.emporders');
    }

    public function saleprint(Order $order_id){

        return view('employees.saleprint', [
            'orderId' => $order_id,
        ]);
    }

    // public function printReciept(int $order_id){

    //     $orderId = Order::findOrFail($order_id);
    //     $data = ['orderId' => $orderId];

    //     $pdf = Pdf::loadView('employees.saleprint', $data);

    //     $todayDate = Carbon::now()->format('d-m-Y');
    //     return $pdf->download('reciept-'.$orderId->id.'-'.$todayDate.'.pdf');
    // }
}
