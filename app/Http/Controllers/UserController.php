<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadAvatar(Request $request) {
        if($request->hasFile('image')){

            User::uploadAvatar($request->image);
            return redirect()->back()->with('message','Image Uploaded.');
            // $filename=$request->image->getClientOriginalName();
            // $this->deleteOldImage();
            // $request->image->storeAs('images',$filename,'public');
            // auth()->user()->update(['avatar'=> $filename]);
        }
        return redirect()->back()->with('error','File Invalid.');
    }

    // protected function deleteOldImage(){
    //     if(auth()->user()->avatar){
    //         Storage::delete('/public/images/'.auth()->user()->avatar);
    //     }
    // }

    public function index()
    {
        // inserting into the database
        // $user= new User();
        // $user->name='moni';
        // $user->email='moni@gmail.com';
        // $user->password= bcrypt('pass');
        // $user->save();

        // mass assignment
        // $data=[
        //     'name'=>'Elon',
        //     'email' => 'elon@bitfumes.com',
        //     'password' => bcrypt('password'),
        // ];
        // User::create($data);

        // fetching the user
        // $user=User::all();
        // return $user;

        // deleting the user
        // User::where('id',3)->delete();

        // updating user
        // User::where('id',2)->update(['name'=>'bitfumesss']);
        $user=User::all();
        return $user;


        return view('home');
    }

}
