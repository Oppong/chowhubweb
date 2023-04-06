<div>
    {{-- Stop trying to control. --}}

    <div class="container m-auto my-24">
        <div class="max-w-sm mx-auto">
            @if (Session::has('message'))
            <div class="px-4 py-4 mb-2 text-white bg-red-500">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

            <p class="mb-8 text-xl font-normal text-center font-Mulish">Food Shopping Cart ({{ $cartlist->count() }}
                items)</p>

            @forelse ($cartlist as $cart)
                <div class="grid grid-cols-1 mb-8">
                    <div class="flex">
                        {{-- {{url('/storage/'.$cart->food->image)}} --}}
                        <div class="w-24 h-24 mr-4 bg-black rounded ">
                            <img src="{{ url('/storage/' . $cart->food->image) }} " alt=""
                                class="object-cover w-24 h-24 ">
                        </div>

                        <div class="">
                            <div class="flex justify-between ">
                                <p class="font-medium font-Mulish"> {{ $cart->food->name }}</p>
                                <p class="ml-6 font-medium font-Mulish"> Ghs{{ $cart->food->price }}</p>
                            </div>
                            <div class="flex items-center">
                                <p class="text-sm font-thin font-Mulish"> {{ $cart->food->category->name }}</p>
                                <p class="ml-10 text-sm font-thin font-Mulish">
                                    Ghs{{ $cart->quantity * $cart->food->price }}</p>
                                    @php
                                    $totalPrice += $cart->quantity * $cart->food->price
                                    @endphp
                            </div>
                            <div class="flex justify-between flex-1 mt-6 text-sm font-Mulish">
                                <div class="flex items-centers">
                                    {{-- <p>Qty</p> --}}
                                    <button type="button" wire:loading.attr="disabled"
                                        wire:click="decrementQuantity({{ $cart->id }})"
                                        class="p-1 mr-1 bg-red-600 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </button>

                                    <p class="text-gray-500"> {{ $cart->quantity }}</p>

                                    <button type="button" wire:loading.attr="disabled"
                                        wire:click="incrementQuantity({{ $cart->id }})"
                                        class="p-1 ml-1 bg-red-600 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>


                                <div class="flex">
                                    <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{$cart->id}})"
                                        class="font-medium text-red-600 hover:text-red-800">

                                        <span wire:loading.remove wire:target="removeCartItem({{$cart->id}})">
                                            Remove
                                        </span>

                                        <span wire:loading wire:target="removeCartItem({{$cart->id}})">
                                            Removing...
                                        </span>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-4">
                        <p></p>
                </div>
            @empty
                <p class="font-bold text center font-Mulish">No item in Cart</p>
            @endforelse


            <div class="flex justify-between mt-5">
                <div>
                    <p>Total</p>
                </div>
                <div>
                    Ghs{{$totalPrice}}
                </div>
            </div>
            <button class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-600 rounded">
                Checkout
            </button>
        </div>

    </div>
</div>
