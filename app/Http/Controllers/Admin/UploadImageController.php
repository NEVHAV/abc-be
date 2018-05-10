<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $path)
    {
//        $path = 'public/' . $path;

        $images = $request->all()['files'];

        $files = [];

        foreach ($images as $image) {
//            $input['imagename'] = substr(base_convert(time(), 10, 36) . md5(microtime()), 0, 16) . '.' . $image->getClientOriginalExtension();
//            $destinationPath = public_path('/images/upload');
//            $image->move($destinationPath, $input['imagename']);

            $path = Storage::disk('public')->putFile($path, $image);
            $publicPath = '/storage/' . $path;

            $file = [
                'url' => $publicPath,
                'thumbnail_url' => $publicPath,
                'name' => $publicPath,
                'type' => "image/jpeg",
                'size' => 0,
                'delete_url' => '/admin/api/uploadimage' . $publicPath,
                'delete_type' => "DELETE"
            ];

            array_push($files, $file);
        }

        return response()->json([
            'files' => $files,
        ]);
    }

    public function destroy($path, $name)
    {
//        $path = 'public/' . $path;
        $result = Storage::disk('public')->delete($path . '/' . $name);

        return response()->json([
            'status' => 'ok',
            'result' => $result,
        ]);
    }
}
