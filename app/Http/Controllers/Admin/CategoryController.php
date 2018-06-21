<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Subcategory;
use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Auth;
use App\Http\Helpers\ControllerHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // GET /categories
    public function index(Request $request)
    {
        if (Auth::check()) {
            $categories = Category::orderBy('id', 'asc')->get();
            return view('admin/category/index', [
                'categories' => $categories,
            ]);
        }

        return redirect('/admin/login');
    }

    // GET /categories/create
    public function create(Request $request)
    {
        if (Auth::check()) {
                return view('admin/category/create');
        }
        return redirect('/admin/login');
    }

    // POST /categories/store
    public function store(Request $request){
        if (Auth::check()) {  
            $input = $this->validate($request, [
                'name_vn'=> 'required',
            ]);    
            $input = $request->all();
            $category = new Category();
            $category->name_vn = $input['name_vn'];
            $category->name_jp = $input['name_jp'];
            $category->slug = ControllerHelper::slug($input['name_vn']);
            $category->save();
            return redirect('/admin/categories');
        }
        return redirect('/admin/login');
    }


    // GET /categories/{category}
    public function show($id)
    {
        if (Auth::check()) {
            $category = Category::find($id);
            $posts = DB::table('posts')
                            ->select('*')
                            ->where('id_cate', $id)
                            ->get();
            $pin_vn = Post::find($category['pin_vn']);
            $pin_jp = Post::find($category['pin_jp']);
            $user = Auth::user()->name;
            return view('admin/category/show',[
                'category' => $category,
                'posts' => $posts,
                'user' => $user,
                'pin_vn' => $pin_vn,
                'pin_jp' => $pin_jp,
            ]);
            return view('admin/category/show');
        }
    }

    // GET /categories/{category}/edit
    public function edit($id)
    {
        if (Auth::check()) {
            $category=Category::find($id);
            return view('admin/category/edit', ['category'=>$category]);
        }

        return redirect('/admin/login');
    }

    // PATCH /categories/{category}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $input = $this->validate($request, [
                'name_vn'=> 'required',
            ]);  
            $input = $request->all();
            $category=Category::find($id);
            $category->update($input);
            return redirect('admin/categories');
        }
    }

    // DELETE /categories/{category}
    public function destroy($id)
    {
        if (Auth::check()) {
            Category::where('id',$id)->delete();
            Subcategory::where('id_cate', $id)->delete();
            Post::where('id_cate', $id)->delete();
            return response()->json([
                'status' => 'ok',
            ]);
        }
         return redirect('/admin/login');
    }

    public function pinPost(Request $request, $id){
        if (Auth::check()) {
            $category = Category::find($id);
            $category->pin_vn = $request['postId'];
            $category->save();
            $posts = DB::table('posts')
                            ->select('*')
                            ->where('id_cate', $id)
                            ->get();
            $user = Auth::user()->name;
            return redirect('/admin/categories/' . $id);
        }
        return redirect('/admin/login');
    }

    public function unpinPost(Request $request, $id){
        if (Auth::check()) {
            $category = Category::find($id);
            $category->pin_vn = 0;
            $category->save();
            $posts = DB::table('posts')
                            ->select('*')
                            ->where('id_cate', $id)
                            ->get();
            $user = Auth::user()->name;
            return redirect('/admin/categories/' . $id);
        }
        return redirect('/admin/login');
    }

    public function pinPostJp(Request $request, $id){
        if (Auth::check()) {
            $category = Category::find($id);
            $category->pin_jp = $request['postId'];
            $category->save();
            $posts = DB::table('posts')
                            ->select('*')
                            ->where('id_cate', $id)
                            ->get();
            $user = Auth::user()->name;
            return redirect('/admin/categories/' . $id);
        }
        return redirect('/admin/login');
    }

    public function unpinPostJp(Request $request, $id){
        if (Auth::check()) {
            $category = Category::find($id);
            $category->pin_jp = 0;
            $category->save();
            $posts = DB::table('posts')
                            ->select('*')
                            ->where('id_cate', $id)
                            ->get();
            $user = Auth::user()->name;
            return redirect('/admin/categories/' . $id);
        }
        return redirect('/admin/login');
    }
}
