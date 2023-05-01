@extends('base')

@section('title', 'Thankyou Page')

@section('description')
Customers ThankyouPage
@stop


@section('content')


<div class="container m-auto my-28">
     <div class="text-center">
    <img src="./images/thanks.png" alt="" class="mx-auto w-72 h-72">
    <p class="mt-4 mb-4 font-Mulish">Thank You for Ordering on Chowhub</p>

    <a href="/">
        <button class="px-4 py-2 text-center text-white bg-indigo-600 rounded">
            Go Home
        </button>
    </a>
   </div>
</div>


@endsection
