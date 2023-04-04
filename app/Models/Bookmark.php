<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    public function user()
    {
        //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function spot()
    {
        //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Spot::class);
    }

}
