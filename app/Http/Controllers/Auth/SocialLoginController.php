<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialLoginController extends Controller
{

    /**
     * SocialLoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param $provider
     * @return RedirectResponse
     */
    public function redirect($provider)
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param $provider
     * @return Application|\Illuminate\Http\RedirectResponse|Redirector
     */
    public function handleCallback($provider)
    {
        if(request()->has('error') || request()->has('error_code') || request()->has('error_message')){
            toast('Login Failed. Please try again.', 'warning');
            return redirect()->route('index');
        }

        try {
            //create a user using socialite driver google
            $user = Socialite::driver($provider)->stateless()->user();

//            $oldUser = User::where(['email' => $user->email, 'provider' => $provider])->first();
            $oldUser = User::where(['email' => $user->email])->first();

            // if the user exits, use that user and login
            if ($oldUser) {

                Auth::login($oldUser);

            } else {  //create a new user nad login as that user
                $nameArray = explode(' ', $user->name);

                $newUser = User::create([
                    'first_name' => $nameArray[0],
                    'last_name' => end($nameArray),
                    'email' => $user->email,
                    'provider_id' => $user->getId(),
                    'provider' => $provider,
                    'password' => encrypt('')
                ]);

                Auth::login($newUser);

            }

            toast('Login Successful. You can vote now', 'success');

            if (Session::has('url.intended')) {
                return redirect(Session::get('url.intended'));
            }

            return redirect('/');

        } catch (Exception $e) {
            alert()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return redirect()->back();
    }
}
