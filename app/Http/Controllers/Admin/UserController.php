<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    // GET /users
    public function index()
    {
        if (Auth::check()) {

            return view('admin/user/index');
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
    public function store()
    {
        if (Auth::check()) {

            return view('admin/user/index');
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
    public function edit()
    {
        if (Auth::check()) {

            return view('admin/user/edit');
        }

        return redirect('admin/login');
    }

    // PATCH /users/{user}
    public function update()
    {
        if (Auth::check()) {

            return view('admin/user/update');
        }

        return redirect('admin/login');
    }

    // DELETE /users/{user}
    public function destroy()
    {
        if (Auth::check()) {

            return view('admin/user/destroy');
        }

        return redirect('admin/login');
    }
}
