<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Team::all();
        return view('admin.team',compact('rows'));
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


        $data = new Team();
        $data->name = $request->name;
        $data->bio = $request->bio;
        $data->facebook = $request->facebook;
        $data->github = $request->github;
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/team'))
            {
                mkdir('uploads/team',0777,true);
            }
            $image->move('uploads/team',$imagename);
        }else{
            $imagename = "default.png";
        }
        $data->image = $imagename;


      
        $data->save();
        return redirect()->back()->with('success','Team add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Team::findOrFail($id);
        return view('admin.teamedite',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Team::find($id);
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
    
                if (!file_exists('uploads/team'))
                {
                    mkdir('uploads/team',0777,true);
                }
                $image->move('uploads/team',$imagename);
            }else{
                $imagename = "default.png";
            }
            $data->image = $imagename;
    
        }
       

      
        $data->save();
        return redirect()->route('team.index')->with('success','Team Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Team::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Team Delate successfully!');
    }
}
