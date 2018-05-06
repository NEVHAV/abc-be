<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
