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

    public function postAdd(Request $request){
        $request->validate([
            'name' => 'required|unique:groups,name',
            'status' => 'required|integer',
        ],
        [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên này đã tồn tại',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ]);

        $group = new Groups();
        $group->name = $request->name;
        $group->user_id = Auth::user()->id;
        $group->status = $request->status;
        $group->save();
        return redirect()->route('admin.groups.index')->with('msg','Thêm nhóm thành viên thành công');
    }

    public function edit(Groups $group){
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa nhóm thành viên';
        // Return View 
        return view('backend.groups.edit', compact('meta','group'));
    }

    public function postEdit(Groups $group, Request $request){
        $request->validate([
            'name' => 'required|unique:groups,name,'.$group->id,
            'status' => 'required|integer',
        ],
        [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên này đã tồn tại',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ]);

        $group->name = $request->name;
        $group->user_id = Auth::user()->id;
        $group->status = $request->status;
        $group->save();
        return back()->with('msg','Chỉnh sửa nhóm thành viên thành công');
    }

    public function delete(Groups $group){
        $userCount = $group->users->count();
        if($userCount == 0){
            Groups::destroy($group->id);
            return redirect()->route('admin.groups.index')->with('msg','Xoá nhóm thành viên thành công');
        }
        return redirect()->route('admin.groups.index')->with('error','Xoá không thành công ! Trong nhóm vẫn còn '.$userCount.' thành viên');
    }
}
