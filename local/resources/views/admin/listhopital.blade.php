@extends('admin.layout.layout')

@section('content')

    <div class="content">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Hopitaux</a></li>
              <li class="breadcrumb-item active" aria-current="page">List hopitaux</li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-md-9">
                  
             </div>
             <div class="col-md-3">
             <form action="{{route('searchhopital')}}" method="POST">  @csrf <input class="form-control left" name="search" type="text" placeholder="(nom,ville,adresse....)" aria-label="Search">      </form> 
             </div>
             <br>
  </div>
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
                                        Nom
                                    </th>
                                    <th>
                                        ville
                                    </th>
                                    <th>
                                    adresse
                                    </th>
                                   
                                    <th >
                                        NBR rendez-vous
                                    </th>
                                    <th>...</th>
                                </thead>
                                <tbody>
                                    @if(!empty($allhopital))
                                            @foreach ($allhopital as $hoptial)  
                                            <tr>
                                                <td>
                                                    {{$hoptial->nom}}
                                                </td>
                                                <td>
                                                    {{$hoptial->ville}}
                                                </td>
                                                <td>
                                                    {{$hoptial->adresse}}
                                                </td>
                                                
                                                <td >
                                                   {{DB::table('rendezvous')->where('hopital_id',$hopital->id)->count()}}
                                              
                                                </td>
                                                <td >
                                                    <a href="{{route('showupdatehopital',$hoptial->id)}}"><i class="fas fa-pencil" style="font-weight: 600;color:#008000"></i></a>
                                                <a href="{{route('deletehopital',$hoptial->id)}}"> <i class="fas fa-trash-alt" style="font-weight: 600;color:red"></i></a>
                            
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
            <p style="text-center">    {{$allhopital->links()}}</p>
        </div>
         
    </div>
    
@endsection
