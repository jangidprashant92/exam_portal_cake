// JavaScript Document
$(document).ready(function () {
 
/*---- swaping ----*/
 $(".swap").click(function() {  
        $("#firstSec").swap({  
            target: "secondSec", // Mandatory. The ID of the element we want to swap with  
            opacity: "0.5", // Optional. If set will give the swapping elements a translucent effect while in motion  
            speed: 1000, // Optional. The time taken in milliseconds for the animation to occur              
        });  
    });
  
 
 /*---- datepicker ----*/
 $( ".datepicker" ).datepicker();
 
  $( "#fromdate, #fromdateOne" ).datepicker({
      defaultDate: "+1w",
	   dateFormat: 'DD, d MM, yy',
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#todate, #todateOne" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#todate, #todateOne" ).datepicker({
      defaultDate: "+1w",
	   dateFormat: 'DD, d MM, yy',
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#fromdate, #fromdateOne" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
	
	/*** selectpicer ***/
 $(".selectpicker").selectpicker();
 
 /*--- deals for you ---*/
   $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    manualControls: ".flex-control-nav li",
    itemWidth: 255,
    itemMargin: 5,
    minItems: 1,
    maxItems: 4
  });

/*** Price Range***/
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 2000,
      values: [ 500, 1200 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( " $ " + ui.values[ 0 ] + " to " + ui.values[ 1 ] + " $" );
      }
    });
    $( "#amount" ).val(" $ " + $( "#slider-range" ).slider( "values", 0 ) + " to " + $( "#slider-range" ).slider( "values", 1 ) + " $" );


    $( "#trip-range" ).slider({
      range: true,
      min: 0,
      max: 22,
      values: [ 10, 19 ],
      slide: function( event, ui ) {
        $( "#trip" ).val( ui.values[ 0 ] + " hours to " + ui.values[ 1 ] + " hours" );
      }
    });
    $( "#trip" ).val( $( "#trip-range" ).slider( "values", 0 ) + " hours to " + $( "#trip-range" ).slider( "values", 1 ) + " hours" );

	  

/*** Price Range***/
    $( "#layover-range" ).slider({
      range: true,
      min: 0,
      max: 22,
      values: [ 5, 12 ],
      slide: function( event, ui ) {
        $( "#layover" ).val( ui.values[ 0 ] + " hours to " + ui.values[ 1 ] + " hours" );
      }
    });
    $( "#layover" ).val( $( "#layover-range" ).slider( "values", 0 ) + " hours to " + $( "#layover-range" ).slider( "values", 1 ) + " hours" );

/*** Responsive Calendar***/	
$(".responsive-calendar").responsiveCalendar();	


/*CheckAvailability*/
$(".CheckAvailability").click(function(){
	$(this).siblings(".availability").toggle();
	$(this).hide();
	});
	
/************************************************************/	
});

