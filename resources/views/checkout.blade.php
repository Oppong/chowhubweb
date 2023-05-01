@extends('base')

@section('title', 'Checkout Page')

@section('description')
Customers checkout page
@stop

@section('content')
<div class="h-[14rem]">
    <img src="../images/lucas.jpg" alt="" class="absolute object-cover w-full h-[14rem]">
    <div class="absolute z-10 bg-black opacity-70 w-full h-[14rem]">
    </div>
    <p class="absolute z-20 w-full px-4 py-20 text-4xl font-thin text-center text-white sm:px-0 font-Mulish">Checkout</p>
</div>

<livewire:checkout-show />


@endsection
