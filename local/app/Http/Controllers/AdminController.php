<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    public function index()
    {
        return view('admin.dashboard');
    }

        public function profile()
        {
        return view('admin.profile');
        }
    public function allpatient()
    {
        $patients= $allpatient=User::where('role','patient')
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        
         return view('admin.allpatient', ['allpatient' => $allpatient]);
    }


    public function alladmin()
    {

          $alladmin=User::where('role','admin')
        ->orderBy('created_at', 'desc')
        ->paginate(15);
        
         return view('admin.alladmin', ['alladmin' => $alladmin]);
    }


    public function allprofessionnel()
    {

          $allprofessionnel=User::where('role','professionnel')
        ->orderBy('created_at', 'desc')
        ->paginate(15);
        
        return view('admin.allprofessionnel', ['allprofessionnel' => $allprofessionnel]);
    }



    public function deletecompte($id)
    {
                    
            $user = User::find($id);    
            $user->delete();
            session()->flash('success', "l'utilisateur a été supprimé avec succès");
            return back()->withInput();
    }
    public function search(Request $request)
    {
        $search=$request->input('search');
        $role=$request->input('role');
        

        $alluser=User::where('role',$role)
        ->where('email','like','%'.$search.'%')
        ->orwhere('name','like','%'.$search.'%')
        ->where('prenom','like','%'.$search.'%')
        ->paginate(8);
    
       if($role=="patient")
        {
            return view('admin.allpatient', ['allpatient' => $alluser]);
        }
        else if($role=="admin")
        {
            return view('admin.alladmin', ['alladmin' => $alluser]);
        }
        else {
            return view('admin.allprofessionnel', ['allprofessionnel' => $alluser]);
        }
    }

}
