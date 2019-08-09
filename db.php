<?php
/*
Plugin Name: Display Data 
Plugin URI: 
Description: Display Data From Dayabase 
Version: 1.0
Author: Md.Mohosin Miah
Author URI: http://webdeveloperguru.com
License: GPLv2 or later
Text Domain: display-data
Domain Path: /languages/
*/
define( "DBDEMO_DB_VERSION", "1.3" );
function dbdemodisplay_init(){

}
register_activation_hook( __FILE__, "dbdemodisplay_init" );


add_action( 'admin_enqueue_scripts', function ( $hook ) {
	if ( "toplevel_page_dbdemo" == $hook ) {
        wp_enqueue_style( 'dbdemofrom-style', plugin_dir_url( __FILE__ ) . 'assets/css/form.css' );
        wp_enqueue_style( 'dbdemofrom-boot', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css' );

	}
} );


add_action( 'admin_menu', function () {
	add_menu_page( 'All Student', 'All Student', 'manage_options', 'dbdemo', 'dbdemo_admin_page' );
} );
function dbdemo_admin_page() {
	global $wpdb;
    echo '<h2>Registered Student List</h2>';
    ?>
   
<?php
        $results = $wpdb->get_results( "select * from {$wpdb->prefix}users");
        
            
    
            ?>

<div class="form_box" style="margin-top: 30px;">
        <div class="form_box_header">
			<?php _e( 'Student Lists', 'display-data' ) ?>
        </div>
        <div class="form_box_content" >
			
        <table class="table">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Account Created</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($results as $result) {
        
       ?>
      <tr>
         <th><?php echo $result->display_name; ?></th>
        <th><?php echo  $result->user_email; ?></th>
        <th><?php echo $result->user_registered; ?></th>
      </tr>
    <?php } ?>
    </tbody>
  </table>
        </div>
    </div>


            <?php
      

          

        }
            
            register_activation_hook( __FILE__, "dbdemodisplay_flush_data" );

function dbdemodisplay_flush_data(){

}

   