<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadImageController extends Controller
{
    public function store(Request $request)
    {
//        $params = $request->all();

//        $this->validate($request, [
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        $images = $request->all()['files'];

        $files = [];

        foreach ($images as $image) {
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/posts');
            $image->move($destinationPath, $input['imagename']);

            $file = [
                'url' => '/images/posts/' . $input['imagename'],
                'thumbnail_url' => '/images/posts/' . $input['imagename'],
                'name' => $input['imagename'],
                'type' => "image/jpeg",
                'size' => 0,
                'delete_url' => "your_delete_url",
                'delete_type' => "DELETE"
            ];

            array_push($files, $file);
        }

        return response()->json([
            'files' => $files,
        ]);
    }
}
