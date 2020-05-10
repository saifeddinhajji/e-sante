<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires';
  
    protected $fillable =['content','user_id','forum_id'] ;
   //public    $timestamps->updated_at = false_id;
   
 
   public function user(){
      return $this->belongsTo('App\User');
      }
       public function forum(){
      return $this->belongsTo('App\Forum');
      }
}
