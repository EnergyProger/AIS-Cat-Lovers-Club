<header>
            <div class="header__navbar d-flex align-items-center justify-content-between">
                    <div class="col-4 header__navbar__logo">
                        <a href="{{route('home')}}">CAT<span>land</span></a>
                    </div>
                    <div class="header__navbar__link d-flex">
                        <li><a href="{{route('home')}}">Головна</a></li>
                        <li><a href="#">Заходи</a></li>
                        <li><a href="#about">Про нас</a></li>
                        <li><a href="#news">Новини</a></li>
                        <li><a href="{{route('signin')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Вхід</a></li>
                        <li><a href="{{route('signup')}}"><i class="fas fa-users"></i> Реєстрація</a></li>
                    </div>
            </div>

            <div class="silder__header">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <div class="slider__main d-flex">
                              <div class="slider__img">
                                <img src="http://fullhdwallpapers.ru/image/cats/8314/kot-v-meshke.jpg" alt="First slide">
                              </div>
                            <div class="sidebar">
                                <h1>Дізнайтесь Цікаві Новини</h1>
                                <div class="liner"></div>
                                <p>Чому коти витрачають дві третини свого життя на сон? </p>
                                <button onclick="document.location='food.html'">Дізнайтесь більше&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            </div>
                          </div>
                        
                      </div>
                      <div class="carousel-item">
                        <div class="slider__main d-flex">
                            <div class="slider__img">
                              <img src="http://fullhdwallpapers.ru/image/cats/8250/britanskaya-korotkosherstnaya-koshka.jpg" alt="Second slide">
                            </div>
                          <div class="sidebar">
                              <h1>Дізнайтесь Цікаві Новини</h1>
                              <div class="liner"></div>
                              <p>Найбільший у наші дні кіт – це лігр.</p>
                              <button onclick="document.location='food.html'">Дізнайтесь більше&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                          </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slider__main d-flex">
                            <div class="slider__img">
                              <img src="http://fullhdwallpapers.ru/image/cats/8199/kotik-malysh.jpg" alt="Third slide">
                            </div>
                          <div class="sidebar">
                            <h1>Дізнайтесь Цікаві Новини</h1>
                            <div class="liner"></div>
                            <p>Найбільш популярна у світі порода – персидський кіт.</p>
                            <button onclick="document.location='food.html?id=2'">Дізнайтесь більше&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                          </div>
                        </div>
                    </div>
                   

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>

            </div>
         
        </header>