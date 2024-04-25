<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class AdminController extends Controller
{
    public function profilepage()
    {   
        $user = Auth::user();

        if($user->type == 1){
            $coach = User::where('id', $user->coach_id)->first();
            $schoolName = $coach->school_name;
            return view('profile', ['user' => $user, 'schoolName'=>$schoolName ]);
        }
        return view('profile', ['user' => $user]);

        
    }
}