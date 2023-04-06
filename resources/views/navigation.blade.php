<div class="container m-auto">
    <nav class="flex items-center py-4">
        <div>
            <a href="/"><img src="./images/chub.png" alt="" class="h-12"></a>
        </div>
        {{-- for tablet and desktop --}}
        <ul class="items-center justify-center flex-1 hidden gap-10 text-sm sm:flex font-Mulish">
            <li class="cursor-pointer"> <a href="/"> Home</a></li>
            <li class="cursor-pointer"><a href="/menu">Menu</a> </li>
            <li class="cursor-pointer"> <a href="/contact">Contact</a> </li>
            <li class="cursor-pointer"> <a href="/services">Services</a> </li>
        </ul>

        @if (Route::has('login'))
        <div class="text-right ">
            @auth

            <div class="flex items-center gap-6">

                <a href="/cartlist">
                <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                          </svg>

                    (<livewire:cart-count>)
                </div>
            </a>


                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                  </svg>

            </div>

            @else
                <a href="{{ route('login') }}" class="text-sm font-Mulish">Sign In</a>

                @if (Route::has('register'))
                    <button class="px-4 py-2 ml-4 text-sm text-white bg-red-600 rounded-full" type="button">
                        <a href="{{ route('register') }}" class="text-sm font-Mulish">Sign Up</a>
                    </button>
                @endif
            @endauth
        </div>
    @endif


    </nav>
</div>
