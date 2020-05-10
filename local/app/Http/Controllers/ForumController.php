<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Image;
use File;
use Response;
use DB;
use App\Forum;
use App\User;

class ForumController extends Controller
{
    /*********************************affiche le formulaire d'ajout un demande nouvel forum*********************/
    public function showForum()
    {
        return view('professionnel.foruminterface');
    }
     /*********************************ajout un demande nouvel forum*********************/
    public function addforum(Request $request)
    {   
     
     $this->validate($request, [
      'titre' => 'required|string',
      'sujet' => 'required|string',
      'description' =>'required|string|',
      'image' => ['image','mimes:jpeg,png,jpg,tiff|max:2048'],
      
                                ]);
                                $filename='';
                                if($request->hasFile('image')){
            
                                    $image = $request->file('image');
                                    $filename = time() . '.' . $image->getClientOriginalExtension();
                                    Image::make($image)->save( public_path('/upload/forum/' . $filename ) );
                                }

    if($filename)
        {
            $forum= new Forum;
            $forum->titre=$request->input('titre');
            $forum->sujet=$request->input('sujet');
            $forum->description=$request->input('description');
            $forum->user_id=Auth::user()->id;
            $forum->urlvideo=$request->input('urlvideo');
            $forum->image=$filename;
            $forum->etat=="entende";
            $forum->user_id=Auth::user()->id;
            $forum->save();
            session()->flash('success','la nouvelle forum a été enregistrer correctement!');
        }
        else{
            $forum= new Forum;
            $forum->titre=$request->input('titre');
            $forum->sujet=$request->input('sujet');
            $forum->description=$request->input('description');
            $forum->user_id=Auth::user()->id;
            $forum->urlvideo=$request->input('urlvideo');
            $forum->user_id=Auth::user()->id;
            $forum->save();
            session()->flash('success','la nouvelle forum a été enregistrer correctement!');
        }
        
       
       
       return back()->withInput();
     
    }
    
public function detailforumprof($id)
{
    $forum=Forum::findOrFail($id);
    return view('professionnel.detailforum')->with('forum',$forum);  
}
    /*Route::get('listforum','ForumController@listforum')->name('listforum');
			Route::get('listforumrefuse','ForumController@listforumrefuse')->name('listforumrefuse');
			Route::get('listforumaccepte','ForumController@listforumaccepte')->name('listforumaccepte');
			Route::get('listforumentende','ForumController@listforumentende')->name('listforumentende');
			Route::post('serachforum','ForumController@serachforum')->name('serachforum');
            Route::get('deleteforum/{id}','ForumController@deleteforum')->name('deleteforum');*/
 
             /********************************gestion de forum partie administrative*********************/
                            public function listforum()
                            {
                                $allforum=Forum::paginate(8);
                                return view('admin.listforum')->with("allforum",$allforum);
                            }
      
                                public function listforumaccepte()
                                {
                                    $allforum=Forum::whereetat('accepte')
                                    ->paginate(8);
                                    return view('admin.listforumaccepte')->with("allforum",$allforum);
                                }
                                public function listforumatende()
                                {
                                    $allforum=Forum::whereetat('atende')
                                    ->paginate(8);
                                    return view('admin.listforumatende')->with("allforum",$allforum);
                                }
                                public function listforumrefuse()
                                {
                                    $allforum=Forum::whereetat('refuse')
                                    ->paginate(8);
                                    return view('admin.listforumrefuse')->with("allforum",$allforum);
                                }
                                public function detailforum($id){
                                    $forum=Forum::findOrFail($id);
                                    return view('admin.detailforum')->with('forum',$forum);
                                                                    }

                               public function deleteforum($id)
                                  {   
                                    
                                    $forum=Forum::findOrFail($id);
                                    if($forum && ($forum->user_id==Auth::user()->id ||Auth::user()->role=="admin"))
                                        {  $forum->delete();
                                            session()->flash('success',' la forum supprimer avec succées');
                                        
                                        }
                                        return back()->withInput();
                                  
                                }
                                   public function accepteforum($id){
                                        $forum=Forum::findOrFail($id);
                                                if($forum)
                                            { 
                                                $forum->etat="accepte";
                                                $forum->save();
                                            }
                                        return back()->withInput();
                                   }
                                   public function refuseforum($id){
                                    $forum=Forum::findOrFail($id);
                                    if($forum)
                                   { $forum->etat="refuse";
                                    $forum->save();}
                                    return back()->withInput();
                                   
                                   }
                                   public function entendeforum($id){
                                    $forum=Forum::findOrFail($id);
                                    if($forum)
                                   { $forum->etat="entende";
                                    $forum->save();}
                                    return back()->withInput();
                                   
                                   }
 /********************************serach  forum*********************/
            public function serachforum(Request $request)
            {
               $search=$request->input('search');
                 $etat=$request->input('etat');
                $pagename=$request->input('pagename');
                $allforum="";
                if($etat=="")
                    {
                        $allforum=Forum::where('titre','like','%'.$search.'%')
                                    ->orwhere('sujet','like','%'.$search.'%')
                                    ->orwhere('description','like','%'.$search.'%')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(8);
                                             
                    }
                     else {
                        $allforum=Forum::where('titre','like','%'.$search.'%')                    
                        ->where('etat',$etat) 
                        ->orderBy('created_at', 'desc')
                        
                        ->paginate(8);
                      
                       
                    }
                    
           return view($pagename)->with("allforum",$allforum);
               

            }
            /********************************************prof******************************************/
            
          /********************************************************************************************** */

    public function updateforum(Request $request ,$id)
    { 
        $forum=Forum::findOrFail($id);
        if($forum && $forum->user_id==Auth::user()->id)
       {
        $forum->titre=$request->input('titre');
        $forum->sujet=$request->input('sujet');
        $forum->description=$request->input('description');
        $forum->etat="atende";
        $forum->user_id=Auth::user()->id;
        $forum->save();
        session()->flash('success','la mise a jour  de forum a été enregistrer correctement!');
        return back()->withInput();
    }
    else
    {
        session()->flash('error','cette action pas autoriser');
        return back()->withInput();
    }
       
    }
  
    public function mesforum(){
        $count= Forum::whereuser_id(Auth::user()->id)->count();
        if($count>0)
       {
            $mesforum=Forum::whereuser_id(Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
           return view('professionnel.listmesforum')->with('mesforum',$mesforum);
       }
    else
       { return  redirect('/professionnel/demandeajouteforum');}
    }

    public function find($id){
        $forum=Forum::findOrFail($id);
    if($forum && $forum->user_id==Auth::user()->id)
        {return view('professionnel.updateforum')->with('forum',$forum);
        }
        else
        {
        return back()->withInput();
        
        }
    }
    public function showallforum()
    {
        $allforum=Forum::where('etat','accepte')
           ->paginate(9);
        return view('professionnel.forums')->with("allforum",$allforum);
    }
}
