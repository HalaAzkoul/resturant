<ul class="nav">
    <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
    <li class="scroll-to-section"><a href="{{ route('cart.view') }}">Cart</a></li>
    <li class="scroll-to-section"><a href="#about">About</a></li>

<!--
    <li class="submenu">
        <a href="javascript:;">Drop Down</a>
        <ul>
            <li><a href="#">Drop Down Page 1</a></li>
            <li><a href="#">Drop Down Page 2</a></li>
            <li><a href="#">Drop Down Page 3</a></li>
        </ul>
    </li>
-->
    <li class="scroll-to-section"><a href="#menu">Menu</a></li>


    <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
    <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
   <li>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <li><a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                    @endif
                @endauth
            </div>
        @endif
        </li>
    </ul>
