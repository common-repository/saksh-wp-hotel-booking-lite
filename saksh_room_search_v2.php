<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
 
 
 
  
 <div     class="saksh saksh_form  saksh_booking_form"  >
     <form action="" method="post">
         
         
    <?php wp_nonce_field( 'saksh_nonce_action', 'saksh_nonce' ); ?>
 
 
  
 
<h2 class='date'>Date</h2>
 <div class="date">
     
 
<input type="text" class="form-control" name="booking_date"  id="booking_date" />
     
     
<input type="hidden" class="form-control" name="date_start" value="<?php echo date("Y-m-d" ); ?>"  id="date_start" />
   
<input type="hidden" class="form-control" name="date_end" value="<?php echo date("Y-m-d" ); ?>" id="date_end" />

 </div>
  
  
 
 
 <h2 class='adult'>Adults</h2>
 <div class="adult">
     
 
<input type="number"  class="form-control" name="adult" />
     
 </div>
 
   <h2 class='kid'>Kids</h2>
 <div class="kid">
     
 
<input type="number" class="form-control" name="kid" />
     
 </div>
  <div class="no_rooms" style="display:none;">
  <h2 class='no_rooms'>No of rooms</h2>

     
 
<input type="number" value=1 class="form-control" name="no_rooms" />
     
 </div>
 
  <br />
   
 <input type="submit" value="Search Room"  class="button button-primary button-large   saksh_booking" />
     </form>
 </div>
 
    
     <?php
    
      
   // 
     if (!empty($_POST))
  {
   
   
     
        if ( ! isset( $_POST['saksh_nonce'] ) 
    || ! wp_verify_nonce( sanitize_text_field(wp_unslash ( $_POST['saksh_nonce'])) , 'saksh_nonce_action' ) 
) {
   return  esc_html_e( 'Sorry, your nonce did not verify.', 'saksh-wp-hotel-booking-lite' );

   exit;
}


 
 global $wpdb;
 
 $table_name= $wpdb->prefix ."bookings";
 
 //echo $table_name;
 
 
  
    $date_start = sanitize_text_field($_POST['date_start']);
    
    $date_end =sanitize_text_field($_POST['date_end']);  
    
    
    $adult  =sanitize_text_field($_POST['adult']);   
    $kid  =sanitize_text_field($_POST['kid']);   
  $no_rooms=sanitize_text_field($_POST['no_rooms']);  
  
  
   
    
    
     
     
      $query_data = array( 'date_start' => $date_start , "date_end"=>$date_end ,'adult'=>$adult,"kid"=>$kid , "no_rooms"=>$no_rooms);



   saksh_print_search_results($query_data );
  
   
     
       
        
   

 
 }
 
 ?>
  
 