<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Like;
use DB;
class LikeController extends Controller
{
  public function addlike($id){
    //find like
    $like=Like::where('forum_id', $id)
    ->where('user_id', Auth::user()->id)
    ->first();
    
    if(!$like)
    {
     $newlike= new Like;
     $newlike->forum_id=$id;
     $newlike->user_id= Auth::user()->id;
     $newlike->like=1;
     $newlike->save();
    
    }

    elseif($like->like == 0)
    {
      $like->like=1;
      $like->save();
    }
    return redirect()->route('detailforumprof',$id);
       
  }
  public function adddislike($id){

        //find like
        $like=Like::where('forum_id', $id)
        ->where('user_id', Auth::user()->id)
        ->first();
       
        if(!$like)
        {
         $newlike= new Like;
         $newlike->forum_id=$id;
         $newlike->user_id= Auth::user()->id;
         $newlike->like=0;
         $newlike->save();
         
        }
    
        elseif($like->like == 1)
        {
            $like->like=0;
            $like->save();
           

        }
      
        return redirect()->route('detailforumprof',$id);
           
        }
}
