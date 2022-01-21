<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showProfile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {

    }

    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = Admin::findOrFail(Auth::guard('admin')->id());

        if (!Hash::check($request->old_password, $user->password)) {
            Session::flash('password_error', 'Your old password doesn\'t match');
            return redirect()->route('admin.password')->withInput($request->all());
        }

        $user->password = bcrypt($request->password);
        $user->save();

        toast('success', 'Your password has changed successfully');
        return redirect()->route('admin.index');
    }
}
