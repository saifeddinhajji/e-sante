@extends('welcome.welcomelayout')
@section('body')
<section style="background-color: white;margin: 22px 10px 18px 10px;">
<div class="row" style="max-width: 100% !important;float:center">
    <div class="col-md-4" >
  
            
        @include('profile.slidbarprofile')
    </div>
        <div class="col-md-8" style="padding-top: 14px;">
            @if($mesforum)
            <table class="table">
                <thead>
                <tr>
                    
                    <th scope="col">titre</th>
                    <th scope="col">date de creation</th>
                    <th scope="col">nombre de commentaire</th>
                    <th scope="col">nombre like/dislike</th>
                    <th scope="col">etat</th>
                    <th>--</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($mesforum as $forum)
                <tr>
                
                    <td>{{$forum->titre}}</td>
                   
                    <td>{{ Carbon\Carbon::parse($forum->created_at)->format('Y-m-d')}}</td>
                    <td>
                   {{DB::table('commentaires')->where('forum_id',$forum->id)->count()}}
                    </td>
                    <td>
                        <strong style="color:	#008000">{{DB::table('likes')->where('forum_id',$forum->id)->where('like',1)->count()}}</strong>|<strong style="color: red">{{DB::table('likes')->where('forum_id',$forum->id)->where('like',0)->count()}}</strong>
                    </td>
                    {{--@if($forum->etat=="atende")
                    <strong style="color: blueviolet">{{$forum->etat}}</strong>
                
                    @elseif($forum->etat=="refuse")
                    <strong style="color: red">{{$forum->etat}}</strong>
                    @else
                    <strong style="color: chartreuse">{{$forum->etat}}</strong>
                    @endif--}}
                   
                    <td>
                        {{--/patient/miseajour-rdv/{{$forum->id}}"--}}
                         <a href="{{route('showupdateforum',$forum->id)}}"><i class="fas fa-pen-alt" style="font-weight: 600; color:#00BFFF"></i></a>
                         <a href="{{route('deleteforum',$forum->id)}}"> <i class="fas fa-trash-alt" style="font-weight: 600;color:red"></i></a>
                    </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <p>    {{$mesforum->links()}}</p>
            @else
            <p>aucun rendez vous</p>
            @endif

        </div>
   
</div>

       
        
    
</div>
</section>
@endsection