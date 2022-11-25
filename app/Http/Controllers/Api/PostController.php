<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return $this->sendResponse( PostResource::collection( $posts ),"Posts retrieved successfully." );
    }

    public function store( Request $request ){
        $input = $request->all();

        $validator = Validator::make( $input, [
            "title"=>"required",
            "body"=>"required"
        ]);

        if($validator->fails()){
            return $this->sendError( "Validation Error.", $validator->errors());
        }

        $post = new Post();
        $post->title = $input["title"];
        $post->body = $input["body"];
        $post->user()->associate( Auth::user() );
        $post->save();

        return $this->sendResponse( new PostResource($post), "Post created successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $post = Post::find($id);

        if (is_null( $post )) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse( new PostResource( $post ), 'Post retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->save();

        return $this->sendResponse(new PostResource($post), 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return $this->sendResponse([], 'Post deleted successfully.');
    }
}

