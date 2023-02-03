<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Hash;
use App\Models\DonationClarification;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
class UserController extends Controller
{

    

    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function userdashboard() {
        $setting = SiteSetting::first();
        $userid = Auth::user()->id;
        $users=User::find($userid);

        $rows = DonationClarification::where('user_id', $userid )->orderBy('id', 'desc')->get();
        return view('userdashbord',compact('users','setting', 'rows'));
    }
    public function userinvoice($id){

       
        $setting = SiteSetting::first();
        $invoice_number =DonationClarification::findOrFail($id);
        $user_data = User::where('id', $invoice_number->user_id)->get();
        $pdf = PDF::loadView('invoice.seeinvoice', compact('user_data', 'setting', 'invoice_number'));
        return $pdf->stream('invoice.pdf');
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
            $imagename = "frontend/images/userProfile1.png";
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
    // admin user list
    public function userlist(){
        $rows = User::where('role', 1)->orderBy('id', 'desc')->get();
        return view('admin.userlist',compact('rows'));
    }



}
