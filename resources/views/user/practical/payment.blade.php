
@extends('layouts.app')
@section('header_css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style> 

    .someData{
        display:none;
    }
    .activeTab{
        display:block;
    }
    </style>
@endsection
@section('title','Fast Track Driving Booking form')
@section('content')

<div class="required_form" style="font-size: ;">
    <div class="section bg-transparent mt-0 pt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-4">

                    <div class="card-body p-4 rounded mb-2" style="background:#f5f4f2;">
                        <div class="feature-box flex-column">

                           
                            <div class="fbox-content">
                                <h3 class="nott ls0 text-larger">Summary:</h3>
                                    @if($centre && $centre_id && $name && $license && $address && $postcode && $email && $mobile && $tcertificate_num && $theory_expdate && $transmission && $is_booked && $is_revoked && $status)
                                        <p class="text-dark">{{ $centre->centre_name }} driving test<br>On the {{ $centre->date }}<br>${{ $centre->sell_cost }}.00 to pay today</p>
                                    @endif
                                <h3><span id="endTest" class="text-danger">00:00:00</span> 
                                    <span id="end_Text"
                                        class="text-danger ms-2">till cart expires</span></h3>

                                        <img src="{{ asset('public/frontend/assets/image/accepted-payments.jpg') }}" alt="driving licence number" style="width:100%;">

                                        <table class="table table-bordered mt-3" style="font-size:14px;">
                                            <tr><td><strong>Name : </strong> {{ $name }}</td></tr>
                                            <tr><td><strong>Email : </strong> {{ $email }}</td></tr>
                                            <tr><td><strong>Phone : </strong> {{ $mobile }}</td></tr>
                                            <tr><td><strong>Address : </strong> {{ $address }}</td></tr>
                                            <tr><td><strong>License key : </strong> {{ $license }}</td></tr>
                                            <tr><td><strong>Post code : </strong> {{ $postcode }}</td></tr>
                                            
                                        </table>

                            </div>

                        </div>

                    </div>
                    {{-- <img src="{{ asset('public/frontend/assets/image/driving-licence-number-copy.png') }}" alt="driving licence number"> --}}
                </div>
                <div class="col-md-8">

                    <div class="row" style="font-size:14px;">
                        <div class="col-md-12">
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table" >
                                    <div class="row display-tr" >
                                        <h3 class="panel-title display-td" >Payment Details</h3>
                                        <div class="display-td" >                            
                                            {{-- <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png"> --}}
                                        </div>
                                    </div>                    
                                </div>
                                <div style="padding:15px;">

                  
                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                    @endif
                                    <form action="{{ route('practical.test.done') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" enctype="multipart/form-data">
                                            <input type="radio" value="1" name="pay_method" class="radioCls" id="bank" checked>
                                            <label class="" for="bank">Card Payment</label>
                                        <br>
                                            <input type="radio" value="2" name="pay_method" class="radioCls" id="card">
                                            <label class="" for="card">Bank Transfer</label>



                                <div class="someData" id="first">

                                        <h3 class="mt-3 mb-2">Card Payment</h3>

                                    @if($centre && $centre_id && $name && $license && $address && $postcode && $email && $mobile && $tcertificate_num && $theory_expdate && $transmission && $is_booked && $is_revoked && $status)
                                    @csrf
                                    <input type="hidden" name="centre_id" value="{{ $centre_id }}">
                                    <input type="hidden" name="name" value="{{ $name }}">
                                    <input type="hidden" name="license" value="{{ $license }}">
                                    <input type="hidden" name="address" value="{{ $address }}">
                                    <input type="hidden" name="postcode" value="{{ $postcode }}">
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <input type="hidden" name="mobile" value="{{ $mobile }}">
                                    <input type="hidden" name="tcertificate_num" value="{{ $tcertificate_num }}">
                                    <input type="hidden" name="theory_expdate" value="{{ $theory_expdate }}">
                                    <input type="hidden" name="transmission" value="{{ $transmission }}">
                                    <input type="hidden" name="is_theory" value="{{ $is_theory }}">
                                    <input type="hidden" name="pre_bookingdate" value="{{ $pre_bookingdate }}">
                                    <input type="hidden" name="theorytest_no" value="{{ $theorytest_no }}">
                                    <input type="hidden" name="track_id" value="{{ $track_id }}">
                                    {{-- <input type="text" name="photo" value="{{ Session::get('photo') }}"> --}}
                                    <input type="hidden" name="is_booked" value="{{ $is_booked }}">
                                    <input type="hidden" name="is_revoked" value="{{ $is_revoked }}">
                                    <input type="hidden" name="need_instructor" value="{{ $need_instructor }}">
                                    <input type="hidden" name="status" value="{{ $status }}">
                                     @if($centre) <input type="hidden" name="amount" value="{{ $centre->sell_cost }}">@endif
                                    @if($centre) <input type="hidden" name="ref_id" value="{{ $centre->ref_id }}">@endif
                                    @if($centre) <input type="hidden" name="date" value="{{ $centre->date }}">@endif
                                    @if($centre) <input type="hidden" name="centre_name" value="{{ $centre->centre_name }}"> @endif
                                    
                  
                  


                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <span class='control-label'>Name on Card</span> <input
                                                    class='form-control' name="card_name" size='4' type='text'>
                                            </div>
                                        </div>
                  
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <span class='control-label'>Card Number</span> <input
                                                    autocomplete='off' class='form-control card-number' name="card_number" size='20'
                                                    type='text'>
                                            </div>
                                        </div>
                  
                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <span class='control-label'>CVC</span> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311' name="card_cvc" size='4'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <span class='control-label'>Expiration Month</span> <input
                                                    class='form-control card-expiry-month' name="card_exp_month" placeholder='MM' size='2'
                                                    type='text'>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <span class='control-label'>Expiration Year</span> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' name="card_exp_year" size='4'
                                                    type='text'>
                                            </div>
                                        </div>
                  
                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                            </div>
                                        </div>
                  
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                            </div>
                                        </div>
                                          
                                    </form>
                                    @else

                                    <form action="" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" enctype="multipart/form-data">
                                    
                  
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group required'>
                                                <span class='control-label'>Name on Card</span> <input
                                                    class='form-control' name="card_name" size='4' type='text' disabled>
                                            </div>
                                        </div>
                  
                                        <div class='form-row row'>
                                            <div class='col-xs-12 form-group card required'>
                                                <span class='control-label'>Card Number</span> <input
                                                    autocomplete='off' class='form-control card-number' name="card_number" size='20'
                                                    type='text' disabled>
                                            </div>
                                        </div>
                  
                                        <div class='form-row row'>
                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                <span class='control-label'>CVC</span> <input autocomplete='off'
                                                    class='form-control card-cvc' placeholder='ex. 311' name="card_cvc" size='4'
                                                    type='text' disabled>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <span class='control-label'>Expiration Month</span> <input
                                                    class='form-control card-expiry-month' name="card_exp_month" placeholder='MM' size='2'
                                                    type='text' disabled>
                                            </div>
                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                <span class='control-label'>Expiration Year</span> <input
                                                    class='form-control card-expiry-year' placeholder='YYYY' name="card_exp_year" size='4'
                                                    type='text' disabled>
                                            </div>
                                        </div>
                  
                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>Please correct the errors and try
                                                    again.</div>
                                            </div>
                                        </div>
                  
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" disabled>Pay Now</button>
                                            </div>
                                        </div>
                                         <p class="text-danger">Please , <a  href="{{ route('practical.test') }}">Click Here </a> and fill the require data</p>
                                          
                                    </form>
                                    @endif
                                    </div>
                                    <div class="someData " id="second">
                                        <h3 class="mt-3 mb-2">Bank Payment</h3>
                                        <table class="table table-bordered">
                                            <tr><td><strong>Your Reference : </strong> QWFR8R</td></tr>
                                            <tr><td><strong>Account Name : </strong> Demo Account Name</td></tr>
                                            <tr><td><strong>Account Number : </strong> 374245455400126</td></tr>
                                            <tr><td><strong>Account Short Code : </strong> 123</td></tr>
                                            
                                        </table>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" disabled>Pay Now</button>
                                            </div>
                                        </div>
                                         <p class="text-danger">Please , <a  href="{{ route('practical.test') }}">Click Here </a> and fill the require data</p>
                                    </div>
                                
                                    <p style="font-size:14px;" class="mt-3">East London driving school will alleviate the stress of your practical driving test with our fast track driving test booking service. We'll assist you to secure an earlier date so you may avoid long waiting months to pass your practical test and get your driving licence in no time! But</p>
                                    <p style="font-size:14px;">

                                    please consider noting - you have to arrange for your own driving instructor or if you prefer us to do it for you, please take a look at our INTENSIVE DRIVING COURSES. Read more</p>
                                    <p style="font-size:14px;">

                                    Furthermore, you must have passed your theory test within the past TWO YEARS to book a DVSA practical driving test. The booking won't include the cost of your driving instructor’s car and driving lessons. Also, before booking an earlier driving test you should check with your driving instructor to see if he or she is available. If you choose to reschedule your appointment through us, you will be charged an extra administration cost of £20 plus VAT. A manual or automatic car can be used for the fast track practical test.</p>
                                    <p style="font-size:14px;">

                                    Although the Early driving test booking service provides several benefits, to grab them there are a few CONDITIONS that must be met. The earlier test date will only be displayed on our web portal by date, time and place. They won't be available on www.gov.uk</p>
                                    <p style="font-size:14px;">

                                    So, when you book a practical test through our fast track test booking service, you accept that our appointment as your booking agent authorises East London intensive driving school to represent "YOU," the students, in dealings with the DVSA and DVLA. And You give us permission to book, swap, reallocate, and cancel tests on your behalf.

                                    </p>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

{{--   <script type="text/javascript">
    window.addEventListener('beforeunload', function (e) {
      e.preventDefault();
      e.returnValue = '';
      
    });
  </script> --}}

@endsection


