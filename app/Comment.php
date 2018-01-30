<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
        public function user(){
    	return $this->belongsTo('Corp\User');
    }
        public function articles(){
    	return $this->belongsTo('Corp\Article');
    }
}
