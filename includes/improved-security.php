<?php

// Blocks the use of long string in the URL for non-administrators
global $user_ID; if($user_ID) {
    if(!current_user_can('administrator')) {
        if (strlen($_SERVER['REQUEST_URI']) > 255 ||
            stripos($_SERVER['REQUEST_URI'], "eval(") ||
            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
            stripos($_SERVER['REQUEST_URI'], "base64")) {
                @header("HTTP/1.1 414 Request-URI Too Long");
                @header("Status: 414 Request-URI Too Long");
                @header("Connection: Close");
                @exit;
        }
    }
}

// Disable XML-RPC
function wpm_xmlrpc_security_init() {
    $current_url = rtrim($_SERVER['REQUEST_URI'], '/');
 
    add_filter('bloginfo_url', function($output, $property){
        return ($property == 'pingback_url') ? null : $output;
    }, 11, 2);
    add_filter( 'xmlrpc_enabled', '__return_false' );
    if ( strpos($current_url, '/xmlrpc.php') !== false ) {
        http_response_code(404);
        die();
    }
}
add_action('init', 'wpm_xmlrpc_security_init', 1);

// Remove File Version Parameters
add_filter( 'style_loader_src', 'wpm_version_css_js', 10, 2);
add_filter( 'script_loader_src', 'wpm_version_css_js', 10, 2);

function wpm_version_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// Error on Activation - Debug log
function wpm_activation_debug() {
    file_put_contents(dirname(__file__).'/error_activation.txt', ob_get_contents());
}
add_action('activated_plugin','wpm_activation_debug');
