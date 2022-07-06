@extends('layouts.app')
@section('title','Fast Track Driving Booking form')
@section('content')

<div class="required_form">
    <div class="section bg-transparent mt-0 pt-5">
        <div class="container">
            @if(session('wrong'))

           <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Please read..</h6>
                        <div class="text-white">You Can’t Book this Test Appointment because if you failed your Practical Driving test in the last ten working days and want to resit again, You have to choose a date at least ten working days away.
                        Ref: <a class="text-light" target="_blank" href="https://www.gov.uk/driving-test">https://www.gov.uk/driving-test</a> ( Business days not including any Public Holidays or Bank Holidays ). Please choose another date.</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif

            <div class="row">
                <div class="col-md-4">

                    <div class="card-body p-4 rounded mb-2" style="background:#f5f4f2;">
                        <div class="feature-box flex-column">
                            <div class="fbox-content">

                                <h3 class="nott ls0 text-larger">Summary: </h3>
                                <p class="text-dark">{{ $centre->centre_name }} driving test<br>On the {{ $centre->date }}<br>£125.00 to pay today</p>
                                <h3><span id="endTest" class="text-danger">00:00:00</span> 
                                    <span id="end_Text"
                                        class="text-danger ms-2">till cart expires</span></h3>
                            </div>

                        </div>

                    </div>
                    <img src="{{ asset('public/frontend/assets/image/driving-licence-number-copy.png') }}" alt="driving licence number">
                </div>
                <div class="col-md-8">
                    <div class="row col-mb-30 align-content-stretch">

                        <div class="card shadow border-0" style="border-radius: 15px;">
                            <div class="card-body">
                                <h4 class="mb-3">Required information</h4>
                                <form action="{{ route('practical.test.form') }}" class="row mb-0 needs-validation" id="learner" name="learner" action="payment" method="post"
                                    enctype="multipart/form-data" novalidate>
                                    <input type="hidden" name="centre_id" value="@if($centre) {{ $centre->id }} @endif">
                                    @csrf
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="learner-name">Fullname as printed on driving license:*</label>
                                        <input type="text" id="learner-name" name="name"
                                            class="form-control input-sm required" value="{{ old('name') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                            @error('name')
                                            <div class=" fw-bold text-danger">
                                                {{ $message }}
                                            </div>

                                            @enderror

                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="learner-license">Driving License Number:*</label>
                                        <input type="text" id="license" name="license"
                                            class="form-control input-sm required" value="{{ old('license') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                            @error('license')
                                            <div class=" fw-bold text-danger">
                                                {{ $message }}
                                            </div>

                                            @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="learner-address">Address:*</label>
                                        <input type="text" id="learner-address" name="address"
                                            class="form-control input-sm required" value="{{ old('address') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                            @error('address')
                                            <div class=" fw-bold text-danger">
                                                {{ $message }}
                                            </div>

                                            @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="learner-postcode">Postcode:*</label>
                                        <input type="text" id="learner-postcode" name="postcode"
                                            class="form-control input-sm required" value="{{ old('postcode') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="learner-email">Email Address:*</label>
                                        <input type="email" id="learner-email" name="email"
                                            class="form-control input-sm required" value="{{ old('email') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="learner-mobile">Mobile Number:*</label>
                                        <input type="number" id="learner-mobile" name="mobile"
                                            class="form-control input-sm required" value="{{ old('mobile') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                            @error('mobile')
                                            <div class=" fw-bold text-danger">
                                                {{ $message }}
                                            </div>

                                            @enderror
                                    </div>
                                    <div class="col-md-6 form-group mb-4 ">
                                        <label for="learner-tcn">Theory Certificate number:*</label>
                                        <input type="text" id="learner-tcn" name="tcertificate_num"
                                            class="form-control input-sm required" value="{{ old('tcertificate_num') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                    <div class="col-md-6 form-group mb-4 ">
                                        <label for="learner-ted">Theory Expiry Date:*</label>
                                        <input type="date" id="learner-ted" name="theory_expdate"
                                            class="form-control input-sm required" value="{{ old('theory_expdate') }}" required>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                    <div class="col-md-6 form-group mb-4 ">
                                        <label for="transmission">Transmission:*</label>
                                        <select class="required" id="transmission"
                                            name="transmission"  required>
                                            <option value="">Select One</option>
                                            <option value="Auto">Auto</option>
                                            <option value="Manual">Manual</option>
                                            <option value="EV" disabled="">EV</option>
                                        </select>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                    <div class="col-6 form-group mb-4">
                                        <label for="learner-dlp">Driving License Photo:*</label>
                                        <input type="file" id="learner-dlp" name="photo"
                                            class="form-control input-sm" accept="image/*" value="{{ old('photo') }}">
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                    <div class="col-md-12 form-group mb-4 ">
                                        <label>Do you have a driving test already booked?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input required valid" onclick="colup_ctn()" type="radio" name="is_booked" id="bt-yes" value="Yes" onchange="testBooked('Yes')"  required>
                                            <label class="form-check-label nott" for="bt-yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline border-danger">
                                            <input class="form-check-input valid" onclick="colup_ctn_2()" type="radio" name="is_booked"
                                                id="bt-no" value="No" onchange="testBooked('No')"  required>
                                            <label class="form-check-label nott" for="bt-no">No</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 form-group mb-4" id="content_hide" style="display:none;">
                                        <label>Which date have you booked your driving test? </label><br>
                                        <input type="date" id="learner-ted" name="pre_bookingdate"
                                            class="form-control input-sm required" value="{{ old('pre_bookingdate') }}" placeholder="dd/mm/yy" >
                                            @if(session('wrong'))
                                            <label class="text-danger">Select 14 days before Exam date</label>

                                            @endif
                                        <div class="col-md-12  p-3 mb-2 mt-3" id="booked-test-guidance"
                                            style="background:#f5f4f2;">
                                            <h2>(Read guidance note)</h2>
                                            <p>You'll need to cancel the test you have booked because the booking system
                                                will not allow us to swap the booking to the appointment we have
                                                available. You will receive a full refund of £62 if the appointment is
                                                cancelled before the "last date to cancel". We will then book your test
                                                for the agreed date/time/location. To cancel your exiting <a
                                                    href="https://www.gov.uk/change-driving-test"
                                                    target="_blank">https://www.gov.uk/change-driving-test.</a>
                                            </p>
                                        </div>
                                    </div>




                                    <div class="col-md-12 form-group mb-4 ">
                                        <label>Have you passed your theory test?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input required valid" onclick="colup_ctn1()" type="radio" name="is_theory" id="is_theory" value="Yes" onchange="testBooked('Yes')"  required>
                                            <label class="form-check-label nott" for="is_theory">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline border-danger">
                                            <input class="form-check-input valid" onclick="colup_ctn_3()" type="radio" name="is_theory" id="is_theory-no" value="No" onchange="testBooked('No')"  required>
                                            <label class="form-check-label nott" for="is_theory-no">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 form-group mb-4" id="content_hide1" style="display:none;padding-left: 30px;">
                                        <label>Your theory test number ?</label><br>
                                        <input type="text" id="learner-ted" name="theorytest_no"
                                            class="form-control input-sm required" value="{{ old('theorytest_no') }}" placeholder="ex:123456789" >
                                            @if(session('wrong'))
                                            <label class="text-danger">Select 14 days before Exam date</label>

                                            @endif
                                    </div>
                                    <div class="col-md-12 form-group mb-4 d-none">
                                        <label>Have you MISSED or FAILED A TEST between <span
                                                class="text-danger">13-08-22</span> AND <span
                                                class="text-danger">26-08-22</span>?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input required valid" type="radio"
                                                name="missed-failed" id="mf-yes" value="Yes"
                                                onchange="failTest('Yes')">
                                            <label class="form-check-label nott" for="mf-yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline border-danger">
                                            <input class="form-check-input valid" type="radio" name="missed-failed"
                                                id="mf-no" value="No" onchange="failTest('No')">
                                            <label class="form-check-label nott" for="mf-no">No</label>
                                        </div>
                                        <div class="alert alert-danger failNotice" role="alert"
                                            style="display:none;">

                                        </div>
                                    </div>



                                    <div class="col-md-12 form-group mb-4 ">
                                        <label>Have you previously had your licence revoked?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input required valid" type="radio"
                                                name="is_revoked" id="lr-yes" value="Yes" required>
                                            <label class="form-check-label nott" for="lr-yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline border-danger">
                                            <input class="form-check-input valid" type="radio" name="is_revoked"
                                                id="lr-no" value="No" required>
                                            <label class="form-check-label nott" for="lr-no">No</label>
                                        </div>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div>
                                   {{--  <div class="col-md-6 form-group mb-4 ">
                                        <label for="lidt-ins">Would you like to book LIDT instructor?</label>
                                        <select class="required" id="need_instructor" name="need_instructor"  required>
                                            <option value="">Select One</option>
                                            <option value="Instructor Car">No I will use my instructor (Read
                                                guidance notes)</option>
                                            <option value="Own Car">No I have my own car (Read guidance notes)
                                            </option>
                                            <option value="Yes">Yes I would like to book LIDT instructor</option>
                                        </select>
                                            <div class="invalid-feedback fw-bold">
                                                This field is required.
                                            </div>
                                    </div> --}}
                                    <div class="col-md-12" id="insText" style="background:#f5f4f2;">
                                    </div>
                                    <div class="col-md-12 d-none" id="theoryText" style="background:#f5f4f2;">
                                        <h2>Important info please read</h2>
                                        <p>Candidates are to arrive at the test centre 15 minutes prior to the start
                                            of the test. Candidates must wear a face mask before entering the
                                            building. You must bring your valid signed GB (or Northern Ireland)
                                            photo card driving licence. Northern Ireland licence holders testing in
                                            GB must present both their photo card licence and paper counterpart.
                                            Failure to do so will result in the candidate being unable to sit the
                                            test and forfeiting the fee.</p>
                                        <p>Cancelling Test - To change or cancel your booking, you must give at
                                            least FIVE clear working days notice before your test date to avoid
                                            losing your test fee.</p>
                                        <p>Please ensure that the details listed above are correct. If any details
                                            are not correct, please email theorycustomerservices@dvsa.gov.uk or call
                                            0300 200 1122.</p>
                                    </div>
                      
                                    <div class="col-md-12 form-group border-bottom last_div">
                                        <div class="form-check">
                                            <input class="form-check-input required" value="1" name="status"
                                                type="checkbox" id="terms"  required>
                                            <label class="form-check-label" for="terms">
                                                I have read and accept the <a href="{{ route('terms') }}"
                                                    target="_blank">LIDT terms and conditions</a> and <a
                                                    href="{{ route('privacy') }}" target="_blank">Privacy policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="booking-type" value="test">
                                    <input type="hidden" name="booking-id" value="1996">
                                    <input type="hidden" name="booking-form" value="booking-form">

                                    <input type="hidden" name="lessons" value="">
                                    <input type="hidden" name="rental" value="">
                                    <input type="hidden" name="test-day" value="">
                                    <input type="hidden" name="theory-charge" value="">
                                    <input type="hidden" name="fast-track" value="">
                                    <input type="hidden" name="pass-plus" value="">

                                    <div class="col-12 form-group mt-4 mb-3">
                                        <button class="button button-rounded w-100 nott ls0 m-0" type="submit"
                                            id="learner-submit" value="submit">Continue to paymens</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="timer"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    setInterval(function() {
        $("#timer").load('http://localhost/fdtbooking1/update');
    }, 30000);
});

</script> --}}

  <script type="text/javascript">
    window.addEventListener('beforeunload', function (e) {
      e.preventDefault();
      e.returnValue = '';
    });
  </script>

@endsection



