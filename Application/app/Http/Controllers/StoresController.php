<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Store;

class StoresController extends Controller
{
    // =========index=========
    public function index(){
        $stores = Store::latest()->get();
        $sideList = [
            'UniFoodとは?',
            '学食検索',
            '無料会員登録',
            '口コミ投稿',
            'ログイン',
        ];
        return view('index')->with('stores', $stores)
                            ->with('side_list', $sideList)
                            ->with('is_store', null)
                            ->with('result', null);
    }

    // =========isStore=========
    public function isStore(Request $request){
        $stores = Store::latest()->get();
        $sideList = [
            'UniFoodとは?',
            '学食検索',
            '無料会員登録',
            '口コミ投稿',
            'ログイン',
        ];

        $isStore = $request->input('id');
        if ($isStore == 1) {
            return view('index')->with('is_store', 1)
                                ->with('stores', $stores)
                                ->with('side_list', $sideList);
        } elseif ($isStore == 0) {
            return view('index')->with('is_store', 0)
                                ->with('stores', $stores)
                                ->with('side_list', $sideList);
        }
    }

    // =========search=========
    public function search(Request $request){
        if ($keyword = $request->input('store')) {
            $query = Store::query();
            $query->where('store_name', 'like', '%'.$keyword.'%');
            $result = $query->paginate(10);

            return view('search')->with('result', $result)
                                 ->with('keyword', $keyword)
                                 ->with('button', 'store');
        } elseif ($keyword = $request->input('menu')) {
            $query = Store::query();
            $query->where('store_name', 'like', '%'.$keyword.'%');
            $result = $query->paginate(10);

            return view('search')->with('result', $result)
                                 ->with('keyword', $keyword)
                                 ->with('button', 'meny');
        } else {
            $stores = Store::latest()->get();
            return view('search')->with('stores', $stores);
        }

        return view('search')->with('result', $result)
                             ->with('keyword', $keyword);
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
