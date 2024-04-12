@extends('layouts.app')
 
@section('title', 'Add Donor Emails')
 
@section('contents')
<h1 class="mb-2">Add Donor Emails</h1>
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
        <form action="{{ route('admin/player/update', $player->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            @php
            // Check if $playerEmails is already an array
            if (is_array($playerEmails)) {
                $emailsArray = $playerEmails;
            } elseif (is_string($playerEmails)) {
                // Convert $playerEmails to an array if it's a string
                $emailsArray = explode(',', $playerEmails);
            } elseif (is_object($playerEmails)) {
                // Handle the case where $playerEmails is an object of type stdClass
                // You need to access the property that contains the email addresses
                // Replace 'email_property' with the actual property name
                $emailsArray = [$playerEmails->email_property];
            } else {
                // Handle other cases if necessary
                $emailsArray = [];
            }
        
            // Determine the number of inputs based on the count of $emailsArray
            $numInputs = count($emailsArray) < 20 ? 20 : count($emailsArray);
        @endphp
        

        @for ($i = 0; $i < $numInputs; $i++)
        <div class="email-tags-input">
            <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
            <input type="text" style="width: 100%" name="emails[]" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ isset($emailsArray[$i]) ? $emailsArray[$i] : '' }}">
        </div>
    @endfor
        
            <button type="submit" class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </form>
        
        
        {{-- <form action="{{ route('admin/player/update', $player->id) }}" method="POST">
            @csrf
            @method('PUT')
           
            <div class="email-tags-input">
                
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
            <div class="email-tags-input">
                <div id="emailTagsContainer" class="flex flex-wrap items-center mb-2"></div>
                <input type="text" id="emails" style="width: 380px"  name="emails" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Donor Email Here" value="{{ $playerEmails }}">
            </div>
        
 
           
            <button type="submit" class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </form> --}}
    </div>
</div>
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
@endsection