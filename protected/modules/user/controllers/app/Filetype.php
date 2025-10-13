<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filetype extends Model
{
    protected $table = 'file_types';

    public function childFile()
    {
        return $this->hasMany('App\Filetype','parent_id');
    }
}
