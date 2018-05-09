<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Helpers\ControllerHelper;

class UserController extends Controller
{
    // GET /users
    public function index()
    {
        if (Auth::check()) {
            $users = User::orderBy('id', 'asc')->get();
            return view('admin/user/index',
                ['users' => $users,]);
        }
        return redirect('admin/login');
    }

    // GET /users/create
    public function create()
    {
        if (Auth::check()) {

            return view('admin/user/create');
        }

        return redirect('admin/login');
    }

    // POST /users
    public function store(Request $request)
    {
        if (Auth::check()) {
            $input = $request->all();          
            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = $input['password'];
            $user->mode = $input['mode'];
            $user->save();
            return redirect('/admin/users');
        }

        return redirect('admin/login');
    }


    // GET /users/{user}
    public function show()
    {
        if (Auth::check()) {

            return view('admin/user/show');
        }

        return redirect('admin/login');
    }

    // GET /users/{user}/edit
    public function edit($id)
    {
        if (Auth::check()) {
            $user = User::find($id);
            return view('admin/user/edit',['user'=>$user,]);
        }

        return redirect('admin/login');
    }

    // PATCH /users/{user}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $input = $request->all();
            $user = User::find($id);
            $user->update($input);
            return redirect('admin/users');
        }

        return redirect('admin/login');
    }

    // DELETE /users/{user}
    public function destroy()
    {
        if (Auth::check()) {
            User::where('id',$id)->delete();
            $users = User::orderBy('id', 'asc')->get();
            return view('admin/user/index', [
                'users' => $users,
            ]); 
        }

        return redirect('admin/login');
    }
}
