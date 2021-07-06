<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Employee;
use App\Sex;
use App\Position;
use App\Club;
use App\AdminImage;
use App\Status;
use App\Client;
use App\ClientImage;
use App\Breed;
use App\Cat;
use App\CatImage;
use App\Color;
use App\Event;
use App\Place;
use App\TypeOfEvent;
use App\Dutie;
use App\Client_participation_in_the_event;
use App\Cat_participation_in_the_event;
use App\Employee_participation_in_the_event;
use App\Role;


class EmployeeController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth:employee');
    // }
    public function index()
    {
        $em = session('admin');
        $user = Employee::where('email_admin',$em)->get();
        $img = AdminImage::join('employees','admin_images.admin_id','=','employees.id')->where('email_admin',$em)->get();
        
        return view('admin',[
            'user'=>$user,
            'img'=>$img
            ]);
    }

    public function getSignin()
    {
        return view('templates.admin.auth.adminSignin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
            'email_admin'=>'required|max:255',
            'password_admin'=>'required|min:6'
        ]);
        $data = $request->input('email_admin');
        $request->session()->push('admin',$data);
     
        $emp = Employee::where('email_admin',$request->input('email_admin'))->get();
        
        foreach($emp as $i)
        {
           
            if(Hash::check($request->input('password_admin'), $i->password_admin))
            {
                return redirect()->route('admin')->with('info','Ви успішно авторизувалися');
                
            }
           
        }
        
        return redirect()->back()->with('info','Неправильий email або пароль');

        
    }
