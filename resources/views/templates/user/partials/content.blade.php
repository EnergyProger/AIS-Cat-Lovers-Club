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
          <?php 
            $stat  = '';
            foreach($status as $s)
            {
              $stat = $s->forename;
            }
          ?>
          <?php 
            $avat = '';
            $bg = '';
            foreach($img as $i)
            {
              $avat = $i->avatar;
              $bg = $i->bg;
            }
          ?>
          @if(count($user))
          @foreach($user as $item)
          
         
         
      <div class="main__content" style="background-image: url({{asset('assets/images-user/'.$bg)}}); height: 300px;">
        <p class="main__ava"><img src="{{asset('assets/images-user/'.$avat)}}" alt=""></p>
        
        
        <div class="main__text">
        <h2>{{$item->last_name}} {{$item->first_name}}&nbsp;</h2>
          @if($stat)
        <span class="status_client"><i class="fas fa-star"></i> {{$stat}}</span>
            @endif
        </div>
        <div class="content__info">
          <p><i class="fas fa-map-marked-alt"></i>&nbsp;{{$item->city}}</p>
          <p><i class="fas fa-birthday-cake"></i>&nbsp;<?php echo date('d.m.Y',strtotime($item->birthday))?></p>
          <p><i class="fas fa-envelope"></i>&nbsp;{{$item->email}}</p>
          <p><i class="fas fa-genderless"></i>&nbsp;{{$item->denomination}}</p>
          <p><i class="fas fa-building"></i>&nbsp;{{$item->name}}</p>
          <ul>
            <div class="social twitter">
              <a href="{{$item->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
          </div>
          <div class="social instagram">
              <a href="{{$item->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="social facebook">
              <a href="{{$item->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>    
          </div>
          </ul>
          
          <!--<div class="content__social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></i></a>
          </div>-->
        </div>
        @if(count($cat))
        <h4><i class="fas fa-cat"></i>&nbsp;Домашній улюбленець</h4>
      
        @foreach($cat as $c)
        <div class="card w-25 mb-5 card_cat">
    <!-- Изображение -->
    <a href="{{route('catdelete')}}"><img style="position: absolute; width: 25px; height: 25px; top: -205px; right: -10px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/PlayStation_button_X.svg/768px-PlayStation_button_X.svg.png"/></a>
           <img style="border-radius: 2px; width: 100%; margin: 0" class="card-img-top" src="{{asset('assets/images-cat/'.$c->photo)}}" alt="...">
    <!-- Текстовый контент -->
           <div class="card-body">
             <h4 class="text-center cat_name">{{$c->name_cat}}</h4>
             <p class="cat_text">{{$c->description_breed}}</p>
            <a class="cat_link" href="{{route('catinfo')}}">Дізнатися детальніше</a>
      </div>
    </div><!-- Конец карточки -->
           
        @endforeach
        @else
        <h4><i class="fas fa-cat"></i>&nbsp;Домашній улюбленець</h4>
        <div class="card__pet">
          <p>Додати інформацію про домашнього улюбленця</p>
          <a href="{{route('addcat')}}"><div class="circle"></div></a>
        </div>
        @endif
       
        @endforeach
        @else
        <h4><i class="fas fa-user"></i>&nbsp; Профіль</h4>
        <div class="card__pet">
          <p>Додати інформацію про себе</p>
          <a href="{{route('addinfo')}}"><div class="circle"></div></a>
        </div>
        
      @endif
      
     
       

        
       
      </div>