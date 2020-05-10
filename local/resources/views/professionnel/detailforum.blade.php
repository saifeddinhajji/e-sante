@extends('welcome.welcomelayout')
@section('body')
<style>
    .taille{
        font-size: xx-large;
        padding-top: 15px;
        padding-right: 7px;
    }
</style>
    <section class="our-blog" style="padding: 40px 40px 40px 0px !important">
        <div class="container">
          
            <div class="row">
                <div class="col-md-9" >
                        <div class="card mb-8" style="max-width: 100%;width:100%">
                             @if($forum->urlvideo)
                                    <figure>
                                    <iframe width="100%" height="400px"  class="card-img-to" src="http://www.youtube.com/embed/{{YoutubeID($forum->urlvideo)}}" frameborder="0" allowfullscreen></iframe>   
                                    </figure>
                            @else
                                    <figure>
                                        <img style=" max-height:400px;width:100%"  class="card-img-to" src="/upload/forum/{{$forum->image}}" alt="">
                                    </figure>
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title">   
                                    <img src="/upload/profile/{{DB::table('users')->where('id',$forum->user_id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image"
                                            style="width:30px;border-radius:50%">
                                            {{DB::table('users')->where('id',$forum->user_id)->select('name')->value('name')}}<br>
                                </h5>
                                
                                
                    
                                <article class="card-body"style=" background-color: #f8f8f8;border-radius: 14px;padding: 13px;margin: 8px -1px 20px -7px;">
                                    {{$forum->description}}
                                    <br>
                                   <a  href="{{route('addlike',$forum->id)}}"> <i class="fas fa-thumbs-up taille" style="color: #2586F0;"><sub>{{DB::table('likes')->where('forum_id',$forum->id)->where('like',1)->get()->count()}}</sub></i></a>
                                <a href="{{route('dislike',$forum->id)}}"><i class="fas fa-thumbs-down taille"  style="color: red;"><sub>{{DB::table('likes')->where('forum_id',$forum->id)->where('like',0)->get()->count()}}</sub></i></a>
                                    <i class="fas fa-comment taille"><sub>{{DB::table('commentaires')->where('forum_id',$forum->id)->get()->count()}}</sub></i>
                                </article>
                                <span class="float-right" style="color: indigo">{{$forum->created_at}}</span>
                                <br>
                                <hr style="color: black">
                                @foreach(DB::table('commentaires')->where('forum_id',$forum->id)->get() as $comment)
                                    <div class="contanier">
                                       @if( $comment->user_id==Auth::user()->id)
                                        <a  href="{{route('deletecomment',$comment->id)}}" style="position: relative; top: 27px;right: -96%;" ><span><i class="fas fa-trash" style="color: red"></i></span><a>
                                       @endif

                                        <img src="/upload/profile/{{DB::table('users')->where('id',$comment->user_id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image" style="width:30px;border-radius:50%">
                                                {{DB::table('users')->where('id',$comment->user_id)->select('name')->value('name')}}<br>
                                            <div clss="card-body " style=" background-color: #f8f8f8; border-radius: 14px;padding: 13px;margin: 8px -1px 20px 30px;"> 
                                                    {{$comment->content}}
                                                
                                               <span class="float-right" style="color: indigo">{{$comment->created_at}}</span>
                                            </div>
                                    </div>
                                @endforeach
                                <hr>
                                <form action="{{route('addcomment')}}" method="POST">
                                            @csrf
                                        <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                            <div class="form-group" style="padding-left: 4%">
                                                <img src="/upload/profile/{{Auth::user()->photoprofile}}" alt="Circle Image"
                                                style="width:30px;border-radius:50%">
                                                {{Auth::user()->name}}<br>
                                
                                                <textarea type="text" name="content"  rows="5" style="border-radius: 18px;" class="form-control">
                                                </textarea>
                                                    
                                            </div>
                                        <button type="submit" class="btn btn-info pull-right"  style="    float: right;border-radius: 6px"> commenter</button>
                                </form>
                                
                                </div>
                        </div>
                </div>
             <div class="col-md-3">
                 <h3>derniers forums:</h3>
                 <div class="form-group">
                     <ul> 
                         @foreach(DB::table('forums')->where('etat','accepte')->orderBy('created_at', 'DESC')->take(10)->get() as $forum)
                         <img src="/upload/profile/{{DB::table('users')->where('id',$forum->user_id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image"
                            style="width:30px;border-radius:50%">
                            {{DB::table('users')->where('id',$forum->user_id)->select('name')->value('name')}}
                          <li class="form-control" style=" width:400px;   border-radius: 13px; color:blue"> 
                            
                            <i class="fas fa-info-circle" style="font-size: 10px;"></i>
                            <a href="{{route('detailforumprof',$forum->id)}}"  style="color: blue !important "> {{$forum->titre}} </a>
                          </li>
                         @endforeach
                     </ul>
                 </div>
                 
                 
             </div>
                
            </div>
        </div>
    </section>
@endsection





@php
function YoutubeID($url)
{
    if(strlen($url) > 11)
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
        {
            return $match[1];
        }
        else
            return false;
    }

    return $url;
}

@endphp	