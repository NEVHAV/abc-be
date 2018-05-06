<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
          if (Auth::check()) {

              return view('admin/dashboard');
          }

          return redirect('admin/login');
    }

    public function showCategory()
    {
          if (Auth::check()) {

              return view('admin/category/index');
          }

          return redirect('admin/login');
    }


    public function addCategory()
    {
          if (Auth::check()) {

              return view('admin/category/add');
          }

          return redirect('admin/login');
    }


    public function editCategory()
    {
          if (Auth::check()) {

              return view('admin/category/edit');
          }

          return redirect('admin/login');
    }

    public function showUser()
    {
          if (Auth::check()) {

              return view('admin/user/index');
          }

          return redirect('admin/login');
    }


    public function addUser()
    {
          if (Auth::check()) {

              return view('admin/user/add');
          }

          return redirect('admin/login');
    }


    public function editUser()
    {
          if (Auth::check()) {

              return view('admin/user/edit');
          }

          return redirect('admin/login');
    }
}
