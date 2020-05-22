<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Store;
use App\Menu;
use App\Member;
use App\Access;

class StoresController extends Controller
{
    // =========index=========
    public function index(){
        if (!session()->has('visit')) {
            try {
                DB::beginTransaction();
                $name = '';
                if (session()->has('member_id')) {
                    $member = Member::where('member_id', session('member_id', null));
                    $name = $member['name'];
                } else {
                    $name = 'no_name';
                }
                $instance = new Access;
                $instance->create([
                    'name' => $name,
                ]);
                session(['visit' => true]);
                DB::commit();
            } catch (\Exception $th) {
                DB::rollback();
            }
        }
        $stores = Store::latest()->get();
        $sideList = [
            'UniFoodとは?',
            'マイページ',
            'ログイン',
            '口コミ投稿',
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
            'マイページ',
            'ログイン',
            '口コミ投稿',
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
            $query->where('store_jname', 'like', '%'.$keyword.'%');
            $result = $query->paginate(10);

            return view('search')->with('result', $result)
                                 ->with('keyword', $keyword)
                                 ->with('amount', count($result))
                                 ->with('button', 1);
        } elseif ($keyword = $request->input('menu')) {
            $query = Menu::query();
            $query->where('food_name', 'like', '%'.$keyword.'%');
            $result = $query->paginate(10);

            return view('search')->with('result', $result)
                                 ->with('keyword', $keyword)
                                 ->with('amount', count($result))
                                 ->with('button', 0);
        } else {
            $stores = Store::latest()->get();
            return view('search')->with('stores', $stores);
        }
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
