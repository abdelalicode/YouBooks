<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.signup');
    }

    public function signform()
    {
        return view('layouts.signin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'firstname' => 'required|string|between:3,50',
            'lastname' => 'required|string|between:3,55',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $validated['password'] = Hash::make($validated['password']);
        
        User::create($validated);
        return redirect()->route('form.signin')->with('success', 'Signed Up Successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');;


        $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if ($user) {
        if (Hash::check($credentials['password'], $user->password)) {
           Auth::login($user);
        //    $request->session()->put('user_id', $user->id);
        // $request->session()->put('user_email', $user->email);
        // $request->session()->put('user_name', $user->firstname);
        // $request->session()->put('user_lname', $user->lastname);
        // $request->session()->put('role_id', $user->role_id);

        $request->session()->regenerate();
           return redirect()->route('book.index');
        }
        else
        {
            return back()->withErrors(['password' => 'Wrong Password'])->onlyInput('email');
        }
    } else {
        return back()->withErrors(['email' => 'No user found!']);
    }

    }

    public function logout()
    {
        session()->flush();;
        Auth::logout();

        return redirect()->route('homepage');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
