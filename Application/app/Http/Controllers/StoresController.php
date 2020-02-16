<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoresController extends Controller
{
    // =========index=========
    public function index(){
        $stores = Store::latest()->get();
        $side_list = [
            'UniFoodとは?',
            '学食検索',
            '無料会員登録',
            '口コミ投稿',
            'ログイン',
        ];
        return view('index')->with('stores', $stores)
                            ->with('side_list', $side_list);
    }

    // =========detail=========
    public function detail(Request $store_name){
        //
    }
    // =========add_store=========
    public function add_store(Request $store_list){
        $store = new Store;

        $store->store_name = $store_list['store_name'];
        $store->foods = $store_list['foods'];
        $store->place = $store_list['place'];

        if($store->save()){
            return view('store.add_store')->with('is_register', true);
        } else {
            return view('store.add_store')->with('is_register', false);
        }
    }
}
