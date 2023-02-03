<!DOCTYPE html>
<html>
<head>
<!-- bootstrap css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
/* body{
background:#eee;
margin-top:20px;
} */

		.text-danger strong {
        	color: #9f181c;
		}
		
		/* .receipt-main {
			background: #ffffff none repeat scroll 0 0;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;

			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
           
		} */
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 16px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 16px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
            font-size: 13px !important;
            font-weight: 400 !important;
		}
		.receipt-main td {
			font-size: 16px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
        hr {
			margin: 0 0;
			color: inherit;
			background-color: currentColor;
			border: 0;
			opacity: .25;
		}
		.header-top{
			margin-top:50px;
		}
		.address-space{
			margin-top:30px;
		}
		.table-space{
			margin-top:30px;
		}
		.footer-space{
			margin-top:340px;
		}
</style>

</head>
<body>

	
<div class="col-12">   

        <div class="receipt-main ">

	
            <div class="row mb-3 header-top">
                <div  class="col-6">
				
                        <div class="">
							<!-- <img class="img-responsive" alt="iamgurdeeposahan" src="{{asset('frontend/images/logo.png')}}" style="width:100px;"> -->
						</div>
                       
                </div>
                <div class="col-6">
                        <div class=" mt-3">
							<h3>INVOICE # {{ 100 + $invoice_number->last()['id'] }}
                            </h3>
                            <p>Date: {!! date('d-m-Y', strtotime($data['paydate'])) !!} </p>
						</div>
                </div>
                
            </div>
			
            <span class="mt-4 py-2 d-block border-bottom" >Thank you for your contribution to the ShareNeedz</span>
            <!-- <hr>
            <div class="row py-2">
                <div class="col-6">
                    <span>Fron</span>
                    
                </div>
                <div class="col-6">
                    <span>To</span>
                </div>
            </div>
            <hr> -->
		
            <div class="row py-2 mb-2 address-space">
                <div class="col-6">
                    
                        <div class="receipt-right">
							<p><b>Name :</b> {{$user_data[0]['name']}} </p>
							<p><b>Mobile :</b> {{$user_data[0]['phone']}}</p>
							<p><b>Email :</b> {{$user_data[0]['email']}}</p>
							<p><b>Address :</b> {{$user_data[0]['address']}}</p>
						</div>
                </div>
                <!-- <div class="col-6">
                         <div class="receipt-right">
							<h5>Need's </h5>
							<h5>People Help Foundation  </h5>
							<h5>Bangladesh </h5>
						</div>
                </div> -->
            </div>

			<hr class="table-space" >
				<table class="table table-bordered" >
         
						<thead>
						
								<tr>
									<th>PAYMENT TYPE</th>
									<th>ACCOUNT NUMBER</th>
									<th>TRANSACTION ID</th>
									<th> AMOUNT</th>
									
								</tr>
							
						</thead>

						<tbody>
							<tr>
								<td class="col-3">{{$data['paytype']}} </td>
								<td class="col-3">{{$data['anumber']}}</td>
								<td class="col-3">{{$data['tid']}}</td>


								<td class="col-3">{{$data['amount']}}/-</td>


						
							</tr>
						
							<tr>
								<td></td>
								<td></td>
								<td class="text-right"><h2><strong>Total: </strong></h2></td>
								<td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> {{$data['amount']}}/-</strong></h2></td>
							
							</tr>
						</tbody>
					</table>
			
           

         
         
           <hr class="footer-space" >
			<div class="row mt-3">
				<div class="col-12">
                        <div class="receipt-right">
							<h5>ShareNeedz</h5>
							<h5>People Help Foundation</h5>
							<p>{{$setting->number}} </p>
							<p>{{$setting->email}} <i class="fa fa-envelope-o"></i></p>
						
						</div>
				</div>
            </div>
			
	</div>
</div>		
    






</body>
</html>
