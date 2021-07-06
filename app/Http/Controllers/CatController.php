<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Sex;
use App\Breed;
use App\Cat;
use App\CatImage;
use App\Color;
use App\Client;
use App\ClientImage;

class CatController extends Controller
{
    public function getAddCat()
    {
        $breed = Breed::all();
        $color = Color::all();
        $sex = Sex::all();
        return view('templates.cat.addcatinfo',[
            'breed'=>$breed,
            'color'=>$color,
            'sex'=>$sex
        ]);
    }

    public function postAddCat(Request $request)
    {
        $em = session('name');
        $IdEm = Client::select('id')->where('email',$em)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }

        $avatar = '';
       
            
        if($request->hasFile('photo')){
         $fileAvatar = $request->file('photo');
         $avatar = $fileAvatar->getClientOriginalName();
         $fileAvatar->move(public_path().'/assets/images-cat', $avatar);
        }
        
        // dd($request->input('age'));
           

        Cat::create([
             'name_cat'=>$request->input('catname'),
             'age'=>$request->input('age'),
             'date_of_death'=>$request->input('death'),
             'breed_id'=>$request->input('breed'),
             'sex_id'=>$request->input('sex'),
             'color_id'=>$request->input('color'),
             'client_id'=>$sid
             
         ]);
        
         $Id = Cat::select('id')->where('name_cat',$request->input('catname'))->get();
         $si = '';
         foreach($Id as $g)
         {
             $si = $g->id;
         }

         CatImage::create([
            'photo'=>$avatar,
            'cat_id'=>$si
         ]);

         return redirect()->route('client');
    }

    public function getInfoCat()
    {
        $em = session('name');
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();

        $user = Client::where('email',$em)
        ->join('sex','clients.sex_id','=','sex.id')
        ->join('clubs','clients.club_id','=','clubs.id')->get();

        $cat = Cat::join('sex','cats.sex_id','=','sex.id')
        ->join('breeds','cats.breed_id','=','breeds.id')
        ->join('colors','cats.color_id','=','colors.id')
        ->join('cat_images','cat_images.cat_id','=','cats.id')
        ->join('clients','cats.client_id','=','clients.id')->where('clients.email',$em)->get();

        return view('templates.cat.catpersonal',[
            'cat'=>$cat,
            'img'=>$img,
            'user'=>$user
        ]);
    }

    public function getViewCat($id)
    {
        
        $em = session('name');
        $img = ClientImage::join('clients','client_images.client_id','=','clients.id')->where('email',$em)->get();

        $user = Client::where('email',$em)
        ->join('sex','clients.sex_id','=','sex.id')
        ->join('clubs','clients.club_id','=','clubs.id')->get();

        $cat = Cat::join('sex','cats.sex_id','=','sex.id')
        ->join('breeds','cats.breed_id','=','breeds.id')
        ->join('colors','cats.color_id','=','colors.id')
        ->join('cat_images','cat_images.cat_id','=','cats.id')
        ->join('clients','cats.client_id','=','clients.id')->where('cats.name_cat',$id)->get();

        return view('templates.user.UserCatView',[
            'cat'=>$cat,
            'img'=>$img,
            'user'=>$user
        ]);
    }

    public function getUpdateCat()
    {
        $sex = Sex::all();
        $color = Color::all();
        $breed = Breed::all();
        $em = session('name');
        $cat = Cat::join('cat_images','cat_images.cat_id','=','cats.id')
        ->join('clients','cats.client_id','=','clients.id')->where('clients.email',$em)->get();
       
       
        return view('templates.cat.updatecatinfo',[
            'sex'=>$sex,
            'cat'=>$cat,
            'sex'=>$sex,
            'breed'=>$breed,
            'color'=>$color
        ]);
    }

    public function postUpdateCat(Request $request)
    {
        $em = session('name');
        $IdEm = Client::select('id')->where('email',$em)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
        
        $cat = Cat::select('id')->where('client_id',$sid)->get();
       
        $idC ='';
        foreach($cat as $c){
            $idC = $c->id;
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
           $avatar = CatImage::select('photo')->where('cat_id',$idC)->get();
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
            CatImage::where('cat_id',$idC)->update(['photo'=>$av]);
        }
        else
        {
            CatImage::where('cat_id',$idC)->update(['photo'=>$avatar]);
        }

       
      
         
           $upc = Cat::find($idC);
          
           $upc->name_cat = $request->get('catname');
           $upc->age=$request->get('age');
           $upc->sex_id=$request->get('sex');
            $upc->date_of_death = $request->get('death');
            $upc->breed_id = $request->get('breed');
            $upc->color_id = $request->get('color');
           $upc->save();

          
          

           return redirect()->route('client');
    }

    public function deleteCat()
    {
        $em = session('name');
        $IdEm = Client::select('id')->where('email',$em)->get();
        $sid = '';
        foreach($IdEm as $g)
        {
            $sid = $g->id;
        }
        
        $cat = Cat::select('id')->where('client_id',$sid)->get();
       
        $idC ='';
        foreach($cat as $c){
            $idC = $c->id;
        }

        $cl = Cat::find($idC);
        if($cl)
        {
            $cl->delete();
        }

        return redirect()->route('client');
    }
}
