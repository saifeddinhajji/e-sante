<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Commentaire;
use App\User;
use App\Forum;
class CommentaireController extends Controller
{
    public function addcomment(Request $request)
    {   
     
     $this->validate($request, [
      'content' => 'required|string',
                                ]);
                               
    
    $commentaire= new Commentaire;
        $commentaire->content=$request->input('content');
        $commentaire->user_id=Auth::user()->id;
        $commentaire->forum_id=$request->input('forum_id');
        $commentaire->save();

        
       
        session()->flash('success','la nouvelle commentaire a été enregistrer correctement!');
       return back()->withInput();
    }
    public function deletecomment($id)
    {   
     

        $Commentaire=Commentaire::findOrFail($id);
        if($Commentaire->user_id==Auth::user()->id)
       { $Commentaire->delete();}
       
       session()->flash('success','la commentaire supprimer avec succées');
       return back()->withInput();
    }

}
