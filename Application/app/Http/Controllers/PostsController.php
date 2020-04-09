<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Store;

class PostsController extends Controller
{
    public function index () {
        $result = Post::latest()->get();
        return view('post')->with('result', $result);
    }

    /**
     * 口コミ投稿画面
     */
    public function post (Request $request) {
        if (isset($request)) {
            $formInfo = array();
            $formInfo['id']         = $request->input('id');
            $formInfo['title']      = $request->input('title');
            $formInfo['contents']   = $request->input('contents');
            $formInfo['rate']       = (int)$request->input('rate');
            $query                  = Store::where('id', $formInfo['id'])->first();
            $formInfo['storeName']  = $query->store_name;
            $formInfo['storeJName'] = $query->store_jname;

            return view('post_confirm')->with($formInfo);
        }
        return view('not_post');
    }

    /**
     * 口コミ投稿確認画面
     */
    public function postConfirm (Request $confirm, Request $formInfo) {
        if (isset($formInfo)) {
            if (isset($confirm)) {
                DB::beginTransaction();
                try {
                    self::createPost($formInfo['title'], $formInfo['storeName'], $formInfo['storeJName'], $formInfo['contents'], $formInfo['rate']);
                    self::updateRate($formInfo['id']);
                    DB::commit();
                    return view('done_post');
                } catch (\Exception $e) {
                    DB::rollback();
                }
            } else return view('post_confirm')->with($formInfo);
        }
        return view('not_post');
    }


    /**
     * 口コミ投稿処理
     *
     * @param query
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
     * @param int
     *
     */
    public function updateRate($id) {
        $storeName = Store::where('id', $id)->first()->store_name;
        $posts = Post::where('store_name', $storeName)->get();


        $rates = null;
        foreach ($posts as $key => $post) {
            $rates += $post['rate'];
        }
        $rate = $rates / count($posts);
        $store = Store::where('id', $id)->first();
        $store->rate = $rate;
        $store->save();
    }
}