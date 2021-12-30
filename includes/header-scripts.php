<?php

// Facebook Domain Verification
if ( !empty( get_option( 'wpm_fb' ) ) ) {
	
	add_action('wp_head', 'header_fb', -1);
	function header_fb() { ?>
		<meta name="facebook-domain-verification" content="<?php echo get_option( 'wpm_fb' ); ?>" />
	<?php };
};

// Facebook Pixel
if ( !empty( get_option( 'wpm_fbp' ) ) ) {
	
	add_action('wp_head', 'header_fbp', -1);
	function header_fbp() { ?>
		<!-- Facebook Pixel Code -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '<?php echo get_option( 'wpm_fbp' ); ?>');
			fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=<?php echo get_option( 'wpm_fbp' ); ?>&ev=PageView&noscript=1"/>
		</noscript>
		<!-- End Facebook Pixel Code -->
	<?php };
};

// Google Analytics
if ( !empty( get_option( 'wpm_ga' ) ) ) {
	
	add_action('wp_head', 'header_ga', -1);
	function header_ga() { ?>

		<!-- Google Analytics -->
		<script>
		window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
		ga('create', '<?php echo get_option( 'wpm_ga' ); ?>', 'auto');
		ga('send', 'pageview');
		</script>
		<script async src='https://www.google-analytics.com/analytics.js'></script>
		<!-- End Google Analytics -->

	<?php };
}; 

// Google Tag Manager
if ( !empty( get_option( 'wpm_gtm' ) ) ) {
	
	add_action('wp_head', 'header_gtm', -1);
	function header_gtm() { ?>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo get_option( 'wpm_gtm' ); ?>');</script>
		<!-- End Google Tag Manager -->

	<?php };
	
	add_action( 'wp_body_open', 'body_gtm', -1);
	function body_gtm() { ?>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_option( 'wpm_gtm' ); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->		

	<?php };
};

// Google Ads
if ( !empty( get_option( 'wpm_gad' ) ) ) {
	
	add_action('wp_head', 'header_gad', -1);
	function header_gad() { ?>

		<!-- Global site tag (gtag.js) - Google Ads -->
	  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_option( 'wpm_gad' ); ?>"></script>
	  <script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', '<?php echo get_option( 'wpm_gad' ); ?>');
	  </script>

	<?php };
}; 

// Cookie Bot
if ( !empty( get_option( 'wpm_cb' ) ) ) {
	
	add_action('wp_head', 'header_cb', -10);
	function header_cb() { ?>

		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="<?php echo get_option ( 'wpm_cb' ); ?>" data-blockingmode="auto" type="text/javascript"></script>

	<?php };
}; 
