<nav id="sidebar">

<div class="img bg-wrap text-center py-4">
        <div>
          <h2 style="color: #fff;">ADMIN PANEL</h2>
        </div>
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