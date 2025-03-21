<nav>
    <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between p-6">
        <a href="javascript:void(0)" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/Seatify.png') }}" class="h-8" alt="Seatify Logo" />
            <span class="text-2xl font-semibold text-white lg:block hidden">Seatify</span>
        </a>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @guest
                <a href="{{ route('login') }}" class="block">
                    <button type="button" class="bg-gray-100 cursor-pointer hover:bg-gray-300 text-gray-900 font-medium rounded-lg text-sm px-4 py-2">
                        Masuk
                    </button>
                </a>
            @endguest

            @auth
                <button type="button" class="flex text-sm bg-gray-800 cursor-pointer rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" 
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-10 h-10 rounded-full" src="https://static.vecteezy.com/system/resources/previews/009/292/244/non_2x/default-avatar-icon-of-social-media-user-vector.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2 font-medium" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Transaksi</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="cursor-pointer flex items-center p-2Z text-red-500 rounded-lg hover:bg-gray-100">
                                @csrf                 
                                <button type="submit" class="block w-full cursor-pointer text-left px-4 py-2 text-sm text-red-700 hover:bg-gray-100">
                                    Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            {{-- <button data-collapse-toggle="navbar-cta" type="button" class="md:hidden p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button> --}}
        </div>
        {{-- <div id="navbar-cta" class="hidden flex-col md:w-auto md:order-1">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:mt-0 md:space-x-8 rtl:space-x-reverse">
                <li><a href="/" class="block py-2 px-5 text-white">Home</a></li>
                <li><a href="#" class="block py-2 px-5 text-white">Konser</a></li>
                <li><a href="#" class="block py-2 px-5 text-white">Kontak</a></li>
            </ul>
        </div> --}}
    </div>
</nav>
