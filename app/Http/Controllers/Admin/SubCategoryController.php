<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Subcategory;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SubCategoryController extends Controller
{
    // GET /categories
    public function index(Request $request)
    {
        if (Auth::check()) {
            $subcategories = DB::table('subcategories')
                                ->join('categories', 'subcategories.id_cate', '=', 'categories.id')
                                ->select('subcategories.*','categories.name_vn as cate_vn','categories.name_jp as cate_jp')
                                ->get();
            //$subcategories = Subcategory::orderBy('id', 'asc')->get();
            return redirect('admin/subcategory/index', [
                'subcategories' => $subcategories,
            ]);
        }

        return redirect('admin/login');
    }

    // GET /categories/create
    public function create(Request $request)
    {
        if (Auth::check()) {
            $categories = Category::orderBy('id', 'asc')->get();
            return redirect('admin/subcategory/create',[
                'categories' => $categories,
            ]);
        }
        return redirect('admin/login');
    }

    // POST /categories/store
    public function store(Request $request){
        if (Auth::check()) {      
            $input = $request->all();
            $subcategory = new Subcategory();
            $create = Subcategory::create($input);
            $subcategories = DB::table('subcategories')
                                ->join('categories', 'subcategories.id_cate', '=', 'categories.id')
                                ->select('subcategories.*','categories.name_vn as cate_vn','categories.name_jp as cate_jp')
                                ->get();
            // $subcategories = Subcategory::orderBy('id', 'asc')->get();
            return view('admin/subcategory/index', [
                'subcategories' => $subcategories,
            ]);
        }
        return redirect('admin/login');
    }


    // GET /categories/{category}
    public function show($id)
    {
        if (Auth::check()) {
            return view('admin/subcategory/show');
        }
    }

    // GET /categories/{category}/edit
    public function edit($id)
    {
          if (Auth::check()) {
            $categories = Category::orderBy('id', 'asc')->get();
            $subcategory = Subcategory::find($id);
            $cateName = DB::table('categories')
                                ->select('categories.name_vn as cate_vn')
                                ->where('id',$subcategory->id_cate)
                                ->get();
            return view('admin/subcategory/edit', ['subcategory'=>$subcategory, 'categories'=>$categories,'cateName'=>$cateName]);
        }

        return redirect('admin/login');
    }

    // PATCH /categories/{category}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $input = $request->all();
            $subcategory=Subcategory::find($id);
            $subcategory->update($input);
            $subcategories = DB::table('subcategories')
                    ->join('categories', 'subcategories.id_cate', '=', 'categories.id')
                    ->select('subcategories.*','categories.name_vn as cate_vn','categories.name_jp as cate_jp')
                    ->get();
            return view('admin/subcategory/index', [
                'subcategories' => $subcategories,
            ]);
        }
    }

    // DELETE /categories/{category}
    public function destroy($id)
    {
        if (Auth::check()) {
            Subcategory::where('id',$id)->delete();
            Post::where('id_sub', $id)->delete();
            $subcategories = Subcategory::orderBy('id', 'asc')->get();
            return view('admin/subcategory/index', [
                'subcategories' => $subcategories,
            ]); 
        }
         return redirect('admin/login');
    }
}