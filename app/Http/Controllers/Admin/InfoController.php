<?php

namespace App\Http\Controllers\Admin;

use App\Info;
use App\Category;
use App\Subcategory;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Helpers\ControllerHelper;

class InfoController extends Controller
{
    // GET /categories
    public function index(Request $request)
    {
        if (Auth::check()) {
            $infos = Info::orderBy('id', 'asc')->get();
            return view('admin/info/index', [
                'infos' => $infos,
            ]);
        }

        return redirect('/admin/login');
    }

    // GET /categories/create
    public function create(Request $request)
    {
        if (Auth::check()) {
                return view('admin/info/create');
        }
        return redirect('/admin/login');
    }

    // POST /categories/store
    public function store(Request $request){
        if (Auth::check()) {      
            $input = $request->all();
            $info = new Info();
            $info->company_name_vn = $input['company_name_vn'];
            $info->company_name_jp = $input['company_name_jp'];
           	$info->phone_number = $input['phone_number'];
           	$info->hotline = $input['hotline'];
           	$info->logo_url = $input['logo_url'];
           	$info->company_slogan_vn = $input['company_slogan_vn'];
           	$info->company_slogan_jp = $input['company_slogan_jp'];
           	$info->footer_vn = $input['footer_vn'];
           	$info->footer_jp = $input['footer_jp'];
           	$info->supporter_name = $input['supporter_name'];
           	$info->supporter_phone_number = $input['supporter_phone_number'];
           	$info->supporter_email = $input['supporter_email'];
            $info->save();
            return redirect('/admin/company-info');
        }
        return redirect('/admin/login');
    }


    // GET /categories/{info}
    public function show($id)
    {
        if (Auth::check()) {
            return view('admin/info/show');
        }
    }

    // GET /categories/{info}/edit
    public function edit($id)
    {
          if (Auth::check()) {
            $info=Info::find($id);
            return view('admin/info/edit', ['info'=>$info]);
        }

        return redirect('/admin/login');
    }

    // PATCH /categories/{info}
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $input = $request->all();
            $info=Info::find($id);
            $info->update($input);
            return redirect('admin/company-info');
        }
    }

    // DELETE /categories/{info}
    public function destroy($id)
    {
        if (Auth::check()) {
            Info::where('id',$id)->delete();
            // return redirect('admin/company-info');
             return response()->json([
                'status' => 'OK',
            ]);
        }
         return redirect('/admin/login');
    }
}