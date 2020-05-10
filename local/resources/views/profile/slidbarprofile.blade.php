{{--<div class="card" style="width: 18rem;margin-left:30px;width: 90%" >
    <h5 class="card-title">Mon Profile</h5>
    <img src="/upload/profile/{{Auth::user()->photoprofile}}"  class="card-img-top"  style="width:50%"alt="...">
    
    <div class="card-body">
        <div class="text-center">
            {{Auth::user()->name}} {{Auth::user()->prenom}}
        </div>
        <div class="text-center">
          Tunisie a  {{Auth::user()->ville}}( {{Auth::user()->codepostal}})
        </div>
    
    </div>
  
      </div>
</div>
--}}

<div class="col-md-12">
              

    <div class="text-center">
      <img src="/upload/profile/{{Auth::user()->photoprofile}}" class="avatar img-circle img-thumbnail"  style="border-radius: 50%;max--width:250px;max-height: 250px"avatar">
    <div>{{Auth::user()->name}} {{Auth::user()->prenom}}</div>
    </div><hr>

             
        
        
        
        <ul class="list-group">
        
          <li class="list-group-item text-left"><h5>Email:</h5>{{Auth::user()->email}}</li>
          <li class="list-group-item text-left"><h5>Date de naissance:</h5>{{Auth::user()->date_naissance}}</li>
        <li class="list-group-item text-left"><h5>Adress:</h5>tunisie-{{Auth::user()->ville}}--{{Auth::user()->codepostal}}</li>
          <li class="list-group-item text-left"><h5>Numero de telephone:</h5>{{Auth::user()->telephone}}</li>
          <li class="list-group-item text-right">  <div class="card-body">

        </ul> 
             
      
        
      </div><!--/col-3-->