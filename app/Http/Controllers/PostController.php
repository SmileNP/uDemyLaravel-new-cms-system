<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
//        $posts = auth()->user()->posts; // returns a collection of posts
//        $posts = auth()->user()->posts()->paginate(5); // returns a hasMany relationship
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    public function store()
    {
        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post was created');

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
    }
    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $post->delete();
        $request->session()->flash('message', 'Post was deleted');
//        Session::flash('message', 'Post was deleted');
        return back();
     }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);
        $post->update();

        session()->flash('post-created-message', 'Post was updated');

        return redirect()->route('posts.index');
    }
}
