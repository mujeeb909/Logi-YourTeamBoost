<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
 
class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
 
    public function index()
    {
        return view('home');
    }
 
    // public function adminHome()
    // {   
    //     $user = Auth::user();  
    //     $user_players = User::where('coach_id', $user->id)->get();
    //     $totalDonorsemails = Transaction::get()->count();
    //     $totalDonationSum = Transaction::get()->sum('amount');
    //     $today = Carbon::today();
    //     $totalDonationSumToday = Transaction::whereDate('created_at', $today)->sum('amount');
    //     // echo '<pre>';
    //     // print_r( $totalDonationSumToday);
    //     // die();

    //     return view('dashboard',  ['$user_players'=>$user_players, 'user'=>$user, 'totalDonorsemails' => $totalDonorsemails, 'totalDonationSum'=>$totalDonationSum, 'totalDonationSumToday'=> $totalDonationSumToday]);
    // }
    public function adminHome()
{
    $user = Auth::user();

    // Fetching only the players associated with the logged-in coach
    $user_players = User::where('coach_id', $user->id)->get();

    // Fetching transactions associated with the logged-in coach's players
    $userPlayerIds = $user_players->pluck('id');
    $totalDonorsemails = Transaction::whereIn('user_id', $userPlayerIds)->count();
    $totalDonationSum = Transaction::whereIn('user_id', $userPlayerIds)->sum('amount');

    // Fetching transactions for today associated with the logged-in coach's players
    $today = Carbon::today();
    $totalDonationSumToday = Transaction::whereIn('user_id', $userPlayerIds)
        ->whereDate('created_at', $today)
        ->sum('amount');

    return view('dashboard', [
        'user_players' => $user_players,
        'user' => $user,
        'totalDonorsemails' => $totalDonorsemails,
        'totalDonationSum' => $totalDonationSum,
        'totalDonationSumToday' => $totalDonationSumToday
    ]);
}

    public function coach_players(){
         $user = Auth::user();
         $coach_id = $user->coach_id;
         $userType =$user->type;
        
        
       
        if($userType == 1){
        $users_players = User::where('id', $coach_id)->first();
           
            return view('products.index2', ['userType' => $userType, 'users_players' => $users_players]);
        }else{
            
            $users_players = User::where('coach_id', $user->id)->get();
            
            return view('products.index2', ['users_players' => $users_players, 'userType' => $userType]);
        }
    
    
    
    }



public function edit_player($id){
        $user = Auth::user();
        $player = User::findOrFail($id);
        
        // Decode the JSON string back into an array
        $playerEmails = implode(', ', json_decode($player->emails, true));
        
        return view("products.edit", ["user" => $user, "player" => $player, "playerEmails" => $playerEmails]);
    }


