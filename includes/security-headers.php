<?php

// Adds basic security headers to the webiste
if ( !empty( get_option( 'wpm_security_headers' ) ) ) {
	function wpm_security_headers() {

		// Enforce the use of HTTPS
		header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
		// Prevent Clickjacking
		header("X-Frame-Options: SAMEORIGIN");
		// Block Access If XSS Attack Is Suspected
		header("X-XSS-Protection: 1; mode=block");
		// Prevent MIME-Type Sniffing
		header("X-Content-Type-Options: nosniff");
		// Referrer Policy
		header("Referrer-Policy: no-referrer-when-downgrade");
		// Permissions Policy
		header("Permissions-Policy: fullscreen=(self), geolocation=*, camera=()");

	}
	add_action( 'send_headers', 'wpm_security_headers' );

	// Add SSL session cookie settings
	@ini_set('session.cookie_httponly', true);
	@ini_set('session.cookie_secure', true);
	@ini_set('session.use_only_cookies', true);
};


