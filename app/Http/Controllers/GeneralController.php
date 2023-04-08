<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function contact(){
        return view('contact');
    }

    public function menu(){
        return view('menu');
    }

    public function send(){

        $contact = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $newContact = new Contact;

        $newContact->name = $contact['name'];
        $newContact->email = $contact['email'];
        $newContact->subject = $contact['subject'];
        $newContact->message = $contact['message'];

        $newContact->save();

        notify()->success('Your message has been sent to ChowHub Successfully');

        return redirect('/contact')->with('message', 'Your message has been sent successfully');
    }

    public function categoryMenu($categoryName){
        $category = Category::where('name', $categoryName)->first();

        if($category){

           $foods = $category->foods()->get();
           return view('categoryfoods', [
            'foods' => $foods,
            'category' => $category,
           ]);

        }else {
            notify()->warning('the category could not be found');
            return redirect('/menu');
        }
    }

    public function cartlist(){

        return view('cartlist');
    }

    public function checkout(){
        return view('checkout');
    }

    public function thankyou(){
        return view('thankyou');
    }

    public function services(){
        return view('services');
    }


    public function orders(){
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->with(['orderItems'])->get();
        return view('orders', [
            'orders' => $orders,
        ]);
    }
}
