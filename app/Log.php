<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model{

    // ORMを利用して自動的に挿入する項目は記載する。
    protected $guarded = [
        'email',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'email','email');
    }

    public function scopeActive($query){
        $query->where('status', '=', 1)
            ->where('created_at', '>=', date("Y/m/d 00:00:00"));
    }
}
