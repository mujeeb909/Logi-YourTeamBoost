<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

 

class AuthController extends Controller
{
 
    
 
    public function register()
    {
        return view('auth/register');
    }

    public function c_register()
    {
        return view('auth/coach_register');
    }

    public function p_register($id)
    {   
        $user = User::where('uuid', $id)->first();
        return view('auth/player_register', ['user'=>$user]);
    }
 
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 0
        ]);
 
        return redirect()->route('login');
    }
    public function c_registerSave(Request $request)
    {   
        
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'team_name' => 'required',
            'school_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'no_of_participate' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'shirt' => 'required',
            'sports' => 'required',
            'password' => 'required|confirmed',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5000',

        ])->validate();
        

        if ($request->hasFile('photo')) {
           
            $file = $request->file('photo');
            $ext = $request->photo->getClientOriginalExtension();
            $fileName = time() . rand(1, 100) . '.' . $ext;
            $file->move(public_path('upload'), $fileName);

            $number = rand(000000,999999); 
            $baseUrl = $request->root();
        
        $baseUrl = $request->root();
        $user = User::create([
            'name' => $request->name,
            'team_name' => $request->team_name,
            'school_name' => $request->school_name,
            'sports' => $request->sports,
            'phone' => $request->phone,
            'address' => $request->address,
            'no_of_participate' => $request->no_of_participate,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'shirt' => $request->shirt,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "0",
            'uuid'=> $number,
            'photo'=>  $fileName,
        ]);
        $link = url($baseUrl . '/players/registration/' . $user->uuid);
        $user->link = $link;
        $user->save();
        
        $qrCodes= QrCode::size(150)->generate($link);
 
        return view('auth/registration_confirmation',  [
            'user' => $user,
            'qrcode' => $qrCodes,
            'link' => $link
        ]);
    }}

    public function p_registersave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'sports' => 'required',
            'guardian' => 'required',
            'email' => 'required|email|unique:users,email',
            'emails' => 'required',
            'password' => 'required|confirmed',
            
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ])->validate();
        $serializedEmails = json_encode(explode(',', $request->emails));
        $photoUrl=null;
        if ($request->hasFile('photo')) {
           
            $file = $request->file('photo');
            $ext = $request->photo->getClientOriginalExtension();
            $fileName = time() . rand(1, 100) . '.' . $ext;
            $file->move(public_path('upload'), $fileName);
            

        $number = rand(000000,999999);   
        $user = User::create([
            'coach_id' => $request->user_id,
            'team_name' => $request->team_name,
            'sports' => $request->sports,
            'name' => $request->name,
            'address' => $request->address,
            'parent_name' => $request->guardian,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo'=>  $fileName,
            'emails' => $serializedEmails,
            'type' => 1,
            'uuid'=> $number
        ]);
        
        $baseUrl = $request->root();
        $link = url($baseUrl . '/donate/' . $user->uuid);
        $user->donate_link = $link;
        $user->save();
        
 
        return view('auth.player_registered',['link' => $link]);
    }}

    

    public function login(Request $request)
    {   
        
        return view('auth/login');
    }
 
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
 
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
 
        $request->session()->regenerate();
 
        if (auth()->user()->type == 1) {
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('admin/home');
        }
         
       //return redirect()->route('dashboard');
    }
 
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
 
        return redirect('/login');
    }
 
    public function profile()
    {
        return view('userprofile');
    }
}
