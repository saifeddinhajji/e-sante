@extends('admin.layout.layout')

@section('content')

    <div class="content">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Hopitaux</a></li>
              <li class="breadcrumb-item active" aria-current="page">List de Rendez vous</li>
            </ol>
          </nav>
        <form action="{{route('searchrdv')}}" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Hopital</label>
                            <select name="hopital_id" class="form-control" >
                                    @foreach(DB::table('hopitals')->get() as $hopital)
                                    @if($loop->index==0)
                                    <option value="{{$hopital->id}}" selected>{{$hopital->nom}}</option>
                                    @endif
                                    <option value="{{$hopital->id}}" >{{$hopital->nom}}</option>
                                @endforeach 
                            </select>    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label >Etat</label>
                                <select name="etat" class="form-control" >
                                    <option value="accepte" selected>accepte</option>
                                    <option value="refuse">refuse</option>
                                    <option value="atende">attende</option>
                                </select>
                        </div>
                    </div>
                    @php
                    $date=Carbon\Carbon::now();
                @endphp
                    <div class="col-md-3">
                        <div class="form-group">
                        <label >min date</label>
                        <input type="date" name="min" value="{{Carbon\Carbon::parse("2018-0-0")->format('Y-m-d')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                           
                        <label >max date </label>
                        <input type="date" name="max"   value="{{Carbon\Carbon::parse($date)->format('Y-m-d')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="" style="color:white">.</label>
                            <button type="submit" class="form-control"><i class="fas fa-search"></i></button>
                        </div>
                    </div> 
                </div>
          </form>
         <br>
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                           <div class="alert alert-success alert-block">
                               <button type="button" class="close" data-dismiss="alert">×</button>	
                                   <strong>{{ $message }}</strong>
                           </div>
                           @endif
                <div class="card">
                  
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nom de patient
                                    </th>
                                    <th>
                                        Nom de hopital
                                    </th>
                                    <th>
                                    adresse
                                    </th>
                                    <th >
                                        date
                                    </th>
                                    <th>etat</th>
                                    
                                    <th>...</th>
                                </thead>
                                <tbody>
                                    @if(!empty($allrdv))
                                            @foreach ($allrdv as $rdv)  
                                            <tr>
                                                <td>
                                                    <img src="/upload/profile/{{DB::table('users')->where('id',$rdv->user_id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image"
                                                    style="width:30px;border-radius:50%">
                                                    {{DB::table('users')->where('id',$rdv->user_id)->select('name')->value('name')}}
                                                </td>
                                                <td>
                                                    {{DB::table('hopitals')->where('id',$rdv->hopital_id)->select('nom')->value('nom')}}
                                                </td>
                                                <td>
                                                    {{DB::table('hopitals')->where('id',$rdv->hopital_id)->select('adresse')->value('adresse')}}
                                                </td>
                                                <td >
                                                  {{ Carbon\Carbon::parse($rdv->date)->format('Y-m-d')}}
                                                </td>
                                                <td>
                                                    @if($rdv->etat=="atende")
                                                    <div style="color: #0000FF">{{$rdv->etat}}</div>
                                                    @endif
                                                    @if($rdv->etat=="refuse")
                                                    <div style="color:red">{{$rdv->etat}}</div>
                                                    @endif
                                                    @if($rdv->etat=="accepte")
                                                    <div style="color:#00FF00">{{$rdv->etat}}</div>
                                                    @endif
                                                </td>
                                                <td >
                                                    @if($rdv->etat=="atende")
                                                    <a href="{{route('accepterdv',$rdv->id)}}"> <i class="fas fa-check-square" style="font-weight: 600;color:#008000"></i></a>
                                                    <a href="{{route('refuserdv',$rdv->id)}}">   <i class="fas fa-minus-circle" style="font-weight: 600;color:red"></i></a>
                                                    @endif
                                                    @if($rdv->etat=="refuse")
                                                    <a href="{{route('accepterdv',$rdv->id)}}"> <i class="fas fa-check-square" style="font-weight: 600;color:#008000"></i></a>
                                                    @endif
                                                    @if($rdv->etat=="accepte") 
                                                    <a href="{{route('refuserdv',$rdv->id)}}">   <i class="fas fa-minus-circle" style="font-weight: 600;color:red"></i></a>
                                                    @endif

                                                <a href="{{route('admindeleterdv',$rdv->id)}}"> <i class="fas fa-trash-alt" style="font-weight: 600;color:red"></i></a>
                            
                                                </td>
                                              </tr>
                                             @endforeach
                              
                                @else
                                <tr>
                               
                                <td>
                                <p style="color: red">aucun  hopital</p>

                              </td>
                               </tr>
                               @endif

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class=" col-sm-12 ">
            <p style="text-center">    {{$allrdv->links()}}</p>
        </div>
         
    </div>
    
@endsection
