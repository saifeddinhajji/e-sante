<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','prenom','role','photoprofile','ville','civilite','codepostal','telephone','date_naissance'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
    public function forums(){
        return $this->hasMany('App\Forum');
      }
      public function likes(){
        return $this->hasMany('App\Like');
      }
    
      public function commentaires(){
        return $this->hasMany('App\Commentaire');
      } 
      protected static function boot() {
        parent::boot();

        // before delete() method call this
        static::deleting(function($user) { 
             $user->likes()->delete();
             $user->commentaires()->delete();
             $user->forums()->delete();  
                
        });
    }
           
}
