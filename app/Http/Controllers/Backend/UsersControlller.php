<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersControlller extends Controller
{
    public function index(){
        // Thẻ meta
        $meta['title'] ='Quản lý thành viên';
        // Return View 
        return view('backend.users.index', compact('meta'));
    }

    public function add(){
        // Thẻ meta
        $meta['title'] ='Thêm thành viên';
        // Return View 
        return view('backend.users.add', compact('meta'));
    }
}
