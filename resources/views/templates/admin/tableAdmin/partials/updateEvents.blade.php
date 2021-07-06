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
       
        <h3>Оновіть інформацію про захід</h3>
        @foreach($event as $ev)
        <div>
          <form method="POST" action="{{route('update_event',$ev->event_name)}}" enctype="multipart/form-data">
          {{csrf_field()}}
            <label for="event_name">Назва заходу</label>
            <input type="text" id="event_name" name="event_name" placeholder="Назва заходу..." value="{{$ev->event_name}}">
        
            <label for="place">Місце</label>
            <select id="place" name="place">
            <option value="{{$ev->place_id}}">{{$ev->place_name}}</option>
              @foreach($place as $p)
              <option value="{{$p->id}}">{{$p->place_name}}</option>
              @endforeach
            </select>

            <label for="typeofevent">Тип заходу</label>
            <select id="typeofevent" name="typeofevent">
            <option value="{{$ev->typeofevent_id}}">{{$ev->event_type_name}}</option>
              @foreach($typeofevent as $p)
              <option value="{{$p->id}}">{{$p->event_type_name}}</option>
              @endforeach
            </select>

            <label for="club">Клуб</label>
            <select id="club" name="club">
            <option value="{{$ev->club_id}}">{{$ev->name}}</option>
              @foreach($club as $p)
              <option value="{{$p->id}}">{{$p->name}}</option>
              @endforeach
            </select>

            <label for="event_description">Опис заходу</label>
            <textarea type="text" id="event_description" name="event_description" placeholder="Опис заходу..." cols="82" rows="5">{{$ev->event_description}}</textarea>

            <label for="employee">Працівник</label>
            <select id="employee" name="employee">
            <option value="{{$ev->employee_id}}">{{$ev->last_name}} {{$ev->first_name}}</option>
              @foreach($employee as $p)
              <option value="{{$p->id}}">{{$p->last_name}} {{$p->first_name}}</option>
              @endforeach
            </select>

            <label for="start_date_event">Дата та час початку</label>
            <input type="datetime-local" id="start_date_event" name="start_date_event" value="{{$ev->start_date_event}}"/>

            <label for="finish_date_event">Дата та час завершення</label>
            <input  style="display: block;" type="datetime-local" id="finish_date_event" name="finish_date_event" value="{{$ev->finish_date_event}}"/>
            

          
            <input type="submit" value="Оновити">
          </form>
          @endforeach
        </div>
      </div>