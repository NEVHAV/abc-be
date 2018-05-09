<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Subcategory;
use App\Post;
use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Helpers\ControllerHelper;

class AdvertisementController extends Controller
{
    // GET /categories
    public function index(Request $request)
    {
        if (Auth::check()) {
            $advertisements = Advertisement::orderBy('id', 'asc')->get();
            return view('admin/advertisement/index', [
                'advertisements' => $advertisements,
            ]);
        }

        return redirect('/admin/login');
    }

    // GET /categories/create
    public function create(Request $request)
    {
        if (Auth::check()) {
                return view('admin/advertisement/create');
        }
        return redirect('/admin/login');
    }

    // POST /categories/store
    public function store(Request $request){
        if (Auth::check()) {      
            $input = $request->all();
            
            $advertisement = new Advertisement();
            $advertisement->url_vn = $input['url_vn'];
            $advertisement->url_jp = $input['url_jp'];
         //   $advertisement->slug = ControllerHelper::slug($input['name_vn']);
            $advertisement->save();

            return redirect('/admin/advertisements');
        }
        return redirect('/admin/login');
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
            $advertisement = Advertisement::find($id);
            return view('admin/advertisement/edit', ['advertisement'=>$advertisement]);
        }

        return redirect('/admin/login');
    }

    // PATCH /categories/{category}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $input = $request->all();
            $advertisement=Advertisement::find($id);
            $advertisement->update($input);
            return redirect('admin/advertisements');
        }
    }

     // DELETE /categories/{category}
    public function destroy($id)
    {
        if (Auth::check()) {
            Advertisement::where('id',$id)->delete();
            $advertisements = Advertisement::orderBy('id', 'asc')->get();
            return view('admin/advertisement/index', [
                'advertisements' => $advertisements,
            ]); 
        }
         return redirect('/admin/login');
    }
}