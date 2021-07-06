<div id="content" class="p-4 p-md-5 pt-5">
<div class="container">
@foreach($event as $ev)
        <div class="profile_event" style="background: #91d7f2;">

      <a href="{{route('eventUserInf',$ev->event_name)}}"><h2 style="padding-left: 15px;">{{$ev->event_name}}</h2><a>
      <p style="padding-left: 15px; color: #000;">Вид заходу: {{$ev->event_type_name}}</p>
      <p style="padding-left: 15px; color: #000; padding-bottom: 10px;">Клуб організатор: {{$ev->name}}</p>
      
           
           
        </div>
        @endforeach
      
           
    </div>
	
	</div>
    </div>