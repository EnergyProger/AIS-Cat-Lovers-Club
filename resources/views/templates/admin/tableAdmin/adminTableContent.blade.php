<div id="content">
<div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Управління <b>Працівниками</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('new_employee')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Добавити нового працівника</span></a>
						
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
						<th>Стать</th>
                        <th>Посада</th>
                        <th>Прийнято</th>
                        <th>Звільнено</th>
                        <th>Клуб</th>
                        <th>Дії</th>
                    </tr>
                </thead>

                <tbody>
               
                <tr>
                   
                @foreach($employee as $empl)
                        
                       <td><img style="width: 80px; height: 70px; border-radius: 50%;" src="{{asset('assets/images-admin/'.$empl->avatar)}}"/></td>
                      
                       <td>{{$empl->first_name}} {{$empl->last_name}}</td>
                        <td>{{$empl->birthday}}</td>
						<td>{{$empl->email_admin}}</td>
                        <td>{{$empl->denomination}}</td>
                        <td>{{$empl->nomination}}</td>
                        <td>{{($empl->accept)}}</td>
                        <td>{{$empl->quit}}</td>
                        <td>{{$empl->name}}</td>
                        <td>
                            <a href="{{route('update_employee',$empl->email_admin)}}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="{{route('delete_employee',$empl->email_admin)}}" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                       </tr>
                @endforeach
            
               
                </tbody>
               
            </table>
			
    </div>
	
	</div>
    </div>