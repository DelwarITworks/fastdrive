
@extends('layouts.app')
@section('header_css')
  <style>
    .box{
        display: none;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
            }
        });
    }).change();
});
</script>
@endsection
@section('title','Fast Track Driving Booking form')
@section('content')

  <div class="inner_banner py-5">
    <div class="container">
      <h2>THEORY TEST BOOKING</h2>
      <h5>Fast Track Driving Test - Book a Driving Test with FDTBOOKING.</h5>
    </div>
  </div>


  <div class="practical_page py-5 mt-5">
    <div class="container">
      <div class="progress_bar">
        <small id="small"></small>
        <span class="progress1">Select Test</span>
        <span>Personal Information</span>
        <span>Read T&C</span>
        <span>Payment</span>
    </div>
    </div>
    <h3 class="test_heading">Choose a centre</h3>
    <div class="container">
      <div class="select_area p-3 border rounded">
        <form action="{{ route('theory.test.centre') }}" method="get"  enctype="multipart/form-data" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">     
        <div class="selec_box">
          <select class="filters-select">
            <option>Choose a centre</option>
            @foreach($theorycentres->unique('centre_name') as $theorycentre)
            <option value=".{{ preg_replace('/[^A-Za-z0-9\-]/', '', $theorycentre->centre_name) }}">{{  $theorycentre->centre_name }}</option>
              {{-- <option value=".{{ $theorycentre->centre_name }}">{{ $theorycentre->centre_name }} </option> --}}
            @endforeach
          </select>

        </div>

        <div class="date_box">

          @foreach($theorycentres as $theorycentre)
          <label class="rad-label element-item m-2 {{ preg_replace('/[^A-Za-z0-9\-]/', '', $theorycentre->centre_name) }} box" id="{{ preg_replace('/[^A-Za-z0-9\-]/', '', $theorycentre->centre_name) }}" >
            <input type="radio" class="rad-input" name="theorycentre_id"  id="theorycentre_id"  value="{{ $theorycentre->id }}" required>
            <div class="rad-text">
              <p class="m-0">{{ $theorycentre->date }}</p>
            </div>

            <div class="invalid-feedback fw-bold">
              This field is required.
            </div>
          </label>
          @endforeach
        
        </div>
        
        <div class="date_btn text-end">
        <button href="#" class="btn next btn-success"  id="Isleworth" >Choose a test first</button>
        </div>

      </form>

      </div>
      <p class="not_find_test mt-3 fw-bold">Uncertain where your local driving test theorycentre is? To Find a driving test theorycentre near your Location > <a href="https://www.gov.uk/find-driving-test-theorycentre" target="_blank">https://www.gov.uk/find-driving-test-theorycentre</a></p>
    </div>

    <div class="info_msg mt-5">
      <div class="container">
        <div class="info_content">
          <span class="fw-bold">£112 for Weekday test appointment (includes DVSA test booking fee £62 + admin fee)</span>
          <br>
          <span class="fw-bold">£125 for Weekday test appointment (includes DVSA test booking fee £75 + admin fee)</span>
        </div>
      </div>
    </div>
    <div class="practical_subscribe">
      <div class="container">
        <div class="subscribe_box d-flex justify-content-between align-items-center p-4 rounded">
          <h4 class="text-light m-0">BE THE FIRST TO KNOW WHEN A TEST BECOMES AVAILABLE
          </h4>
          <button class="btn btn-outline-success btn-lg">Subscribe <i class="fa-solid fa-bell ms-2"></i></button>
        </div>
      </div>
    </div>
  </div>


@endsection