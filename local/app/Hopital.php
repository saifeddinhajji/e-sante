<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    protected $table = 'hopitals';
  
    protected $fillable =['user_id','nom','adresse','ville'] ;

    public function Rendezvous(){
        return $this->hasMany('App\Rendezvous ');
      }
      protected static function boot() {
        parent::boot();

        // before delete() method call this
        static::deleting(function($hoptial) { 
                          $hoptial->Rendezvous()->delete(); 
                
        });
    }
    
}
