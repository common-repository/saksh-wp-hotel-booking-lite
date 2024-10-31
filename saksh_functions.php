<?php

function saksh_print_search_results($query_data)

{
  
     


	//   var_dump($query_data);
	  
	  $room_data=saksh_get_rooms_which_r_available( $query_data);
	  
	   
	 //  var_dump($room_data);
	    
 
    $args = array( 'post_type' => 'rooms' );


 
 
$the_query = new WP_Query( $args ); 

	 //  var_dump($the_query);
	    
if ( $the_query->have_posts() )

{
   
    while ( $the_query->have_posts() )
    
    {
         
 $the_query->the_post();
        
      $post_id=get_the_ID();
           
  
     saksh_print_room_info_dynamic($post_id,$query_data);
    }
    
    
}

}
 
    
     
       
        