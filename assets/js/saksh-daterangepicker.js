
 
        
jQuery(function ($) {  

        
        if($('input[name="booking_date"]').length!==0){
 
        
      $('input[name="booking_date"]').daterangepicker( );
      
      
   $('input[name="booking_date"]').on('apply.daterangepicker', function(ev, picker) {
 
  
  $('input[name="date_start"]').val(picker.startDate.format('YYYY-MM-DD'));
  $('input[name="date_end"]').val(picker.endDate.format('YYYY-MM-DD'));
   
  
  
});

} 

 });