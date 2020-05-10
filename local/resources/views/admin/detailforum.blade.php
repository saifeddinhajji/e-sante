@extends('admin.layout.layout')
<!---->

@section('content')
<div class="content">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{route('listforum')}}">Forums</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Forum:{{$forum->titre}}</li>
            </ol>
          </nav>
       
       
    <div class="card" style="padding: 30px">
                        <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label >  Nom :</label><br>
                                            
                                            <img src="/upload/profile/{{DB::table('users')->where('id',$forum->user_id)->select('photoprofile')->value('photoprofile')}}" style="border-radius: 50%;width:30px" alt="">
                                                {{DB::table('users')->where('id',$forum->user_id)->select('name')->value('name')}}<br>
                                        </div>
                                </div>
                                <div class="col-md-6">

                                
                                    <div class="form-group">
                                        <label >Titre:</label><br>
                                        {{$forum->titre}}
                                    </div>                      
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group text-justify">
                                        <label >  Sujet :</label><br>
                                           {{$forum->sujet}}
                                    </div>
                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group  text-justify">
                                <label >Description:</label><br>
                                {{$forum->description}}
                            </div>
                            </div>
                        </div>
                    @if($forum->urlvideo)
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group  text-justify">
                                        <label >Video:</label><br>
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
                                    <iframe width="100%" height="400px"  max-height="400px" src="http://www.youtube.com/embed/{{YoutubeID($forum->urlvideo)}}" frameborder="0" allowfullscreen></iframe>
                                    
                                    </div>
                                </div>
                        </div>
                        @endif
        
                        @if($forum->image)
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group  ">
                                        <label >Image:</label><br>
                                        <img src="/upload/forum/{{$forum->image}}" style="width: 100%;max-height:400px"  alt="">
                                    </div>
                                </div>
                        </div>
                        @endif
                        
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