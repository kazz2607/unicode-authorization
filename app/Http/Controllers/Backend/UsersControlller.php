<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Groups;

class UsersControlller extends Controller
{
    public function index(){
        
        if (Auth::user()->user_id == 0){
            $lists = User::all();
        }else{
            $lists = User::where('user_id', Auth::user()->id)->get();
        }
        // Thẻ meta
        $meta['title'] ='Quản lý thành viên';
        // Return View 
        return view('backend.users.index', compact('meta','lists'));
    }

    public function add(){

        $groups = Groups::all();
        // Thẻ meta
        $meta['title'] ='Thêm thành viên';
        // Return View 
        return view('backend.users.add', compact('meta','groups'));
    }

    public function postAdd( Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'group_id' => ['required','integer', function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn nhóm');
                }
            }],
            'status' => 'required|integer',
        ],
        [
            'name.required' => 'Họ tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không phải định dạng email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Password không được để trống',
            'group_id.required' => 'Nhóm không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->group_id = $request->group_id;
        $user->user_id = Auth::user()->id;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('admin.users.index')->with('msg','Thêm thành viên thành công');
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        $groups = Groups::all();
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa thành viên';
        // Return View 
        return view('backend.users.edit', compact('meta','groups','user'));
    }

    public function postEdit(User $user, Request $request){
        $this->authorize('update', $user);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'group_id' => ['required','integer', function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn nhóm');
                }
            }],
            'status' => 'required|integer',
        ],
        [
            'name.required' => 'Họ tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không phải định dạng email',
            'email.unique' => 'Email này đã tồn tại',
            'group_id.required' => 'Nhóm không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->group_id = $request->group_id;
        $user->status = $request->status;
        $user->save();
        return back()->with('msg','Chỉnh sửa thành viên thành công');
    }

    public function delete(User $user){
        $this->authorize('delete', $user);
        if (Auth::user()->id != $user->id)
        {
            User::destroy($user->id);
            return redirect()->route('admin.users.index')->with('msg','Xoá thành viên thành công');
        }
        return redirect()->route('admin.users.index')->with('msg','Bạn không thể xoá tài khoản này');
    }
}
