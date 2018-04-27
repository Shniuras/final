<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'my']]);
    }

    public function index()
    {
        $showPost = Post::orderBy('id','desc')->paginate(5);
        return view('post.index', ['showPost' => $showPost]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $postRequest)
    {
        $user = Auth::user();
        $user->posts()->create($postRequest->except('_token') + [
                'date' => Carbon::now(),
                'user_id' => $user->id
            ]);
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = $post->user;
        return view('post.show', ['postSingle' => $post, 'postUser' => $user]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit',['edit' => $post]);
    }

    public function update(EditPostRequest $editPostRequest, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $editPostRequest->get('title'),
            'content' => $editPostRequest->get('content')
        ]);
        return redirect()->route('post.show',$id);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }

    public function my($id)
    {
        $user = User::findOrFail($id);
        $post = $user->posts;
        return view('post.my', ['posts' => $post]);
    }
}
