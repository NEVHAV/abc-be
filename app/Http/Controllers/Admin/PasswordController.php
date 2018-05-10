<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    // GET /users
    public function index()
    {
        if (Auth::check()) {
            return view('admin/password/index', [
                'user' => Auth::user(),
            ]);
        }
        return redirect('admin/login');
    }

    // PATCH /users/{user}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            if(!Hash::check($request['oldPass'], Auth::user()->password)){
                $errors = new MessageBag();

                // add your error messages:
                $errors->add('error', 'Mật khẩu cũ không đúng!');

                return redirect('admin/settings')->withErrors($errors);
            }

            if($request['newPass1'] != $request['newPass2']){
                $errors = new MessageBag();

    //             // add your error messages:
                $errors->add('error', 'Mật khẩu mới không khớp!');

                return redirect('admin/settings')->withErrors($errors);
            }

            $user = User::find($id);
            $data = $request->all();
            $user->password = bcrypt($data['newPass1']);
            $user->save();
            return redirect('admin/users');
        }

        return redirect('admin/login');
    }
  
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mode' => 'required',
        ]);
    }
}
