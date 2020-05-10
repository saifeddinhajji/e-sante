@extends('admin.layout.layout')
<!---->

@section('content')
    <div class="content">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Hopital</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ajouter hopital</li>
            </ol>
          </nav>
       <div class="card" style="padding: 10px">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
        <form method="POST" action="{{route('addhopital')}}">
            @csrf
            <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                <label >Nom</label>
                <input type="text"  name="nom" class="form-control"  placeholder="nom">
                    @if ($errors->has('nom'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
               {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label f>ville</label>
                <input type="text" name="ville" class="form-control"  placeholder="ville">
                @if ($errors->has('ville'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
                                @endif
                </div>
            </div>
       
        </div>
        <div class="form-group">
            <label >Adresse</label>
            <input type="text" name="adresse" class="form-control"  placeholder="adresse">
            @if ($errors->has('adresse'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
           {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
            </div>
            <button type="submit" class="btn btn-primary " style="float: right">Ajouter</button>
          </form>
        </div>
    </div>
   
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush