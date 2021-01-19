<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        //dd($request->all());

        app()->setLocale("$request->language");

        $posts=Post::all();
        return response()->json($posts);
    }

}
