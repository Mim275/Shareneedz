<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Donner;
use Illuminate\Http\Request;

class DonnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Donner::all();
        return view('admin.donner',compact('rows'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);


        $data = new Donner();
        $data->name = $request->name;
        $data->bio = $request->bio;
        $data->facebook = $request->facebook;
        $data->github = $request->github;
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/donner'))
            {
                mkdir('uploads/donner',0777,true);
            }
            $image->move('uploads/donner',$imagename);
        }else{
            $imagename = "default.png";
        }
        $data->image = $imagename;


      
        $data->save();
        return redirect()->back()->with('success','Donar add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donner  $donner
     * @return \Illuminate\Http\Response
     */
    public function show(Donner $donner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donner  $donner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Donner::findOrFail($id);
        return view('admin.donneredite',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donner  $donner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Donner::find($id);
        $data->name = $request->name;
        $data->bio = $request->bio;
        $data->facebook = $request->facebook;
        $data->github = $request->github;
        $image = $request->file('image');
        if ($request->image!=null){
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
    
                if (!file_exists('uploads/donner'))
                {
                    mkdir('uploads/donner',0777,true);
                }
                $image->move('uploads/donner',$imagename);
            }else{
                $imagename = "default.png";
            }
            $data->image = $imagename;
        }
       


      
        $data->save();
        return redirect()->route('donner.index')->with('success','Donar update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donner  $donner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Donner::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Donar Delate successfully!');
    }
}
