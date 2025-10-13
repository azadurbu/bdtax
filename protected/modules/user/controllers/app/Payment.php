<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function assignTo()
    {
        return $this->belongsTo('App\User','assign_to');
    }
}
