<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\SentRequestController;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }


    public function admindashboard(){

        $pendings = SentRequestController::where('status', 0)->get();
        $posts = Post::all();
        $volunteers = User::where('role', 2)->get();
        $users = User::where('role', 1)->get();
        return view('admin/index',compact('pendings', 'posts', 'volunteers', 'users'));
    }
    
    //  ------------------------------ site setting ---------------------
    public function sitsettinginfo(){
       $row = SiteSetting::first();
        return view('admin/sitesetting', compact('row'));
    }
    public function sitesettingupdate(Request $request,$id){
        $row =SiteSetting::find($id);
        $row->number = $request->number;
        $row->email = $request->email;
        $row->footerinfo = $request->footerinfo;
        $row->facebook = $request->facebook;
        $row->youtube = $request->youtube;
        $row->twitter = $request->twitter;
        $row->linkdin = $request->linkdin;

        $row->update();
        return redirect()->back()->with('success','Change info Successfuly');
    }
    


     //  ------------------------------ setting ---------------------
    public function setting(){
        $userid = Auth::user()->id;
        $users=User::find($userid);
        return view('admin/setting',compact('users'));
    }
    

    public function updateprofile(Request $request,$id){
     

        $this->validate($request,[
            'name' => 'required',
            'phone'=>'required',
            
        ]);
        
        $user=User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        return redirect()->back()->with('success','Change profile Successfuly');
    }

    public function updateemail(Request $request){
        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success','Change email Successfuly');
    }

    public function updatecreadintial(Request $request){


      
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success','Change Password Successfuly');
                
                Auth::logout();
                return redirect()->back();
            } else {
                return redirect()->back()->with('error','New password cannot be the same as old password');
            }
        } else {
            return redirect()->back()->with('error','Current password not match');
        }
    }
}
