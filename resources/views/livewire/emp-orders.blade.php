<div>
    {{-- In work, do what you enjoy. --}}


    <div class="container m-auto mt-12 mb-24">

        {{-- <p class="mb-1 text-xl font-bold ">Orders</p> --}}
        {{-- <p class="mb-5 text-sm text-gray-600 font-Mulish">This page displays all POS, Web and Mobile App Orders</p> --}}
        <div class="grid grid-cols-4 gap-6 mb-20">
            <div class="h-24 bg-red-600 rounded-lg ">
                <div class="flex justify-between p-4">
                    <p class="text-sm font-normal text-white">Total Sales</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="self-center w-4 h-4 mr-2 text-white" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>

                </div>
                <div>
                    <p class="px-4 font-bold text-white font-mulish">GHS {{ $totalSales }}.00</p>
                </div>
            </div>

            <div class="h-24 bg-indigo-600 rounded-lg ">
                <div class="flex justify-between p-4">
                    <p class="text-sm font-normal text-white">Total Orders</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="self-center w-4 h-4 mr-2 text-white" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>

                </div>
                <div>
                    <p class="px-4 font-bold text-white font-mulish">{{ $totalOrders }}</p>
                </div>
            </div>

            <div class="h-24 bg-teal-600 rounded-lg ">
                <div class="flex justify-between p-4">
                    <p class="text-sm font-normal text-white">Today's Sales</p>
                    <svg class="self-center w-4 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                    </svg>
                </div>
                <div>
                    <p class="px-4 font-bold text-white font-mulish">GHS {{ $totalSalesToday }}.00</p>
                </div>
            </div>

            <div class="h-24 bg-yellow-800 rounded-lg ">
                <div class="flex justify-between p-4">
                    <p class="text-sm font-normal text-white">Today's Orders</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="self-center w-4 h-4 mr-2 text-white" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                    </svg>

                </div>
                <div>
                    <p class="px-4 font-bold text-white font-mulish">{{ $totalOrdersToday->count() }}</p>
                </div>
            </div>
        </div>

        <div class="mb-5" x-data="{ tab: 'all' }">
            <div class="flex items-center justify-between">
                <nav>
                    <a :class="{ 'border-b border-red-600 pb-2 active': tab === 'all' }"
                        class="px-4 font-bold divide-x-4 divide-gray-800 font-mulish" x-on:click.prevent="tab = 'all'"
                        href="#">All Orders</a>
                    <a :class="{ 'border-b border-red-600 pb-2 active': tab === 'pos' }"
                        class="px-4 font-bold divide-x divide-gray-800 font-mulish" x-on:click.prevent="tab = 'pos'"
                        href="#">POS</a>
                    <a :class="{ 'border-b border-red-600 pb-2 active': tab === 'web' }"
                        class="px-4 font-bold divide-x divide-gray-800 font-mulish" x-on:click.prevent="tab = 'web'"
                        href="#">Web App <span class="text-red-600">({{ $webOrderCount->count() }})</span> </a>

                    <a :class="{ 'border-b border-red-600 pb-2  active': tab === 'mobile' }"
                        class="px-4 font-bold divide-x divide-gray-800 font-mulish" x-on:click.prevent="tab = 'mobile'"
                        href="#">Mobile App <span
                            class="text-red-600">({{ $mobileOrderCount->count() }})</span></a>
                </nav>


            </div>


            {{-- all orders table --}}
            <div class="mt-6" x-show="tab === 'all'">
                <div class="rounded shadow">
                    <table class="w-full whitespace-nowrap">
                        <thead class="text-sm bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Id</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Name</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Phone</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Id
                                </th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Status</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Payment
                                    Method</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Status
                                </th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Source
                                </th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Date</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($orders  as  $order)
                                <tr class="">
                                    <td class="py-6 text-sm text-center font-mulish">{{ $order->id }}</td>
                                    <td class="py-6 text-sm text-center font-mulish">{{ $order->name }}</td>
                                    <td class="py-6 text-sm text-center font-mulish }">{{ $order->phone }}</td>
                                    <td class="py-6 text-sm text-center font-mulish">{{ $order->order_id }}</td>
                                    <td
                                        class="py-6 text-sm text-center font-mulish {{ $order->status == 'Delivered' ? 'text-teal-600' : 'text-red-600' }} ">
                                        {{ $order->status }}</td>
                                    <td class="py-6 text-sm text-center font-mulish">{{ $order->payment_mode }}</td>
                                    <td
                                        class="py-6 text-sm text-center font-mulish {{ $order->order_status == 'new' ? 'text-red-600' : 'text-teal-600' }}">
                                        {{ $order->order_status }}</td>
                                    <td class="py-6 text-sm text-center font-mulish">{{ $order->order_type }}</td>
                                    <td class="py-6 text-sm text-center font-mulish">
                                        {{ $order->created_at->toDayDateTimeString() }}</td>
                                    <td class="flex items-center py-6 text-sm font-normal text-center font-mulish">


                                        <button wire:click="view({{ $order->id }})">
                                            <svg class="self-center w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>

                                        </button>

                                        <a href="{{ route('saleprint', $order->id) }}">
                                            <button type="button" id="print">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="self-center w-4 h-4 mr-2" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                </svg>
                                            </button>
                                        </a>


                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="self-center w-4 h-4 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link type="button"
                                                    wire:click="accepted({{ $order->id }})"
                                                    class="cursor-pointer">
                                                    Accepted
                                                </x-dropdown-link>
                                                <x-dropdown-link type="button"
                                                    wire:click="ready({{ $order->id }})" class="cursor-pointer">
                                                    Ready for Pickup
                                                </x-dropdown-link>

                                                <x-dropdown-link type="button"
                                                    wire:click="delivered({{ $order->id }})"
                                                    class="cursor-pointer">
                                                    Delivered
                                                </x-dropdown-link>

                                            </x-slot>

                                        </x-dropdown>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td class="py-24">
                                        <p class="text-center">No Orders yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6" x-show="tab === 'pos'">
                <div class="rounded shadow">
                    <table class="w-full whitespace-nowrap">
                        <thead class="text-sm bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Id</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Name</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Phone</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Id
                                </th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Status</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Payment
                                    Method</th>
                                {{-- <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Source</th> --}}
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Date</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($orders  as  $order)
                                @if ($order->order_type == 'POS')
                                    <tr>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->id }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->name }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->phone }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->order_id }}</td>
                                        <td
                                            class="py-6 text-sm text-center font-mulish {{ $order->status == 'Delivered' ? 'text-teal-600' : 'text-red-600' }}">
                                            {{ $order->status }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->payment_mode }}
                                        </td>
                                        {{-- <td class="py-6 text-sm text-center font-mulish">{{ $order->order_type }}</td> --}}
                                        <td class="py-6 text-sm text-center font-mulish">
                                            {{ $order->created_at->toDayDateTimeString() }}</td>
                                        <td class="flex items-center py-6 text-sm font-normal text-center font-mulish">


                                            <button wire:click="view({{ $order->id }})">
                                                <svg class="self-center w-4 h-4 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>

                                            <a href="{{ route('saleprint', $order->id) }}">
                                                <button type="button" id="print">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="self-center w-4 h-4 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                    </svg>
                                                </button>
                                            </a>


                                            <x-dropdown>
                                                <x-slot name="trigger">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="self-center w-4 h-4 mr-2" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link type="button"
                                                        wire:click="accepted({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Accepted
                                                    </x-dropdown-link>
                                                    <x-dropdown-link type="button"
                                                        wire:click="ready({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Ready for Pickup
                                                    </x-dropdown-link>

                                                    <x-dropdown-link type="button"
                                                        wire:click="delivered({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Delivered
                                                    </x-dropdown-link>

                                                </x-slot>

                                            </x-dropdown>

                                        </td>
                                    </tr>
                                @endif

                            @empty
                                <tr>
                                    <td class="py-24">
                                        <p class="text-center">No Orders yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6" x-show="tab === 'web'">
                <div class="rounded shadow">
                    <table class="w-full whitespace-nowrap">
                        <thead class="text-sm bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Id</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Name</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Phone</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Id
                                </th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Status</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Payment
                                    Method</th>
                                {{-- <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Type</th> --}}
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order
                                    Status</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Date</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($orders  as  $order)
                                @if ($order->order_type == 'Web App')
                                    <tr>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->id }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->name }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->phone }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->order_id }}</td>
                                        <td
                                            class="py-6 text-sm text-center font-mulish {{ $order->status == 'Delivered' ? 'text-teal-600' : 'text-red-600' }}">
                                            {{ $order->status }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->payment_mode }}
                                        </td>
                                        {{-- <td class="py-6 text-sm text-center font-mulish">{{ $order->order_type }}</td> --}}
                                        <td
                                            class="py-6 text-sm text-center font-mulish {{ $order->order_status == 'new' ? 'text-red-600' : 'text-teal-600' }}">
                                            {{ $order->order_status }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">
                                            {{ $order->created_at->toDayDateTimeString() }}</td>
                                        <td
                                            class="flex items-center py-6 text-sm font-normal text-center font-mulish ">


                                            <button wire:click="view({{ $order->id }})">
                                                <svg class="self-center w-4 h-4 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                            </button>

                                            <a href="{{ route('saleprint', $order->id) }}">
                                                <button type="button" id="print">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="self-center w-4 h-4 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                    </svg>
                                                </button>
                                            </a>


                                            <x-dropdown>
                                                <x-slot name="trigger">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="self-center w-4 h-4 mr-2" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link type="button"
                                                        wire:click="accepted({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Accepted
                                                    </x-dropdown-link>
                                                    <x-dropdown-link type="button"
                                                        wire:click="ready({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Ready for Pickup
                                                    </x-dropdown-link>

                                                    <x-dropdown-link type="button"
                                                        wire:click="delivered({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Delivered
                                                    </x-dropdown-link>

                                                </x-slot>

                                            </x-dropdown>



                                        </td>
                                    </tr>
                                @endif

                            @empty
                                <tr>
                                    <td class="py-24">
                                        <p class="text-center">No Orders yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6" x-show="tab === 'mobile'">
                <div class="rounded shadow">
                    <table class="w-full whitespace-nowrap">
                        <thead class="text-sm bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Id</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Name</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Phone</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Id
                                </th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Status</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Payment
                                    Method</th>
                                {{-- <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order Type</th> --}}
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Order
                                    Status</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Date</th>
                                <th class="px-6 py-3 text-sm font-bold text-center text-black font-mulish ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($orders  as  $order)
                                @if ($order->order_type == 'Mobile App')
                                    <tr>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->id }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->name }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->phone }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->order_id }}</td>
                                        <td
                                            class="py-6 text-sm text-center font-mulish {{ $order->status == 'Delivered' ? 'text-teal-600' : 'text-red-600' }} ">
                                            {{ $order->status }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">{{ $order->payment_mode }}
                                        </td>
                                        {{-- <td class="py-6 text-sm text-center font-mulish">{{ $order->order_type }}</td> --}}
                                        <td
                                            class="py-6 text-sm text-center font-mulish {{ $order->order_status == 'new' ? 'text-red-600' : 'text-teal-600' }}">
                                            {{ $order->order_status }}</td>
                                        <td class="py-6 text-sm text-center font-mulish">
                                            {{ $order->created_at->toDayDateTimeString() }}</td>
                                        <td class="flex items-center py-6 text-sm font-normal text-center font-mulish">


                                            <button wire:click="view({{ $order->id }})">
                                                <svg class="self-center w-4 h-4 mr-2"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                            </button>


                                            <a href="{{ route('saleprint', $order->id) }}">
                                                <button type="button" id="print">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="self-center w-4 h-4 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                    </svg>
                                                </button>
                                            </a>


                                            <x-dropdown>
                                                <x-slot name="trigger">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="self-center w-4 h-4 mr-2" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link type="button"
                                                        wire:click="accepted({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Accepted
                                                    </x-dropdown-link>
                                                    <x-dropdown-link type="button"
                                                        wire:click="ready({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Ready for Pickup
                                                    </x-dropdown-link>

                                                    <x-dropdown-link type="button"
                                                        wire:click="delivered({{ $order->id }})"
                                                        class="cursor-pointer">
                                                        Delivered
                                                    </x-dropdown-link>

                                                </x-slot>

                                            </x-dropdown>

                                        </td>
                                    </tr>
                                @endif

                            @empty
                                <tr>
                                    <td class="py-24">
                                        <p class="text-center">No Orders yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        {{-- <div class="my-5 ml-2 mr-10">
            {{ $orders->links() }}
        </div> --}}
    </div>

    @if ($showView)
        <x-dialog wire:model.defer="showView">
            <x-slot name="title">
                <p class="mb-1 text-lg font-bold font-Mulish">{{ $orderOne->name }}</p>
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1">
                    <div class="mb-8">
                        <p class="mb-1 text-lg font-bold font-Mulish">Order ID: {{ $orderOne->order_id }}</p>
                        <p class="mb-1 text-sm font-thin font-Mulish"> <span class="font-normal font-Mulish">Order
                                Date:</span>
                            {{ $orderOne->created_at->toDayDateTimeString() }}</p>
                        <p class="mb-1 text-sm font-thin font-Mulish"> <span class="font-normal font-Mulish">Order Source:
                            </span>{{ $orderOne->order_type }}</p>
                        <hr class="mb-8 border">

                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach ($orderOne->orderItems as $orderItem)
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
            </x-slot>

            <x-slot name="footer">
                <x-primary-button type="button" wire:click="$set('showView', false)" class="bg-red-600 hover:bg-red-700">
                        Close
                </x-primary-button>
            </x-slot>

        </x-dialog>
    @endif
</div>







{{-- <div>
    <input type="search" name="search" id="search"
    class="px-2 py-2 mr-4 text-sm bg-white rounded shadow" placeholder="Search Orders ..."
    wire:model="search">
</div> --}}
