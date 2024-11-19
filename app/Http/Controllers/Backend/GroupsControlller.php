<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupsControlller extends Controller
{
    public function index(){
        // Thẻ meta
        $meta['title'] ='Quản lý nhóm thành viên';
        // Return View 
        return view('backend.groups.index', compact('meta'));
    }

    public function add(){
        // Thẻ meta
        $meta['title'] ='Thêm nhóm thành viên';
        // Return View 
        return view('backend.groups.add', compact('meta'));
    }
}
