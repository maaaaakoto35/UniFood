<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Menu;
use App\Post;

class DetailsController extends Controller
{
    // =========index=========
    public function index (Request $request){
        if($storeName = $request->input('value')) {
            $result = Store::where('store_name', $storeName)->first();
            $menus  = Menu::where('store_name', $storeName)->get();
            $posts  = Post::where('store_name', $storeName)->get();
            $star   = NULL;

            $view = 'detail/'.$storeName;

            //rateを百分率に変換
            if (isset($result["rate"])) {
                $star = $result["rate"] * 20;
            }

            return view($view)->with('result', $result)
                              ->with('posts',  $posts)
                              ->with('star',  $star)
                              ->with('menus',  $menus);
        } else {
            return view('index');
        }
    }

    // =========storeShow=========
    public function storeShow (Request $request){
        if($storeName = $request->input('value')) {
            $query = Store::query();
            $query->where('store_name', '=', $storeName);
            $result = $query->first();
            $view = 'detail/'.$storeName;

            return view($view)->with('result', $result);
        } else {
            return view('index');
        }
    }

}
