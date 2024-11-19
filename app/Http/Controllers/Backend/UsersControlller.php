<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersControlller extends Controller
{
    public function index(){
        $lists = User::all();
        // Thẻ meta
        $meta['title'] ='Quản lý thành viên';
        // Return View 
        return view('backend.users.index', compact('meta','lists'));
    }

    public function add(){
        // Thẻ meta
        $meta['title'] ='Thêm thành viên';
        // Return View 
        return view('backend.users.add', compact('meta'));
    }

    public function edit(User $user){
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa thành viên';
        // Return View 
        return view('backend.users.edit', compact('meta'));
    }

    public function postEdit(User $user){
        
    }

    public function delete(User $user){
        
    }
}
