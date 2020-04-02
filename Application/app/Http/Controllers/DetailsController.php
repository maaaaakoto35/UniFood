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
            $result = Post::where('store_name', $storeName)->first();
            $menus = Menu::where('store_name', $storeName)->get();
            $posts = Post::where('store_name', $storeName)->get();

            $view = 'detail/'.$storeName;
            // var_dump($result['id']);

            return view($view)->with('result', $result)
                              ->with('posts',  $posts)
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
            // var_dump($result['id']);

            return view($view)->with('result', $result);
        } else {
            return view('index');
        }
    }

}
