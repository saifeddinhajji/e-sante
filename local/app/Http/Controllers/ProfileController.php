<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use Image;
use File;
use Auth;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
     auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
       
    }


    public function changedata(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string|email|max:255 ',
            'ville' =>'string'
                                      ]);
     auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
       
    }
    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */



    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }


    public function profile()
    {
        return view('profile.profilecommun');
    }



    public function changephotoprofile(Request $request)
    {

      $this->validate($request, [
            'photoprofile' => 'required|image|mimes:jpeg,png,jpg',   
          ]);
          $ancien=User::whereid(Auth::user()->id)->select('photoprofile')->first();
          if($request->hasFile('photoprofile'))
          {
            
            $logo = $request->file('photoprofile');

            $filename = time() . '.' . $logo->getClientOriginalExtension();

            Image::make($logo)->save( public_path('/upload/profile/' . $filename ));

            $user=User::whereid(Auth::user()->id)->update(['photoprofile' => $filename]);
            
            file::delete(public_path() . '/uploads/profile/'. $ancien);
            session()->flash('change_password_status','Votre  photo de profile à eté  modifier avec succées');
         
          }
         
          return back()->withInput(); 
          
    }
}
