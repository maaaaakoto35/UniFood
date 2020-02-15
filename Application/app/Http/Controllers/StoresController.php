<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoresController extends Controller
{
    // =========index=========
    public function index(){
        $stores = Store::latest()->get();
        return view('store.index')->with('stores', $stores);
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
