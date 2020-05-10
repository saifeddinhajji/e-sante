@extends('welcome.welcomelayout')
@section('body')
<section class=contanier style="background-color: white;margin: 22px 10px 18px 10px;">
  <div class="row" style="max-width: 100% !important;float:center">
            <div class="col-md-4" >
              @include('profile.slidbarprofile')
            </div>
            <div class="col-md-4" style="background-color:white; border-radius:30px; margin-bottom:10px;">
              @php
              if(Auth::user()->role=="patient")
              {
                $action="updateprofilepat";
              }
              else{
                $action="updateprofilepro";
              }
              @endphp
                <form  method="post" action="{{route($action)}}">
                  @csrf
                      <div class="form-group">
                          <label >Nom <sub style="font-size: xx-large;color:red;">*</sub></label>
                          <input type="text" class="form-control"  name="name" value="{{Auth::user()->name}}" placeholder="Nom" required>
                          @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $errors->first('name') }}</strong>
                          </span>
                         @endif 
                      </div>
                      <div class="form-group">
                        <label >Prenom <sub style="font-size: xx-large;color:red;">*</sub></label>
                        <input type="text" class="form-control" name="prenom" value="{{Auth::user()->prenom}}" placeholder="Prenom">
                        @if ($errors->has('photoprofile'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $errors->first('photoprofile') }}</strong>
                        </span>
                       @endif 
                      </div>
                    <div class="form-group">
                      <label >Email <sub style="font-size: xx-large;color:red;">*</sub></label>
                      <input type="email" class="form-control" name="email"  value="{{Auth::user()->email}}"  placeholder="name@example.com" required>
                      @if ($errors->has('photoprofile'))
                      <span class="invalid-feedback" role="alert">
                          <strong class="text-danger">{{ $errors->first('photoprofile') }}</strong>
                      </span>
                       @endif 
                    </div>
                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label >Numméro de telephone </label>
                              <input type="number" name="telephone"  value="{{Auth::user()->telephone}}" class="form-control"  placeholder="(+216) -- --- ---">
                              @if ($errors->has('telephone'))
                              <span class="invalid-feedback" role="alert">
                                  <strong class="text-danger">{{ $errors->first('telephone') }}</strong>
                              </span>
                              @endif 
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                            <label >CodePostal </label>
                           <input type="number" name="codepostal"  value="{{Auth::user()->codepostal}}"class="form-control">
                           </div>
                     
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-md-6"> 
                          <div class="form-group">
                             <label  >civilité</label>
                              <select  name="civilite" class="form-control" >
                                    @if(Auth::user()->civilite)
                                  <option value="{{Auth::user()->civilite}}" selected>{{Auth::user()->civilite}}</option>
                                  @endif
                                  <option value="madame">Madame</option>
                                  <option value="monsieur">Monsieur</option>
      
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6"> 
                          <div class="form-group">
                            <label >Ville</label>
                            <select name="ville"   class="form-control" >
                              @if(Auth::user()->ville)
                              <option value="{{Auth::user()->ville}}" selected>{{Auth::user()->ville}}</option>
                              @endif
                              <option value="Gouvernorat de Tunis">Gouvernorat de Tunis</option>
                              <option value="Gouvernorat de Sousse">Gouvernorat de Sousse</option>
                              <option value="Gouvernorat de Sfax">Gouvernorat de Sfax</option>
                              <option value="Gouvernorat de Kairouan">Gouvernorat de Kairouan</option>
                              <option value="Gouvernorat de Bizerte">Gouvernorat de Bizerte</option>
    
                            </select>
                          </div>
                        </div>
                      </div>
                     

                       
                      <div class="form-group">
                            <label >Date de nassiance</label>
                            <input type="date" name="date_naissance" value="{{ Carbon\Carbon::parse(Auth::user()->date_naissance)->format('Y-m-d')}}" class="form-control">
                                
                          </select>
                      </div>
                      <button type="submit" style="position: relative; float: right;top: -12px; border-radius: 22px;" class="btn btn-primary">Mise Ajour</button>
                </form>
              
            </div>

            <div class="col-md-4"  style="border-radius: 3px ;">
                  <img src="/upload/profile/{{Auth::user()->photoprofile}}"  alt="" class="rounded-circle avatar border-gray" style="width: 120px">
                      <form  method="post" enctype="multipart/form-data" action="{{route('changephotoprofile')}}">
                          @if (session('change_password_status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('change_password_status') }}
                                </div>
                            @endif
                      
                          @csrf
                        
                         
                        <div class="form-group">
                          <button type="submit" style="left: 136px;
                          position: relative;
                          top: 29px;" ><i class="fas fa-cloud-upload-alt" ></i></button>
                            <input type="file" name="photoprofile" class="form-control-file" accept="image/*" style="color:transparent; " required>


                            <p>
                              <small>Upload file in
                                  <code>png</code>,<code>jpg</code>,<code>jpeg</code>format</small>
                              </p>   
                              @if ($errors->has('photoprofile'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong class="text-danger">{{ $errors->first('photoprofile') }}</strong>
                                  </span>
                              @endif   
                        </div>

                      </form>
                 <hr>

                <form action="{{ route('profile.password') }}" method="POST"  >
                          @if (session('password_status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('password_status') }}
                            </div>
                          @endif
                      @csrf
                      @method('PUT')
                        <div class="form-group">
                            <label >ancien mot de passe  </label>
                            <input type="password" name="old_password" class="form-control" >
                                              @if ($errors->has('old_password'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('old_password') }}</strong>
                                                    </span>
                                                @endif
                        </div>
                        <div class="form-group">
                          <label >nouveau mot de passe</label>
                          <input type="password" name ="password" class="form-control"  >
                          @if ($errors->has('password'))
                          <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif
                        </div>
                      <div class="form-group">
                        <label >confirmation nouveau mot de passe</label>
                        <input type="password" name ="password_confirmation" class="form-control"  >
                              @if ($errors->has('password_confirmation'))
                              <span class="invalid-feedback" style="display: block;" role="alert">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                              @endif
                      </div>
                      <button type="submit" style="position: relative; float: right; border-radius: 22px;" class="btn btn-primary">Mise Ajour</button>  
                  </form>
              
                
            </div>

  </div>
</section>
@endsection