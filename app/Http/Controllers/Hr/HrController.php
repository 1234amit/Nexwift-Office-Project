<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HrController extends Controller
{
    //
    public function index()
    {
        return view('hr.home.dashboard');
    }
}