public function update_player(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'emails.*' => 'nullable|email', // Validate each email address individually
    ]);

    $player = User::findOrFail($id);

    // Retrieve the emails from the form input
    $emails = $request->emails;

    // Remove any empty email entries
    $emails = array_filter($emails);

    // Convert the array of emails into a JSON string
    $serializedEmails = json_encode($emails);

    // Update the player's emails field in the database
    $player->emails = $serializedEmails;
    $player->save();

    return redirect()->back()->with(['status' => 'success', 'message' => 'Player emails updated successfully']);
} 
    public function refDonate($id){
        $data = User::where('uuid', $id)->first();

        $coach = User::where('id', $data->coach_id)->first();

        if ($coach->end_date && $coach->end_date < now()) {
            return view('linkexpired');
        }
       
        return view('refdonate',['data' => $data]);
    }

    public function coachDonation(){
        
        $user = Auth::user();
        $userId = $user->id;
        $coach_id = $user->coach_id;
        $donationDetails = Transaction::where('user_id', $userId)->get();
        $coach = User::where('id', $coach_id)->first();
        
        return view('products.donation_details', ['donation_details' => $donationDetails, 'coach'=>$coach]);
    }

    public function coachAllDonation(){
        $coach = Auth::user();
        $players = User::where('coach_id', $coach->id)->get();
    
        $donationDetails = [];
        foreach ($players as $player) {
            $totalDonatedEmails = Transaction::where('coach_id', $coach->id)
                                              ->where('user_id', $player->id)
                                              ->distinct()
                                              ->count('email');
            $totalDonationSum = Transaction::where('coach_id', $coach->id)
                                           ->where('user_id', $player->id)
                                           ->sum('amount');
    
            $donationDetails[] = [
                'player' => $player,
                'totalDonatedEmails' => $totalDonatedEmails,
                'totalDonationSum' => $totalDonationSum,
            ];
        }
    
        return view('products.donation_details_p', ['coach' => $coach, 'donationDetails' => $donationDetails]);
    }


    public function AdminTeams() {
        // Retrieve coaches where coach_id is 0
        $coaches = User::where('coach_id', 0)
               ->where('type', '!=', 3)
               ->orderBy('created_at', 'desc')
               ->get();
    
    
        $coachData = [];
    
        // Iterate over each coach
        foreach ($coaches as $coach) {
            // Retrieve players for each coach
            $players = User::where('coach_id', $coach->id)->get();
    
            // Initialize variables to store player count and total email count
            $playerCount = $players->count();
            $totalEmailCount = 0;
    
            // Iterate over each player to calculate total email count
            foreach ($players as $player) {
                // Split the comma-separated string of emails into an array
                $emailsArray = explode(',', $player->emails);
            
                // Add the count of emails in the array to the total count
                $totalEmailCount += count($emailsArray);
            }
    
            // Push coach details along with player count and total email count to the array
            $coachData[] = [
                'id' => $coach->id,
                'coachName' => $coach->name,
                'team_name' => $coach->team_name,
                'numberOfPlayers' => $playerCount,
                'totalEmailCount' => $totalEmailCount
            ];
        }
    
        return view('products.admin_teams', compact('coachData'));
    }

    public function PlayerDonationLink(){

        $user = Auth::user();
        return view('player_donation_link', ['user'=> $user]);
    }

    public function AddLink($id){
        $user = User::find($id);
        
        return view('products.add_link', ['id'=> $id, 'user'=>$user]);
    }
    
    public function SaveLink(Request $request){
        $validator = Validator::make($request->all(), [
            'url' => ['required', 'url', 'regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
        ]);
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            
        }
        
        $user = User::find($request->id);
        $url = $request->url;
        $user->social_link = $url;
        $user->save();

        return redirect()->route('admin/teams')->with('success', 'URL Added successfully.');
    }

    public function editUserProfile($id){
        $user = User::find($id);

        
        return view('edit-profile', ['id'=> $id, 'user'=>$user]);
    }

    public function updateUserProfile(Request $request, $id){

        // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'team_name' => 'required|string|max:255',
        'school_name' => 'required|string|max:255',
        'sports' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'shirt' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000', 
        'password' => 'required|string|min:8|confirmed', 
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user profile data
    $user->name = $validatedData['name'];
    $user->team_name = $validatedData['team_name'];
    $user->school_name = $validatedData['school_name'];
    $user->sports = $validatedData['sports'];
    $user->phone = $validatedData['phone'];
    $user->address = $validatedData['address'];
    $user->shirt = $validatedData['shirt'];
    $user->start_date = $validatedData['start_date'];
    $user->end_date = $validatedData['end_date'];

    if ($request->hasFile('photo')) {
        // Get the uploaded file
        $file = $request->file('photo');
        
        // Generate a unique file name
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . rand(1, 100) . '.' . $ext;
        
        // Move the file to the upload directory
        $file->move(public_path('upload'), $fileName);

        // Delete the previous photo if exists
        if ($user->photo) {
            Storage::delete('upload/' . $user->photo);
        }

        // Update the user's photo attribute
        $user->photo = $fileName;
    }


    // Update the password if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($validatedData['password']);
    }

    // Save the updated user profile
    $user->save();

    // Redirect back with success message or any other response
    return redirect('/admin/profile')->with('success', 'Profile updated successfully');
    }

    public function updatePlayerData(Request $request, $id){

        // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'parent_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000', 
        'password' => 'required|string|min:8|confirmed',  
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user profile data
    $user->name = $validatedData['name'];
    $user->parent_name = $validatedData['parent_name'];
    $user->address = $validatedData['address'];

    if ($request->hasFile('photo')) {
        // Get the uploaded file
        $file = $request->file('photo');
        
        // Generate a unique file name
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . rand(1, 100) . '.' . $ext;
        
        // Move the file to the upload directory
        $file->move(public_path('upload'), $fileName);

        // Delete the previous photo if exists
        if ($user->photo) {
            Storage::delete('upload/' . $user->photo);
        }

        // Update the user's photo attribute
        $user->photo = $fileName;
    }


    // Update the password if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($validatedData['password']);
    }

    // Save the updated user profile
    $user->save();

    // Redirect back with success message or any other response
    return redirect('/admin/profile')->with('success', 'Profile updated successfully');
    }

}