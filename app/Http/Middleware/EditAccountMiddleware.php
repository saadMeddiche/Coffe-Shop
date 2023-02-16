<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditAccountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {

        //Check if the user has changed his username
        if ($request['username'] != Auth::user()->username) {

            // Check if the username already exxist
            $exists = DB::table('users')->where('name', $request['username'])->exists();

            if ($exists) {
                
                return redirect('admin/edit-account')->with('message', 'This Username Already exists');
            }
        }

        //Check if the user has changed his email
        if ($request['email'] != Auth::user()->email) {

            // Check if the email already exist
            $exists = DB::table('users')->where('email', $request['email'])->exists();

            if ($exists) {

                return redirect('admin/edit-account')->with('message', 'This Email Already exists');
            }
        }

        //Check if there is empty inputs
        if ($this->emptyInputs($request['username'], $request['email'], $request['current-password']) == false)
            return redirect('admin/edit-account')->with('message', 'Username field or email field or current password field is empty');

        //Check the current field  if it is match the password
        if ($this->CheckCurrentPassword($request['current-password']) == false)
            return redirect('admin/edit-account')->with('message', 'Invalid Password');

        //Check if the new password and repeated password exist
        if (!empty($request['new-password']) && !empty($request['repeat-password'])) {
            //Check if the new password = repeated password
            if ($this->checkNewPassword($request['new-password'], $request['repeat-password']) == false)
                return redirect('admin/edit-account')->with('message', 'Please repeat the same password');
        } else {
            //Check if the new password isn't null
            if ($request['new-password'] != $request['repeat-password'] && $request['new-password'] != null)
                return redirect('admin/edit-account')->with('message', 'Check if the new password is same as the repeated one');
        }

        return $next($request);
    }

    public function emptyInputs($username, $email, $currenpassword)
    {

        if (empty($username) || empty($email) || empty($currenpassword)) {
            return false;
        } else {
            return true;
        }
    }

    public function CheckCurrentPassword($currentPassword)
    {
        //  How to compare a string password with laravel Encrypted Password
        // https://stackoverflow.com/questions/44696084/how-to-compare-a-string-password-with-laravel-encrypted-password#:~:text=2%20ways%3A,The%20passwords%20match...%20%7D
        if (!Hash::check($currentPassword, Auth::user()->password)) {
            return false;
        } else {
            return true;
        }
    }

    public function checkNewPassword($newPassword, $currentPassword)
    {
        if ($newPassword != $currentPassword) {
            return false;
        } else {
            return true;
        }
    }
}
