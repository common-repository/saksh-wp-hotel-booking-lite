<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Saksh WP Hotel Booking Lite
Version:  2.0
Plugin URI: #
Author: susheelhbti
Author URI: https://profiles.wordpress.org/susheelhbti/
Description: Saksh WP Hotel Booking Lite
Tags: hotel booking, booking engine,  hotel, reservations 
Requires at least: 4.7
Tested up to: 6.4
Stable tag: 2.0
Requires PHP: 5.4.0
License: GPLv2 or later$cart_item
License URI: https://www.gnu.org/licenses/gpl-2.0.html
 
*/

define("SAKSHDIR",  __DIR__);

 
include "saksh_functions.php";


 include "saksh_installation.php";

 include "saksh_notices.php";
include "redux-framework/redux-framework.php";

include "saksh_custom_meta_form.php";
include "saksh_send_notifications.php";


include "saksh_theme_functions.php";
include "saksh_design.php";

 include "saksh_enqueue.php";
 
 include "saksh_ajax.php";

 include "saksh_util.php";

 include "saksh_rooms_custom_post.php";
 include "saksh_wchook.php";
 include "saksh_meta_box.php";
  

 include "saksh_admin/saksh_booking_report.php";

 
include "saksh_admin/saksh_options/saksh_option_panel.php";
 

include "saksh_wc_myaccount.php";



add_action('wp_footer', 'saksh_book_room'); 


function saksh_book_room() { 
 
 






   if (!empty($_REQUEST['saksh_case'])   )  
    
  {
      
      if ( ! isset( $_POST['saksh_nonce'] ) 
    || ! wp_verify_nonce( sanitize_text_field(wp_unslash ( $_POST['saksh_nonce'])) , 'saksh_nonce_action' ) 
) {
   return  esc_html_e( 'Sorry, your nonce did not verify.', 'saksh-wp-hotel-booking-lite' );

   exit;
}




   if (sanitize_text_field( $_REQUEST['saksh_case']) == "book_now" )    
   {
   
   
   
    
     $date_start = sanitize_text_field($_POST['date_start']);
     
     
   if(!isset($date_start))

{   return "";
}
 
 
 
    
     $room_id = sanitize_text_field($_POST['room_id']);
    
    
    
     $purchase_plan_id = sanitize_text_field($_POST['purchase_plan_id']);
    $date_end =sanitize_text_field($_POST['date_end']);  
    
    
    $adult  =sanitize_text_field($_POST['adult']);   
    $kid  =sanitize_text_field($_POST['kid']);   
  $no_rooms=sanitize_text_field($_POST['no_rooms']);  
 
 
 
    $saksh_payment_option=  get_post_meta(  $room_id, 'saksh_payment_option' , true ) ;  
 
  $rate_per_night  =    $saksh_payment_option[$purchase_plan_id]['rate_per_night'];
    
   
  $startdate = strtotime($date_start);
$enddate = strtotime($date_end);

$days =saksh_date_diff_in_days($date_start, $date_end);

 
 
  $total_charge= (float)  $no_rooms * (float)  $rate_per_night  *  (float) $days;
  
  
   
   
    
    
  $product_id =  saksh_hotel_booking_product() ; // product ID to add to cart
     
  
       $cart_item_data = array( 'date_start' => $date_start ,
       "date_end"=>$date_end ,
       'adult'=>$adult,
       "kid"=>$kid ,
       "no_rooms"=>$no_rooms ,
       'room_id'=> $room_id , 
       "purchase_plan_id"=>$purchase_plan_id,
       "rate_per_night"=>$rate_per_night,
       'total_charge'=>$total_charge);
       
       
  $saksh_get_taxes=saksh_get_taxes($saksh_payment_option ,$cart_item_data );
  
  $cart_item_data['total_taxes']=  $saksh_get_taxes;
  
 
     
    
    
    
 
 $available=saksh_check_availability($cart_item_data,$purchase_plan_id);
 
 
 	WC()->cart->empty_cart();

 
 if($available=="true")
 {
     
  
 WC()->cart->add_to_cart( $product_id , 1, '', array(), $cart_item_data);
	 
		  
 $cart_page = wc_get_cart_url();

// var_dump($cart_item_data);
 	 echo '<meta http-equiv="refresh" content="0; URL= '.esc_url($cart_page ).'" />';
	 
		
						
					 
  }}
  
  
}
}

 
 

