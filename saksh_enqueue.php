<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 
function saksh_admin_style() {
    


$url=esc_url( plugins_url( 'assets/css/saksh-admin.css', __FILE__ ) ); 
    
    
    
  wp_enqueue_style('saksh-admin-styles',$url); 
  
  
  
  wp_enqueue_style('saksh-styles-ui', "https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css");

  
  
  
  
 

 
}


add_action('admin_enqueue_scripts', 'saksh_admin_style');
 
function saksh_script_style() {
    
    
 
  
  
$url=esc_url( plugins_url( 'assets/css/saksh.css', __FILE__ ) ); 
    
    
    
  wp_enqueue_style('saksh-styles',$url);
  
  
  
  
   
  
$url=esc_url( plugins_url( 'assets/js/daterangepicker/daterangepicker.css', __FILE__ ) ); 

wp_enqueue_style('saksh-daterangepicker',$url);
  
   
  
  
  
$url=esc_url( plugins_url( 'assets/js/daterangepicker/moment.min.js', __FILE__ ) ); 
 
 wp_enqueue_script( 'saksh_moment', $url, array('jquery'), null, true );   
 
  
  
  
  
  
$url=esc_url( plugins_url( 'assets/js/daterangepicker/daterangepicker.js', __FILE__ ) ); 
 
 wp_enqueue_script( 'saksh_lib_daterangepicker', $url, array('jquery'), null, true );   
 
 
  
  
  
  
  
  
  
  
  
$url=esc_url( plugins_url( 'assets/js/saksh-daterangepicker.js', __FILE__ ) ); 
 
 wp_enqueue_script( 'saksh_daterangepicker', $url, array('jquery'), null, true );   
    
  
}

 

 
add_action( 'wp_enqueue_scripts', 'saksh_script_style' );


add_action( 'admin_enqueue_scripts', 'saksh_enqueue_my_script' );
function saksh_enqueue_my_script() {
    
    
 wp_enqueue_script( 'saksh_js', plugin_dir_url(__FILE__).'assets/js/saksh-admin.js', array('jquery'), null, true );

 


     wp_localize_script( 'saksh_js', 'saksh_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ,'saksh_report_url'=>admin_url( 'admin.php' )  ) );
            
            
    
    
    
    
    wp_enqueue_script( 'saksh_js',  'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js', array(), null, true );
		    
    
    
    wp_enqueue_script( 'saksh_ui_js',  'https://code.jquery.com/ui/1.13.2/jquery-ui.js', array(), null, true );
    
     
    
    
    wp_enqueue_script( 'saksh_ckeditor11',  'https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js', array(), null, true );
 
    
}


