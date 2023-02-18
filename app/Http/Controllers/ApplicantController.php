<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;

class ApplicantController extends Controller
{

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required','email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Login Successfully! Welcome Back');
        }
        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');

    }

    public function create(){
        return view('users.create');
    }

    public function login(){
        return view('users.login');
    }

    public function store(Request $request, User $user){

        $validated = $request->validate([
            "name" => ['required'],
            "email" => ['required', 'email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:8'

        ]);
        $validated['password'] = bcrypt($validated['password']);

        $account = User::create($validated);

        auth()->login($account);
        return redirect('/')->with('message', 'Account created Successfully!');
        
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout Successfully!');
    }

}
