@extends('welcome.welcomelayout')
@section('body')
<section class="our-blog">

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Forum</h2>
                
            </div>
        </div>
    </div>
         	<div class="container">
         		<div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <form action="{{route('serachforumaccepte')}}" method="POST">
                            @csrf
                                <div class="input-group ">
                                            
                                    <input type="hidden" name="etat" value="accepte">
                                    <input type="hidden" name="pagename" value="professionnel.forums"> 
                                    <input type="text" class="form-control" name="search" required placeholder="(titre,sujet,description....)">
                                    <div class="input-group-append">
                                    <span class="input-group-text" ><i class="fas fa-search"></i></span>
                                    </div>
                                
                                </div>
                        </form>
                     </div>
                               
                 </div>
                 <br>
                 <br>
        		<div class="blog-row row">
        		
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
        			
        		@foreach($allforum as $forum)

                            <div class="col-md-4 col-sm-6">
                                    <div class="single-blog">
                                        
                                          {{--  @if($forum->urlvideo)
                                            <figure>
                                              <iframe width="100%" height="300px" src="http://www.youtube.com/embed/{{YoutubeID($forum->urlvideo)}}" frameborder="0" allowfullscreen></iframe>   
                                            </figure>
                                            @else({{$forum->image}})
                                                <figure>
                                                   
                                                </figure>
                                            @endif
                                        --}}

                                        @if($forum->urlvideo)
                                            <figure>
                                              <iframe width="100%" height="300px" src="http://www.youtube.com/embed/{{YoutubeID($forum->urlvideo)}}" frameborder="0" allowfullscreen></iframe>   
                                            </figure>
                                            @else
                                        <figure>
                                           
                                            <img style=" max-height:300px;width:100%" src="/upload/forum/{{$forum->image}}" alt="">
                                          </figure>
                                          @endif
                                        <div class="blog-detail">
                                            <small style="color:#B1BCC8">

                                                <img src="/upload/profile/{{DB::table('users')->where('id',$forum->user_id)->select('photoprofile')->value('photoprofile')}}" alt="Circle Image"
                                                    style="width:30px;border-radius:50%">
                                                    {{DB::table('users')->where('id',$forum->user_id)->select('name')->value('name')}}
                                                 | {{$forum->created_at}}
                                                
                                                </small>
                                            <h4>titre :{{$forum->titre}}</h4>
                                            <p> sujet:{{$forum->sujet}}.</p>
                                            <div class="link " >
                                                <a href="{{route('detailforumprof',$forum->id)}}"  class="float-right"style="color: #0000FF; ">lire la suite </a><i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </div>		
                                    </div>
                            </div>
                        @endforeach    
                        
                </div>
                <div class="row">
                <div class=" col-sm-12 ">
                    <p style="text-center pull-left">    {{$allforum->links()}}</p>
                   </div>
                </div>
         	</div>
         </section>
@endsection