<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFilesStatusHistory extends Model
{
	protected $table = 'user_files_status_history';
    public $timestamps = false;

    public function userreferto()
    {
        return $this->belongsTo('App\User','refer_to');
    }

    public function userupdatedby()
    {
        return $this->belongsTo('App\User','updated_by');
    }

}
