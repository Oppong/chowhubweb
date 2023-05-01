<div>
    {{-- Be like water. --}}

    <div class="container m-auto my-4">
        <div class="max-w-sm mx-auto">
            <div class="" id="chow">
            {{-- <p class="mt-4 mb-1 text-xl font-extrabold text-center font-Mulish">Chowhub Reciept</p> --}}
            {{-- <hr class="mb-2 border"> --}}
            <h4 class="mb-2 font-extrabold text-center font-Mulish">The ChowHub Receipt</h4>
            <hr class="mb-2 border">
            <div class="text-sm font-normal text-center text-gray-700 font-Mulish">
                <p>The ChowHub, Lashibi</p>
                <p>Tel: +233 24 393 3334</p>
                <p>Email: chowhubfoods@gmail.com</p>
                <p class="font-bold">Order #: {{$orderId->order_id}}</p>
                <p class="font-bold"> Date: {{$orderId->created_at->toDayDateTimeString()}}</p>
                <p class="font-bold"> Paid With: {{$orderId->payment_mode}}</p>
                <p class="font-bold"> Cashier: {{auth()->user()->name}}</p>
               </div>
            <hr class="mt-4 mb-4 bg-black borders">
            <div class="flex items-center justify-between text-sm font-bold">
                <div>
                    <p>Qty</p>
                </div>
                <div>
                    <p>Description</p>
                </div>
                <div>
                    Amount
                </div>
            </div>
            <hr class="mt-4 mb-4 bg-black borders">
        @php
            $totalPrice = 0;
        @endphp
        @foreach ($orderId->orderItems as $orderItem)
            <div class="flex items-center justify-between text-sm">
                <div>
                    <p>{{$orderItem->quantity}}</p>
                </div>
                <div>
                    <p>{{ $orderItem->food->name }} @ {{$orderItem->price}}</p>
                </div>
                <div>
                    {{ $orderItem->quantity * $orderItem->price }}.00
                </div>
            </div>
            @php
            $totalPrice += $orderItem->quantity * $orderItem->price;
        @endphp
            @endforeach
            <hr class="mt-4 mb-4 bg-black borders">
            <div class="flex items-center justify-between text-sm">
                <h4 class="font-normal font-Mulish">Total Amount</h4>
                <h4 class="font-extrabold text-center font-Mulish">Ghs {{ $totalPrice }}.00</h4>
            </div>
            <hr class="mt-4 mb-4 bg-black borders">

                <button type="button" onclick="window.print()" class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-700 rounded print:hidden hover:bg-teal-800">
                    Print
                </button>

                <a href="{{route('sale')}}" >
                    <button type="button" class="w-full px-8 py-3 mt-4 text-sm text-white bg-red-700 rounded print:hidden hover:bg-red-800">
                        Go Back
                     </button>
                </a>


            </div>
        </div>
    </div>
</div>


