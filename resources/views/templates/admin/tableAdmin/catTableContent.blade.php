<div id="content">
<div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Управління <b>Улюбленцями</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('new_cat')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Добавити нового домашнього улюбленця</span></a>
						
					</div>
                </div>
               
            </div>
         
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                       <th>Фото</th>
                        <th>Ім'я</th>
                        <th>Дата народження</th>
						<th>Стать</th>
                        <th>Порода</th>
                        <th>Колір</th>
                        <th>Дата смерті</th>
                        <th>Власник</th>
                        <th>Дії</th>
                    </tr>
                </thead>

                <tbody>
               
                <tr>
                   
                @foreach($cat as $cl)
                        
                       <td><img style="width: 80px; height: 70px; border-radius: 50%;" src="{{asset('assets/images-cat/'.$cl->photo)}}"/></td>
                      
                       <td>{{$cl->name_cat}}</td>
                        <td>{{$cl->age}}</td>
                        <td>{{$cl->denomination}}</td>
                        <td>{{$cl->denotation}}</td>
                        <td>{{$cl->appellation}}</td>
                        <td>{{$cl->date_of_death}}</td>
                        <td>{{$cl->first_name}} {{$cl->last_name}}</td>
                        <td>
                            <a href="{{route('update_cat',$cl->cat_id)}}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="{{route('delete_cat',$cl->cat_id)}}" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                       </tr>
                @endforeach
            
               
                </tbody>
               
            </table>
			
    </div>
	
	</div>
    </div>