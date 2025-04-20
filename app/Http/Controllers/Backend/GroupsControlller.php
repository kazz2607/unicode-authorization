<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Modules;

class GroupsControlller extends Controller
{
    public function index(){
        if (Auth::user()->user_id == 0){
            $lists = Groups::all();
        }else{
            $lists = Groups::where('user_id', Auth::user()->id)->get();
        }
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
        $this->authorize('update', $group);
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa nhóm thành viên';
        // Return View
        return view('backend.groups.edit', compact('meta','group'));
    }

    public function postEdit(Groups $group, Request $request){
        $this->authorize('update', $group);
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
        $this->authorize('delete', $group);
        $userCount = $group->users->count();
        if($userCount == 0){
            Groups::destroy($group->id);
            return redirect()->route('admin.groups.index')->with('msg','Xoá nhóm thành viên thành công');
        }
        return redirect()->route('admin.groups.index')->with('error','Xoá không thành công ! Trong nhóm vẫn còn '.$userCount.' thành viên');
    }

    public function permission(Groups $group){
        $this->authorize('permission', $group);
        $modules = Modules::all();
        $roleListArray = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xoá',
            // 'permission' => 'Phân quyền'
        ];

        $roleJson = $group->permissions;
        if(!empty($roleJson)){
            $roleArr = json_decode($roleJson,true);
        }else{
            $roleArr = [];
        }

        // Thẻ meta
        $meta['title'] ='Phân quyền nhóm - '.$group->name;
        // Return View
        return view('backend.groups.permission', compact('meta','group','modules','roleListArray','roleArr'));
    }

    public function postPermission(Groups $group, Request $request){
        $this->authorize('permission', $group);
        if(!empty($request->role)){
            $roleArr = $request->role;
        }else{
            $roleArr = [];
        }
        $roleJson = json_encode($roleArr);
        $group->permissions = $roleJson;
        $group->save();
        return back()->with('msg','Phân quyền nhóm '.$group->name.' thành công');
    }
}
 