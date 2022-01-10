<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('new_images'), $imageName);
        return response()->json(['uploaded' => '/new_images/' . $imageName]);
    }
}
