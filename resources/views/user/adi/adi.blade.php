@extends('layouts.app')
@section('title','Blog | FDTB')
@section('content')

  <div class="inner_banner py-5">
    <div class="container">
      <h2>ADI</h2>
    </div>
  </div>

  <div class="adi_page py-5 mt-5">
    <div class="container">
      
      <div class="full_form shadow">
            <div class="part_container">
                <h3>Test Type</h3>
                <div class="my_card adi_part2">
                    <div class="face face1">
                        <div class="content">
                            <h4>ADI Part 2</h4>
                            <h1>$ 85</h1>
                            <span>Book Now</span>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p>For if you're looking to fast-track your ADI part 2 test</p>
                        </div>
                    </div>
                </div>
                <div class="my_card">
                    <div class="face face1">
                        <div class="content">
                            <h4>ADI Part 3</h4>
                            <h1>$ 81</h1>
                            <span>Book Now</span>
                        </div>
                    </div>
                    <div class="face face2">
                        <div class="content">
                            <p>For if you're looking to fast-track your ADI part 3 test</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="test_details">
                <h5>Have you already booked a test that just needs fast-tracking?</h5>
                <div class="adi_input_box_test">
                    <input type="radio" id="test_booked_already" name="test_booked_or_not" checked> <label class="radio" for="test_booked_already"> Yes</label> 

                    <input type="radio" id="test_not_booked_already" name="test_booked_or_not"> <label class="radio" for="test_not_booked_already">No</label>
                </div>


                <div class="adi_form_details">
                    <h5>When can I expect a test by?</h5>
                    <p>The way the system works is to book whatever date it can find on the DVSA and then look for earlier cancellations. It usually takes a few weeks to find a suitable test date. If the test date we find is too early, let us know in good time and we'll change it for you.</p>
                </div>

                <div class="adi_btn text-center">
                    <button type="button" id="prev0">Previous</button>
                    <button type="button" id="next1">Next</button>
                </div>
            </div>

            <div class="personal_details">
                <div class="adi_input_box">
                    <select required>
                        <option value="1">Select Title</option>
                        <option value="2">Mr</option>
                        <option value="3">Mss</option>
                        <option value="4">Mrs</option>
                        <option value="5">Pastor</option>
                        <option value="6">Captain</option>
                        <option value="7">Lord</option>
                        <option value="8">Lady</option>
                        <option value="9">Dr</option>
                        <option value="10">Mx</option>
                        <option value="11">Rev</option>
                        <option value="12">Sir</option>
                        <option value="13">Other</option>
                    </select>
                </div>

                <div class="adi_input_box">
                    <input type="text" placeholder="First Name" required>
                    <input type="text" placeholder="Last Name">
                </div>
                <div class="adi_input_box">
                    <input type="email" placeholder="E-mail">
                    <input type="text" placeholder="Phone">
                </div>
                <div class="adi_input_box">
                    <input type="text" placeholder="House no/name">
                    <input type="text" placeholder="Street">
                </div>
                <div class="adi_input_box">
                    <input type="text" placeholder="Town">
                    <input type="text" placeholder="Post Code">
                </div>
                <div class="adi_input_box">
                    <input type="text" placeholder="Driving License No">
                    <input type="text" placeholder="PRN No">
                </div>
                <div class="adi_input_box">
                    <input type="date">
                </div>
                <div class="adi_btn text-center">
                    <button type="button" id="prev1">Previous</button>
                    <button type="button" id="next2">Next</button>
                </div>
            </div>

            <div class="payment" id="adiPayment">
              <div class="breakdown shadow">
                <div>
                  <h4>Booking Breakdown</h4>
                </div>
                <div>
                  <span>Fast-Track: ADI Part 2</span>
                  <strong>$ 81.00</strong>
                </div>
                <div>
                  <span>DVSA Fee</span>
                  <strong>$ 111.00</strong>
                </div>
                <div class="total">
                  <span>Total</span>
                  <strong>$ 192.00</strong>
                </div>
              </div>

              <div class="payment_form mt-5 pt-5">
                <h4>Payment details</h4>
                <form action="/">
                  <div>
                    <input type="text" placeholder="Billing Address" required>
                    <input type="text" placeholder="Billing Address 2" required>
                    <input type="text" placeholder="Billing Town/City" required>
                  </div>
                  <div class="bill">
                    <div>
                      <label for="card_number">Card number</label>
                      <input id="card_number" type="number" placeholder="1234 1234 1234" required>
                    </div>
                    <div>
                      <label for="card_number">Expiration</label>
                      <input id="card_number" type="date" required>
                    </div>
                    <div>
                      <label for="card_number">CVC</label>
                      <input id="card_number" type="number" required>
                    </div>
                  </div>
                  <div class="country">
                    <select>
                      <option value="1">Select Country</option>
                      <option value="1">Bangladesh</option>
                      <option value="1">USA</option>
                      <option value="1">Uk</option>
                      <option value="1">Uk</option>
                      <option value="1">Uk</option>
                    </select>
                  </div>
                  <div class="adi_btn text-center">
                    <button type="button" id="prev2">Previous</button>
                    <button type="button" id="next3">Complete Booking</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </div>
  </div>

  @endsection
