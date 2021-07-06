<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use App\Client;
use App\ClientImage;
use App\Sex;
use App\Club;
use App\Cat;
use App\CatImage;
use App\Event;
use App\Employee;
use App\Place;
use App\TypeOfEvent;
use App\Dutie;
use App\Client_participation_in_the_event;
use App\Cat_participation_in_the_event;
use App\Employee_participation_in_the_event;
use App\Role;

class ClientController extends Controller
{
    public function index()
    {
        $em = session('name');
        $user = Client::where('email',$em)
        ->join('sex','clients.sex_id','=','sex.id')
        ->join('clubs','clients.club_id','=','clubs.id')->get();
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();
        $status =  Client::where('email',$em)
        ->leftJoin('status','clients.status_id','=','status.id')->get();

        $cat = Cat::join('sex','cats.sex_id','=','sex.id')
        ->join('breeds','cats.breed_id','=','breeds.id')
        ->join('colors','cats.color_id','=','colors.id')
        ->join('cat_images','cat_images.cat_id','=','cats.id')
        ->join('clients','cats.client_id','=','clients.id')->where('clients.email',$em)->get();
       

        return view('user',[
            'user'=>$user,
            'img'=>$img,
            'status'=>$status,
            'cat'=>$cat
            ]);
    }

    public function getUserInfo($id)
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
        return view('templates.user.userIndivd',[
            'user'=>$user,
            'status'=>$status,
            'cat'=>$cat,
            'img'=>$img
            
        ]);
    }

    

    public function getInfo()
    {
        $sex = Sex::all();
        $club = CLub::all();
        return view('templates.user.userAddinfo',[
            'sex'=>$sex,
            'club'=>$club
        ]);
    }

    public function postInfo(Request $request)
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
        $em = session('name');
        
        $IdEm = Client::select('id')->where('email',$em)->get();
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
           
           $upc = Client::find($sid);
           $upc->last_name = $request->get('lastname');
           $upc->first_name=$request->get('firstname');
           $upc->father_name=$request->get('fathername');
           $upc->birthday=$request->get('age');
           $upc->city=$request->get('city');
           $upc->sex_id=$request->get('sex');
           $upc->club_id=$request->get('club');
           $upc->instagram=$request->get('instagram');
           $upc->twitter=$request->get('twitter');
           $upc->facebook=$request->get('facebook');

           $upc->save();

           return redirect()->route('client');
    }

    public function getUpdateClient()
    {
        $sex = Sex::all();
        $club = CLub::all();
        $em = session('name');
        $user = Client::where('email',$em)->get();
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();
       
        return view('templates.user.userUpdate',[
            'sex'=>$sex,
            'club'=>$club,
            'user'=>$user,
            'img'=>$img
        ]);
        
    }

    public function postUpdateClient(Request $request)
    {
        $em = session('name');
        $IdEm = Client::select('id')->where('email',$em)->get();
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
           $upc->city=$request->get('city');
           $upc->sex_id=$request->get('sex');
           $upc->club_id=$request->get('club');
           $upc->instagram=$request->get('instagram');
           $upc->twitter=$request->get('twitter');
           $upc->facebook=$request->get('facebook');

           $upc->save();

          
          

           return redirect()->route('client');
    }

    public function getUserTable()
    {
        $em = session('name');
        $client = Client::join('client_images','clients.id','=','client_images.client_id')
        ->join('sex','clients.sex_id','=','sex.id')
        ->leftJoin('status','clients.status_id','=','status.id')
        ->join('clubs','clients.club_id','=','clubs.id')->where('email','!=',$em)->get();
        $user = Client::where('email',$em)->get();
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();
        
        return view('templates.user.userTable',[
            'client'=>$client,
            'img'=>$img,
            'user'=>$user
        ]);
    }

    public function getEventTable()
    {
        $em = session('name');
        $event = Event::join('places','events.place_id','=','places.id')
        ->join('type_of_events','events.typeofevent_id','=','type_of_events.id')
        ->join('clubs','events.club_id','=','clubs.id')
        ->join('employees','events.employee_id','=','employees.id')->get();
        $user = Client::where('email',$em)->get();
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();
        
        return view('templates.user.eventTable',[
            'event'=>$event,
            'img'=>$img,
            'user'=>$user
        ]);
    }

    public function getEventInf($id)
    {
        $em = session('name');
        $user = Client::where('email',$em)->get();
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();

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
       
        return view('templates.user.eventInf',[
            'event'=>$event,
            'cat'=>$cat,
            'client'=>$client,
            'employee'=>$employee,
            'user'=>$user,
            'img'=>$img
        ]);
    }

    public function getCatUserTable()
    {
        $em = session('name');
        $cat = Cat::join('sex','cats.sex_id','=','sex.id')
        ->join('breeds','cats.breed_id','=','breeds.id')
        ->join('colors','cats.color_id','=','colors.id')
        ->join('cat_images','cat_images.cat_id','=','cats.id')
        ->join('clients','cats.client_id','=','clients.id')->get();
        $user = Client::where('email',$em)->get();
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();
        
        return view('templates.cat.catUserTalbe',[
            'cat'=>$cat,
            'img'=>$img,
            'user'=>$user
        ]);
    }
}
