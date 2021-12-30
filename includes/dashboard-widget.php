<?php

function wpm_dashboard_custom_widget() {
	wp_add_dashboard_widget( 'wpm_dashboard_widget_content', __( 'WP Options', 'wpmasters' ), 'wpm_dashboard_widget_content_handler' );
}

add_action( 'wp_dashboard_setup', 'wpm_dashboard_custom_widget' );

function wpm_dashboard_widget_content_handler() { ?>
	<table>
		<thead>
			<tr>
				<td><strong>Tracking Script</strong></td>
				<td><strong>Status</strong></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Google Analytics</td>
				<td>
					<div>
						<?php if (!empty( get_option( 'wpm_ga' ) )) : ?>
						<img class="checked" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-checked.svg'; ?>">
						<span>Added</span>
					<?php else : ?>
						<img class="crossed" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-crossed.svg'; ?>">
						<span>Missing</span>
					<?php endif;  ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>Google Tag Manager</td>
				<td>
					<div>
						<?php if (!empty( get_option( 'wpm_gtm' ) )) : ?>
						<img class="checked" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-checked.svg'; ?>">
						<span>Added</span>
					<?php else : ?>
						<img class="crossed" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-crossed.svg'; ?>">
						<span>Missing</span>
					<?php endif;  ?>
					</div>
					
				</td>
			</tr>
			<tr>
				<td>Google Ads</td>
				<td>
					<div>
						<?php if (!empty( get_option( 'wpm_gad' ) )) : ?>
						<img class="checked" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-checked.svg'; ?>">
						<span>Added</span>
					<?php else : ?>
						<img class="crossed" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-crossed.svg'; ?>">
						<span>Missing</span>
					<?php endif;  ?>
					</div>
					
				</td>
			</tr>
			<tr>
				<td>Facebook Verification</td>
				<td>
					<div>
						<?php if (!empty( get_option( 'wpm_fb' ) )) : ?>
						<img class="checked" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-checked.svg'; ?>">
						<span>Added</span>
					<?php else : ?>
						<img class="crossed" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-crossed.svg'; ?>">
						<span>Missing</span>
					<?php endif;  ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>Facebook Pixel</td>
				<td>
					<div>
						<?php if (!empty( get_option( 'wpm_fbp' ) )) : ?>
						<img class="checked" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-checked.svg'; ?>">
						<span>Added</span>
					<?php else : ?>
						<img class="crossed" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-crossed.svg'; ?>">
						<span>Missing</span>
					<?php endif;  ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>Cookiebot</td>
				<td>
					<div>
						<?php if (!empty( get_option( 'wpm_cb' ) )) : ?>
						<img class="checked" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-checked.svg'; ?>">
						<span>Added</span>
					<?php else : ?>
						<img class="crossed" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-crossed.svg'; ?>">
						<span>Missing</span>
					<?php endif;  ?>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="widget-content">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
<?php }