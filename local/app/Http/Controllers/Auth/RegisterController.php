<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
  //  protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

  /*  protected function redirectTo()
{
    if(Auth::user()->role=="admin")
    return redirect('/admin');
elseif(Auth::user()->role=="patient")
    return redirect('/patient');
    else
    return redirect('/professionnel');
}
  */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:15'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'agree_terms_and_conditions' => ['required'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(\Illuminate\Http\Request  $data)
    {
       return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'role' =>$data['role'],
            'password' => Hash::make($data['password']),
        ]);
       
       
    }
    
    
        // validate the form 

      /*  $this->validator($request->all())->validate();

        // add the user
        $this->create($request);
        
        
        return redirect("/login");*/
        public function register(\Illuminate\Http\Request  $request)
    {
        $this->validator($request->all())->validate();

        $user=new User;
        $user->name = $request->input('name');
        $user->prenom = $request->input('prenom');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password =  Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('login')->with('success','Register successfully!');
   
    }
}
