<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Slider::all();
       return view('admin.slider',compact('rows'));
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
            'name' => '',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);


        $data = new Slider();
        $data->title = $request->name;
        $data->title_bn = $request->name_bn;
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider',0777,true);
            }
            $image->move('uploads/slider',$imagename);
        }else{
            $imagename = "default.png";
        }
        $data->slider = $imagename;


      
        $data->save();
        return redirect()->back()->with('success','Slider add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=slider::findOrFail($id);
        return view('admin.slideredite',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Slider::find($id);
        $data->title = $request->name;
        $data->title_bn = $request->name_bn;
        $image = $request->file('image');

        if ($request->image!=null){
            if (isset($image))
            {
                $currentDate = Carbon::now()->toDateString();
                $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
    
                if (!file_exists('uploads/slider'))
                {
                    mkdir('uploads/slider',0777,true);
                }
                $image->move('uploads/slider',$imagename);
            }else{
                $imagename = "default.png";
            }
            $data->slider = $imagename;
        }
       


      
        $data->save();
        return redirect()->route('slider.index')->with('success','slider Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Slider::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Slider Delate successfully!');
    }
}
