@extends('layouts.app')

@section('title', 'Add Link')

@section('contents')
    <h1 class="mb-2">Add Link </h1>
    <hr />

    <div class="border-b border-gray-900/10 pb-10">
        @if (Session::has('status'))
            <div class="border-0 text-red-500 bg-black-400 px-4 py-3 rounded-md mb-4" role="alert">
                <p>{{ Session::get('message') }}</p>
                {{ Session::forget('status') }}
                {{ Session::forget('message') }}
            </div>
        @endif

        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <form action="{{ route('save/link', $id )}}" method="POST">
                @csrf
                <div class="email-tags-input">
                    <input type="text" style="width: 230%" name="url"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Link" value="{{$user->social_link}}">
                        @error('url')
                            <span style="color:red">{{$message}}</span>
                        @enderror
                </div>


                <button type="submit"
                    class="flex w-full justify-center mt-6 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
            </form>


        </div>
    </div>
    
@endsection
