<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

function recursiveSearch($array, $type){
    $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($array),RecursiveIteratorIterator::SELF_FIRST);
    foreach ($jsonIterator as $key => $val){
        if($key == $type && !is_array($val))
            return $val;
    }
    return false;
}

add_shortcode( 'twp-call-persons', 'twp_call_persons_shortcode' );
function twp_call_persons_shortcode ($args) {
	$query_args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'orderby' => array(
			'date' => 'DESC'
		),
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => 'command'
			)
		)
	);
	
	$twp_posts = new WP_Query;
	
	$twpPosts = $twp_posts->query($query_args);
	
	$html = '<div class="twp-persons" style="column-gap: 81px; row-gap: 86px;">';
		foreach( $twpPosts as $twpPost ) {
			$postID = $twpPost->ID;
			$parsed_blocks = parse_blocks($twpPost->post_content);
			$position = recursiveSearch($parsed_blocks, 'twp-position');

			$html .= '<div class="twp-person__item">';	
				$html .= '<img class="twp-person-thumbnail" src="' . get_the_post_thumbnail_url($postID, 'full') . '" style="width: 239px; min-width: 239px; height: 239px; border-radius: 50%;">';
				$html .= '<h3 class="twp-person-title">' . $twpPost->post_title . '</h3>';
				$html .= '<span class="twp-person-position">' . $position . '</span>';
				$html .= '<a class="twp-person-link" href="' . get_permalink($postID) . '">на страницу</a>';
			$html .= '</div>';
		}
	$html .= '</div>';
	
	return $html;
	
	wp_reset_postdata();
}

add_shortcode( 'call_title', function($atts) {
	return '<h1 class="twp-main-title">' . get_the_title($post->ID) . '</h1>';
});

add_action( 'init', 'person_acf_init', 10 );
function person_acf_init() {
    $status = register_block_type( __DIR__ . '/template-parts/blocks/person/' );
	
	if (!$status){
        var_dump('block.json not found');
    }  
}

add_action( 'init', 'accord_acf_init', 10 );
function accord_acf_init() {
    $status = register_block_type( __DIR__ . '/template-parts/blocks/accord/' );
	
	if (!$status){
        var_dump('block.json not found');
    }  
}