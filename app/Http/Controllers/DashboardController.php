<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //admin dashboard
    public function index(){
        return view('admin.home.dashboard');
    }//end method
}
