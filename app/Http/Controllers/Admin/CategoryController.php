<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Subcategory;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

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

        return redirect('admin/login');
    }

    // GET /categories/create
    public function create(Request $request)
    {
        if (Auth::check()) {
                return view('admin/category/create');
        }
        return redirect('admin/login');
    }

    // POST /categories/store
    public function store(Request $request){
        if (Auth::check()) {      
            $input = $request->all();
            $category = new Category();
            $create = Category::create($input);
            $categories = Category::orderBy('id', 'asc')->get();
            return view('admin/category/index', [
                'categories' => $categories,
            ]);
        }
        return redirect('admin/login');
    }


    // GET /categories/{category}
    public function show($id)
    {
        if (Auth::check()) {
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

        return redirect('admin/login');
    }

    // PATCH /categories/{category}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $input = $request->all();
            $category=Category::find($id);
            $category->update($input);
            $categories = Category::orderBy('id', 'asc')->get();
            return view('admin/category/index', [
                'categories' => $categories,
            ]);
        }
    }

    // DELETE /categories/{category}
    public function destroy($id)
    {
        if (Auth::check()) {
            Category::where('id',$id)->delete();
            Subcategory::where('id_cate', $id)->delete();
            Post::where('id_cate', $id)->delete();
            $categories = Category::orderBy('id', 'asc')->get();
            return view('admin/category/index', [
                'categories' => $categories,
            ]); 
        }
         return redirect('admin/login');
    }
}