<?php
/**
 * Template Name: Custom Login
 * Template Post Type: page
 * @package Punte
 */
global $punte_options, $post;
$page_layout = punte_get_redux_post_meta( 'mb-page-layout', 'default' );

if ( $page_layout == 'default' ) {
    $page_layout = isset( $punte_options[ 'page-layout' ] ) ? $punte_options[ 'page-layout' ] : 'right-sidebar';
}

get_header();

/** @hook punte_page_header
 *
 *
 */
//do_action( 'punte_page_header' );
global $punte_options;
$header_logo = $punte_options[ 'upload-logo' ][ 'url' ];
?>
<?php 
if(isset($_SESSION['user_login_error']) && !empty($_SESSION['user_login_error']) ){ ?>
<script>
    setTimeout(function(){ jQuery(".user-login-error").hide(); }, 7000);
</script>
<?php } ?>
<div class="login-page">
<div class="row no-gutters h-100">
    <div class="col-lg-6">
        <div class="bg-login d-flex align-items-center justify-content-center" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/login-bg.webp')">
            <div class="content-wrap">
                <div class="round-bg d-flex align-items-center justify-content-center">
                    <a href="<?php echo site_url(); ?>" title="ShopRight - Help Desk"><img src="<?php if(isset($header_logo) && !empty($header_logo) ){
                        echo $header_logo;
                    }else{ echo get_template_directory_uri()."/assets/images/logo.png"; }?>" alt="ShopRight - Help Desk" /></a>
                </div>
                <!-- <div class="help-time">Need Quick Help?</div>
                <ul class="list-unstyled m-0">
                    <li><b>Call Us on:</b> 123-456-7890</li>
                    <li><b>Email Us on:</b> care@shopright.ky</li>
                    <li><b>Time:</b><br/> MON - FRI<br/>10:30 PM - 6.00 PM</li>
                </ul>                 -->
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-flex align-items-center">
        <div class="right-part">
            <h2>Sign In</h2>
          
            <?php if(isset($_SESSION['user_login_error']) && !empty($_SESSION['user_login_error']) ){ echo '<div class="alert alert-danger user-login-error">'.$_SESSION['user_login_error'].'</div>'; }; ?>
                <form action="" method="post" name="user_loginfrm" id="user_loginfrm">  
                    <div class="form-group">
                        <label for="user_email"><b>User Name <span>*</span> </b></label>
                        <input class="form-control" type="text" placeholder="Enter User Name" name="user_name" required>
                    </div>                
                    <div class="form-group">    
                        <label for="user_password"><b>Password <span>*</span> </b></label>
                        <input class="form-control" type="password" placeholder="Enter Password" name="user_password" required>
                    </div>
                    <button type="submit" name="loginfrm_submit" id="loginfrm_submit">Login</button>                    
                </form>
        </div>
    </div>
</div>
<div class="punte-container clearfix <?php echo esc_attr($page_layout)?>">
    <div id="primary" class="content-area">
        <div class="user-login-form">
           
        </div>
        <?php
        $_SESSION['user_login_error'] = "";
      /*   while ( have_posts() ) : the_post();

            the_content();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; */ // End of the loop.
        ?>
    </div>

    <?php
    if ( $page_layout == 'left-sidebar' || $page_layout == 'both-sidebar' || $page_layout == 'both-left-sidebar' || $page_layout == 'both-right-sidebar' ) {
        get_sidebar( 'left' );
    }

    if ( $page_layout == 'right-sidebar' || $page_layout == 'both-sidebar' || $page_layout == 'both-left-sidebar' || $page_layout == 'both-right-sidebar' ) {
        get_sidebar( 'right' );
    }
    ?>
</div>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery('#user_loginfrm').validate({ // initialize the plugin
            rules: {
                user_name: {
                    required: true,
                    // email: true
                },
                user_password: {
                    required: true,
                    minlength: 4
                }
            },
            messages: {
                user_name: {
                    required: "Please enter your user name.",
                },
                user_password: {
                    required: "Please enter your password.",
                    minlength: "Please enter minimum 4 length of password."
                }
            }
        });
    });
</script>

<?php
get_footer();
