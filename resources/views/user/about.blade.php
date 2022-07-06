@extends('layouts.app')
@section('title','About | Fast Track Driving Booking')
@section('content')
    <div class="inner_banner py-5">
        <div class="container">
            <h2>About us</h2>
        </div>
    </div>
  <!-- about section starts  -->

  <section class="about mt-5 py-5">
    <div class="container">
      <div class="row align-items-center g-md-3 g-lg-5">
        <div class="col-lg-6">
          <div class="about_image">
            <img src="{{ asset('public/frontend/assets/image/about.png') }}" alt="about">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about_content">
            <h4>About Us</h4>
            <h1>@if($about) {{ $about->title }} @endif</h1>
            <p>{{ Str::words($about->about,'32','..') }}</p>
           
            @foreach($about->aboutmore as $aboutmore)
            <div class="about_box mt-2 rounded shadow-sm p-3">
              <div class="row">
                <div class="col-md-2  text-center">
                  <a href="#"><i class="fa-solid fa-check"></i></a>
                </div>
                <div class="col-md-10">
                  <h5>{{ $aboutmore->name }}</h5>
                  <p>{{ Str::words($aboutmore->detail,'17','..') }}
                    .</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- about section ends -->    
@endsection