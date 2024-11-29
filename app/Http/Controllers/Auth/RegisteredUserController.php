<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if(!empty($request->usertype)){
            $userType = $request->usertype;
        }else{
            $userType = 'user';
        }

        if(!empty($request->designation)){
            $designation = $request->designation;
        }else{
            $designation = Null;
        }


        Auth::login($user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->phone_number,
            'user_type' => $userType,
            'display_name' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'designation' => $request->designation,
        ]));

        event(new Registered($user));

        if(!empty($userType)){
            $user->assignRole($userType);
        }else{
            $user->assignRole('user');
        }

        if($request->register === 'user_register'){
            return redirect(RouteServiceProvider::FRONTEND);
        }else{
            return redirect(route('home'));
        }
    }
}
