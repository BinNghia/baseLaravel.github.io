<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    public function getIndex()
    {
        $userss = User::all();
        return view('admin.users.list', ['users' => $userss]);
    }

    public function getLoginAdmin() 
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request) 
    {
        $this->validate($request, 
        [
            'name' => 'required',
            'password' => 'required'
        ],
        [
            'name.required' => 'Bạn chưa nhập name',
            'password.required' => 'Password không được trống'
            
        ]);
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password, 'idGroup' => 1 ])) 
        {
            return redirect('admin/users/list');
        } else {
            return redirect()->back()->withInput()->with('thongbao', 'Đăng nhập thất bại');
        }
        
    }
    public function getLogout() 
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function getEdit($id)
    {
        $users = User::Find($id);
        return view('admin.users.edit', ['users' => $users]);
    }

    public function postEdit(Request $request, $id)
    {
        $users = User::Find($id);
        $this->validate($request, 
        [
            'name' => 'required|min:3|unique:users,name',
        ],
        [
            'name.required' => 'Bạn chưa nhập name',
            'name.min' => 'name >= 3 kí tự',
            'name.unique' => 'name này đã tồn tại',
        ]);

        $users = User::Find($id);
        $users->full_name = $request->full_name;
        $users->name = $request->name;
        
        if($request->changePassword == "on"){
            $this->validate($request,[
                'password' => 'required|min:3|max:30',
                'passwordAgain' => 'required|same:password'

            ],[
                'password.required' => 'Bạn chưa nhập password',
                'password.min' => 'password >= 3 kí tự',
                'password.max' => 'password <= 30 kí tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại password',
                'passwordAgain.same' => 'Mật khẩu nhập lại không đúng'
            ]);
            $users->password = bcrypt($request->password);
        }

        $users->email = $request->email;
        $users->address = $request->address;
        $users->phone_number = $request->phone_number;
        $users->birth = $request->birth;
        $users->gender = $request->gender;
        $users->idGroup = $request->idGroup;
        $users->note = $request->note;
        $users->save();
        return redirect('admin/users/edit/'.$id)->with('thongbao', 'Sửa thành công');

    }

    public function getDetete($id) 
    {
        $users = User::find($id);
        $users->bill_detail()->delete();
        $users->bills()->delete();
        $users->delete();

        return redirect('admin/users/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
