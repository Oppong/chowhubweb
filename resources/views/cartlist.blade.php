@extends('base')

@section('title', 'Carts Page')

@section('description')
Customers Cart Page Order Page
@stop


@section('content')
<div class="h-[14rem]">
    <img src="./images/lucas.jpg" alt="" class="absolute object-cover w-full h-[14rem]">
    <div class="absolute z-10 bg-black opacity-70 w-full h-[14rem]">
    </div>
    <p class="absolute z-20 w-full px-4 py-20 text-4xl font-thin text-center text-white sm:px-0 font-Mulish">Cart Page</p>
</div>



<livewire:cartlist>



@endsection

{{--
<div class="container m-auto my-24">
    @forelse ($cartlist as $cart)
        <div class="grid grid-cols-1">
                {{$cart->id}}
        </div>
    @empty
        <p class="font-bold text center font-Mulish">No item in Cart</p>
    @endforelse
    <div>

    </div>
</div> --}}
