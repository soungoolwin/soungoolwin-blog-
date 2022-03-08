<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Symfony\Component\HttpKernel\HttpCache\Store;

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
        $user = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255',Rule::unique('users', 'username')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);




        //for avatar
        if ($request->hasFile('avatar')) {
            $path=request()->file('avatar')->store('avatar');
            $user['avatar']=$path;
        }

        $randomcode = rand(1000, 9999);

        
        Mail::to($user['email'])->send(new VerifyMail($randomcode));
        return view('components.verify-wait', [
            'code'=>$randomcode,
            'users'=>$user
        ]);
    }
    public function changeVerify()
    {
        if (request('code') === request('originalcode')) {
            $user = User::create([
                'name' => request('name'),
                'username'=>request('username'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
            ]);
    
            event(new Registered($user));
            Auth::login($user);
        
            return redirect(RouteServiceProvider::HOME)->with('message', 'Welcome '.$user['name']);
        } else {
            return redirect(RouteServiceProvider::HOME)->with('errmessage', 'Sorry! Verification Failed.. Try Again');
        }
    }
}
