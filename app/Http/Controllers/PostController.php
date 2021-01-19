<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PostController extends Controller
{
    public function index()
    {
        $posts=Post::paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');

    }

    public function store(StorePost $request)
    {
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return redirect(route('posts.index'))->with('message','Success');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //dd($post);
        return view('posts.edit',compact('post'));
    }

    public function update(StorePost $request, Post $post)
    {
       $post->update([
          'title'=>$request->title,
          'body'=>$request->body
       ]);
       return redirect(route('posts.index'))->with('message','Success');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('posts.index'))->with('message','Success');
    }

    public function search(Request $request)
    {
        $query=$request->q;
        if($query)
        {
            $posts=Post::search($query)->latest()->paginate(10);
            return view('posts.index',compact('posts'));

        }
        else
        {
            return redirect(route('posts.index'));
        }
    }
}
