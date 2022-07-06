@php
$setting = App\Models\Admin\Setting::first();
@endphp


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>@yield('title')</title>
    @if($setting)
    <meta property="og:type" content="Training Institute,Training Institute sylhet" />
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:site_name" content="DelwarIT" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/app/public/'.$setting->favicon)}}">
    @endif

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:image" content="@yield('og-image')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="@yield('twitter-title')">
    <meta property="twitter:description" content="@yield('twitter-description')">
    <meta property="twitter:image" content="@yield('twitter-image')">
    <meta property="og:image:width" content="100%" />
    <meta property="og:image:height" content="100%" />
    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta property="image" content="@yield('meta-image')">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:image" content="@yield('og-image')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="@yield('twitter-title')">
    <meta property="twitter:description" content="@yield('twitter-description')">
    <meta property="twitter:image" content="@yield('twitter-image')">
    <meta property="og:image:width" content="100%" />
    <meta property="og:image:height" content="100%" />
    
 
      
    @yield('header_css')



  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Manjari:wght@400;700&family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">


</head>

<body>
@include('layouts.header')


@yield('content')


@include('layouts.footer')


  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('public/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('public/frontend/assets/js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>


    <script>
// Timer
var mins = 10;  //Set the number of minutes you need
    var secs = mins * 60;
    var currentSeconds = 0;
    var currentMinutes = 0;
    /* 
     * The following line has been commented out due to a suggestion left in the comments. The line below it has not been tested. 
     * setTimeout('Decrement()',1000);
     */
    setTimeout(Decrement,1000); 

    function Decrement() {
        currentMinutes = Math.floor(secs /60);
        currentSeconds = secs % 60;
        if(currentSeconds <= 9) currentSeconds ="0"+  currentSeconds;
        secs--;
        document.getElementById("endTest").innerHTML = "00" + ":" + "0" +currentMinutes + ":" + currentSeconds; //Set the element id you need the time put into.
        if(secs !== -1) setTimeout('Decrement()',1000);
    }

    // TimeUp Change Text
    const ch_tex = setTimeout(ctext,600000);
    function ctext(){
      document.getElementById("end_Text").innerHTML = "Cart Expired, try again";
    }


    const dis_form = setTimeout (time_up,600000);
    function time_up(){
    var form = document.getElementById("learner");
    var elements = form.elements;
    for (var i = 0, len = elements.length; i < len; ++i) {
    elements[i].readOnly = true;
      }
    }


    function colup_ctn(){
        document.getElementById('content_hide').style.display='block';
    }
    function colup_ctn_2(){
        document.getElementById('content_hide').style.display='none';
    }   
    function colup_ctn1(){
        document.getElementById('content_hide1').style.display='block';
    }
    function colup_ctn_3(){
        document.getElementById('content_hide1').style.display='none';
    }
    function colup_ctn6(){
        document.getElementById('date_box').style.display='block';
    }
    function colup_ctn_6(){
        document.getElementById('date_box').style.display='none';
    }
</script>

{{-- stripe --}}

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>


<script src='https://npmcdn.com/isotope-layout@3.0.6/dist/isotope.pkgd.js'></script>
<script>
  // init Isotope
var $grid = $('.date_box').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows'
});
// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};
// bind filter on select change
$('.filters-select').on( 'change', function() {
  // get filter value from option value
  var filterValue = this.value;
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});
</script>

{{-- payment onchange --}}
<!-- partial -->
  <script>
  $(document).ready(function(){
  //after load will check the checkbox is checked or not
  var check = $("#bank").prop("checked");
  if(check){
    $("#first").addClass("activeTab");
  }
  
  //click on yes
  $("#bank").on("click", function(){
    check = $(this).prop("checked");
    $("#second").removeClass("activeTab");
    $("#first").addClass("activeTab");
    
  })
  //click on No
  $("#card").on("click", function(){
    check = $(this).prop("checked");
    $("#first").removeClass("activeTab");
    $("#second").addClass("activeTab");
    console.log(check);
  })
});
</script>

<div id="timer"></div> 
<script type="text/javascript">

$(document).ready(function() {
    setInterval(function() {
        $("#timer").load('http://localhost/fdtbooking1/update');
    }, 70000);
});

</script>

<div id="timer1"></div>
<script type="text/javascript">

$(document).ready(function() {
    setInterval(function() {
        $("#timer1").load('http://localhost/fdtbooking1/update_theory');
    }, 70000);
});

</script>
{{-- <script type="text/javascript">
$(window).bind('unload', function(){
    $.ajax({
        type: 'get',
        async: false,
        url: 'http://localhost/fdtbooking1/update_theory'
    });
});
</script> --}}
</body>

</html>