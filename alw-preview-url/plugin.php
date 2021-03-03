<?php
/*
Plugin Name: Always Preview URL
Plugin URI: http://yourls.org/
Description: Preview URLs before you're redirected there
Version: 1.0
Author: GoldenGod
Author URI: 
*/

// EDIT THIS

// Hook our custom function into the 'pre_redirect' event
yourls_add_action( 'redirect_shorturl', 'goldengod_yourls_warning_redirection' );

// Our custom function that will be triggered when the event occurs
function goldengod_yourls_warning_redirection( $args ) {
        $url = $args[0];
        $code = $args[1];
        
        $keyword = yourls_get_request();
                
                require_once( YOURLS_INC.'/functions-html.php' );

        $title = yourls_get_keyword_title( $keyword );
        $url   = yourls_get_keyword_longurl( $keyword );
                $clicks = yourls_get_keyword_clicks( $keyword );
        $base  = YOURLS_SITE;
                
                yourls_html_head( 'preview', $title );
        yourls_html_logo();
        
        echo <<<HTML
        <h2>Link Preview</h2>
        <p>You requested the short URL <strong><a href="$base/$keyword">$base/$keyword</a></strong></p>
        <p>This short URL points to:</p>
        <ul>
        <li>Long URL: <strong>$url</strong></li>
        <li>Page title: <strong>$title</strong></li>
        </ul>
                <p><strong>Clicks :</strong> $clicks</p>
                <p><strong>Your link is ready, click it to proceed:</strong></p>
        <p><strong><a href="$url">$url</a></strong></p>
        
        <p>Thank you for using our shortening service.</p>
HTML;
        
        yourls_html_footer();
        
        // Now die so the normal flow of event is interrupted
        die();
} 
?>