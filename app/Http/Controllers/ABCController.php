<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


use Illuminate\Http\Request;
use App\Advertisement;
use App\Category;
use App\Post;
use App\Subcategory;
use App\User;
use SebastianBergmann\Environment\Console;

class ABCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCategories($lang)
    {
        $result = Category::select('id_cate', 'name_'.$lang)
            ->get();
        foreach ($result as $data) {
            $data['name'] = $data['name_'.$lang];
        }
        return response()->json(['result' => true, 'lang'=>$lang, 'data' => $result]);
    }

    public function getSubcategories($cate, $lang)
    {
        $result = Subcategory::where('id_cate', $cate)
            ->select('id_sub','id_cate', 'name_'.$lang)
            ->get();
        foreach ($result as $data) {
            $data['name'] = $data['name'.$lang];
        }
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getPosts($cate, $sub = null, $lang)
    {
        if ($sub == null) {
            $maxDate = Post::where('id_cate', $cate)
                ->where('language', $lang)
                ->max('updated_at');
            $result = Post::where('updated_at', $maxDate)
                ->where('id_cate', $cate)
                ->where('language', $lang)
                ->first();
            return response()->json(['result' => true, 'data' => $result]);
        }
        else {
            $maxDate = Post::where('id_cate', $cate)
                ->where('id_sub', $sub)
                ->where('language', $lang)
                ->max('updated_at');
            $result = Post::where('updated_at', $maxDate)
                ->where('id_sub', $sub)
                ->where('language', $lang)
                ->first();
            return response()->json(['result' => true, 'data' => $result]);
        }
    }

    public function getLatestPosts ($lang)
    {
        $result = Post::orderBy('updated_at', 'desc')
            ->where('language', $lang)
            ->limit(4)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getBreadcrumbs ($subcate, $lang)
    {
        $cateName = Category::join('subcategories', 'subcategories.id_cate', '=', 'categories.id_cate')
            ->where('subcategories.id_sub', $subcate)
            ->select('categories.name_'.$lang)
            ->get();
        $subcateName = Subcategory::where('id_sub', $subcate)
            ->select('name_'.$lang)
            ->get();
        foreach ($subcateName as $data) {
            $data['name'] = $data['name'.$lang];
        }
        $result = ['cate' => $cateName, 'subcate' => $subcateName, 'id_sub' => $subcate];
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getPostDetail ($postId, $lang)
    {
        $result = Post::where('id_post', $postId)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getSubmenu ($subId, $lang)
    {
        $result = Post::where('id_sub', $subId)
            ->where('language', $lang)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

}
