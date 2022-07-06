// nice select plugin 
$(document).ready(function() {
  $('select').niceSelect();
});



const partContainer = document.querySelector('.part_container');
const adiPart2 = document.querySelector(".adi_part2");
const testDetails = document.querySelector(".test_details");
const personalDetails = document.querySelector('.personal_details');
const adiPayment = document.getElementById('adiPayment');
const next1  = document.getElementById('next1');
const next2 = document.getElementById('next2');
const prev0 = document.getElementById('prev0');
const prev1 = document.getElementById('prev1');
const prev2 = document.getElementById('prev2');


adiPart2.addEventListener('click', function (){
  partContainer.style.display = 'none';
  testDetails.style.display = 'block'
})

next1.addEventListener('click', function(){
  testDetails.style.display = 'none';
  personalDetails.style.display = "block"
})
next2.addEventListener('click', function(){
  personalDetails.style.display = "none";
  adiPayment.style.display = "block"
})

prev0.addEventListener('click', function(){
  partContainer.style.display = 'block';
  testDetails.style.display = 'none'
})
prev1.addEventListener('click', function(){
  testDetails.style.display = 'block';
  personalDetails.style.display = "none"
})
prev2.addEventListener('click', function(){
  personalDetails.style.display = "block";
  adiPayment.style.display = "none"
})