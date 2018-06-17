<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $topics = Category::orderBy('order', 'asc')
            ->select('id', 'name_' . $lang, 'slug', 'pin')
            ->get();

        $data = [];

        foreach ($topics as $topic) {
            $subs = Subcategory::where('id_cate', $topic->id)
                ->orderBy('created_at', 'desc')
                ->select('name_' . $lang, 'slug', 'id')
                ->get();

            $subs_data = [];

            foreach ($subs as $sub) {
                $new_post = Post::where('id_sub', $sub['id'])
                    ->where('language', $lang)
                    ->where('state', 1)
                    ->orderBy('published_date', 'desc')
                    ->select('slug', 'content', 'title', 'cover')
                    ->first();
                if (!is_null($new_post)) {
                    $new_post->content = str_limit(strip_tags($new_post->content), 200);
                }
                $posts = Post::where('id_sub', $sub['id'])
                    ->where('language', $lang)
                    ->where('state', 1)
                    ->orderBy('published_date', 'desc')
                    ->select('slug', 'title')
                    ->offset(1)
                    ->limit(4)
                    ->get();

                array_push($subs_data, [
                    'name' => $sub['name_' . $lang],
                    'slug' => $sub->slug,
                    'new_post' => $new_post,
                    'posts' => $posts
                ]);
            }

            $pin = Post::find($topic['pin']);

            if (is_null($pin)) {
                $new_post = Post::where('id_cate', $topic['id'])
                    ->where('language', $lang)
                    ->where('state', 1)
                    ->orderBy('published_date', 'desc')
                    ->select('slug', 'content', 'title', 'cover')
                    ->first();
            } else {
                $new_post = $pin;
            }
            if (!is_null($new_post)) {
                $content = $new_post->content;
                $content = str_replace('.</p>', "</p>", $content);
                $content = str_replace('</p>', ".</p>", $content);
                $content = strip_tags($content);

                $content = str_replace('&nbsp;', '', $content);
                $content = str_replace('&amp;', '&', $content);
                $content = str_replace('&lt;', '<', $content);
                $content = str_replace('&gt;', '>', $content);
                $content = str_replace('&quot;', '"', $content);
                $content = str_replace('&#39;', "'", $content);
                $content = str_replace('.', ". ", $content);

                $content = trim($content);
                $new_post->content = str_limit($content, 200);
            }
            $posts = Post::where('id_cate', $topic['id'])
                ->where('language', $lang)
                ->where('state', 1)
                ->orderBy('published_date', 'desc')
                ->select('slug', 'title')
                ->offset(1)
                ->limit(4)
                ->get();

            array_push($data, [
                'name' => $topic['name_' . $lang],
                'slug' => $topic['slug'],
                'subs' => $subs_data,
                'new_post' => $new_post,
                'posts' => $posts,
//                'pin' => $pin
            ]);
        }

        return response()->json([
            'status' => 'OK',
            'data' => $data,
        ]);
    }
}