//для адмін панелі
    

    public function getSignout(Request $request)
    {
        //Auth::logout();
        $request->session()->forget('admin');
        return redirect()->route('home');
    }

    public function getInfo()
    {
        $sex = Sex::all();
        $club = CLub::all();
        $position = Position::all();
        return view('templates.admin.addAdmin',[
            'sex'=>$sex,
            'club'=>$club,
            'position'=>$position,
        ]);
    }

    public function postInfo(Request $request)
    {
        
       $avatar = '';
       $background = '';
           
       if($request->hasFile('avat')){
        $fileAvatar = $request->file('avat');
        $avatar = $fileAvatar->getClientOriginalName();
        $fileAvatar->move(public_path().'/assets/images-admin', $avatar);
       }
          
        if($request->hasFile('ground')){
            $fileBG = $request->file('ground');
            $background = $fileBG->getClientOriginalName();
            $fileBG->move(public_path().'/assets/images-admin', $background);
        }

       /* Client::create([
            'last_name'=>$request->input('lname'),
            'first_name'=>$request->input('fname'),
            'father_name'=>$request->input('fathername'),
            'birthday'=>$request->input('age'),
            'city'=>$request->input('city'),
            'sex_id'=>$request->input('sex'),
            'club_id'=>$request->input('club'),
            'instagram'=>$request->input('instagram'),
            'twitter'=>$request->input('twitter'),
            'facebook'=>$request->input('facebook')
            

        ]);*/
        $em = session('admin');
        
        $IdEm = Employee::select('id')->where('email_admin',$em)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }

        
     
           AdminImage::create([
            'avatar'=>$avatar,
            'bg'=>$background,
            'admin_id'=>$sid
           ]);
           
           $upc = Employee::find($sid);
           $upc->last_name = $request->get('lastname');
           $upc->first_name=$request->get('firstname');
           $upc->father_name=$request->get('fathername');
           $upc->birthday=$request->get('age');
           $upc->position_id=$request->get('position');
           $upc->sex_id=$request->get('sex');
           $upc->club_id=$request->get('club');
         
          
           $upc->save();

           return redirect()->route('admin');
    }


    public function getUpdateAdmin()
    {
        $sex = Sex::all();
        $club = Club::all();
        $position = Position::all();
        $em = session('admin');
        $user = Employee::where('email_admin',$em)->get();
       
        return view('templates.admin.updateAdmin',[
            'sex'=>$sex,
            'club'=>$club,
            'user'=>$user,
            'position'=>$position
        ]);
        
    }

    public function postUpdateAdmin(Request $request)
    {
        $em = session('admin');
        $IdEm = Employee::select('id')->where('email_admin',$em)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
       
        $avatar = '';
       $background = '';
       $av = '';
       $bd = '';
           
       if($request->hasFile('avat')){
        $fileAvatar = $request->file('avat');
        $avatar = $fileAvatar->getClientOriginalName();
        $fileAvatar->move(public_path().'/assets/images-admin', $avatar);
       }
       else
       {
           $avatar = AdminImage::select('avatar')->where('admin_id',$sid)->get();
           foreach($avatar as $a)
           {
              $av = $a->avatar;
          }
          
       }
         
        if($request->hasFile('ground')){
            $fileBG = $request->file('ground');
            $background = $fileBG->getClientOriginalName();
            $fileBG->move(public_path().'/assets/images-admin', $background);
        }
        else
        {
            $background = AdminImage::select('bg')->where('admin_id',$sid)->get();
            foreach($background as $a)
             {
                $bd = $a->bg;
            }
        }

       /* Client::create([
            'last_name'=>$request->input('lname'),
            'first_name'=>$request->input('fname'),
            'father_name'=>$request->input('fathername'),
            'birthday'=>$request->input('age'),
            'city'=>$request->input('city'),
            'sex_id'=>$request->input('sex'),
            'club_id'=>$request->input('club'),
            'instagram'=>$request->input('instagram'),
            'twitter'=>$request->input('twitter'),
            'facebook'=>$request->input('facebook')
            

        ]);*/
        
    

        if(strlen($av)>0)
        {
            AdminImage::where('admin_id',$sid)->update(['avatar'=>$av]);
        }
        else
        {
            AdminImage::where('admin_id',$sid)->update(['avatar'=>$avatar]);
        }

        if(strlen($bd)>0)
        {
            AdminImage::where('admin_id',$sid)->update(['bg'=>$bd]);
        }
        else
        {
            AdminImage::where('admin_id',$sid)->update(['bg'=>$background]);
        }
       
      
         
           $upc = Employee::find($sid);
           $upc->last_name = $request->get('lastname');
           $upc->first_name=$request->get('firstname');
           $upc->father_name=$request->get('fathername');
           $upc->birthday=$request->get('age');
           $upc->position_id=$request->get('position');
           $upc->sex_id=$request->get('sex');
           $upc->club_id=$request->get('club');
           $upc->save();

          
          

           return redirect()->route('admin');
    }



    /** Admin Functions */

    public function getAdminTable()
    {
        $em = session('admin');
       $employee = Employee::join('admin_images','employees.id','=','admin_images.admin_id')
       ->join('sex','employees.sex_id','=','sex.id')
       ->join('positions','employees.position_id','=','positions.id')
       ->join('clubs','employees.club_id','=','clubs.id')->orderBy('first_name')->where('email_admin','!=',$em)->get();

    
        
        return view('templates.admin.adminList',[
            'employee'=>$employee
            
        ]);
    }
