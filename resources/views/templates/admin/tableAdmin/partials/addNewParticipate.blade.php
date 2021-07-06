  <!-- Page Content  -->
  <div id="content" class="p-4 p-md-5 pt-5">
       <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
  
                <div class="col-4 header__navbar__logo">
                    <a href="index.html">CAT<span>land</span></a>
                </div>
                <div class="header__navbar__link d-flex">
                    <li><a href="index.html">Головна</a></li>
                    <li><a href="sidebar.html">Заходи</a></li>
                    <li><a href="#about">Про нас</a></li>
                    <li><a href="#news">Новини</a></li>
                </div>-->
  <!--
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Portfolio</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>-->

         
      <div class="main__contentinfo">
       
        <h3>Заповніть інформацію про захід</h3>

        <div>
          <form method="POST" action="{{route('new_participate')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <label for="event">Захід</label>
            <select id="event" name="event">
              @foreach($event as $p)
              <option value="{{$p->id}}">{{$p->event_name}}</option>
              @endforeach
            </select>

            <label for="client">Члени клубу</label>
            <select id="client" name="client">
            <option value="-">-</option>
              @foreach($client as $p)
              <option value="{{$p->id}}">{{$p->first_name}} {{$p->last_name}}</option>
              @endforeach
            </select>

            <label for="dutie">Обов'язок</label>
            <select id="dutie" name="dutie">
            <option value="-">-</option>
              @foreach($dutie as $p)
              <option value="{{$p->id}}">{{$p->dutie_name}}</option>
              @endforeach
            </select>

            <label for="cat">Коти</label>
            <select id="cat" name="cat">
            <option value="-">-</option>
              @foreach($cat as $p)
              <option value="{{$p->id}}">{{$p->name_cat}}</option>
              @endforeach
            </select>

            <label for="role">Роль</label>
            <select id="role" name="role">
            <option value="-">-</option>
              @foreach($role as $p)
              <option value="{{$p->id}}">{{$p->role_name}}</option>
              @endforeach
            </select>

            <label for="employee">Працівники</label>
            <select id="employee" name="employee">
            <option value="-">-</option>
              @foreach($employee as $p)
              <option value="{{$p->id}}">{{$p->first_name}} {{$p->last_name}}</option>
              @endforeach
            </select>

            <label for="dut">Обов'язок для працівника</label>
            <select id="dut" name="dut">
            <option value="-">-</option>
              @foreach($dut as $p)
              <option value="{{$p->id}}">{{$p->dutie_name}}</option>
              @endforeach
            </select>
            

          
            <input type="submit" value="Створити">
          </form>
        </div>
      </div>