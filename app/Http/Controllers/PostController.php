<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
       $post = Post::create($request->all());

       if ($request->file('file')) {
        $url = Storage::put('posts', $request->file('file'));

        $post->image()->create([
            'url' => $url
        ]);
       }

       return redirect()->route('admin.posts.edit', $post)->with('PostCreado', 'si');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image->create([
                    'url' => $url,
                ]);
            }
        }
        return redirect()->route('admin.posts.index')->with('PostActulizado', 'si');
    }

    public function destroy($id, Post $post)
    {
        Post::destroy($id);
        if ($post->image) {
            Storage::delete($post->image->url);
        }

        return redirect()->route('admin.posts.index');
    }
}
