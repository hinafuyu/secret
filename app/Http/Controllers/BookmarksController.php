<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends Controller
{
    //ブックマーク登録、解除
    public function like(Request $request) {

        //ステータスが0の時、DBへ保存
        if($request->input('likeSpot') == 0){

            $bookmarks = new Bookmark();
            $bookmarks->spot_id = $request->input('spot_id');
            $bookmarks->user_id = auth()->user()->id;
            $bookmarks->save();

        }
        
        //ステータスが1の時、DBから削除
        if($request->input('likeSpot') == 1){

            Bookmark::where('spot_id', "=", $request->input('spot_id'))
                ->where('user_id', "=", auth()->user()->id)
                ->delete();

        }

        return $request->input('likeSpot');
    }

    // bookmark.phpを表示
    public function bookmark() {

        //bookmarksテーブルからログインユーザーのIDのみ取得
        $bookmarks = Bookmark::all()->where('user_id', auth()->user()->id);

        return view('secret.bookmark', compact('bookmarks'));
    }
}
