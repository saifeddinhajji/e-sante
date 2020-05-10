<header id="menu-jk">
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
              <img src="{{ URL::asset('logo/mnst.png')}}" alt="" style="position: relative;top:30px">  
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
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#Aporpos">Apropos</a></li>
                    <li><a href="#Services">Nos Services</a></li>
                    <li><a href="#Partenaires">Nos partenaires</a></li>
                    <li><a href="#Contact">Contact</a></li>
                    
                    
                    <li  class="position-relative" style="left: 308px;"><a href="{{route('login')}}"> Login</a></li>
                    <li>
                        <li class="nav-item dropdown position-relative" style="left: 207px;">
                            <a class=" dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Register
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                <a class="dropdown-item" href="{{route('registerpatient')}}">Register patient</a>
                                <a class="dropdown-item" href="{{route('registerprofessionnel')}}">Register Professionnel</a>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</header>