<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class CategoryController extends Controller
{
    // GET /categories
    public function index()
    {
        if (Auth::check()) {

            return view('admin/category/index');
        }

        return redirect('admin/login');
    }

    // GET /categories/create
    public function create()
    {
        if (Auth::check()) {

            return view('admin/category/create');
        }

        return redirect('admin/login');
    }

    // POST /categories
    public function store()
    {
        if (Auth::check()) {

            return view('admin/category/index');
        }

        return redirect('admin/login');
    }


    // GET /categories/{category}
    public function show()
    {
        if (Auth::check()) {

            return view('admin/category/show');
        }

        return redirect('admin/login');
    }

    // GET /categories/{category}/edit
    public function edit()
    {
        if (Auth::check()) {

            return view('admin/category/edit');
        }

        return redirect('admin/login');
    }

    // PATCH /categories/{category}
    public function update()
    {
        if (Auth::check()) {

            return view('admin/category/update');
        }

        return redirect('admin/login');
    }

    // DELETE /categories/{category}
    public function destroy()
    {
        if (Auth::check()) {

            return view('admin/category/destroy');
        }

        return redirect('admin/login');
    }
}
