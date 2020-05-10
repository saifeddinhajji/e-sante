@extends('welcome.welcomelayout')
@section('body')
<section style="background-color: white;margin: 22px 10px 18px 10px;">
<div class="row" style="max-width: 100% !important;float:center">
    <div class="col-md-4" >
  
            
        @include('profile.slidbarprofile')
    </div>
        <div class="col-md-8" style="padding-top: 14px;">
            @if($mesrendezvous)
            <table class="table">
                <thead>
                <tr>
                    
                    <th scope="col">hopital</th>
                    <th scope="col">adresse</th>
                    <th scope="col">date</th>
                    <th scope="col">etat</th>
                    <th>--</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($mesrendezvous as $rdv)
                <tr>
                
                    <td>{{DB::table('hopitals')->where('id',$rdv->hopital_id)->select('nom')->value('name')}}</td>
                    <td>{{DB::table('hopitals')->where('id',$rdv->hopital_id)->select('adresse')->value('adresse')}}</td>
                    <td>{{$rdv->date}}</td>
                    <td>

                    @if($rdv->etat=="atende")
                    <strong style="color: blueviolet">{{$rdv->etat}}</strong>
                
                    @elseif($rdv->etat=="refuse")
                    <strong style="color: red">{{$rdv->etat}}</strong>
                    @else
                    <strong style="color: chartreuse">{{$rdv->etat}}</strong>
                    @endif
                    </td>
                    <td>
                        {{--/patient/miseajour-rdv/{{$rdv->id}}"--}}
                    <a href="{{route('showformupdaterdv',$rdv->id)}}"><i class="fas fa-pen-alt" style="font-weight: 600; color:#00BFFF"></i></a>
                         <a href="{{route('deleterdv',$rdv->id)}}"> <i class="fas fa-trash-alt" style="font-weight: 600;color:red"></i></a>
                    </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <p>    {{$mesrendezvous->links()}}</p>
            @else
            <p>aucun rendez vous</p>
            @endif

        </div>
   
</div>

       
        
    
</div>
</section>
@endsection