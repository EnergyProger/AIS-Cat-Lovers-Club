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
       
        <h3>Обновити профіль кота</h3>

        <div>
            @foreach($cat as $c)
          <form method="POST" action="{{route('update_cat',$c->cat_id)}}" enctype="multipart/form-data">
          {{csrf_field()}}
            <label for="catname">Ім'я</label>
            <input type="text" id="catname" name="catname" placeholder="Ім'я котика..." value="{{$c->name_cat}}">

            <label for="age">Дата народження</label>
            <input style="margin-bottom: 10px;" type="date" id="age" name="age" value="{{$c->age}}">

            <label for="photo">Фото</label>
            <input style="margin-bottom: 10px;" type="file" id="photo" name="photo">

            <label for="death">Дата смерті</label>
            <input style="margin-bottom: 10px;" type="date" id="death" name="death" value="{{$c->date_of_death}}">

            <label for="client">Власник</label>
            <select id="client" name="client">
            <option value="Клуб">Клуб</option>
              @foreach($client as $p)
              <option value="{{$p->id}}">{{$p->first_name}} {{$p->last_name}}</option>
              @endforeach
            </select>

            <label for="breed">Порода</label>
            <select id="breed" name="breed">
              @foreach($breed as $p)
              <option value="{{$p->id}}">{{$p->denotation}}</option>
              @endforeach
            </select>

            <label for="sex">Стать</label>
            <select id="sex" name="sex">
              @foreach($sex as $s)
              <option value="{{$s->id}}">{{$s->denomination}}</option>
              @endforeach
            </select>
            <label for="color">Колір</label>
            <select id="color" name="color">
              @foreach($color as $c)
              <option value="{{$c->id}}">{{$c->appellation}}</option>
              @endforeach
            </select>

            
            @endforeach
          
            <input type="submit" value="Обновити">
          </form>
        </div>
      </div>