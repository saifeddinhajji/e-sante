<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{ 
    protected $table = 'likes';
  
    protected $fillable =['user_id','forum_id','like'] ;
   //public    $timestamps->updated_at = false;
   
    public function user(){
        return $this->belongsTo('App\User');
        }
        public function forum(){
        return $this->belongsTo('App\Forum');
        }
}