//CRUD
    public function getAdminNew_Create()
    {
        $club = Club::all();
        $position = Position::all();
        $sex = Sex::all();

        return view('templates.admin.tableAdmin.adminsCreate',[
            'club'=>$club,
            'position'=>$position,
            'sex'=>$sex
        ]);
    }

    public function postAdminNew_Create(Request $request)
    {


        $avatar = '';
        $background = '';
            
        if($request->hasFile('avat')){
         $fileAvatar = $request->file('avat');
         $avatar = $fileAvatar->getClientOriginalName();
         $fileAvatar->move(public_path().'/assets/images-admin', $avatar);
        }
           
         if($request->hasFile('ground')){
             $fileBG = $request->file('ground');
             $background = $fileBG->getClientOriginalName();
             $fileBG->move(public_path().'/assets/images-admin', $background);
         }

 
        Employee::create([
             'last_name'=>$request->input('lastname'),
             'first_name'=>$request->input('firstname'),
             'father_name'=>$request->input('fathername'),
             'birthday'=>$request->input('age'),
             'position_id'=>$request->input('position'),
             'sex_id'=>$request->input('sex'),
             'club_id'=>$request->input('club'),
             'email_admin'=>$request->input('email_admin'),
             'password_admin'=>Hash::make($request->input('password_admin')),
             'accept'=>$request->input('accept'),
             'quit'=>$request->input('quit')
             
         ]);
        
         $IdEm = Employee::select('id')->where('email_admin',$request->input('email_admin'))->get();
         $sid = '';
         foreach($IdEm as $g)
         {
             $sid = $g->id;
         }

         AdminImage::create([
            'avatar'=>$avatar,
            'bg'=>$background,
            'admin_id'=>$sid
         ]);

         return redirect()->route('adminTable');
    }

    public function getAdminNew_Update($id)
    {
        $position = Position::all();
        $sex = Sex::all();
        $club = Club::all();
        $employee = Employee::join('admin_images','employees.id','=','admin_images.admin_id')->where('email_admin',$id)->get();
        return view('templates.admin.tableAdmin.adminsUpdate',[
            'employee'=>$employee,
            'position'=>$position,
            'sex'=>$sex,
            'club'=>$club
        ]);
    }

    public function postAdminNew_Update($id,Request $request)
    {
        
        $IdEm = Employee::select('id')->where('email_admin',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
       
        $avatar = '';
       $background = '';
       $av = '';
       $bd = '';
           
       if($request->hasFile('avat')){
        $fileAvatar = $request->file('avat');
        $avatar = $fileAvatar->getClientOriginalName();
        $fileAvatar->move(public_path().'/assets/images-admin', $avatar);
       }
       else
       {
           $avatar = AdminImage::select('avatar')->where('admin_id',$sid)->get();
           foreach($avatar as $a)
           {
              $av = $a->avatar;
          }
          
       }
         
        if($request->hasFile('ground')){
            $fileBG = $request->file('ground');
            $background = $fileBG->getClientOriginalName();
            $fileBG->move(public_path().'/assets/images-admin', $background);
        }
        else
        {
            $background = AdminImage::select('bg')->where('admin_id',$sid)->get();
            foreach($background as $a)
             {
                $bd = $a->bg;
            }
        }

       /* Client::create([
            'last_name'=>$request->input('lname'),
            'first_name'=>$request->input('fname'),
            'father_name'=>$request->input('fathername'),
            'birthday'=>$request->input('age'),
            'city'=>$request->input('city'),
            'sex_id'=>$request->input('sex'),
            'club_id'=>$request->input('club'),
            'instagram'=>$request->input('instagram'),
            'twitter'=>$request->input('twitter'),
            'facebook'=>$request->input('facebook')
            

        ]);*/
        
    

        if(strlen($av)>0)
        {
            AdminImage::where('admin_id',$sid)->update(['avatar'=>$av]);
        }
        else
        {
            AdminImage::where('admin_id',$sid)->update(['avatar'=>$avatar]);
        }

        if(strlen($bd)>0)
        {
            AdminImage::where('admin_id',$sid)->update(['bg'=>$bd]);
        }
        else
        {
            AdminImage::where('admin_id',$sid)->update(['bg'=>$background]);
        }
       
      
         
           $upc = Employee::find($sid);
           $upc->last_name = $request->get('lastname');
           $upc->first_name=$request->get('firstname');
           $upc->father_name=$request->get('fathername');
           $upc->birthday=$request->get('age');
           $upc->accept = $request->input('accept');
           $upc->quit = $request->input('quit');
           $upc->position_id=$request->get('position');
           $upc->sex_id=$request->get('sex');
           $upc->club_id=$request->get('club');
           $upc->save();

          
          

           return redirect()->route('adminTable');
    }

    public function deleteAdminNew_Delete($id)
    {
        $IdEm = Employee::select('id')->where('email_admin',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }

        $empl = Employee::find($sid);
        if($empl)
        {
            $empl->delete();
        }

        return redirect()->route('adminTable');

    }


    /**Clients Crud */

    public function getClientsTable()
    {
        //$em = session('admin');
       $client = Client::join('client_images','clients.id','=','client_images.client_id')
         ->join('sex','clients.sex_id','=','sex.id')->leftJoin('status','clients.status_id','=','status.id')
         ->join('clubs','clients.club_id','=','clubs.id')->get();
        
        return view('templates.admin.clientsList',[
            'client'=>$client
            
            
        ]);
    }

    public function getClientInfo($id)
    {
        //$em = session('admin');
       $user = Client::join('client_images','clients.id','=','client_images.client_id')
         ->join('sex','clients.sex_id','=','sex.id')
         ->leftJoin('status','clients.status_id','=','status.id')
         ->join('clubs','clients.club_id','=','clubs.id')->where('email',$id)->get();

         $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$id)->get();
         $status =  Client::where('email',$id)
         ->leftJoin('status','clients.status_id','=','status.id')->get();
 
         $cat = Cat::join('sex','cats.sex_id','=','sex.id')
         ->join('breeds','cats.breed_id','=','breeds.id')
         ->join('colors','cats.color_id','=','colors.id')
         ->join('cat_images','cat_images.cat_id','=','cats.id')
         ->join('clients','cats.client_id','=','clients.id')->where('clients.email',$id)->get();
        return view('templates.admin.clientInfo',[
            'user'=>$user,
            'status'=>$status,
            'cat'=>$cat,
            'img'=>$img
            
        ]);
    }

    public function getClientNew_Create()
    {
        $club = Club::all();
        $status = Status::all();
        $sex = Sex::all();


        return view('templates.admin.tableAdmin.clientsCreate',[
            'club'=>$club,
            'status'=>$status,
            'sex'=>$sex,
            
        ]);
    }

    public function postClientNew_Create(Request $request)
    {


        $avatar = '';
        $background = '';
            
        if($request->hasFile('avat')){
         $fileAvatar = $request->file('avat');
         $avatar = $fileAvatar->getClientOriginalName();
         $fileAvatar->move(public_path().'/assets/images-user', $avatar);
        }
           
         if($request->hasFile('ground')){
             $fileBG = $request->file('ground');
             $background = $fileBG->getClientOriginalName();
             $fileBG->move(public_path().'/assets/images-user', $background);
         }

 
        Client::create([
             'last_name'=>$request->input('lastname'),
             'first_name'=>$request->input('firstname'),
             'father_name'=>$request->input('fathername'),
             'birthday'=>$request->input('birthday'),
             'status_id'=>$request->input('status'),
             'sex_id'=>$request->input('sex'),
             'club_id'=>$request->input('club'),
             'email'=>$request->input('email'),
             'city'=>$request->input('city'),
             'password'=>Hash::make($request->input('password')),
             'accepted'=>$request->input('accepted'),
             'quit'=>$request->input('quit'),
             'twitter'=>$request->input('twitter'),
             'facebook'=>$request->input('facebook'),
             'instagram'=>$request->input('instagram')
             
         ]);
        
         $IdEm = Client::select('id')->where('email',$request->input('email'))->get();
         $sid = '';
         foreach($IdEm as $g)
         {
             $sid = $g->id;
         }

         ClientImage::create([
            'avatar'=>$avatar,
            'bg'=>$background,
            'client_id'=>$sid
         ]);

         return redirect()->route('clientTable');
    }

    public function getClientNew_Update($id)
    {
        $status = Status::all();
        $sex = Sex::all();
        $club = Club::all();
        $client = Client::join('client_images','clients.id','=','client_images.client_id')->where('email',$id)->get();
        return view('templates.admin.tableAdmin.clientsUpdate',[
            'client'=>$client,
            'status'=>$status,
            'sex'=>$sex,
            'club'=>$club
        ]);
    }

    public function postClientNew_Update($id,Request $request)
    {
        
        $IdEm = Client::select('id')->where('email',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
       
        $avatar = '';
       $background = '';
       $av = '';
       $bd = '';
           
       if($request->hasFile('avat')){
        $fileAvatar = $request->file('avat');
        $avatar = $fileAvatar->getClientOriginalName();
        $fileAvatar->move(public_path().'/assets/images-user', $avatar);
       }
       else
       {
           $avatar = ClientImage::select('avatar')->where('client_id',$sid)->get();
           foreach($avatar as $a)
           {
              $av = $a->avatar;
          }
          
       }
         
        if($request->hasFile('ground')){
            $fileBG = $request->file('ground');
            $background = $fileBG->getClientOriginalName();
            $fileBG->move(public_path().'/assets/images-user', $background);
        }
        else
        {
            $background = ClientImage::select('bg')->where('client_id',$sid)->get();
            foreach($background as $a)
             {
                $bd = $a->bg;
            }
        }

       /* Client::create([
            'last_name'=>$request->input('lname'),
            'first_name'=>$request->input('fname'),
            'father_name'=>$request->input('fathername'),
            'birthday'=>$request->input('age'),
            'city'=>$request->input('city'),
            'sex_id'=>$request->input('sex'),
            'club_id'=>$request->input('club'),
            'instagram'=>$request->input('instagram'),
            'twitter'=>$request->input('twitter'),
            'facebook'=>$request->input('facebook')
            

        ]);*/
        
    

        if(strlen($av)>0)
        {
            ClientImage::where('client_id',$sid)->update(['avatar'=>$av]);
        }
        else
        {
            ClientImage::where('client_id',$sid)->update(['avatar'=>$avatar]);
        }

        if(strlen($bd)>0)
        {
            ClientImage::where('client_id',$sid)->update(['bg'=>$bd]);
        }
        else
        {
            ClientImage::where('client_id',$sid)->update(['bg'=>$background]);
        }
       
      
         
           $upc = Client::find($sid);
           $upc->last_name = $request->get('lastname');
           $upc->first_name=$request->get('firstname');
           $upc->father_name=$request->get('fathername');
           $upc->birthday=$request->get('age');
           $upc->accepted = $request->input('accepted');
           $upc->quit = $request->input('quit');
           $upc->city = $request->input('city');
           $upc->status_id=$request->get('status');
           $upc->sex_id=$request->get('sex');
           $upc->club_id=$request->get('club');
           $upc->twitter=$request->get('twitter');
           $upc->facebook=$request->get('facebook');
           $upc->instagram=$request->get('instagram');
           $upc->save();

          
          

           return redirect()->route('clientTable');
    }

    public function deleteClientNew_Delete($id)
    {
        $IdEm = Client::select('id')->where('email',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }

        $cl = Client::find($sid);
        if($cl)
        {
            $cl->delete();
        }

        return redirect()->route('clientTable');

    }
/**Cats */
    public function getCatsTable()
    {
        $cat = Cat::join('sex','cats.sex_id','=','sex.id')
        ->join('breeds','cats.breed_id','=','breeds.id')
        ->join('colors','cats.color_id','=','colors.id')
        ->join('cat_images','cat_images.cat_id','=','cats.id')
        ->leftJoin('clients','cats.client_id','=','clients.id')->get();
        
       return view('templates.admin.catsList',[
           'cat'=>$cat
           
       ]);
    }

    public function getCatNew_Create()
    {
       
        $sex = Sex::all();
        $breed = Breed::all();
        $color = Color::all();
        $client = Client::all();


        return view('templates.admin.tableAdmin.catsCreate',[
            'client'=>$client,
            'breed'=>$breed,
            'sex'=>$sex,
            'color'=>$color
        ]);
    }

    public function postCatNew_Create(Request $request)
    {
       
        
        $avatar = '';
       
            
        if($request->hasFile('photo')){
         $fileAvatar = $request->file('photo');
         $avatar = $fileAvatar->getClientOriginalName();
         $fileAvatar->move(public_path().'/assets/images-cat', $avatar);
        }
           
       

        Cat::create([
            'name_cat'=>$request->input('catname'),
            'age'=>$request->input('age'),
            'date_of_death'=>$request->input('death'),
            'breed_id'=>$request->input('breed'),
            'sex_id'=>$request->input('sex'),
            'color_id'=>$request->input('color'),
            //'client_id'=>$request->input('client')
            
        ]);
      
         $IdEm = Cat::select('cats.id')->where('name_cat',$request->input('catname'))->get();
         /*join('clients','cats.client_id','=','clients.id')
         ->where('clients.id',$request->input('client'))->get();*/
         
         $sid = '';
         foreach($IdEm as $g)
         {
             $sid = $g->id;
         }

         CatImage::create([
            'photo'=>$avatar,
            'cat_id'=>$sid
         ]);

         return redirect()->route('catTable');
    }

    public function getCatNew_Update($cid)
    {
        $breed = Breed::all();
        $sex = Sex::all();
        $color = Color::all();
        $client = Client::all();
        
        
        $cat = CatImage::join('cats','cats.id','=','cat_images.cat_id')
        ->where('cat_id',$cid)->get();
        return view('templates.admin.tableAdmin.catsUpdate',[
            'client'=>$client,
            'breed'=>$breed,
            'sex'=>$sex,
            'color'=>$color,
            'cat'=>$cat
        ]);
    }

    public function postCatNew_Update($cid,Request $request)
    {
        $i = 0;
        if($request->input('client') == 'Клуб')
        {
            $request->except('client');
            $i = 1;
        }
        $IdEm = Cat::select('id')->where('id',$cid)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
       
        $avatar = '';
      
       $av = '';
           
       if($request->hasFile('photo')){
        $fileAvatar = $request->file('photo');
        $avatar = $fileAvatar->getClientOriginalName();
        $fileAvatar->move(public_path().'/assets/images-cat', $avatar);
       }
       else
       {
           $avatar = CatImage::select('photo')->where('cat_id',$sid)->get();
           foreach($avatar as $a)
           {
              $av = $a->photo;
          }
          
       }
         
      

       /* Client::create([
            'last_name'=>$request->input('lname'),
            'first_name'=>$request->input('fname'),
            'father_name'=>$request->input('fathername'),
            'birthday'=>$request->input('age'),
            'city'=>$request->input('city'),
            'sex_id'=>$request->input('sex'),
            'club_id'=>$request->input('club'),
            'instagram'=>$request->input('instagram'),
            'twitter'=>$request->input('twitter'),
            'facebook'=>$request->input('facebook')
            

        ]);*/
        
    

        if(strlen($av)>0)
        {
            CatImage::where('cat_id',$sid)->update(['photo'=>$av]);
        }
        else
        {
            CatImage::where('cat_id',$sid)->update(['photo'=>$avatar]);
        }

       
       
      
         
           $upc = Cat::find($sid);
           $upc->name_cat = $request->get('catname');
           $upc->age=$request->get('age');
           $upc->sex_id=$request->get('sex');
            $upc->date_of_death = $request->get('death');
            $upc->breed_id = $request->get('breed');
            $upc->color_id = $request->get('color');
           if($i == 0){
            $upc->client_id = $request->get('client');
           }
          
            //$upc->client_id = $request->get('client');
           
           $upc->save();
          

          
          

           return redirect()->route('catTable');
    }

   
    public function deleteCatNew_Delete($id)
    {
        $IdEm = Cat::select('id')->where('id',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }

        $cl = Cat::find($sid);
        if($cl)
        {
            $cl->delete();
        }

        return redirect()->route('catTable');

    }

    /**Events */

    public function getEventsTable()
    {
        $event = Event::join('places','events.place_id','=','places.id')
        ->join('type_of_events','events.typeofevent_id','=','type_of_events.id')
        ->join('clubs','events.club_id','=','clubs.id')
        ->join('employees','events.employee_id','=','employees.id')->get();
        
       return view('templates.admin.eventsList',[
           'event'=>$event
           
       ]);
    }

    public function getEventNew_Create()
    {
       
        $place = Place::all();
        $typeofevent = TypeOfEvent::all();
        $club = Club::all();
        $employee = Employee::all();


        return view('templates.admin.tableAdmin.eventsCreate',[
            'place'=>$place,
            'typeofevent'=>$typeofevent,
            'club'=>$club,
            'employee'=>$employee
        ]);
    }

    public function postEventNew_Create(Request $request)
    {
       
    
        Event::create([
            'event_name'=>$request->input('event_name'),
            'place_id'=>$request->input('place'),
            'typeofevent_id'=>$request->input('typeofevent'),
            'club_id'=>$request->input('club'),
            'event_description'=>$request->input('event_description'),
            'employee_id'=>$request->input('employee'),
            'start_date_event'=>$request->input('start_date_event'),
            'finish_date_event'=>$request->input('finish_date_event'),
            
        ]);
      

         return redirect()->route('eventTable');
    }

    public function getEventNew_Update($cid)
    {
        $place = Place::all();
        $typeofevent = TypeOfEvent::all();
        $club = Club::all();
        $employee = Employee::all();
        
        
        $event = Event::join('places','events.place_id','=','places.id')
        ->join('type_of_events','events.typeofevent_id','=','type_of_events.id')
        ->join('clubs','events.club_id','=','clubs.id')
        ->join('employees','events.employee_id','=','employees.id')->where('events.event_name',$cid)->get();

        return view('templates.admin.tableAdmin.eventsUpdate',[
           'place'=>$place,
            'typeofevent'=>$typeofevent,
            'club'=>$club,
            'employee'=>$employee,
            'event'=>$event
        ]);
    }

    public function postEventNew_Update($cid,Request $request)
    {
       
        $IdEm = Event::select('id')->where('event_name',$cid)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
       
       
      
         
           $upc = Event::find($sid);
           $upc->event_name = $request->get('event_name');
           $upc->place_id=$request->get('place');
           $upc->employee_id=$request->get('employee');
            $upc->typeofevent_id = $request->get('typeofevent');
            $upc->event_description = $request->get('event_description');
            $upc->club_id = $request->get('club');
            $upc->start_date_event = $request->get('start_date_event');
            $upc->finish_date_event = $request->get('finish_date_event');
           $upc->save();
          
          

           return redirect()->route('eventTable');
    }

    public function deleteEventNew_Delete($id)
    {
        $IdEm = Event::select('id')->where('event_name',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }

        $cl = Event::find($sid);
        if($cl)
        {
            $cl->delete();
        }

        return redirect()->route('eventTable');

    }

    public function getParticipatetNew_Create(){
        $event = Event::all();
        $client = Client::all();
        $dutie = Dutie::all();
        $dut = Dutie::all();
        $cat = Cat::all();
        $role = Role::all();
        $employee = Employee::all();
        return view('templates.admin.tableAdmin.addParticipate',[

            'event'=>$event,
            'client'=>$client,
            'dutie'=>$dutie,
            'cat'=>$cat,
            'role'=>$role,
            'employee'=>$employee,
            'dut'=>$dut

        ]);
    }

    public function postParticipatetNew_Create(Request $request)
    {
       
       if($request->input('client') != '-' && $request->input('dutie') != '-')
       {
        Client_participation_in_the_event::create([
            'event_id'=>$request->input('event'),
            'client_id'=>$request->input('client'),
            'dutie_id'=>$request->input('dutie')
            
        ]);
       }
       
       if($request->input('cat') != '-' && $request->input('role') != '-'){
        Cat_participation_in_the_event::create([
            'event_id'=>$request->input('event'),
            'cat_id'=>$request->input('cat'),
            'role_id'=>$request->input('role')
            
        ]);
       }

       if($request->input('employee') != '-' && $request->input('dut') != '-')
       {
        Employee_participation_in_the_event::create([
            'event_id'=>$request->input('event'),
            'employee_id'=>$request->input('employee'),
            'dutie_id'=>$request->input('dut')
            
        ]);
       }
     

       

       
      

         return redirect()->route('eventTable');
    }

    public function getPageEvent($id)
    {
        $IdEm = Event::select('id')->where('event_name',$id)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
        
        $event = Event::join('places','events.place_id','=','places.id')
        ->join('type_of_events','events.typeofevent_id','=','type_of_events.id')
        ->join('clubs','events.club_id','=','clubs.id')
        ->join('employees','events.employee_id','=','employees.id')->where('event_name',$id)->get();

        $client = Client::join('client_participation_in_the_events', 'client_participation_in_the_events.client_id','=','clients.id')->join('duties','client_participation_in_the_events.dutie_id','=','duties.id')->where('event_id',$sid)->get();
        $cat = Cat::join('cat_participation_in_the_events', 'cat_participation_in_the_events.cat_id','=','cats.id')->join('roles','cat_participation_in_the_events.role_id','=','roles.id')->where('event_id',$sid)->get();
        $employee = Employee::join('employee_participation_in_the_events', 'employee_participation_in_the_events.employee_id','=','employees.id')->join('duties','employee_participation_in_the_events.dutie_id','=','duties.id')->where('event_id',$sid)->get();
       
        return view('templates.admin.tableAdmin.pageEvents',[
            'event'=>$event,
            'cat'=>$cat,
            'client'=>$client,
            'employee'=>$employee
        ]);
    }

}
