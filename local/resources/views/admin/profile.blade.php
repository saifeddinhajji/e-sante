
@extends('admin.layout.layout')
<style>
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
</style>
@section('content')
    <div class="content">
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        
                        <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                    
                        
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="/upload/profile/{{Auth::user()->photoprofile}}" alt="...">
                                
                                <h5 class="title">{{ auth()->user()->name}}</h5>
                            </a>
                            <p class="description">
                            @ <span style="color: red">{{auth()->user()->role}}</span>
                            </p>
                        </div>
                        <p class="description text-center">
                            Tunisie
                            <br>
                            @if(!empty(auth()->user()->ville))
                            {{ __(auth()->user()->ville)}}
                            @endif
                            <br>
                            @if(!empty(auth()->user()->codepostal))
                            {{ __(auth()->user()->codepostal)}}
                            @endif
                            <br>
                            @if(!empty(auth()->user()->telephone))
                            {{ __(auth()->user()->telephone)}}
                            @endif

                        </p>
                    </div>

                    
                </div>
                 
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">photo de profile</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="/upload/profile/{{Auth::user()->photoprofile}}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                   
                                    <div class="col-ms-10 col-10">
                                        <form action="{{route('changephotoprofile')}}"  enctype="multipart/form-data"  method="post">      
                                            @csrf 
                                            <input type='file' name="photoprofile"  accept="image/*"  style=" color: transparent;" required>
                                            
                                        <span>
                                            <button type="submit" class="float-left"  style="position: relative;
                                            left: 140px;top:-28px;height:27px;background-color:#F08080" ><i class="fas fa-cloud-upload-alt" ></i></button>
                                        </span>
                                        </form>
                                    </div>
                                   
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
               {{--<div class="card-footer">
                        
                <hr>
                
                <div class="button-container">
                    <div class="row">
                        
                              
                          
                            @if ($errors->has('photoprofile'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('photoprofile') }}</strong>
                                </span>
                            @endif
                           
                        </form>
                          
                    </div>
                </div>
            </div> --}}
            </div>
            <div class="col-md-8 ">
                <form class="col-md-12" action="{{route('updatedataadmin')}}" method="POST">
                    @csrf
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label > Nom</label>
                                    <input type="text" name="name"  value="{{Auth::user()->name}}"class="form-control">
                                    </div>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label > Prenom</label>
                                    <input type="text" name="prenom" value="{{Auth::user()->prenom}}" class="form-control">
                                    </div>
                                    @if ($errors->has('prenom'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                 @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label > Email</label>
                                    <input type="email" name="email"  value="{{Auth::user()->email}}"class="form-control">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label > Civilite</label>
                                        <select  name="civilite"  class="form-control">
                                            @if(Auth::user()->civilite=="madame")
                                            <option value="madame" selected>Madame</option>
                                            <option value="monsieur" >Monsieur</option>
                                            @else
                                            <option value="madame" >Madame</option>
                                            <option value="monsieur" selected>Monsieur</option>
                                            @endif
                                        </select>
                                    </div>
                                    @if ($errors->has('civilite'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('civilite') }}</strong>
                                    </span>
                                     @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label > date de naissance</label>
                                        <input type="date" name="date_naissance" value="{{ Carbon\Carbon::parse(Auth::user()->date_naissance)->format('Y-m-d')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label > Telephone</label>
                                    <input type="number" name="telephone"  value="{{Auth::user()->telephone}}"class="form-control">
                                    </div>
                                    @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label >ville </label>
                                    <select  name="ville"  class="form-control">
                                        <option value="{{Auth::user()->ville}}" selected >{{Auth::user()->ville}}</option>
                                            <option value="Gouvernorat de Tunis">Gouvernorat de Tunis</option>
                                            <option value="Gouvernorat de Sousse">Gouvernorat de Sousse</option>
                                            <option value="Gouvernorat de Sfax">Gouvernorat de Sfax</option>
                                            <option value="Gouvernorat de Kairouan">Gouvernorat de Kairouan</option>
                                            <option value="Gouvernorat de Bizerte">Gouvernorat de Bizerte</option>
                                    </select>
                                    </div>
                                    @if ($errors->has('ville'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
                                 @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label > Code Postal</label>
                                    
                                        <input value="{{Auth::user()->codepostal}}" type="number" name="codepostal" class="form-control" >
                                       
                                    </div>
                                    @if ($errors->has('codepostal'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('codepostal') }}</strong>
                                    </span>
                                 @endif
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round float-right">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Change Password') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection