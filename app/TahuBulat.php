<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahuBulat extends Model
{
    
 public function pengguna(){
    	return $this->belongsTo('App\User');
    }
}
