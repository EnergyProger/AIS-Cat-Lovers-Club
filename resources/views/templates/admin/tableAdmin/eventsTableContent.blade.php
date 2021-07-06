<div id="content">
<div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Управління <b>Заходами</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('new_event')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Добавити новий захід</span></a>
                        <a href="{{route('new_participate')}}" class="btn btn-warning"><i class="material-icons">&#xE147;</i> <span>Добавити участників в захід</span></a>
						
					</div>
                </div>
               
            </div>
         
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                       <th>Назва заходу</th>
                        <th>Місце проведення</th>
                        <th>Тип заходу</th>
                        <th>Опис заходу</th>
                        <th>Клуб</th>
						<th>Працівник</th>
                        <th>Дата та час початку</th>
                        <th>Дата та час завершення</th>
                        <th>Дії</th>
                    </tr>
                </thead>

                <tbody>
               
                <tr>
                   
                @foreach($event as $ev)
                        
                
                      
                       <td><a href="{{route('page_event',$ev->event_name)}}">{{$ev->event_name}}</a></td>
                       <td>{{$ev->place_name}}</td>
                       <td>{{$ev->event_type_name}}</td>
                       <td>{{$ev->event_description}}</td>
                       <td>{{$ev->name}}</td>
                       <td>{{$ev->last_name}} {{$ev->first_name}}</td>
                       <td>{{$ev->start_date_event}}</td>
                       <td>{{$ev->finish_date_event}}</td>
                        <td>
                            <a href="{{route('update_event',$ev->event_name)}}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="{{route('delete_event',$ev->event_name)}}" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                       </tr>
                @endforeach
            
               
                </tbody>
               
            </table>
			
    </div>
	
	</div>
    </div>