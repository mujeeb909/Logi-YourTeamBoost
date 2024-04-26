<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Player Registration</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        .email-tag {
            background-color: #e0e0e0;
            border-radius: 20px;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 14px;
        }
    </style>
</head>
 
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Player Registration</h1>
                <form action="{{ route('p_register.save') }}" method="POST" id="registerForm" class="space-y-4 md:space-y-6" enctype="multipart/form-data">
                    @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team Name</label>
                            <input type="text" name="team_name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Team Name" value="{{$user->team_name}}" readonly>
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="sports" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sports/Program</label>
                            <input type="text" name="sports" id="sports" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Team Name" value="{{$user->sports}}" readonly>
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="hidden">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">user_id</label>
                            <input type="text" name="user_id" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" value={{$user->id}}>
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Player Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Player Name" required="">
                            @error('name')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guardian/Parent Name</label>
                            <input type="text" name="guardian" id="guardian" value="{{ old('guardian') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Guardian Name" required="">
                            @error('guardian')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Guardian/Parent Address</label>
                            <input type="text" name="address" value="{{ old('address') }}"  id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address" required="">
                            @error('address')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            @error('email')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your password" required>
                            @error('password')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm your password" required>
                            @error('password_confirmation')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Picture</label>
                            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            <span class="text-grey-200 text-sm">Maximum upload file size: 5 MB</span>
                            @error('photo')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        

                    
                       
                        <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                        <div class="email-tags-input">
                            <label for="emails" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Share up to 20 Emails</label>
                            <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                            <input type="text" id="emails" name="emails" value="{{ old('emails') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add emails separated by commas" required="">
                            @error('emails')
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        
                       
                        <button type="submit" id="showModalButton" style="background-color: #FF6F0F" class="flex w-full justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                        
                        </p>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            <a href="{{ route('home') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Go Home</a>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('emails');
            const emailTagsContainer = document.getElementById('emailTagsContainer');

            emailInput.addEventListener('input', function(event) {
                const inputText = event.target.value.trim();
                const emails = inputText.split(',').map(email => email.trim()).filter(email => email !== '');

                // Clear previous email tags
                emailTagsContainer.innerHTML = '';

                // Create email tags dynamically
                emails.slice(0, 20).forEach(email => {
                    const emailTag = document.createElement('div');
                    emailTag.classList.add('email-tag');
                    emailTag.textContent = email;
                    emailTagsContainer.appendChild(emailTag);
                });
            });
        });
    </script>
     <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script>
     <script>
         document.getElementById("registerForm").addEventListener("submit", function(event) {
             event.preventDefault();
             grecaptcha.ready(function() {
                 grecaptcha.execute("{{ env('GOOGLE_RECAPTCHA_KEY') }}", {
                     action: 'submit'
                 }).then(function(token) {
 
                     document.getElementById("registerForm").insertAdjacentHTML("beforeend",
                         '<input type="hidden" name="g-recaptcha-response" value="' + token +
                         '">');
 
                     document.getElementById("registerForm").submit();
                 });
             });
         });
     </script>
 
</body>

</html>