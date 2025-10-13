<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function assignTo()
    {
        return $this->belongsTo('App\User','assign_to');
    }
}
