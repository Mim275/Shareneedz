<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\MobileBanking;
use Illuminate\Http\Request;

class MobileBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rows = MobileBanking::all();
        return view('admin.mobilebanking', compact('rows'));
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
            'name' => 'required',
            'acnumber' => 'required',
            'actype' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $data = new MobileBanking();
        $data->name = $request->name;
        $data->acnumber = $request->acnumber;
        $data->actype = $request->actype;


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
        $data->img = $imagename;


      
        $data->save();
        return redirect()->back()->with('success','Mobile Banking account add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function show(MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=MobileBanking::findOrFail($id);
        return view('admin.mobilebankedit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=MobileBanking::find($id);



        $data->name = $request->name;
        $data->acnumber = $request->acnumber;
        $data->actype = $request->actype;
       

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
            $data->img = $imagename;
        }
       
       

        $data->save();
        return redirect()->route('mobilebanking.index')->with('success','Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 

        $data=MobileBanking::find($id);
        $data->delete();
        return redirect()->back()->with('success','Payment Delate successfully!');
    }
}
