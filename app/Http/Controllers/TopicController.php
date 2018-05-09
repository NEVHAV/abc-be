<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Subcategory;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index($lang)
    {
        $topics = Category::orderBy('created_at', 'desc')
            ->select('id', 'name_' . $lang, 'slug')
            ->get();

        $data = [];

        foreach ($topics as $topic) {
            array_push($data, [
                'name' => $topic['name_' . $lang],
                'slug' => $topic['slug'],
            ]);
        }

        return response()->json([
            'status' => 'OK',
            'data' => $data,
        ]);
    }

    public function show($lang, $slug)
    {
        $topic = Category::where('slug', $slug)->first();
        if (is_null($topic)) {
            $topic = Subcategory::where('slug', $slug)->first();

            if (is_null($topic)) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'Topic not found',
                ]);
            }

            $topic->type = 'subcate';

            $topic->posts = Post::where('id_sub', $topic->id)
                ->where('language', $lang)
                ->where('state', 1)
                ->orderBy('published_date', 'desc')
                ->select('slug', 'title', 'cover', 'published_date', 'content')
                ->limit(10)
                ->get();
        } else {
            $topic->type = 'cate';

            $topic->posts = Post::where('id_cate', $topic->id)
                ->where('language', $lang)
                ->where('state', 1)
                ->orderBy('published_date', 'desc')
                ->select('slug', 'title', 'cover', 'published_date', 'content')
                ->limit(10)
                ->get();

            $topic->subs = Subcategory::where('id_cate', $topic->id)
                ->select('slug', 'name_' . $lang)
                ->get();
        }

        $posts = [];
        foreach ($topic->posts as $post) {
            $post['content'] = str_limit(strip_tags($post['content']), 260);
            array_push($posts, $post);
        }

        $data = [
            'name' => $topic['name_' . $lang],
            'type' => $topic['type'],
            'posts' => $posts,
            'slug' => $topic['slug'],
        ];

        if ($topic->type == 'cate') {
            $subs = [];
            foreach ($topic->subs as $sub) {
                array_push($subs, [
                    'name' => $sub['name_' . $lang],
                    'slug' => $sub['slug'],
                ]);
            }
            $data['subs'] = $subs;
        }

        return response()->json([
            'status' => 'OK',
            'data' => $data,
        ]);
    }
}
