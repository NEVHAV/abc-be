<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


use Illuminate\Http\Request;
use App\Advertisement;
use App\Category;
use App\Post;
use App\Subcategory;
use App\Info;
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
        $result = Category::select('id', 'name_' . $lang)
            ->get();
        foreach ($result as $data) {
            $data['name'] = $data['name_' . $lang];
        }
        return response()->json(['result' => true, 'lang' => $lang, 'data' => $result]);
    }

    public function getSubcategories($lang, $cate)
    {
        $result = Subcategory::where('id_cate', $cate)
            ->select('id', 'id_cate', 'name_' . $lang)
            ->get();
        foreach ($result as $data) {
            $data['name'] = $data['name_' . $lang];
        }
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getPosts($lang, $cate, $sub = null)
    {
        if ($sub == null) {
            $result = Post::where('id_cate', $cate)
                ->where('language', $lang)
                ->orderBy('updated_at', 'desc')
                ->first();
            return response()->json(['result' => true, 'data' => $result]);
        } else {
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

    public function getLatestPosts($lang)
    {
        if (is_null($lang)) {
            $lang = 'vn';
        }

        $result = Post::where('language', $lang)
            ->where('state', 1)
            ->orderBy('published_date', 'desc')
            ->select('title', 'published_date', 'slug')
            ->limit(4)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getBreadcrumbs($lang, $subcate)
    {
        $cateName = Category::join('subcategories', 'subcategories.id_cate', '=', 'categories.id')
            ->where('subcategories.id', $subcate)
            ->select('categories.name_' . $lang)
            ->get();
        $subcateName = Subcategory::where('id', $subcate)
            ->select('name_' . $lang)
            ->get();
        foreach ($subcateName as $data) {
            $data['name'] = $data['name_' . $lang];
        }
        $result = ['cate' => $cateName, 'subcate' => $subcateName, 'id' => $subcate];
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getPostDetail($postId, $lang)
    {
        $result = Post::where('id', $postId)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getSubmenu($lang, $subId)
    {
        $result = Post::where('id_sub', $subId)
            ->where('language', $lang)
            ->get();
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getAdvertisement($lang)
    {
        $result = Advertisement::select('url_'.$lang)
            ->get();
        foreach ($result as $data) {
            $data['url'] = $data['url_'.$lang];
        }
        return response()->json(['result' => true, 'data' => $result]);
    }

    public function getInfo ($lang)
    {
        $result = Info::select(
            'phone_number',
            'hotline',
            'logo_url',
            'company_name_'.$lang,
            'company_slogan_'.$lang,
            'footer_'.$lang,
            'supporter_name',
            'supporter_phone_number',
            'supporter_email')
            ->get();
        foreach ($result as $data) {
            $data['company_name'] = $data['company_name_'.$lang];
            $data['company_slogan'] = $data['company_slogan_'.$lang];
            $data['footer'] = $data['footer_'.$lang];
        }
        return response()->json(['result' => true, 'data' => $result]);
    }

}
