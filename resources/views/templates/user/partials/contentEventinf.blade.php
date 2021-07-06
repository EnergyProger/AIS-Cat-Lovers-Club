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
       
       
      @foreach($event as $ev)
      <h2>{{$ev->event_name}}</h2>
      <p>Місце проведення: {{$ev->place_name}}, {{$ev->place_address}}</p>
      <p>Вид заходу: {{$ev->event_type_name}}</p>
      <p>Клуб організатор: {{$ev->name}}</p>
      <p>Головний представник: {{$ev->last_name}}  {{$ev->first_name}}</p>
      <p>Початок: <?php echo date("d.m.Y H:i:s",strtotime($ev->start_date_event));?></p>
      <p>Завершення: <?php echo date("d.m.Y H:i:s",strtotime($ev->finish_date_event));?></p>
      @endforeach
      <h2 style="text-align: center; font-weight: bold;">Участники</h2>
      <div class="table-participate" style="display: flex;  justify-content: space-between;" >
     
        <div class="client_event">
          <h3>Члени клубу</h3>
          @foreach($client as $cl)
         
            <p style="color: black;">{{$cl->last_name}} {{$cl->first_name}}</p>
            <p style="padding-bottom: 5px; margin-top: -15px;">Обов'язок: {{$cl->dutie_name}}</p>
          
          @endforeach
        </div>
        <div class="employee_event">
        <h3>Працівники</h3>
        @foreach($employee as $cl)
         
         <p style="color: black;">{{$cl->last_name}} {{$cl->first_name}}</p>
         <p style="padding-bottom: 5px; margin-top: -15px;">Обов'язок: {{$cl->dutie_name}}</p>
       
       @endforeach
        </div>
        <div class="cat_event">
        <h3>Коти</h3>
        @foreach($cat as $cl)
         
            <p style="color: black;">{{$cl->name_cat}}</p>
            <p style="padding-bottom: 5px; margin-top: -15px;">Роль: {{$cl->role_name}}</p>
          
          @endforeach
        </div>
      </div>  
           
        </div>
      </div>