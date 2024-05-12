<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// autoload post model
use App\Post;
use App\User;

class PostController extends Controller
{
    //
    public static function getAvailablePostStatus(){
        return $postStatus = ['new','pending', 'completed','canceled'];

    }
    public function index()
    {
       if(auth()->user()->role=="Manager")
       {
        $all_posts = Post::where('created_by',auth()->user()->id)->get();
       }else{
        $all_posts = Post::where('user_id',auth()->user()->id)->get();
       }
        return view('posts.index', ['posts' => $all_posts]);
    }
    public function show($post)
    {
        $single_post = Post::findOrFail($post);
        // $single_post2= Post::where('id',$post) ;
        return view('posts.show', ['post' => $single_post]);
    }

    public function create()
    { 
        $users= User::where('role',"User")->get();
        return view('posts.create',['users'=>$users,'postStatus'=>PostController::getAvailablePostStatus()]);

    }
    public function store(Request $request)
    {
        // $data = request()->all();
        // $title = request()->title;
        // $description = request()->description;
        $title = $request->title;
        $description = $request->description; 
        $status = $request->status;
        $dueDate = $request->dueDate;
        $user_id = $request->user_id;
        // $post = Post::create(['title' => $title, 'description' => $description]);
        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->status = $status;
        $post->dueDate = $dueDate;
        $post->created_by = auth()->user()->id;
        $post->user_id = $user_id;

        $post->save();
        // return redirect('/posts');
        return redirect()->route('posts.index');

    }
    public function edit(Post $post){
        // Route Model Binding  = > Post $post equivilant to findOrFail() 

        // $single_post = Post::findOrFail($post);
        // $single_post2= Post::where('id',$post) ;
        $users= User::all();

        return view('posts.edit', ['post' => $post,'users'=>$users,'postStatus'=>PostController::getAvailablePostStatus()]);
    }
    public function update($post,Request $request){
        $single_post = Post::findOrFail($post);
        // dd($single_post);
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $dueDate = $request->dueDate;
        $user_id = $request->user_id;

        $single_post->update(['title' => $title, 'description' => $description,'status' => $status,'dueDate' => $dueDate, 'user_id' => $user_id]);
        return redirect()->route('posts.index');

    }
    public function destroy($post){
        Post::where('id',$post)->delete();
        // $single_post = Post::findOrFail($post);
        // $single_post->delete();
        return redirect()->route('posts.index');
    }
}