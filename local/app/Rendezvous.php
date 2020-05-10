<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $table = 'rendezvous';
  
    protected $fillable =['date','user_id','etat','hoptial_id','description'] ;
   //public    $timestamps->updated_at = false;
   
 
   public function user(){
      return $this->belongsTo('App\User');
      }
      public function hoptial(){
        return $this->belongsTo('App\Hopital');
        }
}
