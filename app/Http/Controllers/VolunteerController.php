<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\SiteSetting;
use Carbon\Carbon;
use App\Models\SentRequestController;
class VolunteerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function volunteerdashboard() {
        $setting = SiteSetting::first();
        $userid = Auth::user()->id;
        $users=User::find($userid);
        $requests = SentRequestController::where('status', 0)->get();
        $accepts = SentRequestController::where('vlorenteer_id', $userid)->get();
        return view('volunteerdashbord',compact('users','setting', 'requests', 'accepts'));
    
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
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/profile'))
            {
                mkdir('uploads/profile',0777,true);
            }
            $image->move('uploads/profile',$imagename);
        }else{
            $imagename = "default.png";
        }
        $user->image = $imagename;
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

      // admin Volunteer list
      public function volunteerlist(){
        $rows = User::where('role', 2)->orderBy('id', 'desc')->get();
        return view('admin.volunteerlist',compact('rows'));
    }
}
