<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;

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
            'apiKey' => "dfcb01a64e15512059eda6d245ec4250-us21",
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
            'apiKey' => "dfcb01a64e15512059eda6d245ec4250-us21",
            'server' =>  "us21"
        ]);
        $coachId = $request->input('coach_id');
        $player = User::where('id', $coachId)->first();
        
        // Define the parameters for the regular campaign
        $campaignParams = [
            "type" => "regular",
            "recipients" => [
                "list_id" => "2998a6e27a"
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
    

}