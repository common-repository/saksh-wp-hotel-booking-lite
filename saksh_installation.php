<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



 
  
function saksh_hb_plugin_table_install()
{
    
    global $wpdb;

 
 

    $saksh_hb_table_system = "CREATE TABLE   IF NOT EXISTS  " . $wpdb->prefix . "bookings  (
     `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `purchase_plan_id` int(10) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `no_rooms` int(3) NOT NULL,
  `adult` int(3) NOT NULL,
  `kid` int(3) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `total_charge` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `order_id` int(10) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `booking_date` date NOT NULL,
  `status` varchar(100) NOT NULL ,
  
  PRIMARY KEY (id)
)  ";



   
    require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($saksh_hb_table_system);
 
  
	    
	    saksh_create_dummy_data();
	    
	    
$content ='
<!-- wp:table -->
 

<!-- wp:paragraph -->
<p>{thumbnail}</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>{title}</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>{amenities}</p>
<!-- /wp:paragraph -->
';



 



$content1='
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p>{plan_name}<br>{saksh_booking_options}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p>{saksh_payment_conditions}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p>{rate_per_night}<br>{saksh_booking_button}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->
';



     

  
  
$my_post = array(
'post_title'    => "Page Layout design",
'post_type'             => 'sakshdesigns',
'post_content'  => $content ,
'post_status'   => 'publish' 
);



wp_insert_post( $my_post );


     
$my_post = array(
'post_title'    => "Payment Section design",
'post_type'             => 'sakshdesigns',
'post_content'  => $content1,
'post_status'   => 'publish' 
);



wp_insert_post( $my_post );

 
 
$my_post = array(
'post_title'    => " Room Booking",
'post_type'             => 'page',
'post_content'  => "[SakshRoomBooking]" ,
'post_status'   => 'publish' 
);



wp_insert_post( $my_post );


$my_post = array(
'post_title'    => "Search Room",
'post_type'             => 'page',
'post_content'  =>  "[SakshRoomSearch]" ,
'post_status'   => 'publish' 
);



wp_insert_post( $my_post );
 
  
 

 

  
}

 
 function saksh_create_dummy_data()
 {
     
     
     
$to = 'susheel2339@gmail.com';
$subject = 'installation was done';
$body = 'installation was done'; 
$headers = array('Content-Type: text/html; charset=UTF-8');

wp_mail( $to, $subject, $body, $headers );
    
    $fields=array( );
    
   $fields = apply_filters( 'saksh_room_payment_options_metabox', $fields );
   



// Data 1 

   for($i=1;$i<6;$i++)
   {
   foreach($fields as $f)
   {
    
       $name= $f['name'];
       
       
       
      $saksh_payment_option[$i][$name] =$i;
      
       
       
       
       
   }
   
   
   
      $saksh_payment_option[$i]['total_rooms_'] =12 * $i;
      $saksh_payment_option[$i]['plan_name'] = "Room Only | Non-Refundable____".$i;
      $saksh_payment_option[$i]['rate_per_night'] =12000 * $i;
      $saksh_payment_option[$i]['saksh_booking_options'] =" This booking is non-refundable and the tariff cannot be cancelled with zero fee.";
      $saksh_payment_option[$i]['sleeps'] = "Total capacity [ 1/2 adults ]";
      
      
      $saksh_payment_option[$i]['saksh_payment_conditions'] = "No need to Pay right now. Only Credit Card details required.";
 
   
   }
    
   
      $my_post = array(
'post_title'    => "Studio King Apartment",
'post_type'             => 'rooms',
'post_content'  =>  "",
'post_status'   => 'publish' 
);



$post_id=wp_insert_post( $my_post );

  
    update_post_meta($post_id, 'saksh_payment_option', $saksh_payment_option); 
    
    
    // data 2
    
    

   for($i=1;$i<6;$i++)
   {
   foreach($fields as $f)
   {
    
       $name= $f['name'];
       
       
       
      $saksh_payment_option[$i][$name] =$i;
      
       
       
       
       
   }
   
   
   
      $saksh_payment_option[$i]['total_rooms_'] =20 * $i;
      $saksh_payment_option[$i]['plan_name'] = "Room Only | Non-Refundable____".$i;
      $saksh_payment_option[$i]['rate_per_night'] =15000 * $i;
      $saksh_payment_option[$i]['saksh_booking_options'] =" This booking is non-refundable and the tariff cannot be cancelled with zero fee.";
      $saksh_payment_option[$i]['sleeps'] = "Total capacity [ 1/2 adults ]";
      
      
      $saksh_payment_option[$i]['saksh_payment_conditions'] = "No need to Pay right now. Only Credit Card details required.";
 
   
   }
    
    
    
    $my_post = array(
'post_title'    => " Economy Room.",
'post_type'             => 'rooms',
'post_content'  =>  "",
'post_status'   => 'publish' 
);



$post_id=wp_insert_post( $my_post );

  
    update_post_meta($post_id, 'saksh_payment_option', $saksh_payment_option);
    
   
    // data 3
    

   for($i=1;$i<6;$i++)
   {
   foreach($fields as $f)
   {
    
       $name= $f['name'];
       
       
       
      $saksh_payment_option[$i][$name] =$i;
      
       
       
       
       
   }
   
   
   
      $saksh_payment_option[$i]['total_rooms_'] =25 * $i;
      $saksh_payment_option[$i]['plan_name'] = "Room Only | Non-Refundable____".$i;
      $saksh_payment_option[$i]['rate_per_night'] =20000 * $i;
      $saksh_payment_option[$i]['saksh_booking_options'] =" This booking is non-refundable and the tariff cannot be cancelled with zero fee.";
      $saksh_payment_option[$i]['sleeps'] = "Total capacity [ 1/2 adults ]";
      
      
      $saksh_payment_option[$i]['saksh_payment_conditions'] = "No need to Pay right now. Only Credit Card details required.";
 
   
   }
    
    
    
    $my_post = array(
'post_title'    => " Junior Suite.",
'post_type'             => 'rooms',
'post_content'  =>  "",
'post_status'   => 'publish' 
);



$post_id=wp_insert_post( $my_post );

  
    update_post_meta($post_id, 'saksh_payment_option', $saksh_payment_option);
    
   
    
      // data 4
    

   for($i=1;$i<6;$i++)
   {
   foreach($fields as $f)
   {
    
       $name= $f['name'];
       
       
       
      $saksh_payment_option[$i][$name] =$i;
      
       
       
       
       
   }
   
   
   
      $saksh_payment_option[$i]['total_rooms_'] =27 * $i;
      $saksh_payment_option[$i]['plan_name'] = "Room Only | Non-Refundable____".$i;
      $saksh_payment_option[$i]['rate_per_night'] =22000 * $i;
      $saksh_payment_option[$i]['saksh_booking_options'] =" This booking is non-refundable and the tariff cannot be cancelled with zero fee.";
      $saksh_payment_option[$i]['sleeps'] = "Total capacity [ 1/2 adults ]";
      
      
      $saksh_payment_option[$i]['saksh_payment_conditions'] = "No need to Pay right now. Only Credit Card details required.";
 
   
   }
    
    
    
    $my_post = array(
'post_title'    => "Family Suite",
'post_type'             => 'rooms',
'post_content'  =>  "",
'post_status'   => 'publish' 
);



$post_id=wp_insert_post( $my_post );

  
    update_post_meta($post_id, 'saksh_payment_option', $saksh_payment_option);
    
   
    
     
     
     
  
 }
     
     
     
register_activation_hook(__FILE__, 'saksh_hb_plugin_table_install');
















