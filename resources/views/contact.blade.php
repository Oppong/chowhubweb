@extends('base')


@section('content')
<div class="h-[14rem]">
    <img src="./images/lucas.jpg" alt="" class="absolute object-cover w-full h-[14rem]">
    <div class="absolute z-10 bg-black opacity-70 w-full h-[14rem]">
    </div>
    <p class="absolute z-20 w-full px-4 py-20 text-4xl font-thin text-center text-white sm:px-0 font-Mulish">Contact Us</p>
</div>

<div class="container px-6 my-24 lg:px-32 sm:px-16">
    <form action="/send" method="post">
        @csrf


        <h3 class="mb-4 text-2xl font-thin text-gray-800 font-Mulish" >Get in Touch</h3>

    <div class="grid grid-cols-1 gap-6 mb-12 text-sm sm:grid-cols-2 ">
        <input type="text" name="name" id="name" placeholder="Enter Name" class="w-full px-5 py-4 font-thin border border-gray-700 font-Mulish" required>
        <input type="text" name="email" id="email" placeholder="Enter Email" class="w-full px-5 py-4 font-thin border border-gray-700 font-Mulish" required>
    </div>


    <input type="text" name="subject" id="subject" placeholder="Enter Subject" class="w-full px-5 py-4 mb-10 font-thin border border-gray-700 font-Mulish" required>
    <textarea name="message" id="message" cols="30" rows="6" placeholder="Enter Message"
        class="w-full px-5 pt-8 mb-4 text-sm font-thin border border-gray-700 font-Mulish" required></textarea>


    <button type="submit" class="py-3 font-thin text-white bg-red-800 rounded-full font-Mulish px-14">
        Send
    </button>
    </form>
</div>



@endsection


{{-- @if (Session::has('message'))
<div class="px-4 py-4 mb-2 text-white bg-teal-500">
    <p>{{Session::get('message')}}</p>
</div>
@endif --}}
