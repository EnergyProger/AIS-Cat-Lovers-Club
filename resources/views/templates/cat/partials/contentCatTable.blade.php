<div id="content">
<div class="container">
@foreach($cat as $cl)
        <div class="profile_users">
       
            <div class="profile__users_img">
            <a href="{{route('catView',$cl->name_cat)}}"><img style="width: 200px; height: 150px; border-radius: 5px;" src="{{asset('assets/images-cat/'.$cl->photo)}}" alt=""></a>
            </div>
            <div class="profile__users_info">
                <p>{{$cl->name_cat}}</p>
                <p>День народження: <?php echo date("d.m.Y",strtotime($cl->age))?></p>
                <p>Порода: {{$cl->denotation}}</p>
                <p>Колір: {{$cl->appellation}}</p>
            </div>
           
        </div>
        @endforeach
      
           
    </div>
	
	</div>
    </div>