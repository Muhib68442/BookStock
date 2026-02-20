<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $data = DB::table('users')->where('id', session('user_id'))->first();
        return view('edit-profile', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
        ]);

        // UPDATE
        DB::table('users')->where('id', session('user_id'))->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update session name and email
        session(['user_name' => $request->name, 'user_email' => $request->email]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        return view('change-password');
    }

    public function changePasswordPost(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = DB::table('users')->where('id', session('user_id'))->first();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        // Prevent same password reuse
        if (Hash::check($request->password, $user->password)) {
            return back()->with('error', 'New password cannot be same as current password.');
        }

        // UPDATE
        DB::table('users')->where('id', session('user_id'))->update([
            'password' => Hash::make($request->password),
        ]);

        // Update session password
        session(['user_password' => Hash::make($request->password)]);

        return back()->with('success', 'Password changed successfully.');
    }
}
