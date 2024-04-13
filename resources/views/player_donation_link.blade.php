@extends('layouts.app')

@section('title', 'Your TeamBoost Donation Link')

@section('contents')
    <div>
        {{-- @if (Auth::user()->type == 3)
            <h1 class="font-bold text-2xl ml-3">Dashboard for Admin</h1>
        @else
            <h1 class="font-bold text-2xl ml-3">Dashboard</h1>
        @endif --}}
        <h1 class="font-bold text-2xl ml-3">Player Donation Link</h1>
        <!-- component -->
        @if ($user->type == 1)
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


            <div class="flex flex-col min-h-screen ">



                <div class="container m-4">


                    <div class="max-w-3xl w-full mx-auto grid gap-4 grid-cols-1">
                        <div class="grid grid-cols-12 gap-4 ">


                            <div class="col-span-12 sm:col-span-4">
                                <div class="p-4 relative  bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-14 w-14  absolute bottom-4 right-3 text-yellow-300" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex justify-between items-center ">
                                        <i class="fab fa-codepen text-xl text-gray-400"></i>
                                    </div>
                                    <div class="text-2xl text-gray-100 font-medium leading-8 mt-5"> <button type="button"
                                            onclick="copyToClipboard('{{ Auth::user()->donate_link }}')">Copy</button></div>
                                    <div class="text-sm text-gray-500">Player Donation Link</div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <script>
                function copyToClipboard(linkValue) {
                    var dummy = document.createElement("input");
                    document.body.appendChild(dummy);
                    dummy.setAttribute("value", linkValue); // Set the value of the input field to the link value
                    dummy.select();
                    document.execCommand("copy");
                    document.body.removeChild(dummy);
                    alert("Link copied to clipboard: " + linkValue); // Notify the user that the link is copied
                    console.log(linkValue);
                }
            </script>
        @endif
    @endsection
