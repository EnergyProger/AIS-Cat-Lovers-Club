<div id="content">
<div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Управління <b>Клієнтами</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('new_client')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Добавити нового клієнта</span></a>
						
					</div>
                </div>
               
            </div>
         
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                       <th>Аватар</th>
                        <th>Ім'я</th>
                        <th>Дата народження</th>
                        <th>Email</th>
                        <th>Місто</th>
						<th>Стать</th>
                        <th>Статус</th>
                        <th>Клуб</th>
                        <th>Вступ</th>
                        <th>Покинуто</th>
                        <th>Дії</th>
                    </tr>
                </thead>

                <tbody>
               
                <tr>
                   
                @foreach($client as $cl)
                        
                       <td><a href="{{route('clientInf',$cl->email)}}"><img style="width: 80px; height: 70px; border-radius: 50%;" src="{{asset('assets/images-user/'.$cl->avatar)}}"/></td><a>
                      
                       <td>{{$cl->first_name}} {{$cl->last_name}}</td>
                        <td>{{$cl->birthday}}</td>
						<td>{{$cl->email}}</td>
                        <td>{{$cl->city}}</td>
                        <td>{{$cl->denomination}}</td>
                        
                        <td>{{$cl->forename}}</td>
                        <td>{{$cl->name}}</td>
                        <td>{{$cl->accepted}}</td>
                        <td>{{$cl->quit}}</td>
                        <td>
                            <a href="{{route('update_client',$cl->email)}}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="{{route('delete_client',$cl->email)}}" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                       </tr>
                @endforeach
            
               
                </tbody>
               
            </table>
			
    </div>
	
	</div>
    </div>