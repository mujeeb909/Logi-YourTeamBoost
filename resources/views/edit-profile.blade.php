@extends('layouts.app')

@section('title', 'Edit Profile Information')

@section('contents')
    <hr />

    @php
        $user = Auth::user();
        $userPhoto = Auth::user()->photo;
    @endphp

    {{-- <div class="relative">
        <form action="{{ route('update-profile-data', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

           
        </form>
    </div> --}}
    
    <div class="bg-white border border-4 rounded-lg shadow relative m-10">

        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">
                Update User Information
            </h3>

        </div>

        @if ($user->type == 0)
            <div class="p-6 space-y-6">
                <form action="{{ route('update-profile-data', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Coach Name</label>
                            <input type="text" name="name" id="name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->name }}">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="team_name" class="text-sm font-medium text-gray-900 block mb-2">Team Name</label>
                            <input type="text" name="team_name" id="team_name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->team_name }}">
                                @error('team_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="school_name" class="text-sm font-medium text-gray-900 block mb-2">School
                                Name</label>
                            <input type="text" name="school_name" id="school_name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->school_name }}">
                                @error('school_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="sports"
                                class="text-sm font-medium text-gray-900 block mb-2">Sports/Program</label>
                            <input type="text" name="sports" id="sports"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->sports }}">
                                @error('sports')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                            <input type="text" name="phone" id="phone"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->phone }}">
                                @error('phone')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="address" class="text-sm font-medium text-gray-900 block mb-2">Organization
                                address</label>
                            <input type="text" name="address" id="address"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->address }}">
                                @error('address')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="shirt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach
                                Shirt Size</label>
                            <select name="shirt" id="shirt"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled>Select Shirt Size</option>
                                <option value="S" {{ $user->shirt == 'S' ? 'selected' : '' }}>Small</option>
                                <option value="M" {{ $user->shirt == 'M' ? 'selected' : '' }}>Medium</option>
                                <option value="L" {{ $user->shirt == 'L' ? 'selected' : '' }}>Large</option>
                                <option value="XL" {{ $user->shirt == 'XL' ? 'selected' : '' }}>Extra Large</option>
                            </select>

                        </div>
                        <div class="col-span-6 sm:col-span-3 ">
                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach
                                Profile Picture</label>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <span class="text-gray-600 text-sm">Maximum upload file size: 5 MB</span>
                            <br>
                            @error('photo')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="start_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaign Start
                                Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ $user->start_date }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('start_date')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="end_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaign End
                                Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ $user->end_date }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('end_date')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                            <input type="password" name="password" id="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="*****">
                                @error('password')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="password_confirmation"
                                class="text-sm font-medium text-gray-900 block mb-2">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="*****">
                                @error('password')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>
                    <div class="p-6 border-t border-gray-200 rounded-b">
                        <button
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">Save</button>
                    </div>
                </form>
            </div>
        @else
            <div class="p-6 space-y-6">
                <form action="{{ route('update-player-data', $user->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Player Name</label>
                            <input type="text" name="name" id="name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->name }}">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="parent_name" class="text-sm font-medium text-gray-900 block mb-2">Guardian/Parent
                                Name</label>
                            <input type="text" name="parent_name" id="parent_name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->parent_name }}">
                                @error('parent_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="address" class="text-sm font-medium text-gray-900 block mb-2">Guardian/Parent
                                Address</label>
                            <input type="text" name="address" id="address"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="" value="{{ $user->address }}">
                                @error('address')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-span-6 sm:col-span-3 ">
                            <label for="photo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Player
                                Profile Picture</label>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <span class="text-gray-600 text-sm">Maximum upload file size: 5 MB</span>
                            <br>
                            @error('photo')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>




                        <div class="col-span-6 sm:col-span-3">
                            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                            <input type="password" name="password" id="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="*****">
                                @error('password')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="password_confirmation"
                                class="text-sm font-medium text-gray-900 block mb-2">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="*****">
                                @error('password_confirmation')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>
                    <div class="p-6 border-t border-gray-200 rounded-b">
                        <button
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">Save</button>
                    </div>
                </form>
            </div>
        @endif



    </div>


@endsection
