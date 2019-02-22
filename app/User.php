<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    /**
     * UserクラスとLogクラスは1対多の関係
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs(){
        return $this->hasmany('App\Log');
    }
}
