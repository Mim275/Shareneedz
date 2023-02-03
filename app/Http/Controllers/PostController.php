<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'phone' => 'required',
            'address' => 'required',
            'image_one' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:6120',
            'image_two' => 'image|mimes:jpeg,png,jpg,svg,gif|max:6120',
            'image_three' => 'image|mimes:jpeg,png,jpg,svg,gif|max:6120',
            'image_four' => 'image|mimes:jpeg,png,jpg,svg,gif|max:6120',
        ]);


        $data = new Post();
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->product = $request->product;
        $data->phone = $request->phone;
        $data->category = $request->category;
        $data->type = $request->type;
        $data->address = $request->address;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->details = $request->details;
        // img one
        $image_one = $request->file('image_one');
        if (isset($image_one))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename_one = $currentDate.'-'. uniqid() .'.'. $image_one->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            $image_one->move('uploads/post',$imagename_one);
        }else{
            $imagename_one = "default.png";
        }
        $data->image_one = $imagename_one;

        // img two
        $image_two = $request->file('image_two');
        if (isset($image_two))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename_two = $currentDate.'-'. uniqid() .'.'. $image_two->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            $image_two->move('uploads/post',$imagename_two);
            $data->image_two = $imagename_two;
        }else{
           
        }
      
        // img three
        $image_three = $request->file('image_three');
        if (isset($image_three))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename_three = $currentDate.'-'. uniqid() .'.'. $image_three->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            $image_three->move('uploads/post',$imagename_three);
            $data->image_three = $imagename_three;
        }else{
           
        }
      

        // img four
        $image_four = $request->file('image_four');
        if (isset($image_four))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename_four = $currentDate.'-'. uniqid() .'.'. $image_four->getClientOriginalExtension();

            if (!file_exists('uploads/post'))
            {
                mkdir('uploads/post',0777,true);
            }
            $image_four->move('uploads/post',$imagename_four);
            $data->image_four = $imagename_four;
        }else{
           
        }
      

       
      
        $data->save();
        return redirect()->back()->with('success','Post add successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::find($id);
        $setting = SiteSetting::first();
        $user = Auth::user();
        return view('category/details', compact('posts', 'setting', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
