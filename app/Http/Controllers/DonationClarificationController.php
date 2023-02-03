<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DonationClarification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteSetting;
class DonationClarificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        


        $users = User::all();

        $rows = DonationClarification::with('user')->orderBy('id', 'desc')->get();
        return view('admin.donatclarify',compact('rows', 'users'));
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
        
        $setting = SiteSetting::first();
        $data = new DonationClarification();
        


        $user_id = $request->user_id;
        $user_data = User::where('id', $user_id)->get();

        $data->user_id = $request->user_id;
        $data->tid = $request->tid;
        $data->amount = $request->amount;
        $data->anumber = $request->anumber;
        $data->paytype = $request->paytype;
        $data->paydate = $request->paydate;
       
        $data->save();


        $invoice_number =  DonationClarification::all();

        $pdf = PDF::loadView('invoice.donatinvoice', compact('user_data', 'data', 'setting', 'invoice_number'));
        // $pdf->stream('invoice.pdf');
        return $pdf->download('invoice.pdf');
        
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonationClarification  $donationClarification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = SiteSetting::first();

        $invoice_number =DonationClarification::findOrFail($id);
     
        $user_data = User::where('id', $invoice_number->user_id)->get();
       
        $pdf = PDF::loadView('invoice.seeinvoice', compact('user_data', 'setting', 'invoice_number'));
      
     
        return $pdf->stream('invoice.pdf');
        // return $pdf->download('invoice.pdf');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonationClarification  $donationClarification
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonationClarification  $donationClarification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonationClarification $donationClarification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonationClarification  $donationClarification
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DonationClarification::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Invoice Delate successfully!');
    }
}
