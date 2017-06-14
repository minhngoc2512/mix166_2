<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UsersController extends Controller
{
    public function getList()
    {
        $data = User::paginate(10);
        return view('admin.user.list', compact(['data']));
    }

    public function add(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->level = $request->level;
        $user->remember_token = $request->_token;
        $user->save();

        return redirect('admin/user/list');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'pass' => 'same:Repass',
        ], [
            'name.required' => 'Please input name',
            'pass.min' => 'Pass too short',
            'pass.same' => 'Try agin with Repass',
        ]);
        $user = User::find($request->id);
        if (!$request->pass == '') {
            $user->password = $request->pass;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->save();
        return redirect('admin/user/list');
    }

    public function edit($id)
    {
        $data = User::find($id)->toArray();

        return view('admin.user.edit', compact(['data']));
    }

    public function getUser($id)
    {
        $data = User::find($id);
    }

    public function demo()
    {
        return view('admin.demo');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('admin/user/list');
    }
    public function Checklogin($name= 'a',$password='a'){
       $value = DB::query('select * from users');
        if($value!=null){
            return true;
        }else{
            return false;
        }

    }

    //
}
