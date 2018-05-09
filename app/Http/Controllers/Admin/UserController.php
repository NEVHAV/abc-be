<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    // GET /users
    public function index()
    {
        if (Auth::check()) {
            $users = User::orderBy('id', 'asc')->get();
            return view('admin/user/index', [
                'users' => $users,
                'isAdmin' => Auth::user()->mode == 0,
            ]);
        }
        return redirect('admin/login');
    }

    // GET /users/create
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->mode == 0) {
                return view('admin/user/create');
            }
            return redirect('admin/users');
        }

        return redirect('admin/login');
    }

    // POST /users
    public function store(Request $request)
    {
        if (Auth::check()) {
            $data = $request->all();

            $this->validator($data);

            $user = User::where('email', $data['email'])->first();

            if ($user) {
                $errors = new MessageBag();

                // add your error messages:
                $errors->add('error', 'Email ' . $data['email'] . ' đã được đăng ký!');

                return redirect('admin/users/create')->withErrors($errors);
            }

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'mode' => $data['mode']
            ]);

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
            if (Auth::user()->mode == 0) {
                $user = User::find($id);
                return view('admin/user/edit', ['user' => $user,]);
            }
            return redirect('admin/users');
        }

        return redirect('admin/login');
    }

    // PATCH /users/{user}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            if (Auth::user()->mode == 0) {
                $input = $request->all();

                $user = User::find($id);

                $user->name = $input['name'];
                if (!is_null($input['password'])) {
                    $user->password = $input['password'];
                }
                $user->email = $input['email'];
                $user->mode = $input['mode'];
                $user->save;
            }
            return redirect('admin/users');
        }

        return redirect('admin/login');
    }

    // DELETE /users/{user}
    public function destroy($id)
    {
        if (Auth::check()) {
            if (Auth::user()->mode == 0 && Auth::user()->id != $id) {
                User::where('id', $id)->delete();
            }
            return response()->json([
                'status' => 'OK',
            ]);
        }

        return response()->json([
            'status' => 'ERROR',
            'message' => 'Ban phai dang nhap',
        ]);
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
