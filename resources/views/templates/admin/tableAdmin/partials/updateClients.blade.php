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
       
        <h3>Обновити профіль</h3>
        
        <div>
        @foreach($client as $u)
          <form method="POST" action="{{route('update_client',$u->email)}}" enctype="multipart/form-data">
          {{csrf_field()}}
            
            <label for="fname">Ім'я</label>
            <input type="text" id="fname" name="firstname" placeholder="Ваше ім'я..." value="{{$u->first_name}}">
        
            <label for="lname">Прізвище</label>
            <input type="text" id="lname" name="lastname" placeholder="Ваше прізвище..." value="{{$u->last_name}}">

            <label for="fathername">По батькові</label>
            <input type="text" id="faname" name="fathername" placeholder="По батькові..." value="{{$u->father_name}}">

            <label for="age">Дата народження</label>
            <input style="margin-bottom: 10px;" type="date" id="age" name="age" value="{{$u->birthday}}">

            <label for="avatar">Аватар</label>
            <input style="margin-bottom: 10px;" type="file" id="avatar" name="avat">

            <label for="ground">Фон</label>
            <input style="margin-bottom: 10px;" type="file" id="ground" name="ground">

            <label for="city">Місто</label>
            <input style="margin-bottom: 10px;" type="text" id="city" name="city" value="{{$u->city}}">

            <label for="accepted">Вступ</label>
            <input style="margin-bottom: 10px;" type="date" id="accept" name="accepted" value="{{$u->accepted}}">

            <label for="quit">Звільнений</label>
            <input style="margin-bottom: 10px;" type="date" id="quit" name="quit" value="{{$u->quit}}">

            <label for="status">Статус</label>
            <select id="status" name="status">
              @foreach($status as $p)
              <option value="{{$p->id}}">{{$p->forename}}</option>
              @endforeach
            </select>

            <label for="sex">Стать</label>
            <select id="sex" name="sex">
              @foreach($sex as $s)
              <option value="{{$s->id}}">{{$s->denomination}}</option>
              @endforeach
            </select>
            <label for="club">Клуб</label>
            <select id="club" name="club">
              @foreach($club as $c)
              <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>

            <label for="twitter">Twitter</label>
            <input style="margin-bottom: 10px;" type="text" id="twitter" name="twitter" value="{{$u->twitter}}">

            <label for="facebook">Facebook</label>
            <input style="margin-bottom: 10px;" type="text" id="facebook" name="facebook" value="{{$u->facebook}}">

            <label for="instagram">Instagram</label>
            <input style="margin-bottom: 10px;" type="text" id="instagram" name="instagram" value="{{$u->instagram}}">
          @endforeach
            <input type="submit" value="Обновити">
          </form>
        </div>
      </div>