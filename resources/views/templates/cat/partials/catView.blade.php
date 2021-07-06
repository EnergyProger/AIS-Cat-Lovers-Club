<div id="content" class="p-4 p-md-5 pt-5">
@foreach($cat as $c)
<div class="cat__main">
       
            <div class="cat__photo">
                <img src="{{asset('assets/images-cat/'.$c->photo)}}" alt="">
            </div>
            <div class="cat__short_info" >
                <h2>{{$c->name_cat}}</h2>
                 <p>Дата народження: <?php echo date('d.m.Y',strtotime($c->age))?></p>
                 <p>Стать: {{$c->denomination}}</p>
                 <p>Порода: {{$c->denotation}}</p>
                 <p>Колір шерсті: {{$c->appellation}}</p>
                 @if($c->dateofdeath)
                 <p>Дата смерті: {{$c->dateofdeath}}</p>
                 @else
                 <p>Дата смерті: -</p>
                 @endif
                
            </div>
            
</div>
<h2 class="desc">Довідка</h2>
<p class="cat_p">{{$c->description_breed}}</p>
@endforeach

</div>