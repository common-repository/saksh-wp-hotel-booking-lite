<?php
 

$saksh_tax_fields_service=   array(
					array(
						'id'          => 'title_field_service',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Label', 'your-textdomain-here' ),
					),
					
					
					
		 
					
					
					
					array(
						'id'          => 'tax_type_service',
						'type'        => 'select',
						 	'default'     => '3',
						'title'       => esc_html__( 'Type', 'your-textdomain-here' ),
						'options'     => array(
						1 => esc_html__( 'Per guest / per day', 'your-textdomain-here' ),
							2 => esc_html__( 'Per accommodation / per day', 'your-textdomain-here' ),
							3 => esc_html__( 'Per accommodation (%)', 'your-textdomain-here' ),
						) 
					),
					
					
					
					
					
				 
					
					
					
					
					array(
						'id'          => 'per_adult_service',
						'title'       => esc_html__( 'Per adult:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type_accommodation', '=', '3' ),
						'default'     => '',
					),
					
					
					
					array(
						'id'          => 'tax_per_child_service',
						'title'       => esc_html__( 'Per child:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type_accommodation', '=', '1' ),
						'default'     => '',
					),
					
					
					
					array(
						'id'          => 'tax_per_child_service',
						'title'       => esc_html__( 'Per child:2 _service', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type_accommodation', '=', '2' ),
						'default'     => '',
					),
					
					
					
					
					
					array(
						'id'          => 'amount_2_service',
						'title'       => esc_html__( 'Amount _service 2:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type_accommodation', '=', '2' ),
						'default'     => '',
					),
					
					
					array(
						'id'          => 'amount_3_service',
						'title'       => esc_html__( 'Amount 3_service:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type_accommodation', '=', '3' ),
						'default'     => '',
					),
					
					
					
					
					array(
						'id'          => 'limit_service',
						'title'       => esc_html__( 'limit_service :', 'your-textdomain-here' ),
						'type'        => 'text',
					 'desc'       =>  'days',
				 
						'default'     => '',
					),
					
					array(
						'id'          => 'include_service',
						'title'       => esc_html__( 'include _service n:', 'your-textdomain-here' ),
						'type'        => 'text',
					 'desc'       =>  'include',
					 
						'default'     => '',
					),
					
						array(
						'id'          => 'accommodations_service',
						'title'       => esc_html__( 'service _accommodation:', 'your-textdomain-here' ),
						'type'        => 'text',
					 'desc'       =>  'Accommodations',
					 
						'default'     => '',
					),
					
					
					
					
					
				);
				
				
Redux::set_section(
	$opt_name,
	array(
		'title'      => __( 'Service', 'your-textdomain-here' ),
		'desc'       => esc_html__( 'Service'),
		'subsection' => true,
	
	
	
		'fields'     => array(
			array(
				'id'          => 'repeater-Service',
				'type'        => 'repeater',
				'title'       => esc_html__( 'Service Demo', 'your-textdomain-here' ),
				'full_width'  => true,
				'subtitle'    => esc_html__( 'Service', 'your-textdomain-here' ),
				'item_name'   => '',
				'sortable'    => true,
				'active'      => false,
				'collapsible' => false,
			 
		'fields'     => $saksh_tax_fields_service,
					
					
				   
			),
		),
	)
);



 

