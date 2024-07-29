<?php

namespace App\Http\Controllers\admin;

use App\Models\dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
}
