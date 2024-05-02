<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;

use Illuminate\Support\Facades\Mail;

class MailChimpController extends Controller
{
public function pingMailchimp()
{
    // Include the autoload file
    require_once base_path('vendor/autoload.php');

    // Create a new instance of the Mailchimp API client
    $mailchimp = new \MailchimpMarketing\ApiClient();

    // Set the Mailchimp API key and server prefix
    $mailchimp->setConfig([
        'apiKey' => "dfcb01a64e15512059eda6d245ec4250-us21",
        'server' =>  "us21"
    ]);

    // Ping Mailchimp to check if the connection is successful
    $response = $mailchimp->ping->get();

    // Return the response
    return response()->json($response);
}


// public function addListMember(Request $request)
// {   
//     try {
//         // Include the autoload file if it's not already autoloaded
//         if (!class_exists(\MailchimpMarketing\ApiClient::class)) {
//             require_once base_path('vendor/autoload.php');
//         }

//         // Create a new instance of the Mailchimp API client
//         $mailchimp = new \MailchimpMarketing\ApiClient();

//         // Set the Mailchimp API key and server prefix
//         $mailchimp->setConfig([
//             'apiKey' => "30201eb64a607c8fa25e97182a64e5d8-us21",
//             'server' =>  "us21"
//         ]);

//         // Replace 'YOUR_LIST_ID' with your actual list ID
//         $list_id = "2998a6e27a";

//         // Retrieve the coach ID from the request
//         $coachId = $request->input('coach_id');
       
       
//         // Retrieve users (players) with the specified coach ID
//         $players = User::where('coach_id', $coachId)->get();
//         $baseUrl = $request->root();
       
//         // Initialize an empty array to store emails
//         $emails = [];
//         $response = null;

//         // Loop through players to collect their emails
//         foreach ($players as $player) {
//             // Split the emails using the delimiter (e.g., comma)
//             $playerEmails = explode(',', $player->emails);
            
        
//             // Get the team name for this player
//             $teamName = $player->team_name;
//             $link = url($baseUrl . '/donate/' . $player->uuid);
            
            
//             // Add each email to the Mailchimp audience with tags
//             foreach ($playerEmails as $email) {
//                 // Add a member to the list with specific tags
//                 $email = trim(str_replace(['[', ']', '"'], '', $email));

               

//                 $htmlContent = '<p>Dear subscriber,</p>';
//                 $htmlContent .= '<p>We invite you to visit our website by clicking the following link: <a href="' . $link . '">Visit our website</a></p>';
//                 $htmlContent .= '<p>Thank you!</p>';

        
            
//                 $response = $mailchimp->lists->addListMember($list_id, [
//                     "email_address" => trim($email),
//                     "status" => "subscribed",
//                     "tags" => [$teamName], // Use team name as tags
//                     "merge_fields" => [
//                         "FNAME" => $player->name,
//                         "URL_LINK" =>$link,

//                     ],
//                     "html" => $htmlContent // Include HTML content with URL address
//                 ]);
//             }


//         }

//         // Return the response
//         return response()->json($response);
//     } catch (\GuzzleHttp\Exception\ClientException $e) {
//         // Handle GuzzleHttp\ClientException
//         $response = $e->getResponse();
//         $statusCode = $response->getStatusCode();
//         $errorBody = json_decode($response->getBody()->getContents(), true);
//         return response()->json(['error' => $errorBody], $statusCode);
//     } catch (ApiException $e) {
//         // Handle MailchimpMarketing\ApiException
//         return response()->json(['error' => $e->getMessage()], 500);
//     } catch (\Exception $e) {
//         // Handle other exceptions
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }

