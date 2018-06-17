<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Helpers\ControllerHelper;

class TopicController extends Controller
{
    public function index($lang)
    {
        if (is_null($lang)) {
            $lang = 'vn';
        }

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

    public function show($lang, $slug, $subTopic = NULL)
    {
        if (is_null($lang)) {
            $lang = 'vn';
        }

        $cate = Category::where('slug', $slug)->first();

        if (is_null($cate)) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Category not found',
            ]);
        }

        if (!is_null($subTopic)) {
            $subCate = Subcategory::where('slug', $subTopic)
                ->where('id_cate', $cate->id)
                ->first();

            if (is_null($subCate)) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'Subcategory not found',
                ]);
            }

            $topic = $subCate;

            $topic->type = 'subcate';

            $topic->posts = Post::where('id_sub', $topic->id)
                ->where('language', $lang)
                ->where('state', 1)
                ->orderBy('published_date', 'desc')
                ->select('slug', 'title', 'cover', 'published_date', 'content')
                ->limit(10)
                ->get();
        } else {
            $topic = $cate;
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

        $pin = Post::find($topic->pin);

        if (!is_null($pin)) {
            $pin['content'] = ControllerHelper::removeHtmlTag($pin['content']);

            array_push($posts, $pin);
        }

        foreach ($topic->posts as $post) {
            if (!is_null($pin) && $post->slug == $pin->slug) {
                continue;
            }
            $post['content'] = ControllerHelper::removeHtmlTag($post['content']);
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
