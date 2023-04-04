<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\Contact as ContactRequest;
use App\Models\User;

class ContactsController extends Controller
{
    /**
     * 
     * お問い合わせフォームを表示
     * contactsテーブルの全データを取得
     * 
     */
    public function admincontact() {
        //contactsデータを取得
        $contacts = Contact::all();

        //usersテーブルのデータを取得
        $users = User::all();

        return view('secret.adminList', compact('contacts', 'users'));
    }
    
    
    // contact.phpを表示
    public function contact(){
        return view('secret.contact');
    }

    //完了画面の表示
    public function complete() {
        return view('secret.complete');
    }

    //送信
    public function send(ContactRequest $request) {

        //バリデーション
        $data = $request->validate(['name', 'kana', 'email', 'kind', 'body']);

        //バリデーション済みデータの取得
        $data = $request->safe()->only(['name', 'kana', 'email', 'kind', 'body']);
        $data = $request->safe()->except(['name', 'kana', 'email', 'kind', 'body']);

        //submitの値により分岐
        $submit = $request->input('submit');
        switch($submit){
            case 'complete':
                //データを取得
                $data = [];
                $data = [
                    'name' => $request->post('name'),
                    'kana' => $request->post('kana'),
                    'email' => $request->post('email'),
                    'kind' => $request->post('kind'),
                    'body' => $request->post('body'),
                ];
                //値をDBへ保存する
                $contact = new Contact();
                $contact->name = $data['name'];
                $contact->kana = $data['kana'];
                $contact->email = $data['email'];
                $contact->kind = $data['kind'];
                $contact->body = $data['body'];
                $contact->timestamps = false;
                $contact->save();
                
                //保存した状態で完了画面へリダイレクト
                return to_route('secret.complete');
            break;
            case 'update':
                //データを取得
                $data = [];
                $data = [
                    'id' => $request->post('id'),
                    'name' => $request->post('name'),
                    'kana' => $request->post('kana'),
                    'email' => $request->post('email'),
                    'body' => $request->post('body'),
                ];
                //値をDBへ保存する
                $contact = Contact::find($data['id']);
                $contact->name = $data['name'];
                $contact->kana = $data['kana'];
                $contact->email = $data['email'];
                $contact->body = $data['body'];
                $contact->timestamps = false;
                $contact->save();

                //保存した状態で完了画面へリダイレクト
                return to_route('secret.update');
            break;
            default:
            //エラー
        }
    }

    //お問い合わせ削除機能
    public function delContact(Request $request, int $id) {

        // $idのデータを検索
        $contacts = Contact::find($id);
        $delete = $contacts->delete();

        //user情報を取得
        $users = User::all();

        //お問い合わせ情報を取得
        $contacts = Contact::all();
        return view('secret.adminList', ['id' => $id], compact('delete','users','contacts'));
    }

}
