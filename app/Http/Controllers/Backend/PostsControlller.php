<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class PostsControlller extends Controller
{
    public function index(){
        $lists = Posts::orderBy('created_at','desc')
        ->where('user_id', Auth::user()->id)
        ->get();
        // Thẻ meta
        $meta['title'] ='Quản lý bài viết';
        // Return View 
        return view('backend.posts.index', compact('meta','lists'));
    }

    public function add(){
        // Thẻ meta
        $meta['title'] ='Thêm bài viết';
        // Return View 
        return view('backend.posts.add', compact('meta'));
    }


    public function postAdd( Request $request){
        $request->validate([
            'title' => 'required|unique:posts',
            'content' => 'required',
            'status' => 'required|integer',
        ],
        [
            'title.required' => 'Tên bài viết không được để trống',
            'title.unique' => 'Tên bài viết này đã tồn tại',
            'content.required' => 'Nội dung bài viết không được để trống',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ]);

        $post = new Posts();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->status = $request->status;
        $post->save();
        return redirect()->route('admin.posts.index')->with('msg','Thêm bài viết thành công');
    }

    public function edit(Posts $post){
        $this->authorize('update', $post);
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa bài viết';
        // Return View 
        return view('backend.posts.edit', compact('meta','post'));
    }

    public function postEdit(Posts $post, Request $request){
        $this->authorize('update', $post);
        $request->validate([
            'title' => 'required|unique:posts,title,'.$post->id,
            'content' => 'required',
            'status' => 'required|integer',
        ],
        [
            'title.required' => 'Tên bài viết không được để trống',
            'title.unique' => 'Tên bài viết này đã tồn tại',
            'content.required' => 'Nội dung bài viết không được để trống',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;
        $post->save();
        return back()->with('msg','Chỉnh sửa bài viết thành công');
    }

    public function delete(Posts $post){
        $this->authorize('delete', $post);
        Posts::destroy($post->id);
        return redirect()->route('admin.posts.index')->with('msg','Xoá bài viết thành công');
    }
}
