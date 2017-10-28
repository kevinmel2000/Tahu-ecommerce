<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    //
    public function getLogin(){
      if (Auth::check()) {
        # code...
        return redirect()->route('home');
      }
    	return view('guest.login');
    }



    public function postSignup(Request  $request){
    	$this->validate($request,[
    		'email'    => 'email|required|unique:users',
    		'password' => 'required|min:4',
    		'name' 	   => 'required|min:4'
    	]);

    	$user= new User([
   			'email'=> $request->input('email'),
   			'name' => $request->input('name'),
   			'password' => bcrypt($request->input('password')),
   			'type' => 'user'
   		]);
   		$user->save();

   		 Auth::login($user);

       if (Session::has('oldUrl')){
           $oldUrl = Session::get('oldUrl');
           Session::forget('oldUrl');
           return redirect()->to($oldUrl);
       }
   		return redirect()->route('user.profile');
    }

    public function getUserProfile(){
    	return view('user.user_profile');
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('home');
    }

    public function getHome(){
    	return view('welcome');
    }

    public function postLogin(Request $request){
    	 $this->validate($request, [
            'email'     => 'email|required',
            'password'  => 'required|min:4'
         ]);

      if( (Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])) && (Auth::user()->type=='user')   )
         {
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
         return redirect()->route('user.profile'); //bila login sukses ke halaman profile
         }

      else if((Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])) && (Auth::user()->type=='admin') ){
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
      	 return redirect()->route('admin.profile');
      }

         else{
             return redirect()->back(); //kalo gagal refresh ulang 
         }
        
    }
    public function getAdminProfile(){
    	return view ('admin.admin_profile');
    }
}
