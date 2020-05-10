@extends('admin.layout.layout')

@section('content')

    <div class="content">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Forums</a></li>
              <li class="breadcrumb-item active" aria-current="page">list de forums accepte</li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-md-9">
                  
             </div>
             <div class="col-md-3">
             <form action="{{route('serachforum')}}" method="POST">  @csrf <input type="hidden" name="pagename"  value="admin.listforumaccepte"> <input type="hidden" name="etat" value="accepte"><input class="form-control left" name="search" type="text" placeholder="titre" aria-label="Search">      </form> 
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
                                        Nom Professionnel
                                    </th>
                                    <th>
                                        Titre
                                    </th>
                                    
                                    <th>
                                        sujet
                                    </th>
                                    <th>
                                        Etat
                                    </th>
                                    <th>
                                        Date de demande
                                    </th>
                                    
                                    <th>...</th>
                                </thead>
                                <tbody>
                                    @if(!empty($allforum))
                                            @foreach ($allforum as $forum)  
                                            <tr>
                                                <td>
                                                    <img src="/upload/profile/{{DB::table('users')->where('id',$forum->user_id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image"
                                                    style="width:30px;border-radius:50%">
                                                    {{DB::table('users')->where('id',$forum->user_id)->select('name')->value('name')}}
                                                </td>
                                                <td>
                                                    {{$forum->titre}}
                                                </td>
                                                <td>
                                                   {{$forum->sujet}}
                                                </td>
                                                <td>
                                                    @if($forum->etat=="atende")
                                                    <div style="color: #0000FF">{{$forum->etat}}</div>
                                                    @endif
                                                    @if($forum->etat=="refuse")
                                                    <div style="color:red">{{$forum->etat}}</div>
                                                    @endif
                                                    @if($forum->etat=="accepte")
                                                    <div style="color:#00FF00">{{$forum->etat}}</div>
                                                    @endif
                                                </td>
                                                <td >
                                                    
                                                    {{$forum->created_at}}
                                                </td>
                                                <td >
                                                <a href="{{route('detailforum',$forum->id)}}"><i class="fas fa-info-circle" style="font-weight: 600;"></i></a>
                                                <a href="{{route('deleteforum',$forum->id)}}"> <i class="fas fa-trash-alt" style="font-weight: 600;color:red"></i></a>
                            
                                                </td>
                                              </tr>
                                             @endforeach
                              
                                @else
                                <tr>
                               
                                <td>
                                <p style="color: red">aucun forum dans la base de données</p>

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
            <p style="text-center">    {{$allforum->links()}}</p>
           </div>
          
        </div>
    </div>
@endsection
