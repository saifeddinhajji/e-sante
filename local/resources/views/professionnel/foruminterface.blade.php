@extends('welcome.welcomelayout')
@section('body')
<section style="background-color: white;margin: 22px 10px 18px 10px;">
<div class="row" style="max-width: 100% !important;float:center">
    <div class="col-md-4" >
  
            
        @include('profile.slidbarprofile')
    </div>

    <div class="col-md-8"style="padding-top: 14px;" >
<div class="card" style="    background-color: #eef5f6;">
  <div class="card-body text-center">
   Demande Ajouter un nouveau forum
  </div>
</div>
<div  style="background-color:white;padding:5px"  style="height :100%"   >
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
     @endif
            <form  method="post" action="{{route('addforum')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Titre <sub style="font-size: xx-large;color:red;">*</sub></label>
                           <input type="text" name="titre" class="form-control" required>
                        </div>
                        @if ($errors->has('titre'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('titre') }}</strong>
                        </span>
                        @endif
                    </div>
                   

                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Sujet<sub style="font-size: xx-large;color:red;">*</sub> </label>
                            <input type="text" name="sujet" class="form-control" required>
                        </div>
                        @if ($errors->has('sujet'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('sujet') }}</strong>
                            </span>
                            @endif
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Url video  </label>
                            <input type="text"  name="urlvideo" class="form-control" >
                        </div>
                        @if ($errors->has('urlvideo'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('urlvideo') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Image </label>
                            <input type="file" name="image" class="form-control" >
                            @if ($errors->has('image'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                    
                        <div class="form-group">
                            <label >Description <sub style="font-size: xx-large;color:red;">*</sub></label>
                            <textarea class="form-control"  name="description" rows="5" required></textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>

                        
                    

                    
                    
                
               
                
                <button type="submit" style="float: right;" class="btn btn-primary">Ajouter Forum</button>
            </form>
            <br>
            <br>
            <br>
            
    </div>
    </div>
   
</div>

       
        
    
</div>
</section>
@endsection