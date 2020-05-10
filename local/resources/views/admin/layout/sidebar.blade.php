
<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">

    <a href="{{route('welcome')}}" class="simple-text logo-normal">
            <img alt="CIMS" src="http://www.cims.rns.tn/images/images/logo-cimsp.jpg">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            
            <li class="active">
                <a >
                    <i class="nc-icon nc-bank"></i>
                <p><div class="logo-image-small">
                    <img src="{{ asset('paper') }}/img/logo-small.png" style="width:30px;">
                {{Auth::user()->name}}</p>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin')}}">
                    <i class="fa fa-dashboard"></i>
                    <p>Tableau de bord</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                   <i class="fas fa-users-cog"></i>
                    <p>
                            Gestion d'utlisateur
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="laravelExamples">
                    <ul class="nav">
                        <li >
                            <a  href="{{route('allpatient')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List Patient </span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('allprofessionnel')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List Professionnel </span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('alladmin')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List Administrateur </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" aria-expanded="true" href="#ex2">
                    <i class="fas fa-hospitals"></i>
                    <p>
                            Gestion Hopital
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="ex2">
                    <ul class="nav">
                        <li >
                            <a href="{{route('listhopital')}}" >
                                <span class="sidebar-mini-icon">  <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List hopitaux </span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('showforumaddhopital')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">Ajouter un hopital </span>
                            </a>
                        </li>
                        <li >
                           
                        </li>
                    </ul>
                </div>
            </li>
     
            <li>
                <a data-toggle="collapse" aria-expanded="true" href="#ex4">
                    <i class="fas fa-comment-alt"></i>
                    <p>
                            Gestion de Forum
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="ex4">
                    <ul class="nav">
                        <li >
                            <a href="{{route('listforum')}}" >
                                <span class="sidebar-mini-icon">  <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List de Forum </span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('listforumaccepte')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List de Forum accepté </span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('listforumatende')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List de Forum en attente </span>
                            </a>
                        </li>
                        <li >
                            <a href="{{route('listforumrefuse')}}">
                                <span class="sidebar-mini-icon"> <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List de Forum refusé </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                
                <a data-toggle="collapse" aria-expanded="" href="#ex3">
                    <i class="fas fa-calendar-check"></i>
                    <p>
                        Gestion de Rendez-vous
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="ex3">
                    <ul class="nav">
                        <li >
                            <a  href="{{route('allrendezvous')}}">
                                <span class="sidebar-mini-icon">  <i class="nc-icon nc-tile-56"></i></span>
                                <span class="sidebar-normal">List des rendez-vous </span>
                            </a>
                        </li>
                       
                        
                    </ul>
                </div>
 

            <li>
                {{--for show dropdown(class:show--}}
                <a data-toggle="collapse" aria-expanded="true" href="#ex5">
                    <i class="fal fa-address-book"></i>
                    <p>
                            Mon Profile
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="ex5">
                    <ul class="nav">
                        <li >
                            
                            <a  href="{{ route('profile') }}">
                                <span class="sidebar-mini-icon"> <i class="fas fa-user"></i></span>
                                <span class="sidebar-normal">Mon Profile</span>
                            </a>
                        </li>
                       
                        <li >
                            <a onclick="document.getElementById('formLogOut').submit();">
                                <span class="sidebar-mini-icon"><i class="fas fa-sign-out-alt"></i></span>
                                <span class="sidebar-normal">Deconnexion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           

 

 <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
    @csrf
</form>

         
            
        </ul>
    </div>
</div>