public function addListMember(Request $request)
{   
    try {
        // Include the autoload file if it's not already autoloaded
        if (!class_exists(\MailchimpMarketing\ApiClient::class)) {
            require_once base_path('vendor/autoload.php');
        }

        // Create a new instance of the Mailchimp API client
        $mailchimp = new \MailchimpMarketing\ApiClient();

        // Set the Mailchimp API key and server prefix
        $mailchimp->setConfig([
            'apiKey' => "30201eb64a607c8fa25e97182a64e5d8-us21",
            'server' =>  "us21"
        ]);

        // Replace 'YOUR_LIST_ID' with your actual list ID
        $list_id = "2998a6e27a";

        // Retrieve the coach ID from the request
        $coachId = $request->input('coach_id');
       
       
        // Retrieve users (players) with the specified coach ID
        $players = User::where('coach_id', $coachId)->get();
        $baseUrl = $request->root();
       
        // Initialize an empty array to store emails
        $emails = [];
        
        // Loop through players to collect their emails
        foreach ($players as $player) {
            // Split the emails using the delimiter (e.g., comma)
            $playerEmails = explode(',', $player->emails);
             
        
            // Get the team name for this player
            $teamName = $player->team_name;
            $link = url($baseUrl . '/donate/' . $player->uuid);
           
            
            
            // Add each email to the Mailchimp audience with tags
            foreach ($playerEmails as $email) {
                // Add a member to the list with specific tags
                $email = trim(str_replace(['[', ']', '"'], '', $email));
            
                $htmlContent = '<p>Dear subscriber,</p>';
                $htmlContent .= '<p>We invite you to visit our website by clicking the following link: <a href="' . $link . '">Visit our website</a></p>';
                $htmlContent .= '<p>Thank you!</p>';
               
            
                $response = $mailchimp->lists->addListMember($list_id, [
                    "email_address" => trim($email),
                    "status" => "subscribed",
                    "tags" => [$teamName], // Use team name as tags
                    "merge_fields" => [
                        "FNAME" => $player->name,
                        "URL_LINK" => $link,

                    ],
                    "html" => $htmlContent // Include HTML content with URL address
                ]);
            }


        }

        // Return the response
        return response()->json($response);
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        // Handle GuzzleHttp\ClientException
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        $errorBody = json_decode($response->getBody()->getContents(), true);
        return response()->json(['error' => $errorBody], $statusCode);
    } catch (ApiException $e) {
        // Handle MailchimpMarketing\ApiException
        return response()->json(['error' => $e->getMessage()], 500);
    } catch (\Exception $e) {
        // Handle other exceptions
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function createRegularCampaign(Request $request)
{
    // Include the autoload file
    require_once base_path('vendor/autoload.php');

    // Create a new instance of the Mailchimp API client
    $client = new ApiClient();

    // Set the Mailchimp API key and server prefix
    $client->setConfig([
        'apiKey' => "30201eb64a607c8fa25e97182a64e5d8-us21",
        'server' =>  "us21"
    ]);
    $coachId = $request->input('coach_id');
    $player = User::where('id', $coachId)->first();
    
    // Define the parameters for the regular campaign
    $campaignParams = [
        "type" => "regular",
        "recipients" => [
            "list_id" =>"2998a6e27a"
        ],
        "settings" => [
            "subject_line" => $player->team_name,
            "from_name" => $player->name,
            "reply_to" => "info.ytb@gmail.com",
            
        ],
        
    ];

    

    // Make a request to create the regular campaign
    try {
        $response = $client->campaigns->create($campaignParams);
        return response()->json($response);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}




public function sendEmail($user, $link) {
    $apiKey = 'md-n_VsfkYU5LpalcgGU0v07A';
    $endpoint = 'https://mandrillapp.com/api/1.0/messages/send.json';
    $to_send = $user->email;

    $html = "<p>Thank you for signing up for our service! Before you can begin enjoying all the benefits of your new account, we need to verify your email address.
    To complete the verification process, please click on the following link:</p>
    <p><a href='{$link}'>Verify Link</a></p>
    <p>Once you've clicked the link, your email address will be verified, and you'll be all set to start using our platform. If you have any questions or encounter any issues, please don't hesitate to reach out to our support team at <a href='mailto:yourteamboost@gmail.com'>yourteamboost@gmail.com</a>.</p>
    <p>Thank you for choosing YourTeamBoost!</p>";
    
    // Define email parameters
    $params = [
        'key' => $apiKey,
        'message' => [
            'from_email' => config('mail.from.address'),
            'to' => [
                ['email' => $to_send, 'type' => 'to']
            ],
            'subject' => 'Verify Your Email Address for Account Activation',
            'html' => $html
        ]
    ];

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

    // Execute cURL request
    $response = curl_exec($ch);

    // Handle cURL errors
    if ($response === false) {
        return "Failed to connect to Mandrill API: " . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $result = json_decode($response, true);

    // Handle response
    if (isset($result['status']) && $result['status'] === 'sent') {
        return "Email sent successfully!";
    } elseif (isset($result['message'])) {
        return "Failed to send email: " . $result['message'];
    } else {
        return "Unexpected response from Mandrill API: " . print_r($result, true);
    }
}

    

}