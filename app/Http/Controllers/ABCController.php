<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Advertisement;
use App\Category;
use App\Post;
use App\Subcategory;
use App\User;

class ABCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        $result = Category::get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getSubcategories($cate)
    {
        $result = Subcategory::where('id_cate', $cate)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getPost($cate, $sub = null)
    {
        if ($sub == null) {
            $maxDate = Post::where('id_cate', $cate)
                ->max('updated_at');
            $result = Post::where('updated_at', $maxDate)
                ->where('id_cate', $cate)
                ->first();
            return response()->json(['result' => true, 'data' => $result]);
        }
        else {
            $maxDate = Post::where('id_cate', $cate)
                ->where('id_sub', $sub)
                ->max('updated_at');
            $result = Post::where('updated_at', $maxDate)
                ->where('id_sub', $sub)
                ->first();
            return response()->json(['result' => true, 'data' => $result]);
        }
    }

    public function getLatestPosts ()
    {
        $result = Post::orderBy('updated_at', 'desc')
            ->limit(4)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }
}
