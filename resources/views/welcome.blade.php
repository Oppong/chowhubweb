@extends('base')


@section('title', 'Home Page')

@section('description')
The ChowHub is a Food Operating Business in Ghana. We provide Delicious Foods that
sooths your Hunger and Soul. Your number one food hub to quench your hunger and the place to taste delicious delicacies
@stop

@section('content')



<div class="container grid grid-cols-1 m-auto mt-4 sm:mt-12 sm:grid-cols-2 ">
    {{-- for desktop --}}
    <div class="hidden sm:block">
        <h2 class="mb-6 font-extrabold text-center text:5xl sm:text-left sm:text-5xl font-Mulish">Delicious Foods that <br> sooths your Hunger <br> and Soul</h2>
        <p class="font-normal font-Mulish sm:text-[18px] mb-6 text-[14px] text-center sm:text-left">Your number one food hub to quench your hunger <br>
            and the place to taste delicious delicacies</p>
            <div class="text-center">
                <a href="/menu">
                   <button class="flex items-center px-8 py-3 text-center text-white bg-black rounded-full sm:px-16 sm:py-4" type="button">
                    Order Now
                </button>
                </a>

            </div>
    </div>

    <div class="content-center">
        <img src="./images/fried.jpg" alt="">
        <p class="font-normal font-Mulish mb-6 text-[14px] text-center sm:hidden ">Your number one food hub to quench your hunger
            and the place to taste delicious delicacies</p>
            <div class="flex flex-col items-center sm:hidden">
                <a href="/menu">
                    <button class="flex px-8 py-3 text-white bg-black rounded-full sm:px-16 sm:py-4" type="button">
                        Order Now
                    </button>
                </a>
            </div>
    </div>



</div>
<div class="container m-auto">
    <livewire:food-menu>
</div>




@endsection
