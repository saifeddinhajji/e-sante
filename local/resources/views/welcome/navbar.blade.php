<style>
    .corona{
        background-color: red;
    text-align: center;
    text-decoration: underline;

    -webkit-text-decoration-color: black;
    text-decoration-color: #616161;
    font-size: 33px;
    }
</style>
<header id="menu-jk">
    <div class="alert  alert-block"  style="    
        background-color: red;
        text-align: center;
        text-decoration: underline;
        -webkit-text-decoration-color: black;
        text-decoration-color: #616161;
        font-size: 33px;
        ">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong><a href="https://covid-19.tn/">Coronavirus : l'essentiel de l'actualité</a></strong>
    </div>
    <div class="container">
        <div class="row top">
            <div class="col-md-3 d-none d-lg-block">
               <!-- <div class="call d-flex">
                    <i class="fas fa-phone"></i>
                    <div class="call-no">
                        1-898-8767-567 <br>
                        1-898-8767-568
                    </div>
                </div>-->
              <img src="{{ URL::asset('logo/mnst.png')}}" alt="" style="position: relative;top:30px;left:50px">  
            </div>
            
            <div class="col-lg-6 col-md-7 logo">
                <img src="{{URL::asset('logo/cims.jpg')}}" style="width: 328px;position: relative;" alt="">
                <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
            </div>
            <div class="col-lg-3 col-md-5 d-none d-md-block call-r">
                <div class="call d-flex" style="background: #61a675">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="call-no">
                        211 Santio Street Sandio <br>
                        CA 8765-18798 USA
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <nav id="menu" class="d-none d-md-block">
        <div class="container">

            <div class="row nav-ro">
                <div style="position:relative;
                top: 0px; left: 0px;"><a href=""><span style="color: red;font-size: xxx-large;">E</span><span style="color: indigo;font-size:20px">-</span><span style="font-family: police1, police2, police3, police4;font-size:40px;">Santé</span></a></div>
                <ul>
                    
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#Aporpos">Apropos</a></li>
                    <li><a href="#Services">Nos Services</a></li>
                    <li><a href="#Partenaires">Nos partenaires</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    @auth
                    @if(auth::user()->role=="professionnel")
                    <li ><a href="{{route('show-all-forum')}}">Forums</a></li>
                    @endif
           
                    @endauth
                    @guest                   
                    <li  class="position-relative" style="left: 150px;" ><a href="{{route('login')}}"> Login</a></li>
                   
                    <li>
                        <li class="nav-item dropdown position-relative" style="left: 100px;">
                            
                            <a class=" dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Register
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                <a class="dropdown-item" href="{{route('registerpatient')}}">Register patient</a>
                                <a class="dropdown-item" href="{{route('registerprofessionnel')}}">Register Professionnel</a>
                            </div>
                        </li>
                    </li>
                    @endguest
                    @auth
                    <li>
                       
                        <li class="nav-item dropdown position-relative" style="left: 100px;">
                            <img src="/upload/profile/{{Auth::user()->photoprofile}}"   class="rounded-circle" style="width: 25px">
                            <a class=" dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                @if(Auth::user()->role=="admin")
                                <a class="dropdown-item" href="{{ route('admin') }}">Administration</a>
                                @else
                                    @if(Auth::user()->role=="patient")
                                    <a class="dropdown-item" href="{{ route('updateprofilepatient') }}">Mon Profile</a>
                                    <a class="dropdown-item" href="{{route('show-interface-rendez-vous')}}" >Ajouter un Rendez-vous</a>        
                                    <a class="dropdown-item" href="{{route('mesrdv')}}">List mes RDV</a>
                                    @else
                                    <a class="dropdown-item" href="{{route('show-interface-add-forum')}}"> Ajouter un forum</a>
                                    <a class="dropdown-item" href="{{route('mesforum')}}">List mes forums</a>
                                    <a class="dropdown-item" href="{{ route('updateprofileprof') }}">Mon Profile</a>
                                    @endif
                                @endif
                                <a class="dropdown-item"  href="{{ route('logout') }}"   onclick="event.preventDefault();  document.getElementById('logout-form').submit();" > Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                
                               
                            </div>
                        </li>
                        @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>