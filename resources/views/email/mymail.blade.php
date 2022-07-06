<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid bg-red">
	<h5>Your apply for driving test booking is successfull.</h5>
	<h6>Your information : </h6>
<label></label> <label>{{ $details['title'] }}</label><br>
<label>Centre Name :</label> <label>{{ $details['centre_name'] }}</label><br>
<label>Practical Exam Date :</label> <label>{{ $details['centre_date'] }}</label><br>
<label>Paid :</label> <label>{{ $details['paid'] }}</label><br>
<label>Name :</label> <label>{{ $details['name'] }}</label><br>
<label>License :</label> <label>{{ $details['license'] }}</label><br>
<label>Address :</label> <label>{{ $details['address'] }}</label><br>
<label>Post Code :</label> <label>{{ $details['postcode'] }}</label><br>
<label>Email :</label> <label>{{ $details['email'] }}</label><br>
<label>Mobile :</label> <label>{{ $details['mobile'] }}</label><br>
<label>Theory Certificate Number :</label> <label>{{ $details['tcertificate_num'] }}</label><br>
<label> Theory Expiry Date :</label> <label>{{ $details['theory_expdate'] }}</label><br>
<label>Transmission :</label> <label>{{ $details['transmission'] }}</label><br>
<label>Do you pass your theory test :</label> <label>{{ $details['is_theory'] }}</label><br>
<label>Theory Test Number:</label> <label>{{ $details['theorytest_no'] }}</label><br>
<label>Tracking ID :</label> <label class="text-bold">{{ $details['track_id'] }}</label><br>
<label>Do you have a driving test already booked? :</label> <label>{{ $details['is_booked'] }}</label><br>
<label>Previouse Booking Date :</label> <label>{{ $details['pre_bookingdate'] }}</label><br>
{{-- <label>Name:</label> <label>{{ $details['is_revoked'] }}</label><br> --}}
<label>Do you need any instructor :</label> <label>{{ $details['need_instructor'] }}</label><br>

<label>Thank you for confirm your booking.</label>
</body>
</html>