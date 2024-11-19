<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardControlller extends Controller
{
    //
    public function index(){
        return '<h1>Dashboard</h1>';
    }
}
