<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 // Define constants
define( 'PLUGIN_SLUG', 'saksh_hotel_booking' );
define( 'PLUGIN_ROLE', 'manage_options' );
define( 'PLUGIN_DOMAIN', 'saksh' );

add_action( 'admin_menu', 'saksh_register_your_plugin_menu', 9 );

function saksh_register_your_plugin_menu() {
	// add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = ”, string $icon_url = ”, int|float $position = null ): string
	
	
	
	add_menu_page(
		__( 'Room Bookings', PLUGIN_DOMAIN ),
		'Room Bookings',
		PLUGIN_ROLE,
		PLUGIN_SLUG,
		false,
		'dashicons-admin-generic',
	 75
	);



// add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = ”, int|float $position = null ): string|false

	add_submenu_page(
		PLUGIN_SLUG,
		'Room Bookings',
		'Room Bookings',
		PLUGIN_ROLE,
		PLUGIN_SLUG,
		'saksh_booking_dashboard'
	);
	
	


	
		add_submenu_page(
		PLUGIN_SLUG,
		'Bookings calander',
		'Bookings calander',
		PLUGIN_ROLE,
		"booking_dashboard",
		'saksh_wb_print_report'
	);
	
	
		add_submenu_page(
		PLUGIN_SLUG,
		'Todays Booking' ,
		'Todays Booking',
		PLUGIN_ROLE,
		"saksh_todays_booking",
		'saksh_todays_booking'
	);

	add_submenu_page(
		PLUGIN_SLUG,
		'Support' ,
		'Support',
		PLUGIN_ROLE,
		"saksh_hb_support",
		"saksh_hb_support"
	);
}
  
 function saksh_hb_support()
 {
 
  
    
   if($_GET['demo']==1)
   saksh_hb_plugin_table_install();
 
   
 
    echo "For support whatsapp +91 8840574997";
    
    
    
 }
 
 
 function saksh_booking_dashboard()
 {
    // echo "saksh_booking_dashboard";
    
    echo "For support whatsapp +91 8840574997";
 }  
 function saksh_todays_booking()
 {
     
     
     
     
        echo "For support whatsapp +91 8840574997";
     
     
       $request_date=  date("Y-m-d");
        
    saksh_booking_by_date($request_date);
    
    
 }
 /*
   
 function delete_your_plugin_dashboard_callback()
 {
     echo "your_plugin_dashboard_callback 71";
 }
 */
 
 



function saksh_wb_print_report(){
    
         if (!empty($_POST))
  {
    
    
    
    
    
 




   if ( ! isset( $_POST['saksh_nonce'] ) 
    || ! wp_verify_nonce( sanitize_text_field(wp_unslash ( $_POST['saksh_nonce'])) , 'saksh_nonce_action' ) 
) {
   return  esc_html_e( 'Sorry, your nonce did not verify.', 'saksh-wp-hotel-booking-lite' );

   exit;
}




}
    //  wp_nonce_field( 'saksh_nonce_action', 'saksh_nonce' );
    
    if(isset($_REQUEST['request_date']))
    {
        
    $request_date=sanitize_text_field($_REQUEST['request_date']);
        
    saksh_booking_by_date($request_date);
    
    saksh_other_booking_by_date($request_date);
    
    
    
    }else
    {
     saksh_date_wise_booking();
    }
    

}
function saksh_date_wise_booking(){
	
	
	
	
 //saksh_create_dummy_data() ;

 
		?>
		<div class="  wrap">
 
		    
		        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
		  <h1 class="wp-heading-inline">
		      
		      <?php _e('All list of booking', 'saksh'); ?>
		      
		       
		   
		      		
</h1>  
	   For support whatsapp +91 8840574997 
	
 
    <div id='calendar'></div>
		<?php
		
		 
		
		
 
	 echo "</div>";


 
	
	
}


