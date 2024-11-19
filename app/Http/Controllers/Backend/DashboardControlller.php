<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardControlller extends Controller
{
    //
    public function index(){
        // Thẻ meta
        $meta['title'] ='Trang quản trị';
        // Return View 
        return view('backend.dashboard.index', compact('meta'));
    }
}
