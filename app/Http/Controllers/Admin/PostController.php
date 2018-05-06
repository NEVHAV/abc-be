<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class PostController extends Controller
{
    // GET /posts
    public function index()
    {
        if (Auth::check()) {

            return view('admin/post/index');
        }

        return redirect('admin/login');
    }

    // GET /posts/create
    public function create()
    {
        if (Auth::check()) {

            return view('admin/post/create');
        }

        return redirect('admin/login');
    }

    // POST /posts
    public function store()
    {
        if (Auth::check()) {

            return view('admin/post/index');
        }

        return redirect('admin/login');
    }


    // GET /posts/{post}
    public function show()
    {
        if (Auth::check()) {

            return view('admin/post/show');
        }

        return redirect('admin/login');
    }

    // GET /posts/{post}/edit
    public function edit()
    {
        if (Auth::check()) {

            return view('admin/post/edit');
        }

        return redirect('admin/login');
    }

    // PATCH /posts/{post}
    public function update()
    {
        if (Auth::check()) {

            return view('admin/post/update');
        }

        return redirect('admin/login');
    }

    // DELETE /posts/{post}
    public function destroy()
    {
        if (Auth::check()) {

            return view('admin/post/destroy');
        }

        return redirect('admin/login');
    }
}
