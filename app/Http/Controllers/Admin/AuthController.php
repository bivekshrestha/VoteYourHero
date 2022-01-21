<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    use ThrottlesLogins;

    /**
     * Username used in ThrottlesLogins trait
     *
     * @return string
     */
    public function username(){
        return 'email';
    }

    /**
     * @return Application|Factory|View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(AdminRequest $request)
    {
        $credentials = $request->only('email', 'password');

//        if ($this->hasTooManyLoginAttempts($request)) {
//
//            $this->fireLockoutEvent($request);
//
//            return $this->sendLockoutResponse($request);
//        }

        if (Auth::guard('admin')->attempt($credentials)) {
            toast('Login Successful', 'success');
            return redirect()
                ->intended(route('admin.index'));
        }

        $this->incrementLoginAttempts($request);

        toast('Login Failed', 'warning');
        return $this->loginFailed();
    }

    /**
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        toast('You have logged out.', 'info');
        return redirect()
            ->route('admin.login');
    }

    /**
     * @return RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('login_error', 'Invalid Credentials');
    }
}
