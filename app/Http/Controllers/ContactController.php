<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendContactInfo(Request $request) {
    
    
        // Extract data from the request
        $to_send = $request->email;
        $subject = $request->subject;
        $html = $request->message;
    
        // Define email parameters
        $params = [
            'key' => 'md-n_VsfkYU5LpalcgGU0v07A',
            'message' => [
                'from_email' => config('mail.from.address'),
                'to' => [['email' => $to_send, 'type' => 'to']],
                'subject' => $subject,
                'html' => $html
            ]
        ];
    
        // Initialize cURL session
        $ch = curl_init();
    
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'https://mandrillapp.com/api/1.0/messages/send.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    
        // Execute cURL request
        $response = curl_exec($ch);
    
        // Handle cURL errors
        if ($response === false) {
            return response()->json(['success' => false, 'message' => 'Failed to connect to Mandrill API: ' . curl_error($ch)], 500);
        }
    
        // Close cURL session
        curl_close($ch);
    
        // Decode JSON response
        $result = json_decode($response, true);
    
        // Handle response
        if ($result[0]['status']=== 'sent') {
            
            return response()->json(['success' => true, 'message' => 'Email sent successfully!']);
        
        } else {
            return response()->json(['success' => false, 'message' => "Error Occured!!"], 500);
        }
    }
    
}
