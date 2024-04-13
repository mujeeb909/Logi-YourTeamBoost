@extends('layouts.app')

@section('title', 'Team List')

@section('contents')
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
            height: 130px;
            border-radius: 10px;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Button */
        .conf_button {
            background-color: #111827;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin: 13px
        }

        .conf_button:hover {
            background-color: #2563EB;
        }
    </style>
    <div>
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Are you sure you want to add audience and campaign?</p>
                <button id="confirmBtn" class="conf_button">Confirm</button>
            </div>
        </div>
        <h1 class="font-bold text-2xl ml-3">Teams List</h1>

        <hr />
        @if (Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left"> # </th>
                    <th scope="col" class="px-6 py-3 text-left">Coach Name</th>
                    <th scope="col" class="px-6 py-3 text-left">Sports/Program </th>
                    <th scope="col" class="px-6 py-3 text-left"> No of Players </th>
                    <th scope="col" class="px-6 py-3 text-left"> No of Referal Emails </th>
                    <th scope="col" class="px-6 py-3 text-left"> Action </th>
                    <th scope="col" class="px-6 py-3 text-left"> Custom URL </th>
                </tr>
            </thead>
            <tbody>
                @if ($coachData)
                    @foreach ($coachData as $coach)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $coach['coachName'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $coach['sportsProgram'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $coach['numberOfPlayers'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $coach['totalEmailCount'] }}</td>
                            <td class="px-6 py-4 whitespace-normal">
                                <a style="background-color: #2563EB" class="flex rounded-md px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 view-emails addAudienceCampaignBtn"
                                    href="#" data-coach-id="{{ $coach['id'] }}" style="width:87%">Add Audience +
                                    Campaigns</a>
                            </td>
                            <td class="px-6 py-4 whitespace-normal">
                              <a style="background-color: #2563EB" class="flex items-center justify-center rounded-md px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="add/link/{{$coach['id']}}" style="width:80%">+</a>
                          </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center py-4" colspan="6">No Teams Data found</td>
                    </tr>
                @endif

            </tbody>
        </table>

    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Add event listener to all addAudienceCampaignBtn buttons
        var addAudienceCampaignBtns = document.querySelectorAll('.addAudienceCampaignBtn');
        addAudienceCampaignBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                var coachId = this.getAttribute('data-coach-id');
                modal.style.display = "block";
                // Set coach ID in the confirm button data attribute
                document.getElementById('confirmBtn').setAttribute('data-coach-id', coachId);
            });
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks on confirm button, make an AJAX call
        document.getElementById('confirmBtn').addEventListener('click', function() {
            var coachId = this.getAttribute('data-coach-id');
            // Make an AJAX call to the audience API with coach ID
            fetch('/add-list-member?coach_id=' + coachId)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Audience API request failed');
                    }
                    return response.json();
                })
                .then(data => {
                    // Once audience API request succeeds, show confirmation for campaign API
                    if (confirm(
                            "Audiences are added in contact successfully. Do you want to proceed with the campaign?"
                            )) {
                        // Make an AJAX call to the campaign API with coach ID
                        fetch('/create-regular-campaign?coach_id=' + coachId)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Campaign creation failed');
                                }
                                return response.json();
                            })
                            .then(data => {
                                alert("Campaign is created successfully");
                                // You can do further processing here
                            })
                            .catch(error => {
                                alert("Campaign creation failed: " + error.message);
                            });
                    }
                })
                .catch(error => {
                    alert("Audience is not added in contact due to unknown issue: " + error.message);
                });
            modal.style.display = "none"; // Hide the modal
        });
    </script>

@endsection
