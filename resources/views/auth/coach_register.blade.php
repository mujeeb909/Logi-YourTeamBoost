<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>
 
<body>
    <section class="bg-gray-50 dark:bg-gray-900 my-5">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Coach Registeration
            </div>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Coach Registeration
                    </h1>
                    <form action="{{ route('c_register.save') }}" method="POST" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coach name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Coach name" required="">
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="team_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team name</label>
                            <input type="text" name="team_name" id="team_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Team name" required>
                            @error('team_name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="school_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School name</label>
                            <input type="text" name="school_name" id="school_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="School name" required>
                            @error('school_name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="sports" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sports/Program</label>
                            <input type="text" name="sports" id="sports" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sports" required="">
                            @error('sport')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            @error('password_confirmation')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" style="background-color: #FF6F0F" class="flex w-full justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                             <a href="{{ route('home') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Go Home</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
 
</html>
 
 
