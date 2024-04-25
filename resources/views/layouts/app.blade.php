<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
</head>

<body>
    @php
    $userPhoto = Auth::user()->photo;
    @endphp
    <header class="px-4 py-2 bg-dark shadow" style="background-color: #111827;">
        <div class="flex justify-between">
            <div class="flex items-center">
                <img  height="60" width="150" src="{{asset('img/ytb_logo.png')}}" alt="">
            </div>

            <div class="flex items-center">

                @if(Auth::user()->type == 0)
                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:rounded-md" type="button"
                    x-data="{ open: false }" @click="open = true" :class="{ 'rounded-md': open }">
                    <img src="{{ asset('upload/' . $userPhoto) }}"
                        alt="Profle" class="h-8 w-8 rounded-full">

                    <span class="ml-4 text-sm hidden md:inline-block text-white ">{{ Auth::user()->name }}</span>
                    <svg style="fill: white;" class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path
                            d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>

                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 rounded border border-gray-400 shadow"
                        x-show="open" @click.away="open = false" style="background-color: #111827;">
                        <ul>
                            <li class="px-4 py-3 text-white"><a href="{{ route('home') }}">Home</a></li>
                            <li class="px-4 py-3 text-white"><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>

                @elseif (Auth::user()->type == 3)
                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:rounded-md" type="button"
                    x-data="{ open: false }" @click="open = true" :class="{ 'rounded-md': open }">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=100&h=100&q=80"
                        alt="Profle" class="h-8 w-8 rounded-full">

                    <span class="ml-4 text-sm hidden md:inline-block text-white ">{{ Auth::user()->name }}</span>
                    <svg style="fill: white;" class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path
                            d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>

                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 rounded border border-gray-400 shadow"
                        x-show="open" @click.away="open = false" style="background-color: #111827;">
                        <ul>
                            <li class="px-4 py-3 text-white"><a href="{{ route('home') }}">Home</a></li>
                            <li class="px-4 py-3 text-white"><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>
                @else


                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:rounded-md" type="button"
                    x-data="{ open: false }" @click="open = true" :class="{ 'rounded-md': open }">
                    <img src="{{ asset('upload/' . $userPhoto) }}" alt="Profle" class="h-8 w-8 rounded-full">

                    <span class="ml-4 text-sm hidden md:inline-block text-white">{{ Auth::user()->name }}</span>
                    <svg style="fill: white;" class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path
                            d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>

                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 rounded border border-gray-400 shadow"
                        x-show="open" @click.away="open = false" style="background-color: #111827;">
                        <ul>
                            <li class="px-4 py-3 text-white"><a href="{{ route('home') }}">Home</a></li>
                            <li class="px-4 py-3 text-white"><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>
                @endif


            </div>
        </div>
    </header>

    <div class="flex flex-row h-screen"> <!-- Adjusted to h-screen -->
        <div class="flex flex-col w-64 overflow-y-auto bg-gray-900 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700" style="height:1800px;" id="sidebar">
            <div class="sidebar text-center bg-gray-900">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">

                        <h1 class="font-bold text-gray-200 text-[15px] ml-3">Your TeamBoost</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>

                <a href="{{ route('admin/home') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
                    </div>
                </a>
                @if(Auth::user()->type == 1)
                <a href="{{ route('admin/players') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">My Details</span>
                    </div>
                </a>
                @elseif(Auth::user()->type == 3)
                <a href="{{ route('admin/teams') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>                       
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Teams</span>
                    </div>
                </a>
                @else
                <a href="{{ route('admin/players') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Players</span>
                    </div>
                </a>

                @endif



                @if(Auth::user()->type == 3)
                @else
                <a href="{{ route('admin/profile') }}">
                    
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Profile</span>
                    </div>
                </a>
                @endif

                
                @if(Auth::user()->type == 1)
                <a href="{{ route('admin/donation') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Donations</span>
                    </div>
                </a>
                @elseif(Auth::user()->type == 3)

                @else
                <a href="{{ route('admin/alldonations') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">All Donations</span>
                    </div>
                </a>
                @endif

                @if(Auth::user()->type == 1)
                <a href="{{ route('admin/donation_link') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Donation Link</span>
                    </div>
                </a>
                @elseif(Auth::user()->type == 3)

                @else
               
                @endif

                <a href="{{ route('logout') }}">
                    <div class="my-4 bg-gray-600 h-[1px]"></div>
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-col w-full h-full px-4 py-8 mt-10">
            <div class="flex-grow">@yield('contents')</div>
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    adjustSidebarHeight();
});

window.addEventListener("resize", function() {
    adjustSidebarHeight();
});

function adjustSidebarHeight() {
    var sidebar = document.getElementById("sidebar");
    var content = document.getElementById("content");
    var windowHeight = window.innerHeight;
    var contentHeight = content.offsetHeight;

    if (contentHeight < windowHeight) {
        sidebar.style.height = windowHeight + "px";
    } else {
        sidebar.style.height = contentHeight + "px";
    }
}

    </script>
</body>

</html>
