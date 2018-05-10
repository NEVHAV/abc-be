<?php

namespace App\Http\Controllers;

use App\Post;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($lang, $slug)
    {
        if (is_null($lang)) {
            $lang = 'vn';
        }

        $post = Post::where('slug', $slug)
            ->where('state', 1)
            ->select('title', 'id_sub', 'id_user', 'content', 'cover', 'published_date')
            ->first();

        if (!is_null($post)) {
            $post['subcate'] = Subcategory::find($post['id_sub'])['name_' . $lang];
            $post['user'] = User::find($post['id_user'])->name;
            return response()->json([
                'status' => 'OK',
                'data' => $post,
            ]);
        } else {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Post not found',
                'debug' => $post,
            ]);
        }
    }
}
