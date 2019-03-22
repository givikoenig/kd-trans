<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';

    public function parent() {

        return $this->hasOne('App\Navigation', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Navigation', 'parent_id', 'id');

    }

}
