<nav id="sidebar">
<?php 
          $avat = '';
          $bg='';
          foreach($img as $i)
          {
            $avat = $i->avatar;
            $bg = $i->bg;
          }
        ?>
        @foreach($user as $item)
      
      @if($item->first_name)
<div class="img bg-wrap text-center py-4" style="background-image: url({{asset('assets/images-admin/'.$bg)}});">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url({{asset('assets/images-admin/'.$avat)}});"></div>
	  				<h3>{{$item->last_name}} {{$item->first_name}}</h3>
	  			</div>
        </div>
        @else
        @endif
        @endforeach
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{route('admin')}}"><i class="fas fa-tachometer-alt-slow"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
          </li>
          <li>
              <a href="{{route('adminTable')}}"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;&nbsp;Працівники</a>
          </li>
          <li>
            <a href="{{route('clientTable')}}"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Члени клубу</a>
        </li>
          <li>
            <a href="{{route('catTable')}}"><i class="fas fa-cat"></i>&nbsp;&nbsp;&nbsp;&nbsp;Домашні улюбленці</a>
        </li>
          <li>
            <a href="{{route('admin_update')}}"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;&nbsp;Редактор сторінки</a>
          </li>
          <li>
            <a href="{{route('eventTable')}}"><i class="fas fa-trophy"></i>&nbsp;&nbsp;&nbsp;&nbsp;Заходи</a>
          </li>
          <li>
            <a href="#"><i class="far fa-newspaper"></i>&nbsp;&nbsp;&nbsp;&nbsp;Новини</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Про нас</a>
          </li>
         
          <li>
            <a href="{{route('admin_logout')}}"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Вихід</a>
          </li>
        </ul>

    	</nav>