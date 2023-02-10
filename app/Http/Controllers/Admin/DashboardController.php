<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $NumOfCoffies = Coffee::count();
        $NumOfUsers = User::where('role_as', '0')->count();
        return view('admin.dashboard', compact('NumOfCoffies', 'NumOfUsers'));
    }
}
