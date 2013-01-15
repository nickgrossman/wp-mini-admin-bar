<?php
/*
Plugin Name: Mini Admin Bar
Description: Removes the big front-end admin bar. Replaces it with a tiny one.
Plugin URI: http://github.com/nickgrossman/wp-mini-admin-bar
Author: Nick Grossman
Version: 0.1
Author URI: http://nickgrossman.is
*/

function wp_mini_admin_bar() {
	
	if (current_user_can('level_10')):
	
	wp_enqueue_style( 'mini-admin-bar', plugins_url( 'mini-admin-bar.css' , __FILE__ ) );
	
	?>
		<div id="wp-mini-admin-bar">
				<ul>
					<li>
						<a href="<?php echo admin_url(); ?>">Admin</a>	
					</li>
					<?php if (is_single() || is_page() && !is_home() ) : ?>
					<li>
						<?php edit_post_link(); ?>	
					</li>
					<?php endif; ?>
				</ul>
		</div>
	<?php
	endif;
}


/* wp_mini_admin_bar_prefs - inspired by http://wordpress.org/extend/plugins/hide-admin-bar/ */
function wp_mini_admin_bar_prefs() { ?>
	<style type="text/css">
		.show-admin-bar {display: none;}
	</style>
	<?php
}

add_action( 'admin_print_scripts-profile.php', 'wp_mini_admin_bar_prefs' );
add_filter( 'show_admin_bar', '__return_false' );
add_action( 'wp_footer', 'wp_mini_admin_bar' );
?>
