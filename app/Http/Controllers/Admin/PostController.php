<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Post;
use App\User;
use App\Subcategory;

class PostController extends Controller
{
    // GET /posts
    public function index()
    {
        if (Auth::check()) {
            $posts = Post::orderBy('updated_at', 'asc')->get();
            foreach ($posts as $post) {
                $post['user'] = User::find($post->id_user);
                $post['sub'] = Subcategory::find($post->id_sub);
            }
            return view('admin/post/index', [
                'posts' => $posts,
            ]);
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
