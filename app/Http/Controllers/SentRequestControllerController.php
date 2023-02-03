<?php

namespace App\Http\Controllers;
use Xenon\LaravelBDSms\Provider\Esms;
use Xenon\LaravelBDSms\Sender;
use App\Models\SentRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Xenon\LaravelBDSms\Facades\SMS;
use LaravelBDSms;

class SentRequestControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     // admin request list
    public function pendingrequest(){
        $rows = SentRequestController::where('status', 0)->get();
        return view('admin.requestpending', compact('rows'));
    }
    public function acceptrequestlist(){
        $rows = SentRequestController::with('user')->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.requestaccepted', compact('rows'));
    }


    public function sentrequest(Request $request, $id){
        $valounter = Auth::user()->where('id', 77)->get('phone');



        $post=Post::find($id);
        $user_id = $request->user_id;
        $user_name = $request->user_name;
        $user_phone = $request->user_phone;
        $user_email = $request->user_email;
        $user_address = $request->user_address;

        $data = new SentRequestController();
        $data->user_id = $user_id;
        $data->product_name = $post['product'];
        $data->name =  $user_name;
        $data->phone =  $user_phone;
        $data->email = $user_email;
        $data->address = $user_address;
        $data->end_date = $post['date'];
        $data->end_time = $post['time'];
        $data->category = $post['category'];
        
        $data->save();

        $valunTeerArray = [];
        $numberString = '';
        if($valounter !=null)
        {

            $valunTeerArray  = array_column($valounter->toArray(),'phone');
            $numberString = implode(',',$valunTeerArray);
        }


       
       
       

        // return $valounter;

        if(strlen($numberString) != ''){

        $sender = Sender::getInstance();
            $sender->setProvider(Esms::class); 
            $sender->setMobile($numberString);
            $sender->setMessage("স্বেচ্ছাসেবক,  
ওয়েবসাইটে একটি অনুরোধ আছে।
শেয়ারদানকারীর বিবরণ: ". 
'নাম:' .$post['name'] . ", " 
.'ফোন:' . $post['phone']  ." ,"
.'ঠিকানা:' . $post['address'] . ", " 
.'পণ্য:' . $post['product'] . ". " 
."ওয়েবসাইটে বিস্তারিত দেখুন।"." "
);

        $sender->setConfig(
            [
                
                'sender_id' => '8809612442285',
                'api_token' => '50|2jTqYjzdBSJTuZktuEOK493qSSPg5rYbSdBYPhNP',

            ]
        );
        echo $status = $sender->send();
        

        }else{
            echo "not sent";
        }


        return redirect()->back()->with('success','Request Sent successfully!');
    }

    public function acceptrequest($rid, $bid){

       
        $volunteer_id =User::find($bid);


        $data = SentRequestController::find($rid);
        $data->vlorenteer_id = $bid;
        $data->status = 1;

        $data->save();
        return redirect()->back()->with('success','accepted successfully!');

    }
    


    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SentRequestController  $sentRequestController
     * @return \Illuminate\Http\Response
     */
    public function show(SentRequestController $sentRequestController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SentRequestController  $sentRequestController
     * @return \Illuminate\Http\Response
     */
    public function edit(SentRequestController $sentRequestController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SentRequestController  $sentRequestController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SentRequestController $sentRequestController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SentRequestController  $sentRequestController
     * @return \Illuminate\Http\Response
     */
    public function destroy(SentRequestController $sentRequestController)
    {
        //
    }
}
