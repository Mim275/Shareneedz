<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\BankAccount;

use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = BankAccount::all();
        return view('admin.bankaccount', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bname' => 'required',
            'acname' => 'required',
            'acnumber' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $data = new BankAccount();
        $data->bname = $request->bname;
        $data->acname = $request->acname;
        $data->acnumber = $request->acnumber;
        $data->swift = $request->swift;
        $data->routno = $request->routno;
        $data->branch = $request->branch;
       

       
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/account'))
            {
                mkdir('uploads/account',0777,true);
            }
            $image->move('uploads/account',$imagename);
        }else{
            $imagename = "default.png";
        }
        $data->logo = $imagename;


      
        $data->save();
        return redirect()->back()->with('success','Bank add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=BankAccount::findOrFail($id);
        return view('admin.bankaccountedite',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $data=BankAccount::find($id);
        $data->bname = $request->bname;
        $data->acname = $request->acname;
        $data->acnumber = $request->acnumber;
        $data->swift = $request->swift;
        $data->routno = $request->routno;
        $data->branch = $request->branch;
       


        $image = $request->file('image');

        if ($request->image!=null){
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
    
                if (!file_exists('uploads/account'))
                {
                    mkdir('uploads/account',0777,true);
                }
                $image->move('uploads/account',$imagename);
            }else{
                $imagename = "default.png";
            }
            $data->logo = $imagename;
        }
       

      
        $data->save();
        return redirect()->route('bankaccount.index')->with('success','Bank update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=BankAccount::find($id);
        $data->delete();
        return redirect()->back()->with('success','Bank Account Delate successfully!');
    }
}
