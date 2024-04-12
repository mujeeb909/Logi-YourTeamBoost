{{-- @extends('layouts.app')

@section('title', 'Players List')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Donations Details</h1>
    
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
 
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3 text-left"> # </th>
              <th scope="col" class="px-6 py-3 text-left">Coach Name </th>
              <th scope="col" class="px-6 py-3 text-left"> Team Name </th>
              <th scope="col" class="px-6 py-3 text-left"> Players Name </th>
              <th scope="col" class="px-6 py-3 text-left"> Total Email Donated </th>
              <th scope="col" class="px-6 py-3 text-left"> Total Donations </th>
          </tr>
      </thead>
      <tbody>
        @if($coach->count() > 0)
        @foreach($players as $player)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ Auth::User()->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ Auth::User()->team_name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $player->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $totalDonatedEmails}}</td>
            <td class="px-6 py-4 whitespace-nowrap">${{ $totalDonationSum }}</td>
        </tr>
        @endforeach
        @else
          <tr>
              <td class="text-center py-4" colspan="8">No players found</td>
          </tr>
        @endif
      </tbody>
  </table>
  
</div>

<div id="emailModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                      <!-- Heroicon name: outline/exclamation -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 96" id="email"><g data-name="Layer 2"><path d="M0 11.283V8a8 8 0 0 1 8-8h112a8 8 0 0 1 8 8v3.283l-64 40zm66.12 48.11a4.004 4.004 0 0 1-4.24 0L0 20.717V88a8 8 0 0 0 8 8h112a8 8 0 0 0 8-8V20.717z"></path></g></svg>
                  </div>
                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                      <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                          Emails List
                      </h3>
                      <div class="mt-2">
                          <p class="text-sm text-gray-500" id="modal-body">
                              <!-- Email content will be inserted here -->
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm close-modal">
                  Close
              </button>
          </div>
      </div>
  </div>
</div>
<script>
  const viewEmailLinks = document.querySelectorAll('.view-emails');
  const modal = document.getElementById('emailModal');
  const modalBody = document.getElementById('modal-body');

  viewEmailLinks.forEach(link => {
      link.addEventListener('click', function(event) {
          event.preventDefault();
          const emails = this.getAttribute('data-emails');
          modalBody.textContent = emails;
          modal.classList.remove('hidden');
      });
  });

  const closeModalButtons = document.querySelectorAll('.close-modal');

  closeModalButtons.forEach(button => {
      button.addEventListener('click', function() {
          modal.classList.add('hidden');
      });
  });
</script>

<style>
    .email-column {
        max-width: 150px; /* Adjust the max-width based on your preference */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .tooltip {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: max-content;
        background-color: #555;
        color: #fff;
        text-align: center;
        padding: 5px;
        border-radius: 6px;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -60px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }
</style>

@endsection --}}
@extends('layouts.app')

@section('title', 'Players List')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Donations Details</h1>
    
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
 
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 text-left"> # </th>
            <th scope="col" class="px-6 py-3 text-left">Coach Name </th>
            <th scope="col" class="px-6 py-3 text-left"> Team Name </th>
            <th scope="col" class="px-6 py-3 text-left"> Players Name </th>
            <th scope="col" class="px-6 py-3 text-left"> Total Email Donated </th>
            <th scope="col" class="px-6 py-3 text-left"> Total Donations </th>
        </tr>
    </thead>
    <tbody>
      @forelse($donationDetails as $detail)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $coach->name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $coach->team_name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $detail['player']->name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $detail['totalDonatedEmails'] }}</td>
          <td class="px-6 py-4 whitespace-nowrap">${{ $detail['totalDonationSum'] }}</td>
      </tr>
      @empty
        <tr>
            <td class="text-center py-4" colspan="8">No Donations found</td>
        </tr>
        @endif
      </tbody>
  </table>
  
</div>
<div id="emailModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 96" id="email"><g data-name="Layer 2"><path d="M0 11.283V8a8 8 0 0 1 8-8h112a8 8 0 0 1 8 8v3.283l-64 40zm66.12 48.11a4.004 4.004 0 0 1-4.24 0L0 20.717V88a8 8 0 0 0 8 8h112a8 8 0 0 0 8-8V20.717z"></path></g></svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Emails List
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="modal-body">
                                <!-- Email content will be inserted here -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm close-modal">
                    Close
                </button>
            </div>
        </div>
    </div>
  </div>
  <script>
    const viewEmailLinks = document.querySelectorAll('.view-emails');
    const modal = document.getElementById('emailModal');
    const modalBody = document.getElementById('modal-body');
  
    viewEmailLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const emails = this.getAttribute('data-emails');
            modalBody.textContent = emails;
            modal.classList.remove('hidden');
        });
    });
  
    const closeModalButtons = document.querySelectorAll('.close-modal');
  
    closeModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
    });
  </script>
  
  <style>
      .email-column {
          max-width: 150px; /* Adjust the max-width based on your preference */
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
      }
  
      .tooltip {
          position: relative;
          display: inline-block;
          cursor: pointer;
      }
  
      .tooltip .tooltiptext {
          visibility: hidden;
          width: max-content;
          background-color: #555;
          color: #fff;
          text-align: center;
          padding: 5px;
          border-radius: 6px;
          position: absolute;
          z-index: 1;
          bottom: 125%;
          left: 50%;
          margin-left: -60px;
          opacity: 0;
          transition: opacity 0.3s;
      }
  
      .tooltip:hover .tooltiptext {
          visibility: visible;
          opacity: 1;
      }
  </style>
  
  @endsection