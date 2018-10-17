<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    public function upload(Request $request)
    {
        $files = request()->file('file', []);

        $res = [];
        foreach ($files as $file) {
            if ($file->isValid()) {
                $path = $file->storePublicly(md5(\Auth::id() . time()));
                $res[] = asset('storage/' . $path);
            }
        }

        return [
            'errno' => 0,
            'data' => $res,
        ];
    }
}
