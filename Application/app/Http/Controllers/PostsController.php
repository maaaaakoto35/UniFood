<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Store;
use App\ProvisionalImage;

class PostsController extends Controller
{
    public function index () {
        return view('post');
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

            session()->put('form_info[]', $formInfo);
            session()->put('message', 'この口コミを投稿しますか？');

            if ($request->hasFile('image')) {
                $image = self::createProvisionalImage($request->file('image'));
                return view('post_confirm')->with('form_info', $formInfo)->with('image', $image);
            } else {
                return view('post_confirm')->with('form_info', $formInfo);
            }
        }
        return view('not_post');
    }

    /**
     * 口コミ投稿確認画面
     */
    public function postConfirm (Request $request) {
        $formInfo  = $request->input('form_info');
        $confirm   = $request->input('confirm');
        $imageName = $request->input('image_name');
        $imagePath = $request->input('image_path');
        $keys      = array();


        if (isset($formInfo)) {
            if (isset($confirm)) {
                DB::beginTransaction();
                try {
                    $index = 0;
                    foreach ($formInfo as $key => $value) {
                        $keys[$index] = $key;
                        $index++;
                    }
                    if (isset($imageName)) {
                        self::createPost($formInfo[$keys[1]], $formInfo[$keys[5]], $formInfo[$keys[4]], $formInfo[$keys[2]], $formInfo[$keys[3]], $imageName, $imagePath);
                    } else {
                        self::createPost($formInfo[$keys[1]], $formInfo[$keys[5]], $formInfo[$keys[4]], $formInfo[$keys[2]], $formInfo[$keys[3]]);
                    }
                    self::updateRate($formInfo[$keys[0]]);
                    DB::commit();
                    $request->session()->forget('form_info');
                    $request->session()->regenerateToken();
                    return view('done_post');
                } catch (\Exception $e) {
                    DB::rollback();
                }
            } else {
                return view('post_confirm')->with('form_info', $formInfo);
            }
        }
        return view('not_post');
    }


    /**
     * 口コミ投稿処理
     *
     * @param query
     *
     */
    public function createPost($title, $storeName, $storeJName, $contents, $rate, $imageName = NULL, $imagePath = NULL) {
        $rate = (int) $rate;
        $instance = new Post;
        $instance->create([
            'title'           => $title,
            'store_name'      => $storeName,
            'store_jname'     => $storeJName,
            'contents'        => $contents,
            'rate'            => $rate,
            'img_name'        => $imageName,
            'img_path'        => $imagePath
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
        $denominator = 1;
        if (count($posts) != NULL) {
            $denominator = count($posts);
        }
        $rate = $rates / $denominator;
        $store = Store::where('id', $id)->first();
        $store->rate = $rate;
        $store->save();
    }

    /**
     * 画像仮保存処理
     *
     * @param file
     * @return int
     *
     */
    public function createProvisionalImage($image) {
        $instance = new ProvisionalImage;
        $id       = ProvisionalImage::latest()->orderBy('id', 'desc')->first()->id;
        $file     = array();
        if ($id == true) {
            $file['name'] = (int)$id+1 . '_' . $image->getClientOriginalName(); //id_file.png or .jpgになる
        } else {
            $file['name'] = 1 . '_' . $image->getClientOriginalName(); //id_file.png or .jpgになる
        }
        $file['path'] = 'storage/img/posts/';

        // データベースに画像の情報を保存
        $instance->create([
            'name'         => $file['name'],
            'path'         => $file['path'],
        ]);

        $image->storeAs('public/img/posts', $file['name']);

        return $file;
    }
}