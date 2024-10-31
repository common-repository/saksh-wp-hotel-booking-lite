<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

  
  function saksh_get_amenities($post_id)
  {
  
  

 $amenities_list = get_the_terms( $post_id, 'amenities');
 
 if($amenities_list )
 
 {
     
 
$types ='';
foreach($amenities_list as $term_single) {
    
    if(isset($term_single->slug) )
     $types .=tag_escape( ucfirst($term_single->slug)).', ';
     
     
}
$typesz = rtrim($types, ', ');

return $typesz;
 

}

return "";

}


function saksh_get_default_template($type)
{
    
    
    
    if($type=="saksh_room_info_theme")
    {
        
        $content ='
 

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

        
    }
    
    
    else if($type=="saksh_room_info_pricing"){
        
        
        

$content ='
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

    }
    
    
    return $content;
    
    
}

function saksh_get_template($saksh_wp_options,$type)
{
        
        
        
        $pageid=  $saksh_wp_options[$type] ; 
            
            
            
            
            $content_post = get_post($pageid);
       if($content_post)
       {
            
                $content = $content_post->post_content;
        
       }
       else
       
        $content = saksh_get_default_template($type);
        
        
        
                return $content;

}
                
                
                
function saksh_print_room_info_dynamic($post_id,$query_data=array())

 {
  
  
  

$saksh_wp_options=get_option("saksh_wp_options");
 


  $saksh_theme=array();
    
   
 
            
            
   
    $featured_img_url = get_the_post_thumbnail_url($post_id, 'thumbnail'); 
  
    if(!$featured_img_url)
    $featured_img_url="https://placehold.co/600x400";
    
    
    $saksh_theme["{thumbnail}"] ="<div class='saksh_room_thumbnail'> <img src='". $featured_img_url."' class='img-thumbnail'  /> </div>";
    
    
     $saksh_theme["{title}"]   ="  <div class='saksh_room_title_'>". get_the_title($post_id) ."</div>";
        
      
     
     $saksh_theme["{amenities}"]   = saksh_get_amenities($post_id); 
      
          
               
     
 
  
  
  ?>
  
  
  
  
  
        <div class=" saksh_block  ">
  
        <div class="row  mb-5  ">
            
            
        
        <div class="col-md-3  border">
            
        
              
        <?php
        
        
              //echo $content;
                
                $content=saksh_get_template($saksh_wp_options,"saksh_room_info_theme" );
                
                 echo strtr($content  , $saksh_theme);
                
                
                ?> 
 
            </div>
        <div class="col-md-9   border">
         
      <?php     
             for($id=1;$id <= 5; $id++)
          { 
 $purchase_plan_id=$id;
 
 
   saksh_print_room_purchase_info_dynamic($post_id,$purchase_plan_id,$saksh_wp_options,$query_data) ;
   
   
   
          }
    
    
    ?>
            </div>
            
            </div>
  
            </div>
  
  <?php
  
  
}


function saksh_print_room_purchase_info_dynamic($post_id,$purchase_plan_id,$saksh_wp_options,$query_data)

 {
  
  
  
 
        
        
  $saksh_theme=array();
 
      
          $id=$purchase_plan_id;
               
     
 
 
   $booking_data=$query_data;
   
    
      $saksh_payment_option=  get_post_meta( $post_id, 'saksh_payment_option' , true ) ;
      
       
       
  
  
        
 if(isset(   $saksh_payment_option[$purchase_plan_id]['rate_per_night']))
 
  $rate_per_night  =    $saksh_payment_option[$purchase_plan_id]['rate_per_night'];
    else
    $rate_per_night  = 100;
     
     
     
     
        
 
   $fields=array( );
    
    $fields = apply_filters( 'saksh_room_payment_options_metabox', $fields );
   
    foreach($fields as $f) 
    {
        
        $field_name = $f['name'] ; 
        
        $field_class= $f['name'];
        
        $query=$f['name_token'] ;
        
       
        
        
        
        $value=  get_saksh_payment_option_value($saksh_payment_option,$purchase_plan_id,$field_name);
        
        if(isset($f['func']))
        $value=$f['func']($value);
        
      $saksh_theme[$query]   =  "<div class='".$field_class."'>  " .$value."  </div>";
  
    
 }
 
 
   $saksh_theme["{saksh_booking_button}"]  =  saksh_booking_form($post_id,$booking_data,$purchase_plan_id);
 
 
  
  ?>
  
  
  
  
  
  
        <div class="sakhs_row   ">
            
             
            
            <?php
            
            
            
                $content=saksh_get_template($saksh_wp_options,"saksh_room_info_pricing" );
                
                /*
                
                $pageid=  $saksh_wp_options['saksh_room_info_pricing'] ; 
            
            
            
            
            $content_post = get_post($pageid);
            
            
                $content = $content_post->post_content;
            */
                
                echo strtr($content  , $saksh_theme);
                
                
                ?>
                
                
                
       
       
            
         
            
            
            
            
            </div>
  
  <?php
  
  
}

 

 

function saksh_booking_form($post_id,$booking_data,$purchase_plan_id)
{
    
  
 ob_start();
 
 
    ?>
    <div class="booking_button" >
                            
     <form action="" method="post">
          
  
   
  <input type="hidden"   value="book_now" name="saksh_case" /> 
  
    
  
   
  <input type="hidden"  value="<?php echo  esc_attr($post_id);?>" name="room_id" /> 
     
   
  <input type="hidden"  value="<?php echo  esc_attr($purchase_plan_id);?>" name="purchase_plan_id" /> 
  
  
  
  <input type="hidden"  value="<?php echo  esc_attr($purchase_plan_id);?>" name="purchase_plan_id" /> 
     
 <?php
  
 
 if(is_array($booking_data))
 {
 foreach ($booking_data as $key => $value) {
 
    echo '<input type="hidden"   value="'.esc_attr($value).'" name="'.esc_attr($key).'" />';
}

}
 
 

?> 
          
    <?php wp_nonce_field( 'saksh_nonce_action', 'saksh_nonce' ); ?>
 
 
   
 <input type="submit" value="Book now"  class="saksh_booking_button" />
     </form>
    </div>
    <?php
  
    
   $content = ob_get_clean();
   // 
    return  $content;
 
     
}


 
 