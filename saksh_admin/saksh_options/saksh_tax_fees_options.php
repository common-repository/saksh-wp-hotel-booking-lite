<?php





$saksh_tax_fields=   array(
					array(
						'id'          => 'title_field',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Label', 'your-textdomain-here' ),
					),
					
					
					
		 
					
					
					
					array(
						'id'          => 'tax_type',
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
						'id'          => 'per_adult',
						'title'       => esc_html__( 'Per adult:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type', '=', '3' ),
						'default'     => '',
					),
					
					
					
					array(
						'id'          => 'tax_per_child',
						'title'       => esc_html__( 'Per child:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type', '=', '1' ),
						'default'     => '',
					),
					
					
					
					array(
						'id'          => 'tax_per_child',
						'title'       => esc_html__( 'Per child:2', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type', '=', '2' ),
						'default'     => '',
					),
					
					
					
					
					
					array(
						'id'          => 'amount_2',
						'title'       => esc_html__( 'Amount 2:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type', '=', '2' ),
						'default'     => '',
					),
					
					
					array(
						'id'          => 'amount_3',
						'title'       => esc_html__( 'Amount 3:', 'your-textdomain-here' ),
						'type'        => 'text',
					 
						'required'    => array( 'tax_type', '=', '3' ),
						'default'     => '',
					),
					
					
					
					
					array(
						'id'          => 'limit',
						'title'       => esc_html__( 'limit :', 'your-textdomain-here' ),
						'type'        => 'text',
					 'desc'       =>  'days',
				 
						'default'     => '',
					),
					
					array(
						'id'          => 'include',
						'title'       => esc_html__( 'include :', 'your-textdomain-here' ),
						'type'        => 'text',
					 'desc'       =>  'include',
					 
						'default'     => '',
					),
					
						array(
						'id'          => 'Accommodations',
						'title'       => esc_html__( 'Accommodations :', 'your-textdomain-here' ),
						'type'        => 'text',
					 'desc'       =>  'Accommodations',
					 
						'default'     => '',
					),
					
					
					
					
					
				);
		
		
		
		
Redux::set_section(
	$opt_name,
	array(
		'title'      => __( 'Fees', 'your-textdomain-here' ),
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'your-textdomain-here' ) . '<a href="https://devs.redux.io/core-extensions/repeater.html" target="_blank">https://devs.redux.io/core-extensions/repeater.html</a>',
		'subsection' => true,
	
	
	
		'fields'     => array(
			array(
				'id'          => 'repeater-field-id',
				'type'        => 'repeater',
				'title'       => esc_html__( 'Repeater Demo', 'your-textdomain-here' ),
				'full_width'  => true,
				'subtitle'    => esc_html__( 'Repeater', 'your-textdomain-here' ),
				'item_name'   => '',
				'sortable'    => true,
				'active'      => false,
				'collapsible' => false,
			 
		'fields'     => $saksh_tax_fields,
					
					
				   
			),
		),
	)
);

