<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Post;
use App\User;
use App\Subcategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Helpers\ControllerHelper;


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

        return redirect('/admin/login');
    }

    // GET /posts/create
    public function create()
    {
        if (Auth::check()) {
            $sub_categories = Subcategory::orderBy('name_vn', 'asc')->get();

            return view('admin/post/create', [
                'sub_categories' => $sub_categories,
            ]);
        }

        return redirect('/admin/login');
    }

    // POST /posts
    public function store(Request $request)
    {
        if (Auth::check()) {
            $data = $this->validate($request, [
                'title' => 'required',
                'state' => 'required',
                'cover' => 'required',
                'content' => 'required',
                'language' => 'required',
                'id_sub' => 'required',
            ]);

            $data['published_date'] = join(' ', $request->input('published_date'));

            $post = new Post;

            $post->title = $data['title'];
            $post->slug = ControllerHelper::slug($data['title']);
            $post->state = $data['state'];
            $post->id_user = Auth::user()->id;

            if ($post->state == 1) {
                $post->published_date = Carbon::createFromFormat('d/m/Y H:i:s', $data['published_date'])
                    ->format('Y-m-d H:i:s');
            }

            $post->cover = $data['cover'];
            $post->content = $data['content'];
            $post->language = $data['language'];
            $post->id_sub = $data['id_sub'];

            $sub_category = Subcategory::find($post->id_sub);

            $post->id_cate = $sub_category->id_cate;
            $post->save();

            return redirect('/admin/posts');
        }

        return redirect('/admin/login');
    }


    // GET /posts/{post}
    public function show()
    {
        if (Auth::check()) {

            return redirect('/admin/posts');
        }

        return redirect('/admin/login');
    }

    // GET /posts/{post}/edit
    public function edit(Request $request, $post_id)
    {
        if (Auth::check()) {
            $sub_categories = Subcategory::orderBy('name_vn', 'asc')->get();
            $post = Post::find($post_id);

            if ($post->state == 1) {
                $published_date = Carbon::createFromFormat('Y-m-d H:i:s', $post->published_date)
                    ->format('d/m/Y H:i:s');
                $published_date = explode(' ', $published_date);
                $post->date = $published_date[0];
                $post->time = $published_date[1];
            }

            return view('admin/post/edit', [
                'post' => $post,
                'sub_categories' => $sub_categories,
            ]);
        }

        return redirect('/admin/login');
    }

    // PATCH /posts/{post}
    public function update(Request $request, $post_id)
    {
        if (Auth::check()) {
            $data = $this->validate($request, [
                'title' => 'required',
                'state' => 'required',
                'cover' => 'required',
                'content' => 'required',
                'language' => 'required',
                'id_sub' => 'required',
//                'id_user' => 'required',
            ]);

            $data['published_date'] = join(' ', $request->input('published_date'));

            $post = Post::find($post_id);

            $post->title = $data['title'];
            $post->state = $data['state'];
//            $post->id_user = $data['id_user'];

            if ($post->state == 1) {
                $post->published_date = Carbon::createFromFormat('d/m/Y H:i:s', $data['published_date'])
                    ->format('Y-m-d H:i:s');
            }

            $post->cover = $data['cover'];
            $post->content = $data['content'];
            $post->language = $data['language'];
            $post->id_sub = $data['id_sub'];

            $sub_category = Subcategory::find($post->id_sub);

            $post->id_cate = $sub_category->id_cate;
            $post->save();

            return redirect('/admin/posts');
        }

        return redirect('/admin/login');
    }

    // DELETE /posts/{post}
    public function destroy(Request $request, $post_id)
    {
        if (Auth::check()) {
            $message = Post::find($post_id)->delete();
            return response()->json([
                'status' => 'ok',
                'message' => $message,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Ban phai dang nhap',
        ]);
    }
}
