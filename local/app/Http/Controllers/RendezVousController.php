<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Hoptial;
use App\Rendezvous;
class RendezVousController extends Controller
{

    public function showformrendezvous()
    {
        return view('patient.Ajouterrdv');
    }

    public function add(Request $request )
    {   
     
      $this->validate($request, [
      'date' => 'required|date',
      'hopital_id'=>'required',
      'description'=> 'string',
                               ]);

       // $post=Post::findOrFail($id);

       $Rendezvous= new Rendezvous;
        $Rendezvous->date=$request->input('date');
        $Rendezvous->user_id=Auth::user()->id;
        $Rendezvous->hopital_id=$request->input('hopital_id');
        $Rendezvous->description=$request->input('description');
        $Rendezvous->save();
       
       
        session()->flash('success','la nouvelle rendez-vous a été enregistrer correctement!');
       return back()->withInput();
      

    }

    public function mesrendezvous()
    {
       $count= Rendezvous::whereuser_id(Auth::user()->id)->count();
        if($count>0)
        {$mesrendezvous=Rendezvous::whereuser_id(Auth::user()->id)->paginate(8);
        return view('patient.listmesrdv')->with('mesrendezvous',$mesrendezvous);}
        else
        return  redirect('/patient/ajouter-rendez-vous');
        
    }
    public function deleterendezvous($id)
    {
        $rdv=Rendezvous::findOrFail($id);
        if(Auth::user()->id==$rdv->user_id ||Auth::user()->role=="admin")
        {
            $rdv->delete();
            session()->flash('success','le rendez-vous supprimer avec succées');
           
        }
        return back()->withInput();
    }

        public function find($id){
            $rdv=Rendezvous::findOrFail($id);
        if($rdv && $rdv->user_id==Auth::user()->id)
            {return view('patient.updaterdv')->with('rdv',$rdv);
            }
            else
            {
            return back()->withInput();
            
            }
    
   
}
    public function update(Request $request,$id)
    {   
     

       // $post=Post::findOrFail($id);

      $Rendezvous=Rendezvous::findOrFail($id);
     
        if($Rendezvous && $Rendezvous->user_id==Auth::user()->id)
        {
            $Rendezvous->date=$request->input('date');
            $Rendezvous->hopital_id=$request->input('hopital_id');
            $Rendezvous->description=$request->input('description');
            $Rendezvous->etat="atende";
            $Rendezvous->save();
      
            session()->flash('success','la mise a jour  de rendez-vous a été enregistrer correctement!');
            return back()->withInput();
        }
        else
        {
            session()->flash('error','cette action pas autoriser');
            return back()->withInput();
        }
       
      //  
      
     // dump($request);
    }

   
    public function etatrendezvous()
    {
        $this->validate($request, [
            'etat' => 'required|string',
              ]);
        $mesrendezvous=Rendzvous::whereetat($request->input('etat'))->get();
    }
    public function allrendezvous()
    {
        $allrdv=Rendezvous::orderBy('date', 'desc')->paginate(8);
        return view('admin.listrdv')->with('allrdv',$allrdv);
    }


    public function accepterdv($id){
        $rdv=Rendezvous::findOrFail($id);
                if($rdv)
            { 
                $rdv->etat="accepte";
                $rdv->save();
            }
        return back()->withInput();
   }
   public function refuserdv($id){
    $rdv=Rendezvous::findOrFail($id);
    if($rdv)
   { $rdv->etat="refuse";
    $rdv->save();}
    return back()->withInput();
   
   }
   public function searchrdv(Request $request)
   {
    
    $from=$request->input('min');
    $to=$request->input('max');
      $allrdv=Rendezvous::where('hopital_id',$request->input('hopital_id'))->where('etat',$request->input('etat'))->whereBetween('date', [$from, $to])->paginate(8);
      return view('admin.listrdv')->with('allrdv',$allrdv);
   }
}
