<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware(['auth','PBH']);
    // }
    public function index()
    {
        $posts = post::with('user')->latest()->paginate(5);
        return view('posts.index',['posts'=>$posts]);
    }

    public function create()
    {
        $this->authorize('create', post::class);
        return view('posts.add');
    }

    public function show(post $post){
        return view('posts.show',['post'=>$post]);
    }

    public function edit(post $post){
        $this->authorize('update',$post);
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request, post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
                        ->with('success','post updated successfully');

    }

    public function destroy(post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success','post deleted successfully');
    }



    public function store(Request $request ){

        $this->validate($request, [
            'body' => 'required|min:50|max:300',
        ]);

        $posts = post::create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);
        $posts->save();
        // $request->user()->post()->create($request->only('body'));

        return redirect()->route('posts.index')->with('success','Post successfully published');
    }


}
