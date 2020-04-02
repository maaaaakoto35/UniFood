<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Post;
use App\Store;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index () {
        $result = Post::latest()->get();
        return view('post')->with('result', $result);
    }

    public function post (Request $request) {
        if (isset($request)) {
            $id         = $request->input('id');
            $title      = $request->input('title');
            $contents   = $request->input('contents');
            $rate       = (int)$request->input('rate');
            $query      = Store::where('id', $id)->first();
            var_dump($id);
            $storeName  = $query->store_name;
            $storeJName = $query->store_jname;

            if (isset($storeName)) {
                $instance = new Post;
                $instance->create([
                    'title'         => $title,
                    'store_name'     => $storeName,
                    'store_jname'     => $storeJName,
                    'contents'      => $contents,
                    'rate'          => $rate,
                ]);
                return view('done_post');
                Log::debug("ここ".$storeName);
            }
        }
        return view('not_post');
    }
}
