<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="container m-auto my-24 ">
        <div class="max-w-sm mx-auto">
            @if (Session::has('message'))
            <div class="px-4 py-4 mb-2 text-white bg-teal-500">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
            <p class="mb-8 text-xl font-bold text-center font-Mulish">Checkout Information</p>

            @if ($totalFoodAmount != '0')
            <div>
                <div class="mb-5">
                    <label for="name">Name</label>
                    <input type="text" wire:model.defer="name" class="block w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-5">
                    <label for="phone">Phone</label>
                    <input type="text" wire:model.defer="phone"  class="block w-full px-4 py-2 border rounded">
                </div>

                <div class="mb-5">
                    <label for="payment_mode">Payment Method</label>
                    <select  id="payment_mode" wire:model.defer="payment_mode" class="block w-full px-4 py-2 border rounded">
                        <option value="" selected>Select Payment Method</option>
                        <option value="mobile money">Mobile Money at pickup</option>
                        <option value="cash">Cash at pickup</option>
                    </select>
                </div>
                <div class="flex justify-between">
                    <p class="mb-8 font-bold text-center font-Mulish">Food Cart Total </p>
                    <p class="mb-8 font-bold text-center font-Mulish"> GHS{{ $totalFoodAmount }}</p>
                </div>

                <button wire:click="confirmOrder" class="w-full px-4 py-2 text-center text-white bg-teal-600 rounded">
                    <span wire:loading.remove wire:target="confirmOrder">
                        Confirm Order
                    </span>
                    <span wire:loading wire:target="confirmOrder">
                        Placing your Order...
                    </span>
                </button>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li class="text-xs text-red-500">{{ $error }}</li>
                @endforeach
                @endif
            </div>
            @else

            <div class="text-center">
                <p class="font-Mulish">No Food in Cart to Checkout</p>
                <a href="/menu" class=" font-Mulish"> Shop Now</a>
            </div>

            @endif






        </div>
    </div>
</div>
