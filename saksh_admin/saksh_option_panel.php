<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = 'saksh_wp_options';

  Redux::disable_demo();


    $args = array(
        'display_name'         =>  "Saksh WP lite Hotel Booking",
        'display_version'      => "2.0.0",
        'menu_title'           => esc_html__( 'Saksh WP lite Hotel Booking', 'saksh-wp-hotel-booking-lite' ),
        'customizer'           => false,
        "dev_mode"     => false,
     'page_priority'             => 90,
        	
        	
    );

    Redux::set_args( $opt_name, $args );

    
  

    Redux::set_section( 
        $opt_name, 
        array(
            'title'  => esc_html__( 'Display Layout', 'saksh-wp-hotel-booking-lite' ),
            'id'     => 'saksh_display_layout',
            'desc'   => esc_html__( 'Basic field with no subsections.', 'saksh-wp-hotel-booking-lite' ),
            'icon'   => 'el el-home',
         
        ) 
    );
    
    $posts=array();
      $posts_array = get_posts(array("post_type"=> "sakshdesigns")); 
      foreach($posts_array as $p)
      
      {
        $posts[$p->ID]=    $p->post_title;
     
          
      }
   
 
      $url="post-new.php?post_type=sakshdesigns";

     $url="<a target='_blank' href=".$url."> ".$url."</a>";

     
     
      Redux::set_field( $opt_name, 'saksh_display_layout', array(
    'id' => 'saksh_room_info_theme',
   
    'title' => __( 'Select pre-defined theme'  ) ,
      
     	'desc'             => esc_html__( 'Dont forget to create a design before you select at .').$url,
     
      
     	
     	
     	
     'type'            => 'select',
			 
			 
			 
				'options'         =>$posts,
				'default'         => 'theme_2',
	 
 
		
		
		

) );  
     
 
     
     
     
      
     
     
      Redux::set_field( $opt_name, 'saksh_display_layout', array(
    'id' => 'saksh_room_info_pricing',
   
    'title' => __( 'Select pre-defined room info pricing '  ) ,
     
      
     	'desc'             => esc_html__( 'Dont forget to create a design before you select at .').$url,
     	
     	
     	
     'type'            => 'select',
			 
			 
			 
				'options'         =>$posts,
				'default'         => 'theme_2',
	 
 
		
		
		

) );  
     
 
     
      
			 
     

			 
			  
 
 $path= SAKSHDIR . '/readme.txt'; 

  Redux::set_args( $opt_name, $args );
    
 if ( file_exists(  $path ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'saksh-wp-hotel-booking-lite' ),
		'fields' => array(
			array(
				'id'           => 'opt-raw-documentation',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' =>$path, // FULL PATH, not relative, please.
			),
		),
	);

	Redux::set_section( $opt_name, $section );
 }
   