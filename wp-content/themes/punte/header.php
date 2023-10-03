<?php
if(!is_page('login') && !is_user_logged_in()){ 
    wp_redirect( site_url()."/login" , 301 ); exit;
}
/**
 * @package Punte
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link href="<?php echo PUNTE_THEME_URI ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
        <?php wp_head(); ?>        
        <script>
            jQuery( document ).ready(function() { 
                jQuery('.menu-item-search').insertAfter(jQuery('.login-but'));            
                jQuery('li.menu-item-search').not(':last').remove();
            });
        </script>
    </head>

    <body <?php body_class(); ?>>

        <?php if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open(); 
        } ?>
        
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to the content', 'punte' ); ?></a>

        <?php 
        /**
         * punte_below_body hook
         *
         *
         * @hooked punte_responsive_navigation
         */
        do_action( 'punte_below_body' );
        ?>
        <div id="page" class="site">

            <?php
            /**
             * punte_header hook.
             *
             * @hooked punte_header_layouts - 10 
             */
            // if (!is_user_logged_in() && !is_page('login')) {
            //     wp_redirect( site_url()."/login" , 301 ); exit;
            // }
            
            if (!is_page('login')) {
                do_action('punte_header');
            }
            ?>

            <div id="content" class="site-content">

