<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index () {
        $result = Post::latest()->get();
        return view('post')->with('result', $result);
    }

    public function post (Request $request) {
        if (isset($request)) {
            error_log($request);
            $title      = $request->input('title');
            $contents   = $request->input('contents');
            $storeName  = $request->input('store_name');
            $storeJName  = $request->input('store_jname');
            $rate       = (int)$request->input('rate');

            $instance = new Post();
            $instance->create([
                'title'         => $title,
                'store_name'     => $storeName,
                'store_jname'     => $storeJName,
                'contents'      => $contents,
                'rate'          => $rate,
            ]);
            return view('done_post');
        } else {
            return view('not_post');
        }
    }
}
