<?php



add_action('init', 'saksh_check_wc', 0);
   function saksh_check_wc() {
       
     
          
          
          
      $active_plugins= (array) get_option( 'active_plugins', array() );
      
      
      if(!in_array( "woocommerce/woocommerce.php",   $active_plugins))    
       {
           add_action( 'admin_notices',  'saksh_admin_notices'  );
       }
      $demo=true;
      if($demo===true)
      {
            add_action( 'admin_notices',  'saksh_admin_notices_demo_data'  );
      }
       
	}
	
	  function saksh_admin_notices() {
		?>
		<div class="error">
			<p>
				<?php echo esc_html_e( 'Saksh Hotel booking plugin requires', 'saksh-wp-hotel-booking-lite' ); ?> 
				<a href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a> <?php echo esc_html_e( 'plugins to be active!', 'saksh-wp-hotel-booking-lite' ); ?>
			</p>
		</div>
		<?php
	}	
	  function saksh_admin_notices_demo_data() {
		?>
		<div class="error">
			<p>
				<?php
				
			
			$url= 	admin_url( 'admin.php?page=saksh_hb_support&demo=1', 'https' );
			
			
				$link="<a target='_blank' href=".$url." /> Install Demo</a>";
				
				
				
				
				echo esc_html_e( 'Saksh Hotel booking plugin offer demo data installation click here to do this ' , 'saksh-wp-hotel-booking-lite' );  
				
				echo $link;
				
				
				?> 
			 
			</p>
		</div>
		<?php
	}
	
	