<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function folder(){
        return $this->belongsTo('App\Folder');
    }
}
