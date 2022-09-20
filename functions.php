<?php 
add_filter('show_admin_bar', '__return_false');
function load_css(){

  // normalize css
	wp_register_style(
		'normalize',
		get_template_directory_uri() . '/dist/css/normalize.css',
		array(),
		false,
		'all'
	);
	wp_enqueue_style('normalize');

	// główny plik css
	wp_register_style(
		'main',
		get_template_directory_uri() . '/dist/css/index.css',
		array(),
		false,
		'all'
	);
	wp_enqueue_style('main');

  // tiny-slider css
	wp_register_style(
		'tiny-slider',
		'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css',
		array(),
		false,
		'all'
	);
	wp_enqueue_style('tiny-slider');

  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap',
    array(),
    false,
    'all'
  );
  wp_enqueue_style('google-fonts');

}
add_action('wp_enqueue_scripts', 'load_css');

function greg_load_scripts(){

	// wp_register_script(
	// 	'main',
	// 	get_template_directory_uri() . '/dist/js/index.js',
	// 	array('tiny-slider'),
	// 	false,
	// 	true
	// );
	// wp_enqueue_script('main');

  // wp_register_script(
  //   'tiny-slider',
  //   'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js',
  //   array(),
  //   false,
  //   true
  // );
  // wp_enqueue_script('tiny-slider');

}
add_action('wp_enqueue_scripts', 'greg_load_scripts');

// acf blocks registration
function greg_acf_blocks_registration(){
	if(function_exists('acf_register_block_type')){

		// section-with-slider
		acf_register_block_type(array(
			'name'              => 'section-with-slider',
			'title'             => __('sekcja tytułowa dla stron'),
			'description'       => __('section-with-slider'),
			'render_callback'   => 'acf_block_render_callback',
			'category'          => 'Sections',
			'icon'              => 'block-default',
			'align_content'     => false,
			'keywords'          => array( 'sekcja z sliderem' ),
			'enqueue_assets'    => 'block_assets',
			'mode'              => 'edit',
			'supports'          => array(
				'align'     => false,
				'anchor' => true
			),
			'enqueue_assets' => function(){
   			wp_enqueue_script(
   				'main',
					get_template_directory_uri() . '/dist/js/index.js',
					array('tiny-slider'),
					false,
					true
				);
    		wp_enqueue_script(
    			'tiny-slider',
    			'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js',
    			array(),
    			false,
    			true 
    		);
    	},
		));
    
	}
}
add_action('acf/init', 'greg_acf_blocks_registration');

// load render file for block
function acf_block_render_callback($block){
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/blocks" folder
	if( file_exists( get_theme_file_path("template-parts/blocks/block-{$slug}.php") ) ) {
		include( get_theme_file_path("template-parts/blocks/block-{$slug}.php") );
	}
}

function greg_add_block_editor_assets(){
	wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/dist/css/index.css');
}
add_action('enqueue_block_editor_assets','greg_add_block_editor_assets');


?>