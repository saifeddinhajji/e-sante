    <!-- ################# Slider bar #######################--->
    <section >
        <div class="slider-detail">
    
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                       {{-- <img class="d-block w-100" src="{{ URL::asset('accuiel/images/slider/slide-02.jpg')}}" alt="First slide">--}}
                        <img class="d-block w-100" src="{{ URL::asset('logo/slid2.jpg')}}" style="max-height:500px !important" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class=" bounceInDown">Best Free Hospital Template</h5>
                            <p class=" bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                                aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                                sed sagittis at, sagittis quis neque. Praesent.</p>
    
                            <div class="row vbh">
                                @auth
                                    @if(Auth::user()->role=="patient")
                                    <div class="btn btn-success  bounceInUp" style="background: #61a675"><a href="{{route('show-interface-rendez-vous')}}"> Rendez-vous</a> </div>
                                @endif
                                    @if(Auth::user()->role=="professionnel")
                                    <div class="btn btn-success  bounceInUp" style="background: #61a675" > <a href="{{route('show-interface-add-forum')}}">Créer  un forum <a></div>
                                    @endif
                                        @if(Auth::user()->role=="admin")
                                    <div class="btn btn-success  bounceInUp" style="background: #61a675" > <a href="{{route('show-interface-add-forum')}}">dashboard <a></div>
                                    @endif
                                @endauth
                                @guest
                                <div class="btn btn-success  bounceInUp" style="background: #61a675"> <a href="{{route('login')}}">Rendez-vous</a></div>
                                @endguest
                                  
                            </div>
                        </div>
                    </div>
    
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ URL::asset('accuiel/images/slider/slide-03.jpg')}}" alt="Third slide">
                        <div class="carousel-caption vdg-cur d-none d-md-block">
                            <h5 class=" bounceInDown">Best Free Hospital Template</h5>
                            <p class=" bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                                aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                                sed sagittis at, sagittis quis neque. Praesent.</p>
    
                                <div class="row vbh">
                                    @auth
                                        @if(Auth::user()->role=="patient")
                                        <div class="btn btn-success  bounceInUp" style="background: #61a675"><a href="{{route('show-interface-rendez-vous')}}"> Rendez-vous</a> </div>
                                    @endif
                                        @if(Auth::user()->role=="professionnel")
                                        <div class="btn btn-success  bounceInUp" style="background: #61a675" > <a href="{{route('show-interface-add-forum')}}">Créer  un forum <a></div>
                                        @endif
                                            @if(Auth::user()->role=="admin")
                                        <div class="btn btn-success  bounceInUp" style="background: #61a675" > <a href="{{route('show-interface-add-forum')}}">dashboard <a></div>
                                        @endif
                                    @endauth
                                    @guest
                                    <div class="btn btn-success  bounceInUp" style="background: #61a675"> <a href="{{route('login')}}">Rendez-vous</a></div>
                                    @endguest
                                      
                                </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ URL::asset('logo/slid3.jpg')}}" style="max-height:500px !important" alt="Third slide">
                        <div class="carousel-caption vdg-cur d-none d-md-block">    
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    
    
        </div>
    </section>
        <!-- ################# Hospital Detail #######################--->
        
        <div class="top-msg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 vkjd ohs">
                        <h2><i class="far fa-clock"></i> Opening Hours</h2>
                        <ul>
                            <li>Mon - Fri <span>8.30AM - 7.30PM</span></li>
                            <li>Saturday - Fri <span>6.30AM - 9.30PM</span></li>
                            <li>Sunday - Fri <span>11.30AM - 3.30PM</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 vkjd">
                        <h2><i class="fas fa-calendar-alt"></i> Doctors Timetable</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent interdum posuere eleifend. Aenean quis ultricies orci. Duis ullamcorper eros id urna viverra</p>
                    </div>
                    <div class="col-lg-3 col-md-6 vkjd">
                        <h2><i class="far fa-envelope"></i> Appointments</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent interdum posuere eleifend. Aenean quis ultricies orci. Duis ullamcorper eros id urna viverra</p>
                    </div>
                    <div class="col-lg-3 col-md-6 vkjd">
                        <h2><i class="fas fa-phone"></i> Emergency Cases</h2>
                        <h4>1-898-8767-568</h4>
                    </div>
                </div>
            </div>
        </div>
    
    
        <!-- ################# AppointmentStarts Here#######################--->
    
        <!-----------------------------------section apropos--------------------------------------->
        <section id="Aporpos">
            <p class="text-center" style="font-family: monospace;font-size: 70px;">Apropos</p>
            <div class="about-us">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <img src="{{ URL::asset('logo/apropos.jpg')}}" alt="">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h2>Welcome to  Spinta  Clinic</h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.</p>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam varius eros consequat auctor gravida. Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.Fusce tristique lacus at urna sollicitudin pulvinar. Suspendisse hendrerit ultrices mauris.</p>
                              
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-------------------------------------endsection apropos -------------------------------->
      <!-------------------------------------------section service------------------------------->
      <section id="Services" class="key-features kf-2">
        <div class="container">
            <div class="inner-title">
    
                <h2>Nos services</h2>
                <p>Take a look at some of our key features</p>
            </div>
    
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-hospital-alt" style="background: #61a675"></i>
                        <h5>Service 1</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
    
                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-user-md" style="background: #61a675"></i>
                        <h5>Service 2</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
    
                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-briefcase-medical" style="background: #61a675"></i>
                        <h5>Service 3</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
    
                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-capsules" style="background: #61a675"></i>
                        <h5>Service 4</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
    
                <div class="col-md-4 col-sm-6">
                    <div class="single-key">
                        <i class="fas fa-prescription-bottle-alt" style="background: #61a675"></i>
                        <h5>Services 5</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
    
    
    
                <div class="col-md-4 col-sm-6">
                    <div class="single-key" >
                        <i class="far fa-thumbs-up" style="background: #61a675"></i>
                        <h5>High Quality treatments</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut erat nec leo lobortis blandit.</p>
                    </div>
                </div>
            </div>
    
    
    
    
    
    
        </div>
    
    </section>
    <!--------------------------------------------endsection service----------------------------->
    <!------------------------------------------section partenaires------------------------------>
    <section  id="Partenaires"class="our-blog">
        <p class="text-center" style="font-family: monospace;font-size: 70px;     margin-bottom: 29px;">Nos Partenaires</p>
        <div class="container">
            
           <div class="blog-row row">
               <div class="col-md-4 col-sm-6">
                   <div class="single-blog">
                       <figure>
                           <img src="{{ URL::asset('logo/mspt.jpg')}}" alt="">
                       </figure>
                       <div class="blog-detail">
                           <small>Ministre de la Santé publique</small>
                           <h4>Ministre de la Santé publique</h4>
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis sed sagittis at, sagittis quis neque. Praesent.</p>
                           <div class="link">
                               <a href="">Read more </a><i class="fas fa-long-arrow-alt-right"></i>
                           </div>
                       </div>
                       
                       
                   </div>
               </div>
               <div class="col-md-4 col-sm-6">
                   <div class="single-blog">
                       <figure>
                           <img src="{{ URL::asset('logo/hop1.jpg')}}" alt="">
                       </figure>
                       <div class="blog-detail">
                           <small>By Admin | August 10 2018</small>
                           <h4>Methods of Recuirtments</h4>
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis sed sagittis at, sagittis quis neque. Praesent.</p>
                           <div class="link">
                               <a href="">Read more </a><i class="fas fa-long-arrow-alt-right"></i>
                           </div>
                       </div>
                       
                       
                   </div>
               </div>
               <div class="col-md-4 col-sm-6">
                   <div class="single-blog">
                       <figure>
                           <img src="{{ URL::asset('accuiel/images/blog/blog_03.jpg')}}" alt="">
                       </figure>
                       <div class="blog-detail">
                           <small>By Admin | August 10 2018</small>
                           <h4>Methods of Recuirtments</h4>
                           <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis sed sagittis at, sagittis quis neque. Praesent.</p>
                           <div class="link">
                               <a href="">Read more </a><i class="fas fa-long-arrow-alt-right"></i>
                           </div>
                       </div>
                       
                       
                   </div>
               </div>
               
           </div>
        </div>
    </section>
    <!-------------------------------------------endsection partenaire------------------------------>
    
    <div class="professional-details">
        <div class="layy" style="background: rgba(139, 8, 142, 0.5) !important">
            <div class="container">
                <div class="title-another row">
                    <h4>We Are Professionals</h4>
                    <h2>Professional Approach</h2>
                    <h3>and Quality Services</h3>
                    <div class="btn-ro">
                        <button class="btn btn-default">passer un rendez vous</button>
                    </div>
    
                </div>
            </div>
        </div>
    
    </div>
    <!-------------------------------------------section contact-------------------------------------->
    <section id="Contact">
        <div class="row contact-rooo no-margin">
            <p class="text-center" style="font-family: monospace;font-size: 70px;     margin-bottom: 29px;">Contactez-nous</p>
            <div class="container">
               <div class="row">
        
                        <div style="padding:20px" class="col-sm-6">
                        <h2 style="font-size:18px">Contact Form</h2>
                        <form action="{{route('sendmail')}}" method="POST">
                            @csrf
                                <div class="row">
                                    <div style="padding-top:10px;" class="col-sm-3"><label>Nom :</label></div>
                                    <div class="col-sm-8"><input type="text" placeholder="Nom" name="name" class="form-control input-sm" required></div>
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div style="padding-top:10px;" class="col-sm-3"><label>Email  :</label></div>
                                    <div class="col-sm-8"><input type="text" name="email" placeholder=" Email" class="form-control input-sm" required></div>
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div style="padding-top:10px;" class="col-sm-3"><label>Sujet:</label></div>
                                    <div class="col-sm-8"><input type="text" name="subject" placeholder="Sujet" class="form-control input-sm" required></div>
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div style="padding-top:10px;" class="col-sm-3"><label>  Message:</label></div>
                                    <div class="col-sm-8">
                                    <textarea rows="5" placeholder="Message" name="message" class="form-control input-sm" required></textarea>
                                    </div>
                                </div>
                                <div style="margin-top:10px;" class="row">
                                    <div style="padding-top:10px;" class="col-sm-3"><label></label></div>
                                    <div class="col-sm-8">
                                    
                                    <button class="btn btn-danger btn-sm " style="float: right">Send Message</button>
                                </form>
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-6">
                                
                            <div style="margin:50px" class="serv"> 
                                <h2 style="margin-top:10px;">Address</h2>
        
                                    Smart Eye <br>
                                    Marthandam<br>
                                    K.K District<br>
                                    Phone:+91 9159669599<br>
                                    Email:info@smart-eye.in<br>
                                    Website:www.smart-eye.com<br>
        
                    
                            </div>    
                            
                        
                        </div>
        
                </div>
              </div>
          </div>
    </section>
    <!----------------------------------------------endsection cotact------------------------------------>
    
       
    
    