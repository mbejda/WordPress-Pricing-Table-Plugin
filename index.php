<?php
class plugin {
	function __construct()
	{
    add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts' );
    add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );

	}
	private function wp_enqueue_scripts()
	{
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'main', plugins_url( 'js/script.js', __FILE__), array('jquery'), $ver = time(), $in_footer = true )
	}
	private function admin_enqueue_scripts()
	{
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'admin', plugins_url( 'js/admin.js', __FILE__), array('jquery'), $ver = time(), $in_footer = true )

	}

}
?>