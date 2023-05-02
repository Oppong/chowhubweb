@extends('base')

@section('title', 'Orders Page')

@section('description')
Customers Order Page
@stop


@section('content')
    <div class="container m-auto my-16">
        <div class="">

            <p class="mt-4 mb-4 text-2xl font-extrabold text-center font-Mulish">My Orders ({{ $orders->count() }})</p>

            <div class="max-w-sm mx-auto">
                @forelse ($orders as $order)
                    <div class="grid grid-cols-1">
                        <div class="mb-8">
                            <p class="mb-1 text-lg font-bold font-Mulish">Order ID: {{ $order->order_id }}</p>
                            <p class="mb-1 text-sm font-thin font-Mulish"> <span class="font-normal font-Mulish">Order Date:</span>
                                {{ $order->created_at->toDayDateTimeString() }}</p>
                            <p class="mb-1 text-sm font-thin font-Mulish"> <span class="font-normal font-Mulish">Payment Method: </span>{{ $order->payment_mode }}</p>
                            <p class="mb-1 text-sm font-thin font-Mulish"> <span class="font-normal font-Mulish">Status: </span>{{ $order->status }}</p>
                            <hr class="mb-8 border">
                            @php
                                $totalPrice = 0;
                            @endphp
                            @foreach ($order->orderItems as $orderItem)
                                <div class="flex mb-5">
                                    {{-- image --}}

                                    <div>
                                        <div class="w-24 h-24 mr-4 bg-black rounded-sm ">
                                            <img src="{{ url('/storage/' . $orderItem->food->image) }} " alt=""
                                                class="object-cover w-24 h-24 rounded-sm ">
                                        </div>
                                    </div>


                                    {{-- text --}}
                                    <div>
                                        <p class="font-Mulish">{{ $orderItem->food->name }}</p>
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-thin font-Mulish"> Qty - <span
                                                    class="font-bold">{{ $orderItem->quantity }}</span></p>
                                            <p class="ml-16 text-sm font-bold text-red-600 font-Mulish">Ghs
                                                {{ $orderItem->price }}</p>
                                        </div>

                                        <div class="flex mt-8">
                                            <p class="text-sm font-thin font-Mulish">SubTotal</p>
                                            <p class="ml-16 text-sm font-extrabold font-Mulish">
                                                {{ $orderItem->quantity * $orderItem->price }}.00</p>
                                        </div>

                                    </div>
                                </div>

                                @php
                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                @endphp
                            @endforeach
                            <hr class="mb-2 border">
                            <div class="flex justify-between">
                                <p class="font-Mulish">Total Amount:</p>
                                <p class="font-bold font-Mulish">Ghs{{ $totalPrice }}</p>
                            </div>
                            <hr class="mt-2 border">

                        </div>
                    </div>
                @empty
                    <p>You have no Orders Yet</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
