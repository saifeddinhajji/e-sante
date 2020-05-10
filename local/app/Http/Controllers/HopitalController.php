<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Hopital;
use App\User;
class HopitalController extends Controller
{
    public function showforumaddhopital()
    {
        return view('admin.formhopital');
    }
    public function addhopital(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
                                      ]);
                                      $hopital= new Hopital;
                                      $hopital->nom=$request->input('nom');
                                      $hopital->user_id=Auth::user()->id;
                                      $hopital->adresse=$request->input('adresse');
                                      $hopital->ville=$request->input('ville');
                                      $hopital->save();
                                      session()->flash('success','la nouvelle hopital a été enregistrer correctement!');
                                      return back()->withInput();
    }
    public function listhopital()
    {
        $listhopital=Hopital::paginate(8);
        return view('admin.listhopital')->with("allhopital",$listhopital);
    }
    public function deletehopital($id)
    {
        $hopital=Hopital::findOrFail($id);
        $hopital->delete();     
        session()->flash('success','la hopital supprimer avec succées');
        return back()->withInput();
      
    }
    public function showupdatehopital($id)
    {
        $hopital=Hopital::findOrFail($id);     
        return view('admin.updatehopital')->with('hopital',$hopital);
      
    }
  
    public function updatehopital(Request $request,$id)
    {
        $this->validate($request, [
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
                                      ]);
                                      $hopital=Hopital::findOrFail($id);;
                                      $hopital->nom=$request->input('nom');
                                      $hopital->user_id=Auth::user()->id;
                                      $hopital->adresse=$request->input('adresse');
                                      $hopital->ville=$request->input('ville');
                                      $hopital->save();
                                      session()->flash('success','la mise a jour de  hopital a été enregistrer correctement!');
                                      return back()->withInput();
    }
    public function searchhopital(Request $request)
    {
        $search=$request->input('search');
       
        $listhopital=Hopital::where('nom','like','%'.$search.'%')
        ->where('ville','like','%'.$search.'%')
        ->where('adresse','like','%'.$search.'%')
        ->paginate(8);
   

        return view('admin.listhopital')->with("allhopital",$listhopital);

    }
}
