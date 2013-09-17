<?php
class plugin {
	function __construct()
	{
  add_action('init',array(&$this,'init'));
  if ( is_admin() ){ // admin actions
   add_action( 'admin_menu', array('admin_menu' ));
   add_action( 'admin_init', array(&$this,'admin_init' ));
   add_action( 'admin_enqueue_scripts', array(&$this,'admin_enqueue_scripts' ));

} else{
    add_action( 'wp_enqueue_scripts', array(&$this,'wp_enqueue_scripts' ));


}

	}
	private function init()
	{

	}
	private function admin_init()
	{

	}
	private function admin_menu()
	{

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