@extends('base')


@yield('title| Home')
@section('content')



<div class="container grid grid-cols-1 m-auto mt-4 sm:mt-12 sm:grid-cols-2 ">
    {{-- for desktop --}}
    <div class="hidden sm:block">
        <h2 class="mb-6 font-extrabold text-center text:5xl sm:text-left sm:text-5xl font-Mulish">Delicious Foods that <br> sooths your Hunger <br> and Soul</h2>
        <p class="font-normal font-Mulish sm:text-[18px] mb-6 text-[14px] text-center sm:text-left">Your number one food hub to quench your hunger <br>
            and the place to taste delicious delicacies</p>
            <div class="text-center">
                <button class="flex items-center px-8 py-3 text-center text-white bg-black rounded-full sm:px-16 sm:py-4" type="button">
                    Order Now
                    {{-- <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2 text-center text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                          </svg>

                    </span> --}}
                </button>
            </div>
    </div>

    <div class="content-center">
        <img src="./images/fried.jpg" alt="">
        <p class="font-normal font-Mulish mb-6 text-[14px] text-center sm:hidden ">Your number one food hub to quench your hunger
            and the place to taste delicious delicacies</p>
            <div class="flex flex-col items-center sm:hidden">
                <button class="flex px-8 py-3 text-white bg-black rounded-full sm:px-16 sm:py-4" type="button">
                    Order Now
                    {{-- <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-2 text-center text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                          </svg>

                    </span> --}}
                </button>
            </div>
    </div>



</div>
<div class="container m-auto">
    <livewire:food-menu>
</div>




@endsection
