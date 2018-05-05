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

          return redirect('/admin/login');
    }
}
