<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
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
	  		<div class="img bg-wrap text-center py-4" style="background-image: url({{asset('assets/images-user/'.$bg)}});">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url({{asset('assets/images-user/'.$avat)}});"></div>
	  				<h3>{{$item->last_name}} {{$item->first_name}}</h3>
	  			</div>
        </div>
        @else
        @endif
        @endforeach
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="{{route('client')}}"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Головна</a>
          </li>
          <li>
              <a href="{{route('userTable')}}"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;Члени клубу</a>
          </li>
          <li>
            <a href="{{route('catUserTable')}}"><i class="fas fa-cat"></i>&nbsp;&nbsp;&nbsp;&nbsp;Домашні улюбленці</a>
        </li>
          <li>
            <a href="{{route('clientUpdate')}}"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;&nbsp;Редактор сторінки</a>
          </li>
          <li>
            <a href="{{route('catupdate')}}"><i class="fas fa-sliders-h"></i>&nbsp;&nbsp;&nbsp;&nbsp;Редактор картки кота</a>
          </li>
          <li>
            <a href="{{route('eventUserTable')}}"><i class="fas fa-trophy"></i>&nbsp;&nbsp;&nbsp;&nbsp;Заходи</a>
          </li>
          <li>
            <a href="#"><i class="far fa-newspaper"></i>&nbsp;&nbsp;&nbsp;&nbsp;Новини</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Про нас</a>
          </li>
         
          <li>
            <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Вихід</a>
          </li>
        </ul>

    	</nav>