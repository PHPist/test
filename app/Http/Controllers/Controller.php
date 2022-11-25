<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

      public function test( Request $request ){
        $postFilter = new PostFilter($request->all());
        $posts = Post::filter($postFilter)->get();
    }

}
