<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Menu;

class DetailsController extends Controller
{
    // =========index=========
    public function index (Request $request){
        if($storeName = $request->input('value')) {
            $query = Store::query();
            $query->where('store_name', '=', $storeName);
            $result = $query->first();

            $query2 = Menu::query();
            $query2->where('store_name', '=', $storeName);
            $menus = $query2->get();

            $view = 'detail/'.$storeName;
            // var_dump($result['id']);

            return view($view)->with('result', $result)
                              ->with('menus', $menus);
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
