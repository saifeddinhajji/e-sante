<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';
  
    //  protected $fillable =['name','body'] ;
    //  public    $timestamps = false;
    protected $fillable = ['titre', 'sujet','description','urlvideo','image', 'user_id','etat'];
  
    public function user(){
       return $this->belongsTo('App\User');
       }
       public function commentaires(){
        return $this->hasMany('App\Commentaire');
      }
      public function likes(){
        return $this->hasMany('App\Like');
      }
      protected static function boot() {
        parent::boot();

        // before delete() method call this
        static::deleting(function($forum) { 
             $forum->likes()->delete();
             $forum->commentaires()->delete(); 
                
        });
    }

}
