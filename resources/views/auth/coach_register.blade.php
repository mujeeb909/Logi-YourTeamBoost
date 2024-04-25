<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
   
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900 my-5">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Coach Registeration
            </div>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Coach Registeration
                    </h1>
                    <form action="{{ route('c_register.save') }}" method="POST" class="space-y-4 md:space-y-6" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Coach name" required="">
                            @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="team_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team name</label>
                            <input type="text" name="team_name" id="team_name" value="{{ old('team_name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Team name" required>
                            @error('team_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="school_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School name</label>
                            <input type="text" name="school_name" id="school_name" value="{{ old('school_name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="School name" required>
                            @error('school_name')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="sports"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sports/Program</label>
                            <input type="text" name="sports" id="sports" value="{{ old('sports') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Sports" required="">
                            @error('sport')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Phone Number" required="">
                            @error('phone')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organization address</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Address" required="">
                            @error('address')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="no_of_participate"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of participants in organization</label>
                            <input type="text" name="no_of_participate" id="no_of_participate" value="{{ old('no_of_participate') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="No. of Participants" required="">
                            @error('no_of_participate')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="shirt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach Shirt Size</label>
                            <select name="shirt" id="shirt"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                                <option value="" disabled selected>Select Shirt Size</option>
                                <option value="S" {{ old('shirt') == 'S' ? 'selected' : '' }}>Small</option>
                                <option value="M" {{ old('shirt') == 'M' ? 'selected' : '' }}>Medium</option>
                                <option value="L" {{ old('shirt') == 'L' ? 'selected' : '' }}>Large</option>
                                <option value="XL" {{ old('shirt') == 'XL' ? 'selected' : '' }}>Extra Large</option>
                            </select>
                            @error('shirt')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaign Start Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('start_date')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaign End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('end_date')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach Profile Picture</label>
                            <input type="file" name="photo" id="photo" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            <span class="text-grey-200 text-sm">Maximum upload file size: 5 MB</span>
                            <br>
                            @error('photo')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                            @error('email')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('password')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="confirm-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                            @error('password_confirmation')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" style="background-color: #FF6F0F"
                            class="flex w-full justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                            an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                here</a>
                        </p>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            <a href="{{ route('home') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Go Home</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
