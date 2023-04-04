<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Spot;
use App\Models\Spot as ModelsSpot;
use App\Http\Models\User;
use App\Models\User as ModelsUser;
use App\Http\Models\Bookmark;
use App\Models\User as ModelsBookmark;

use Illuminate\Support\Facades\Auth;

class SpotsController extends Controller
{
    //main.blade.phpを表示する
    public function index() {

        //Spotsテーブルから観光地の一覧を取得
        $spots = ModelsSpot::all()->where('role', 0);

        return view('secret.main', compact('spots'));
    }

    //mainP.blade.phpを表示する
    public function indexP() {

        //Spotsテーブルから観光地の一覧を取得
        $spots = ModelsSpot::all()->where('role', 0);

        //いいねの数
        $reviews = ModelsSpot::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        $param = [
            'reviews' => $reviews,
        ];

        return view('secret.mainP', compact('spots', 'param'));
    }

    //mainA.blade.phpを表示する
    public function indexA() {

        //Spotsテーブルから観光地の一覧を取得
        $spots = ModelsSpot::all()->where('role', 0);

        return view('secret.mainA', compact('spots'));
    }

    //secret.blade.phpを表示する
    public function secret() {

        //Spotsテーブルから観光地の一覧を取得
        $spots = ModelsSpot::all()->where('role', 1);

        return view('secret.secret', compact('spots'));
    }

    //secretP.blade.phpを表示する
    public function secretP() {

        //Spotsテーブルから観光地の一覧を取得
        $spots = ModelsSpot::all()->where('role', 1);

        return view('secret.secretP', compact('spots'));
    }

    //secretA.blade.phpを表示する
    public function secretA() {

        //Spotsテーブルから観光地の一覧を取得
        $spots = ModelsSpot::all()->where('role', 1);

        return view('secret.secretA', compact('spots'));
    }

    // ログイン後に必要になる情報の取得
    public function showUser() {

        //ユーザー情報の取得
        $users = Auth::user();

        //roleの取得
        $role = $users['role'];

        //roleの値で分岐
        if($role == 0){
            return to_route('indexP');
        }
        if($role == 1){
            return to_route('indexA');
        }
        
    }

    
}
