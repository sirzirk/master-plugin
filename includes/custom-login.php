<?php

// Add styling to /wp-login page
function wpm_login_logo() { ?>
    <style type="text/css">
        body.login { background-color: #c4f7f6; background-image: url(<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/navy-wave.svg'; ?>); background-repeat: no-repeat; background-position: center center; background-size: cover; } body.login div#login { position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); padding: 40px; background: #fff; box-shadow: 0 0 16px rgb(0 0 0 / 80%); width: 400px; max-width: 90%; color: #000; box-sizing: border-box; }	body.login div#login form#loginform, body.login div#login form#lostpasswordform { border: none; box-shadow: none; margin-top: 0; padding: 0; } .login h1 { display: none; } .login .button-primary { float: unset; width: 100%; margin-top: 16px !important; height: 40px; background-color: #154a69 !important; border-color: #154a69 !important; } body::after { content: ""; width: 100px; height: 79px; position: absolute; bottom: 50px; right: 50px; display: block; background: url(<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/wp-logo.svg'; ?>) no-repeat center / cover;}
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'wpm_login_logo' );