function saksh_room_search_func(){
    
	ob_start();
	
	include "saksh_room_search_v2.php" ;
    
$content = ob_get_clean();
return $content;
    
}




add_shortcode( 'SakshRoomSearch', 'saksh_room_search_func' );







function saksh_room_booking_func(){
    
	ob_start();
	
	include "saksh-room-booking.php" ;
    
$content = ob_get_clean();
return $content;
    
}




add_shortcode( 'SakshRoomBooking', 'saksh_room_booking_func' );



function saksh_get_rooms_which_r_available( $query_data)
{
    
    
	 
$rooms =   get_posts(array(
    'post_type' => 'rooms',
    'post_status' => 'publish'
));


$room_data=array();

$room_id=array();
 
foreach($rooms as  $room)
{
    
$room_d=array();
  $row=array();
  
  $row=$query_data;
  
  
    
    $row['room_id']=$room->ID;
    
  //$row['room']=$room;
    
   
   for($i=1;$i<=5;$i++){
       
       $purchase_plan_id=$i;
   
 $available =saksh_check_availability($row,$purchase_plan_id);
 
 
 
 
  $ar=array();
            
     //       $ar['room_id']=$room->ID;
            
            $ar['purchase_plan_id']=$i;
            
            $ar['available']=$available;
             
            
            
            
            
   $room_d[]=$ar;
 
 
   
   
   }    
   
     $row['room_data']=$room_d;
    
    
    $room_data[]=$row; 
}


return $room_data;

 
}


       
function saksh_get_taxes($saksh_payment_option ,$cart_item_data ) 
  
  
  
  {
      
      return 0;
      
   //         title_field_service
            
          $saksh_get_taxes= array_sum( $saksh_payment_option['amount_3_service'] ); 
            
            
            
   
     // amount_3_service
   //   $saksh_get_taxes=0;
    
    
    return   $saksh_get_taxes;
    
    
  }
function saksh_check_availability($query_data,$purchase_plan_id)
{
    
    // it will check availability based on the room id and purchase plan id 
    
    
     $available="true";
     
     $room_id=  $query_data['room_id'];
     
      
     
    $saksh_payment_option=  get_post_meta(  $room_id, 'saksh_payment_option' , true ) ;  
 
 
 if(isset(   $saksh_payment_option[$purchase_plan_id]['total_rooms_']))
 
  $total_rooms  =    $saksh_payment_option[$purchase_plan_id]['total_rooms_'];
    else
    $total_rooms  = 100;
     
     
      
     
   $total_rooms=intval($total_rooms);
     
    
	 $required_room=intval($query_data['no_rooms']) ;
	 
    
    $startdate = strtotime($query_data['date_start']);
$enddate = strtotime($query_data['date_end']);

while ($startdate <= $enddate) {
 
  
  
 $total_booking=saksh_get_total_booking_for_a_given_date($startdate, $room_id,$purchase_plan_id);
  
  
  
  
    $remaining= $total_rooms - $total_booking ;
   
    
 if( $remaining  > $required_room )
 {
    $available="true";
   
   

}
else
{
    $available="false";
   
   
   return $available;
   
}
 


  $startdate = strtotime("+1 day", $startdate); 
  
}

return $available;



}







 
  
  function saksh_get_total_booking_for_a_given_date($booking_date,$room_id, $purchase_plan_id)
  {
      
    
 
       global $wpdb;
		
	 
 
   $res = $wpdb->get_row( $wpdb->prepare( "SELECT  count(*) total_booking FROM  {$wpdb->prefix}bookings  WHERE room_id= %d and purchase_plan_id=%d and    booking_date =date(%s)", $room_id ,$purchase_plan_id, $booking_date  ) );
     
     
     if($res)
     {
     $total_booking=$res->total_booking;
     
     
	return  intval($total_booking);
     }
     else
     
     return  0;
	
      
  }
  


 //saksh_hb_plugin_table_install();

 
 
 function saksh_capture_log($line_number ,  $query_data )
{
    
    return "";
$my_post = array(
'post_title'    => $line_number,
'post_content'  =>  $query_data,
'post_status'   => 'draft' 
);



wp_insert_post( $my_post );


}