function saksh_booking_by_date($request_date){
	
	
	
	 	global $wpdb;
 
		
		
		
		
	//	$sql="SELECT * FROM {$wpdb->prefix}bookings where booking_date=date('".$request_date."')";
		
		
 
 
	

		$results = $wpdb->get_results( 	$wpdb->prepare(
	"SELECT * FROM {$wpdb->prefix}bookings  WHERE `date_start` =date(%s)",  
$request_date
) );
		?>
		<div class="  wrap">
 
		    
		    
		  <h1 class="wp-heading-inline">
		      
		      
		     
New bookings</h1>  

<h2>
    
    
 Date <?php echo $request_date; ?>
	
	
</h2>	
		<?php
		
	 echo "<table class=' table wp-list-table widefat    '>";
	 
	  
	  
	  
      echo "<tr>";
      
       echo "<td> Booking ID </td>";
       
   
       
       echo "<td> Date start </td>";
       
       echo "<td> Date end </td>";
          echo "<td> Name </td>";
       
       echo "<td> Email </td>";
          
        echo "<td> Phone </td>";
       echo "<td> Adult </td>";
       
       echo "<td>Kid </td>";
       
       
        echo "<td>No rooms </td>";
        
       echo "<td>Purchase plan </td>"; 
       
        echo "<td> Total Charge</td>";
        
          
          
       
       echo "<td>Created at </td>";
       
       
       
       echo "<td>Status </td>";
       
       echo "</tr>";
	 
	 
  foreach( $results as $res)
  {
       
      echo "<tr>";
      
       echo "<td>";
      echo  esc_attr( $res->order_id );
       echo "</td>";
      
       
       echo "<td>";
      echo  esc_attr($res->date_start );
       echo "</td>";
       
       echo "<td>";
      echo  esc_attr($res->date_end );
       echo "</td>";
       
       
               
        echo "<td>";
      echo  esc_attr($res->first_name );
      
      echo  esc_attr($res->last_name );
       echo "</td>";
       
       echo "<td>";
      echo  esc_attr($res->email );
       echo "</td>";
          
        echo "<td>";
      echo  esc_attr($res->phone );
       echo "</td>";
       
       
       
       echo "<td>";
      echo   esc_attr($res->adult );
       echo "</td>";
       
       echo "<td>";
      echo   esc_attr($res->kid );
       echo "</td>";
       
       
        echo "<td>";
      echo  esc_attr($res->no_rooms );
       echo "</td>";
       
  
               echo "<td>";
      echo  esc_attr($res->purchase_plan_id );
       echo "</td>";
       
     
       echo "<td>";
      echo wc_price( esc_attr($res->total_charge ));
       echo "</td>";
       

     
    
       echo "<td>";
      echo  esc_attr($res->booking_date );
       echo "</td>";
       
       
       
       echo "<td>";
      echo  esc_attr($res->status );
       echo "</td>";
       
       
       
       
        
      echo "</tr>";
  }
   
 
	 echo "</table>";
 
	 echo "</div>";


 
	
	
}

function saksh_other_booking_by_date($request_date){
	
	
	
	 	global $wpdb;
 
		
		
		 
		
  
	

		$results = $wpdb->get_results(  	$wpdb->prepare(
	"SELECT * FROM {$wpdb->prefix}bookings  WHERE `booking_date` =date(%s)",  
$request_date
)  );
		?>
		<div class="  wrap">
 
		    
		    
		  <h1 class="wp-heading-inline">
		      
		       
All list of booking </h1>  
	
		
<h2>
    
    
 Date <?php echo $request_date; ?>
	
	
</h2>
		<?php
		
	 echo "<table class=' table wp-list-table widefat    '>";
	 
	  
	  
	  
      echo "<tr>";
      
       echo "<td> Booking ID </td>";
       
   
       
       echo "<td> Date start </td>";
       
       echo "<td> Date end </td>";
          echo "<td> Name </td>";
       
       echo "<td> Email </td>";
          
        echo "<td> Phone </td>";
       echo "<td> Adult </td>";
       
       echo "<td>Kid </td>";
        
        
       echo "<td>Purchase plan </td>"; 
       
        echo "<td> Total Charge</td>";
        
          
          
       
       echo "<td>Created at </td>";
       
       
       
       echo "<td>Status </td>";
       
       echo "</tr>";
	 
	 
  foreach( $results as $res)
  {
       
      echo "<tr>";
      
       echo "<td>";
      echo  esc_attr( $res->order_id );
       echo "</td>";
      
       
       echo "<td>";
      echo  esc_attr($res->date_start );
       echo "</td>";
       
       echo "<td>";
      echo  esc_attr($res->date_end );
       echo "</td>";
       
       
               
        echo "<td>";
      echo  esc_attr($res->first_name );
      
      echo  esc_attr($res->last_name );
       echo "</td>";
       
       echo "<td>";
      echo  esc_attr($res->email );
       echo "</td>";
          
        echo "<td>";
      echo  esc_attr($res->phone );
       echo "</td>";
       
       
       
       echo "<td>";
      echo   esc_attr($res->adult );
       echo "</td>";
       
       echo "<td>";
      echo   esc_attr($res->kid );
       echo "</td>";
       
       
   
       
  
               echo "<td>";
               
               
      echo  esc_attr($res->room_id ); 
      echo "--"; 
      echo  $res->purchase_plan_id  ;
      
      echo  esc_attr($res->purchase_plan_id );
      
      
       echo "</td>";
       
     
       echo "<td>";
      echo wc_price( esc_attr($res->total_charge ));
       echo "</td>";
       

     
    
       echo "<td>";
      echo  esc_attr($res->booking_date );
       echo "</td>";
       
       
       
       echo "<td>";
      echo  esc_attr($res->status );
       echo "</td>";
       
       
       
       
        
      echo "</tr>";
  }
   
 
	 echo "</table>";
 
	 echo "</div>";


 
	
	
}