<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

use Illuminate\Support\Facades\Hash;
use App\Events\MessageSent;

use Auth;
class HomeController extends Controller
{

    public function User(){
        $msg=Message::all();
        return view('home',compact('msg'));
    }



public function Alluser(){
    $user=User::where('is_admin',0)->get();
    return view('admin.user',compact('user'));
}

    
public function Adduser(Request $request ){

    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'mobile' => 'required',
        'password' => 'required',
        'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg'
    ]);


   $user = new User();
   $user->name = $request->name;
   $user->email = $request->email;
   $user->mobile = $request->mobile;
   $user->password =Hash::make($request->password) ;

   if ($request->hasFile('avatar')){
    $extension = $request->avatar->getClientOriginalExtension();
    $filename = rand(10000,99999).time().'.'.$extension;
    $request->avatar->move('uploads/user_image/',$filename);
    $user->avatar = $filename;
}


   $user->save();
        $data = User::latest()->first();
        return response()->json($data, 200);



}


//Delete
    public function Delete($id)
    {       
      $user=User::where('id',$id)->first();
      $avatar=$user->avatar;
      $delete= User::where('id',$id)->delete();

       if($delete){
       unlink('uploads/user_image/'.$avatar);

       }
        return response()->json('Successfully Deleted!!!',200);
    }
 





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


public function Admin(){
    return view('admin.adminhome');
}

//send Msg
public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->message
  ]);

  event(new MessageSent($user, $message));

  return ['status' => 'Message Sent!'];
}

//fetch msg
public function fetchMessages()
{
  return Message::with('user')->get();
}

}
