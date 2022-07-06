@extends('layouts.app')
@section('title','Fast Track Driving Booking')
@section('content')
  <!-- banner section starts -->

  <section class="banner">
    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-6">
          <div class="banner_left">
            <h6>Driving School Activities</h6>
            <h1>Book a Driving Test for DVSA Practical or Theory</h1>
            <p>Luckily "FDTBOOKING" is here to provide you Fast Track Driving Test appointment for DVSA Practical test Or Theory Test. So, choose a driving test in your Local or favorite test center book a driving test with #FDTBOOKING and save your time.</p>
            <a href="{{ route('practical.test') }}" class="btn btn-success my_btn">Book Now</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="banner_right">
            <div class="banner_image">
              <img class="car" src="{{ asset('public/frontend/assets/image/bannerimage.jpg') }}" alt="car">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- banner section ends -->


  <div class="start_course  mb-4">
    <div class="container">
      <div class="form_container  shadow-sm">
        <h4>Get a early available test alert @if(session('success'))<span class="text text-success"> {{ session('success') }}</span>@endif</h4>
        <form action="{{ route('testalert.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="imputBox">
            <span>Your Name</span>
            <input type="text" name="name" placeholder="Name">
          </div>
          <div class="imputBox">
            <span>Your Email</span>
            <input type="email" name="email" placeholder="Email">
          </div>
          <div class="imputBox">
            <span>Your Phone</span>
            <input type="text" name="phone" placeholder="Phone">
          </div>
          <input type="submit" value="Book Now" class="btn my_btn">
        </form>
      </div>
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



  <!-- counter starts -->

  <div class="counter py-5">
    <div class="container">
      <div class="row">
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>50k+</h2>
            <span>Students</span>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>7</h2>
            <span>Years on the market</span>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>578</h2>
            <span>Training hours</span>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="counter_box text-center">
            <h2>32</h2>
            <span>Number of teachers</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- counter ends -->



  <!-- service section starts  -->

  <section class="service py-4">
    <div class="container">
      <div class="service_head text-center mb-5">
        <h5>Our Service</h5>
        <h1>We Offer Driving Test</h1>
      </div>
      <div class="row gy-4">

        @foreach($blogs as $blog)
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="{{ asset('storage/app/public/'.$blog->image) }}" alt="">
            </div>
            <div class="box_content text-center">
              <h4>{{ Str::words($blog->title,'3','..') }}</h4>
              <p>{!! Str::words($blog->description,'12','..') !!}</p>
              <a href="#" class="btn btn-success my_btn">Book Now</a>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="{{ asset('public/frontend/assets/image/s1.jpg') }}" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <a href="#" class="btn btn-success my_btn">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="{{ asset('public/frontend/assets/image/s3.jpg') }}" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <a href="#" class="btn btn-success my_btn">Book Now</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
          <div class="service_box">
            <div class="box_img mb-4">
              <img src="{{ asset('public/frontend/assets/image/s4.jpg') }}" alt="">
            </div>
            <div class="box_content text-center">
              <h4>Theory test</h4>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus.</p>
              <a href="#" class="btn btn-success my_btn">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section ends -->


@endsection
