<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_posts = Post::all();
        return response()->json([
            'posts' => $all_posts
         ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Post::create($request->all());
        return response()->json($item, 201);
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        $post = Post::findOrFail($post);
        if(!$post){
          return response()->json([
             'message'=>'Post Not Found.'
          ],404);
        }
        // Return Json Response
        return response()->json([
           'post' => $post
        ],200);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $item = Post::find($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($id);
        return response()->json(null, 204);
    }
}
