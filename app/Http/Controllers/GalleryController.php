<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Gallery::all();
        return view('admin.gallery',compact('rows'));
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


        $data = new Gallery();
        $data->title = $request->name;
        $image = $request->file('image');
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/gallery'))
            {
                mkdir('uploads/gallery',0777,true);
            }
            $image->move('uploads/gallery',$imagename);
        }else{
            $imagename = "default.png";
        }
        $data->gallery = $imagename;


      
        $data->save();
        return redirect()->back()->with('success','Gallery add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Gallery::findOrFail($id);
        return view('admin.galleryedite',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Gallery::find($id);
        $data->title = $request->name;
        $image = $request->file('image');

        if ($request->image!=null){
            if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/gallery'))
            {
                mkdir('uploads/gallery',0777,true);
            }
            $image->move('uploads/gallery',$imagename);
        }else{
            $imagename = "default.png";
        }
        $data->gallery = $imagename;
        }
        


      
        $data->save();
        return redirect()->route('gallery.index')->with('success','Gallery Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Gallery::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Gallery Delate successfully!');
    }
}
