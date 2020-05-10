@extends('admin.layout.layout')

@section('content')

    <div class="content">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Utlisateurs</a></li>
              <li class="breadcrumb-item active" aria-current="page">Administrateur</li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-md-9">
                  
             </div>
             <div class="col-md-3">
             <form action="{{route('search')}}" method="POST">  @csrf <input type="hidden" name="role" value="admin"><input class="form-control left" name="search" type="text" placeholder="(nom,prenom,email....)" aria-label="Search">      </form> 
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
                                        Prenom
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th >
                                        Telelphone
                                    </th>
                                    <th >
                                       Ville
                                    </th>
                                    <th>...</th>
                                </thead>
                                <tbody>
                                    @if(!empty($alladmin))
                                            @foreach ($alladmin as $admin)  
                                            <tr>
                                                <td>
                                                    <img src="/upload/profile/{{DB::table('users')->where('id',$admin->id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image"
                                                    style="width:30px;border-radius:50%">
                                                    {{$admin->name}}
                                                </td>
                                                <td>
                                                    {{$admin->prenom}}
                                                </td>
                                                <td>
                                                    {{$admin->email}}
                                                </td>
                                                <td >
                                                    {{$admin->telephone}}
                                                </td>
                                                <td >
                                                    {{$admin->ville}}
                                                
                                                </td>
                                                <td >
                                                <a href="{{route('deletecompte',$admin->id)}}"> <i class="fas fa-trash-alt" style="font-weight: 600;color:red"></i></a>
                            
                                                </td>
                                              </tr>
                                             @endforeach
                              
                                @else
                                <tr>
                               
                                <td>
                                <p style="color: red">aucun  compte admin</p>

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
            <p style="text-center">    {{$alladmin->links()}}</p>
        </div>
         {{--  <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header">
                        <h4 class="card-title"> Table on Plain Background</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th class="text-right">
                                        Salary
                                    </th>
                                </thead>
                                <tbody>
                                   
                                   
                                    
                        
                                    <tr>
                                        <td>
                                            Jon Porter
                                        </td>
                                        <td>
                                            Portugal
                                        </td>
                                        <td>
                                            Gloucester
                                        </td>
                                        <td class="text-right">
                                            $98,615
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
