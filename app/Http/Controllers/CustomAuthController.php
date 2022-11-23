<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function home(){
        return view('mains.index');
    }

    // index 
    public function index(){
        return view('mains.index');
    }
    public function dash(){
        if(Auth::check()){
            return view('mains.dashboard');
        }
    }
    // registration page
    public function register(){
        return view("mains.register");
    }

    // custom register implementation
    public function customRegister(Request $req){
        // dd($req);

        $formFields = $req->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:3'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);


        // creates a account based on $data
        $check = User::create($formFields);

        auth()->login($check);
        // redirects to dashboard if success
        return redirect('/dash')->withSuccess("logged in");

    }

    // logout
    public function logout(Request $req){
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/')->withSuccess("logged out");
    }


    // login
    public function login(Request $req){
        return view('mains.login');
    }
    // login authentication
    public function loginAuth(Request $req){
        $formFields = $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        

        if(auth()->attempt($formFields)){
            $req->session()->regenerate();

            if(auth()->user()->user_type == 'admin'){
                $member = User::all();
                return redirect('/admin')->with('data', $member);
            } else{
                return redirect('/dash');
            }
        }
        return back()
            ->withErrors(['username' => 'invalid credentials']) 
                ->onlyInput('username');
    }
}
