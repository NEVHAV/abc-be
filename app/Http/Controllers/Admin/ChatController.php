<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ChatController extends Controller
{
    //
     public function index(Request $request)
    {
        if (Auth::check()) {
            return view('admin/chat/index');
        }

        return redirect('/admin/login');
    }

}
