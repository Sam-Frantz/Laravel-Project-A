<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        auth()->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }
}
