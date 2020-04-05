<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
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
            $storeName  = $query->store_name;
            $storeJName = $query->store_jname;

            if (isset($storeName)) {
                DB::beginTransaction();
                try {
                    self::createPost($title, $storeName, $storeJName, $contents, $rate);
                    self::updateRate($id);
                    DB::commit();
                    return view('done_post');
                } catch (\Exception $e) {
                    DB::rollback();
                }
            }
        }
        return view('not_post');
    }


    /**
     * 口コミ投稿処理
     *
     * @param query
     * @return bool
     *
     */
    public function createPost($title, $storeName, $storeJName, $contents, $rate) {
        $instance = new Post;
        $instance->create([
            'title'         => $title,
            'store_name'     => $storeName,
            'store_jname'     => $storeJName,
            'contents'      => $contents,
            'rate'          => $rate,
        ]);
    }

    /**
     * 店舗評価処理
     *
     * @param query
     * @return bool
     *
     */
    public function updateRate($id) {
        $storeName = Store::where('id', $id)->first()->store_name;
        $posts = Post::where('store_name', $storeName)->get();


        $rates = null;
        foreach ($posts as $key => $post) {
            $rates += $post['rate'];
        }
        var_dump($rates);
        $rate = $rates / count($posts);
        $store = Store::where('id', $id)->first();
        $store->rate = $rate;
        $store->save();
    }
}