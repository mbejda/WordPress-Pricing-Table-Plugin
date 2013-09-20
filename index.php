<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Plugin FrameWork
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/
Define('ROOT',plugin_dir_path(__FILE__));
class plugin {
	function __construct()
	{
  add_action('init',array(&$this,'init'));
  if ( is_admin() ){ // admin actions
   add_action( 'admin_menu', array(&$this,'admin_menu' ));
   add_action( 'admin_init', array(&$this,'admin_init' ));
   add_action( 'admin_enqueue_scripts', array(&$this,'admin_enqueue_scripts' ));
   add_action('save_post', array(&$this,'save_post'), 1, 2); // save the custom fields

} else{
    add_action( 'wp_enqueue_scripts', array(&$this,'wp_enqueue_scripts' ));


}

	}
	public function init()
	{

$this->custom_post_type();

	}
	public function admin_init()
	{
		add_meta_box(
		'smashing-post-class',			// Unique ID
		esc_html__( 'Post Class', 'example' ),		// Title
		array(&$this,'box_1'),		// Callback function
		'package',					// Admin page (or post type)
		'normal',					// Context
		'default'					// Priority
	);

	}
	public function admin_menu()
	{
			add_menu_page('BAW Plugin Settings', 'BAW Settings', 'administrator', __FILE__, array(&$this,'settings_page'));
	}
	public function settings_page()
	{
include(ROOT.'page.php');
	}
	public function wp_enqueue_scripts()
	{
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'main', plugins_url( 'js/script.js', __FILE__), array('jquery'), $ver = time(), $in_footer = true );
	}
	public function admin_enqueue_scripts()
	{
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'admin', plugins_url( 'js/admin.js', __FILE__), array('jquery'), $ver = time(), $in_footer = true );

	}
function box_1()
{
	global $post;

  $pricing_table = get_post_meta($post->ID, 'pricing_table', true);


	?>


	<p>
		<br />
<select name="color" id="">
	<option value="orange">orange</option>
	<option value="green">green</option>
	<option value="red">red</option>
	<option value="blue">blue</option>
</select>

		<label for=""><?php _e( "Header", 'example' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[header]" value="<?=@esc_attr( $pricing_table['header']); ?>" size="30" />
		<label for=""><?php _e( "Sub Header", 'example' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[subheader]" value="<?=@esc_attr( $pricing_table['subheader']); ?>" size="30" />
		<label for=""><?php _e( "Feature 1", 'pricing_table' ); ?></label>
		<input class="widefat" $type="text" $name="pricing_table[f1]" $value="<?=@esc_attr( $pricing_table['f1']); ?>" size="30" />
	    <label for=""><?php _e( "Feature 2", 'pricing_table' ); ?></label>
		<input class="widefat" $type="text" $name="pricing_table[f2]" $value="<?=@esc_attr( $pricing_table['f2']); ?>" size="30" />
			<label for=""><?php _e( "Feature 3", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f3]" value="<?=@esc_attr( $pricing_table['f3']); ?>" size="30" />
			<label for=""><?php _e( "Feature 4", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f4]" value="<?=@esc_attr( $pricing_table['f4']); ?>" size="30" />
			<label for=""><?php _e( "Feature 5", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f5]" value="<?=@esc_attr( $pricing_table['f5']); ?>" size="30" />
			<label for=""><?php _e( "Feature 6", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f6]" value="<?=@esc_attr( $pricing_table['f6']); ?>" size="30" />
			<label for=""><?php _e( "Feature 7", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f7]" value="<?=@esc_attr( $pricing_table['f7']); ?>" size="30" />
	<label $for=""><?php _e( "Feature 8", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f8]" value="<?=@esc_attr( $pricing_table['f8']); ?>" size="30" />
	<label $for=""><?php _e( "Feature 9", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f9]" value="<?=@esc_attr( $pricing_table['f9']); ?>" size="30" />
	<label $for=""><?php _e( "Feature 10", 'pricing_table' ); ?></label>
		<input class="widefat" type="text" name="pricing_table[f10]" value="<?=@esc_attr( $pricing_table['f10']); ?>" size="30" />


	</p>

	<?php

}

function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Packages', 'Post Type General Name', 'pricing_table' ),
		'singular_name'       => _x( 'Package', 'Post Type Singular Name', 'pricing_table' ),
		'menu_name'           => __( 'Pricing Table', 'pricing_table' ),
		'parent_item_colon'   => __( 'Parent Package:', 'pricing_table' ),
		'all_items'           => __( 'All Packages', 'pricing_table' ),
		'view_item'           => __( 'View Package', 'pricing_table' ),
		'add_new_item'        => __( 'Add New Package', 'pricing_table' ),
		'add_new'             => __( 'New Package', 'pricing_table' ),
		'edit_item'           => __( 'Edit Package', 'pricing_table' ),
		'update_item'         => __( 'Update Package', 'pricing_table' ),
		'search_items'        => __( 'Search packages', 'pricing_table' ),
		'not_found'           => __( 'No packages found', 'pricing_table' ),
		'not_found_in_trash'  => __( 'No packages found in Trash', 'pricing_table' ),
	);
	$args = array(
		'label'               => __( 'package', 'pricing_table' ),
		'description'         => __( 'Package information page', 'pricing_table' ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => false,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'package', $args );
}

 function save_post($post_id, $post)
{


$key = 'pricing_table';
 $value = $_POST['pricing_table'];


   if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
           update_post_meta($post->ID, $key, $value);


        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
            echo "add";
            die();
        }
        if(!$value) delete_post_meta($post->ID, $key); // 


}


}




// Hook into the 'init' action
$m = new plugin();
?>