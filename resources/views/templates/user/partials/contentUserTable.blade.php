<div id="content">
<div class="container">
@foreach($client as $cl)
        <div class="profile_users">
       
            <div class="profile__users_img">
            <a href="{{route('userInf',$cl->email)}}"><img style="width: 200px; height: 150px; border-radius: 5px;" src="{{asset('assets/images-user/'.$cl->avatar)}}" alt=""></a>
            </div>
            <div class="profile__users_info">
                <p>{{$cl->first_name}} {{$cl->last_name}}</p>
                <p>День народження: <?php echo date("d.m.Y",strtotime($cl->birthday))?></p>
                <p>Місто: {{$cl->city}}</p>
                <p>Статус у клубі: {{$cl->forename}}</p>
            </div>
           
        </div>
        @endforeach
      
           
    </div>
	
	</div>
    </div>