<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AccountFormRequest;

class AccountController extends Controller
{
    public function edit()
    {
        return view('admin.account.index');
    }

    public function update(AccountFormRequest $request)
    {
        //Store the validated data
        $data = $request->validated();

        $user = User::find(Auth::user()->id);

        //Update
        $user->name = $data['username'];
        $user->email = $data['email'];

        if ($data['new-password'] != null)  $user->password = Hash::make($data['new-password']);

        $user->update();

        return redirect('admin/edit-account')->with('success', 'Your information has been updated');
    }
}
