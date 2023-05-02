<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        <div class="min-h-screen col-span-2 px-4 py-4 bg-slate-50">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold font-Mulish" wire:poll.20s wire:key="polling">Food Menu @if ($newOrdersCount > 0)
                    <span class="text-red-600">(New {{$newOrdersCount}})</span>
                @endif </h3>
                <div class="text-center">
                    <input type="search" name="search" id="search" class="px-8 py-2 mr-4 text-sm bg-white rounded-full"
                        placeholder="Search the Menu ..." wire:model="search">
                </div>
            </div>

            {{-- Food Category --}}

            <div class="mt-8 mb-6">
                <ul class="">
                    @foreach ($category as $cate)
                        <a href="">
                            <li
                                class="inline-block px-4 py-2 mb-2 mr-4 text-sm bg-white border border-red-600 rounded-full hover:bg-red-600 hover:text-white">
                                {{ $cate->name }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <hr>


            {{-- all food menu --}}
            <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-3 lg:grid-cols-4 gap-y-10">
                @forelse ($foods as $food)
                    @if ($food->status === 'enabled')
                        <div class="pb-2 rounded-sm shadow">
                            <img src="{{ url('/storage/' . $food->image) }}" alt=""
                                class="object-cover w-full h-40 rounded-sm">
                            <p class="mt-2 text-sm font-bold text-center font-Mulish">{{ $food->name }}</p>
                            <p class="text-sm font-normal text-center font-Mulish ">Ghs {{ $food->price }}.00</p>
                            <div class="flex flex-col px-2 mt-3 sm:px-6 place-content-center">
                                <button type="button" wire.loading.attr="disabled"
                                    wire:click="addToCart({{ $food->id }})"
                                    class="px-2 py-2 text-sm text-white bg-red-600 rounded-full hover:bg-red-800">
                                    <span wire:loading.remove wire:target="addToCart({{ $food->id }})">
                                        Add to Cart
                                    </span>
                                    <span wire:loading wire:target="addToCart({{ $food->id }})">
                                        Adding...
                                    </span>
                                </button>
                            </div>

                        </div>
                    @endif
                @empty
                    <p>No Food Available on Menu</p>
                @endforelse
            </div>
            <div class="mt-4">
                {{$foods->links()}}
            </div>
        </div>



        {{-- order details   --}}
        <div class="min-h-screen px-4 py-4 bg-slate-100">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-bold font-Mulish">Order Details</h3>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>

                    (<livewire:cart-count>)
                </div>
            </div>
            <hr>

            <div class="mt-4 mb-6">
                @forelse ($cartlist as $cart)
                    <div class="mb-8">
                        <div class="flex">
                            {{-- {{url('/storage/'.$cart->food->image)}} --}}
                            <div class="w-24 h-24 mr-4 bg-black rounded-sm ">
                                <img src="{{ url('/storage/' . $cart->food->image) }} " alt=""
                                    class="object-cover w-24 h-24 rounded-sm ">
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
                                        $totalPrice += $cart->quantity * $cart->food->price;
                                    @endphp
                                </div>
                                <div class="flex justify-between flex-1 mt-6 text-sm font-Mulish">
                                    <div class="flex items-centers">
                                        {{-- <p>Qty</p> --}}
                                        <button type="button" wire:loading.attr="disabled"
                                            wire:click="decrementQuantity({{ $cart->id }})"
                                            class="p-1 mr-1 bg-red-600 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                            </svg>
                                        </button>

                                        <p class="text-gray-500"> {{ $cart->quantity }}</p>

                                        <button type="button" wire:loading.attr="disabled"
                                            wire:click="incrementQuantity({{ $cart->id }})"
                                            class="p-1 ml-1 bg-red-600 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </button>
                                    </div>


                                    <div class="flex">
                                        <button type="button" wire:loading.attr="disabled"
                                            wire:click="removeCartItem({{ $cart->id }})"
                                            class="font-medium text-red-600 hover:text-red-800">

                                            <span wire:loading.remove
                                                wire:target="removeCartItem({{ $cart->id }})">
                                                Remove
                                            </span>

                                            <span wire:loading wire:target="removeCartItem({{ $cart->id }})">
                                                Removing...
                                            </span>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <p class="font-bold text center font-Mulish">No item in Cart</p>
                @endforelse
            </div>



            {{-- order summary --}}
            <div class="mt-12">
                <h3 class="mb-4 text-lg font-bold font-Mulish">Order Summary</h3>
                <hr>
                <div class="flex justify-between mt-4 mb-4">
                    <div>
                        <p class="text-sm font-Mulish">SubTotal</p>
                    </div>
                    <div>
                        <p class="text-sm font-bold font-Mulish">Ghs {{ $totalPrice }}</p>
                    </div>
                </div>
                <hr>


                <hr>
                <div class="flex justify-between mt-4 mb-4">
                    <div>
                        <p class="text-sm font-extrabold font-Mulish">Total</p>
                    </div>
                    <div>
                        <p class="text-sm font-extrabold font-Mulish ">Ghs {{ $totalPrice }}</p>
                    </div>
                </div>
                <hr>

                <div>
                    @if ($totalPrice == 0)
                    <button type="button" class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-300 rounded" disabled>
                        Paid with Cash
                    </button>

                    <button type="button" class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-300 rounded" disabled>
                        Paid with Mobile Money
                    </button>

                    <button type="button" class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-300 rounded" disabled>
                        Paid with POS
                    </button>

                    @else
                        <button type="button" wire:click="paidWithCash" wire:loading.attr="disabled" id="cash"
                            class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-700 rounded">
                            <span wire:loading.remove wire:target="paidWithCash">
                                Paid with Cash
                            </span>
                            <span wire:loading wire:target="paidWithCash">
                                Processing Payment...
                            </span>
                        </button>
                        <button type="button" wire:click="paidWithMomo" wire:loading.attr="disabled" id="momo" class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-700 rounded">
                            <span wire:loading.remove wire:target="paidWithMomo">
                                Paid with Mobile Money
                            </span>
                            <span wire:loading wire:target="paidWithMomo" >
                                Processing Payment...
                            </span>
                        </button>

                        <button type="button" wire:click=" paidWithPOS" wire:loading.attr="disabled" id="pos" class="w-full px-8 py-3 mt-4 text-sm text-white bg-teal-700 rounded">
                            <span wire:loading.remove wire:target=" paidWithPOS">
                                Paid with POS
                            </span>
                            <span wire:loading wire:target=" paidWithPOS" >
                                Processing Payment...
                            </span>
                        </button>
                    @endif
                </div>



            </div>

        </div>
    </div>
</div>

