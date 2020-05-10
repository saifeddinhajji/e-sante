@extends('welcome.welcomelayout')
@section('body')
<section style="background-color: white;margin: 22px 10px 18px 10px;">
<div class="row" style="max-width: 100% !important;float:center">
    <div class="col-md-4" >
  
            
        @include('profile.slidbarprofile')
    </div>
    <div class="col-md-8" style="padding-top: 14px;">
        <div class="card" style="    background-color: #eef5f6;">
            <div class="card-body text-center">
             Ajouter un Rendez-vous
            </div>
          </div>

        <div  style="background-color:white;padding:5px"  style="height :100%">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
        <form action="{{route('updaterdv',$rdv->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            
                            <label >Date Rendez-vous <sub style="font-size: xx-large;color:red;">*</sub></sub></label>
                        <input type="datetime-local" name="date" value="{{ Carbon\Carbon::parse($rdv->date)->format('Y-m-d\TH:i')}}"  class="form-control" required>
                           @if ($errors->has('date'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
               
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Hopital <sub style="font-size: xx-large;color:red;">*</sub></label>
                            <select  class="form-control"  name="hopital_id"  required>
                                @foreach(DB::table('hopitals')->select('nom','id')->get() as $hopital )
                                <option value="{{$hopital->id}}" >{{$hopital->nom}}</option>
                                @if($rdv->hopital_id== $hopital->id)
                                <option value="{{$hopital->id}}" selected >{{$hopital->nom}}</option>
                            @endif
                                   
                                  
                                @endforeach
                            </select>
                            
                            @if ($errors->has('hopital_id'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('hopital_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <label >Description </label>
                            
                        <textarea name="description" id="" cols="30" rows="3"  placeholder="{{$rdv->description}}"class="form-control">{{$rdv->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>
               
                
                <button type="submit" style="float: right;" class="btn btn-primary">Ajouter Rendez-vous</button>
            </form>
            <br>
            <br>
            <br>
            
    </div>
    </div>
   
</div>
@php
   function getDateEndAttribute($value)
    {
        return Carbon\Carbon::parse($value)->format('Y-m-d\TH:i');
    }
  
@endphp
       


</div>
</section>
@endsection