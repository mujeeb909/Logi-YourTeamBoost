@extends('layouts.app')

@section('title', 'Profile Information')

@section('contents')
    <hr />

    @php
        $user = Auth::user();
        $userPhoto = Auth::user()->photo;

    @endphp
   <div class="border-b border-gray-900/10 pb-10">
    @if (Session::has('success'))
        <div class="border-0 text-green-500 bg-green-200 px-4 py-3 rounded-md mb-4" role="alert">
            <p>{{ Session::get('success') }}</p>
        </div>
        {{ Session::forget('success') }} {{-- Remove success message from session --}}
    @endif
</div>
    
<div class="relative">
    <a href="{{route('edit-profile', $user->id)}}" class="absolute top-8 right-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" >Edit Information</a>

    <div class="bg-white overflow-hidden shadow rounded-lg border">
        
        <div class="px-4 py-5 sm:px-6 flex items-center">
            @if(Auth::user()->type == 1)
            <img class="h-12 w-12 rounded-full" src="{{ asset('upload/' . $userPhoto) }}" alt="User Profile Image">
            @else
            <img class="h-12 w-12 rounded-full" src="{{ asset('upload/' . $userPhoto) }}" alt="User Profile Image">
            @endif

            <!-- Added image tag here -->
            <div class="ml-4"> <!-- Added margin to the left of the user info -->
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    User Profile
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{ $user->type == 0 ? 'Coach' : 'Player' }}
                </p>
            </div>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Full name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->name }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        User Type
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->type == 0 ? 'Coach' : 'Player' }} 
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Email address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->email }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        School name
                    </dt>
                    @if($user->type == 1)
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $schoolName }}
                    </dd>
                    @else
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->school_name }}
                    </dd>
                    @endif
                </div>
                @if($user->type == 0)
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Phone Number
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->phone }}
                    </dd>
                </div>
                @endif
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->address }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Team Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->team_name }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>



@endsection
