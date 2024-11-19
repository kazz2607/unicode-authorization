<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsControlller extends Controller
{
    public function index(){
        // Thẻ meta
        $meta['title'] ='Quản lý bài viết';
        // Return View 
        return view('backend.posts.index', compact('meta'));
    }

    public function add(){
        // Thẻ meta
        $meta['title'] ='Thêm bài viết';
        // Return View 
        return view('backend.posts.add', compact('meta'));
    }
}
