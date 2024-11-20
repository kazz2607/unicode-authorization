<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groups;

class GroupsControlller extends Controller
{
    public function index(){
        $lists = Groups::all();
        // Thẻ meta
        $meta['title'] ='Quản lý nhóm thành viên';
        // Return View 
        return view('backend.groups.index', compact('meta','lists'));
    }

    public function add(){
        // Thẻ meta
        $meta['title'] ='Thêm nhóm thành viên';
        // Return View 
        return view('backend.groups.add', compact('meta'));
    }

    public function postAdd(){

    }

    public function edit(Groups $group){
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa nhóm thành viên';
        // Return View 
        return view('backend.groups.edit', compact('meta'));
    }

    public function postEdit(Groups $group, Request $request){
        
    }

    public function delete(Groups $group){
        
    }
}
