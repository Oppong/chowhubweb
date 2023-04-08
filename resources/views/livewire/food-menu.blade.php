<div>


    <div>
        <h3 class="mb-8 text-2xl font-bold text-center font-Mulish">What are you craving of?</h3>
        @foreach ($category as $category)
            <div class="" x-data="{ tab: {{ $category->name }} }">
                <button
                    :class="{ 'px-8 py-2 text-sm text-white bg-red-700 rounded-full active': tab === {{ $category->name }} }"
                    class="px-8 py-2 text-sm text-white bg-black rounded-full hover:bg-red-600 hover:text-white" x-on:click.prevent="tab = {{ $category->name }} " >
                    {{ $category->name }}
                </button>

                <div class="" x-show="tab === {{ $category->name }}">
                <div class="grid grid-cols-1 gap-8 mt-8 sm:grid-cols-2 lg:grid-cols-4 gap-y-8">
                    @foreach ($category->foods as $food)


                            <div class="py-3 rounded-sm shadow r">
                                <img src="{{ url('/storage/' . $food->image) }}" alt=""
                                    class="object-cover w-full h-40 px-4 rounded-sm">
                                <p class="mt-2 font-bold text-center font-Mulish ">{{ $food->name }}</p>
                                <p class="text-sm font-semibold text-center font-Mulish ">Ghs {{ $food->price }}.00</p>
                                <div class="flex flex-col px-10 mt-3 sm:px-20 place-content-center">
                                    <button type="button" wire.loading.attr="disabled"
                                        wire:click="addToCart({{ $food->id }})"
                                        class="px-4 py-2 text-sm text-white bg-red-600 rounded-full hover:bg-red-800 ">
                                        <span wire:loading.remove wire:target="addToCart({{ $food->id }})">
                                            Add to Cart
                                        </span>
                                        <span wire:loading wire:target="addToCart({{ $food->id }})">
                                            Adding...
                                        </span>
                                    </button>
                                </div>

                            </div>

                    @endforeach
                </div>
            </div>
            </div>
        @endforeach

    </div>


</div>




{{--
<div class="container m-auto my-24" x-data="{ open: false }">
    @if (Session::has('message'))
        <div class="px-4 py-4 mb-2 text-white bg-teal-500">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    <h3 class="mb-4 text-2xl font-bold text-center font-Mulish">What are you craving of?</h3>

    <div class="mb-12 text-center">
        <input type="search" name="search" id="search" class="px-8 py-2 mr-4 text-sm bg-white rounded-full"
            placeholder="Search the Menu ..." wire:model="search">
    </div>



@foreach ($category as $cate)
        <div class="inline-block" x-data="">
            <div class="inline-block ml-6">
                <a href="{{ url('/categoryfood/' . $cate->name) }}">
                    <button
                        class="px-8 py-2 text-sm text-white bg-black rounded-full hover:bg-red-600 hover:text-white"
                        wire:click="foodOfCategory({{ $cate->name }})">
                        {{ $cate->name }}
                    </button>
                </a>

            </div>
        </div>
    @endforeach

    <div class="grid grid-cols-1 gap-8 mt-8 sm:grid-cols-2 lg:grid-cols-4 gap-y-8">
        @forelse ($foods as $food)
            @if ($food->status === 'enabled')
                <div class="py-3 rounded-sm shadow r">
                    <img src="{{ url('/storage/' . $food->image) }}" alt=""
                        class="object-cover w-full h-40 px-4 rounded-sm">
                    <p class="mt-2 font-bold text-center font-Mulish ">{{ $food->name }}</p>
                    <p class="text-sm font-semibold text-center font-Mulish ">Ghs {{ $food->price }}.00</p>
                    <div class="flex flex-col px-10 mt-3 sm:px-20 place-content-center">
                        <button type="button" wire.loading.attr="disabled" wire:click="addToCart({{ $food->id }})"
                            class="px-4 py-2 text-sm text-white bg-red-600 rounded-full hover:bg-red-800 ">
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

    <div class="my-8 ml-2 mr-10">
        <p>{{ $foods->links() }}</p>
    </div>

</div> --}}
