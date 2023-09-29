<?php 
/**
 * Punte functions and definitions.
 *
 * @package Punte
 */
define( 'PUNTE_THEME_DIR', get_template_directory() );
define( 'PUNTE_THEME_URI', get_template_directory_uri() );

define( 'PUNTE_THEME_NAME', 'punte' );
define( 'PUNTE_THEME_VERSION', '1.0' );

if ( !function_exists( 'punte_setup' ) ) :

    function punte_setup() {

        load_theme_textdomain( 'punte', PUNTE_THEME_DIR . '/languages' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );
        /** Custom Image Sizes **/
        add_image_size( 'punte-1920x1080', 1920, 1080, true );
        add_image_size( 'punte-1200x500', 1200, 500, true );
        add_image_size( 'punte-740x400', 740, 400, true );
        add_image_size( 'punte-840x400', 840, 400, true );
        add_image_size( 'punte-550x550', 550, 550, true );
        add_image_size( 'punte-598x460', 598, 460, true );
        add_image_size( 'punte-589x228', 589, 228, true );
        add_image_size( 'punte-375x250', 375, 250, true );
        add_image_size( 'punte-279x228', 297, 228, true );
        add_image_size( 'punte-297x400', 297, 400, true );
        add_image_size( 'punte-100x70', 120, 100, true );
        add_image_size( 'punte-900x600', 900, 600, true );


        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'punte' ),
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ) );

        /**
        * Add support for core custom logo.
        *
        * @link https://codex.wordpress.org/Theme_Logo
        */
        add_theme_support(
            'custom-logo', array(
                'height'      => 1280,
                'width'       => 1920,
                'flex-width'  => false,
                'flex-height' => false,
            )
        );

        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

endif;
add_action( 'after_setup_theme', 'punte_setup' );

function punte_content_width() {
    $GLOBALS[ 'content_width' ] = apply_filters( 'punte_content_width', 740 );
}

add_action( 'after_setup_theme', 'punte_content_width', 0 );


function punte_register_html5_support() {
    add_theme_support( 'html5', array( 'script', 'style' ) );
}
add_action( 'after_setup_theme', 'punte_register_html5_support' );


// Setup $content_width
if ( !isset( $content_width ) ) {
    $content_width = 800;
}

//Register widget area.
function punte_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Right', 'punte' ),
        'id'            => 'punte-sidebar-right',
        'description'   => esc_html__( 'Add Widget to show in Right Sidebar', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title"><span>',
        'after_title'   => '</span></h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Left', 'punte' ),
        'id'            => 'punte-sidebar-left',
        'description'   => esc_html__( 'Add Widget to show in Left Sidebar', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title"><span>',
        'after_title'   => '</span></h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Header Widget', 'punte' ),
        'id'            => 'punte-header-widget',
        'description'   => esc_html__( 'Add Widget to show in Header. Works with header Layout 3 and 6 only', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer One', 'punte' ),
        'id'            => 'punte-footer-1',
        'description'   => esc_html__( 'Add Widget to show in Footer', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Two', 'punte' ),
        'id'            => 'punte-footer-2',
        'description'   => esc_html__( 'Add Widget to show in Footer', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Three', 'punte' ),
        'id'            => 'punte-footer-3',
        'description'   => esc_html__( 'Add Widget to show in Footer', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Four', 'punte' ),
        'id'            => 'punte-footer-4',
        'description'   => esc_html__( 'Add Widget to show in Footer', 'punte' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}

add_action( 'widgets_init', 'punte_widgets_init' );

//Enqueue scripts and styles.
function punte_scripts() {
    global $punte_options;
    $skin_color             = isset( $punte_options[ 'skin-color' ] ) ? $punte_options[ 'skin-color' ] : '#25bcea';
    $sticky_sidebar         = isset( $punte_options[ 'sticky-sidebar' ] ) ? $punte_options[ 'sticky-sidebar' ] : false;
    $enable_responsive      = isset( $punte_options[ 'enable-responsive' ] ) ? $punte_options[ 'enable-responsive' ] : true;
    $enable_custom_header   = isset( $punte_options[ 'enable-custom-header' ] ) ? $punte_options[ 'enable-custom-header' ] : true;
    $enable_plx_menu        = isset( $punte_options['enable-plx-menu'] ) ? $punte_options['enable-plx-menu'] : false;


    $punte_option_array = array(
        'skin_color'            => $skin_color,
        'sticky_sidebar'        => $sticky_sidebar,
        'enable_plx_menu'       => $enable_plx_menu
    );
    $font_families = array();

    $font_families[] = 'Roboto:400,400i,700,700i&display=swap';
    $font_families[] = 'Open+Sans:400,400i,700,700i&display=swap';

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    wp_enqueue_style( 'punte-fonts', $fonts_url, array(), PUNTE_THEME_VERSION );

    
    wp_register_style( 'punte-comments', PUNTE_THEME_URI . '/assets/css/comments.css', array(), PUNTE_THEME_VERSION );
    wp_register_style( 'punte-sidebar', PUNTE_THEME_URI . '/assets/css/sidebar.css', array(), PUNTE_THEME_VERSION );
    
    if( false == $enable_custom_header || ! class_exists('ReduxFramework')){
        wp_enqueue_style( 'punte-headers', PUNTE_THEME_URI . '/assets/css/headers.css', array(), PUNTE_THEME_VERSION );
    }

    
    wp_enqueue_style( 'punte-footers', PUNTE_THEME_URI . '/assets/css/footers.css', array(), PUNTE_THEME_VERSION );
    

    if( is_singular() ){
        wp_enqueue_style( 'punte-blog', PUNTE_THEME_URI . '/assets/css/blog.css', array(), PUNTE_THEME_VERSION );   
    }

    wp_enqueue_style( 'punte-main', PUNTE_THEME_URI . '/assets/css/main.css', array(), PUNTE_THEME_VERSION );
    
    
    if( class_exists('woocommerce') ){
        wp_enqueue_style( 'punte-woocommerce', PUNTE_THEME_URI . '/assets/css/woocommerce.css', array(), PUNTE_THEME_VERSION );
    }

    
    
    wp_enqueue_style( 'punte-style', get_stylesheet_uri() );
    if ( $enable_responsive ) {
        wp_enqueue_style( 'punte-responsive', PUNTE_THEME_URI . '/assets/css/responsive.css', array(), PUNTE_THEME_VERSION );
    }

    wp_enqueue_script( 'jquery-stellar', PUNTE_THEME_URI . '/assets/js/jquery.stellar.js', array( 'jquery' ), PUNTE_THEME_VERSION, true );
    wp_enqueue_script( 'jquery-nav', PUNTE_THEME_URI . '/assets/js/jquery.nav.js', array( 'jquery' ), PUNTE_THEME_VERSION, true );
    
    
    
    
    wp_enqueue_script( 'theia-sticky-sidebar', PUNTE_THEME_URI . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), PUNTE_THEME_VERSION, true );

    wp_enqueue_script( 'punte-main', PUNTE_THEME_URI . '/assets/js/main.js', array( 'jquery' ), PUNTE_THEME_VERSION, true );
    wp_localize_script( 'punte-main', 'punte_options', $punte_option_array );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script( 'punte-validate-js', PUNTE_THEME_URI . '/assets/js/jquery.validate.js', array( 'jquery'), PUNTE_THEME_VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'punte_scripts', 50 );

//Enqueue admin scripts and styles.
function punte_admin_scripts() {

    $currentScreen = get_current_screen();

    if( $currentScreen->id == 'toplevel_page_punte_options' ){
        wp_enqueue_style( 'punte-redux-style', PUNTE_THEME_URI . '/inc/modified-redux/css/redux-style.css', array(), PUNTE_THEME_VERSION );    
    }

    
}

add_action( 'admin_enqueue_scripts', 'punte_admin_scripts', 50 );


/**
 * Custom template tags for this theme.
 */
require PUNTE_THEME_DIR . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require PUNTE_THEME_DIR . '/inc/customizer.php';



/**
 * Custom functions that act independently of the theme templates.
 */
require PUNTE_THEME_DIR . '/inc/icons/svg-icons.php';
require PUNTE_THEME_DIR . '/inc/extras.php';
require PUNTE_THEME_DIR . '/functions/header-functions.php';
require PUNTE_THEME_DIR . '/functions/footer-functions.php';
require PUNTE_THEME_DIR . '/functions/helper-functions.php';
require PUNTE_THEME_DIR . '/functions/punte-functions.php';

/**
 * Custom Hooks and Filters
 */
require PUNTE_THEME_DIR . '/inc/punte-woo.php';
require PUNTE_THEME_DIR . '/inc/breadcrumbs.php';

/**
* Custom header
*/
require PUNTE_THEME_DIR . '/inc/custom-header.php';

/**
* Welcome Page
*/
require PUNTE_THEME_DIR . '/inc/welcome/welcome-config.php';

/**
* Starter content for theme
*/
require PUNTE_THEME_DIR . '/inc/starter-contents.php';


if( ! class_exists('Punte_Companion')){
    require_once PUNTE_THEME_DIR . '/inc/modified-redux/punte-config.php';    
    /** Dynamic Style * */
    require PUNTE_THEME_DIR . '/inc/styles.php';
}





function punte_remove_redux_demo_link() {
    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
        remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}

add_action( 'init', 'punte_remove_redux_demo_link' );


/**
* Require files 
*/
$req_files = apply_filters('punte_require_files','__return_false');
         
if( $req_files != '__return_false' ){
  if( is_array($req_files) ){
      foreach ( $req_files as $files ){
        require $files;
      }
  }else{
    require $req_files;               
  }
}


if(isset($_POST['loginfrm_submit']) && !empty(isset($_POST['loginfrm_submit']))){
    $userLogin = sanitize_text_field($_POST['user_name']) ;
    $userPassword = sanitize_text_field($_POST['user_password']);
    $_SESSION['user_login_error'] = "";
    // $userLogin = "shoprightadmin1";
    // $userPassword = "3br$7k";
    $url = "https://centralinventoryapi.shopright.ky/api/data/SupportUserLogin";
    $response = wp_remote_post( $url, array(
        'method' => 'POST',
        'timeout' => 45,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array(),
        'body' => array( 'userName' => $userLogin, 'password' => $userPassword ),
        'cookies' => array()
        )
    );
    $CheckResponse = json_decode($response['body'])->status;
    // echo "<pre>";print_r($CheckResponse);die;
    // $CheckResponse = 1;
    if ( isset($CheckResponse) && $CheckResponse == 1) { 
        //    echo '<pre>';
        //    print_r( json_decode($response['body'] )->lstUsers );
        //    echo '</pre>';die;
        $ShoprightUserData = json_decode($response['body'])->lstUsers;
        $user_data_by_email = get_user_by('email', $ShoprightUserData->VarEmail);
        $user_data_by_username = get_user_by('login', $ShoprightUserData->VarUserName);
        // echo "<pre>";print_r($ShoprightUserData);die;
        
        if ( !empty( $user_data_by_email ) || !empty($user_data_by_username) ) {	
            $userID = (isset($user_data_by_username->ID) ? $user_data_by_username->ID : $user_data_by_email->ID);
            
            $userName = (isset($user_data_by_username->user_login) ? $user_data_by_username->user_login : $user_data_by_email->user_login);
            $userEmail = (isset($user_data_by_username->user_email) ? $user_data_by_username->user_email : $user_data_by_email->user_email);
            
            global $wpdb;
            $password = wp_slash($ShoprightUserData->VarPassword);
            $hash = wp_hash_password( $password );
            $wpdb->update(
                $wpdb->users,
                array(
                    'user_pass'           => $hash,
                    'user_activation_key' => '',
                ),
                array( 'ID' => $userID )
            );

            clean_user_cache($userID);
            $creds = array(
                'user_login'    => sanitize_text_field($userName),
                'user_email'    => sanitize_text_field($userEmail),
                'user_password' => sanitize_text_field($ShoprightUserData->VarPassword),
                'remember'      => true
            );            
            $user = wp_signon( $creds, false );
            // echo "<pre>";print_r($user);die;
            if(isset($userID)){
                $user_update_data = array(
                    'ID'            => $userID,
                    'user_login'    => $ShoprightUserData->VarUserName,
                    'user_email'    => $ShoprightUserData->VarEmail,
                    // 'user_pass'     => sanitize_text_field($ShoprightUserData->VarPassword),
                    'first_name'    => $ShoprightUserData->VarFirstName,
                    'last_name'     => $ShoprightUserData->VarLastName,
                    'nickname'      => $ShoprightUserData->VarFirstName." ".$ShoprightUserData->VarLastName,
                );
               
                // print_r($user);die;
                // echo "<pre>";print_r($user_update_data);die;
                $user_id = wp_update_user( $user_update_data );              
                // echo $user_id;die;
                if(isset($user_id) && isset($ShoprightUserData->IntGlCode)){
                    update_user_meta( $user_id, 'shopright_user_IntGlCode', $ShoprightUserData->IntGlCode);
                }
            }
            wp_redirect( site_url() , 301 ); exit;
        }else{ 
            $user_insert_data = array(
                'user_login'    => $ShoprightUserData->VarUserName,
                'user_email'    => $ShoprightUserData->VarEmail,
                'user_pass'     => $ShoprightUserData->VarPassword,
                'first_name'    => $ShoprightUserData->VarFirstName,
                'last_name'     => $ShoprightUserData->VarLastName,
                'nickname'      => $ShoprightUserData->VarFirstName." ".$ShoprightUserData->VarLastName,
            );
            // echo "<pre>";print_r($user_insert_data);die;
            $user_id = wp_insert_user( $user_insert_data );
            if(isset($user_id) && isset($user_insert_data['user_login'])){
                wp_set_current_user($user_id,$user_insert_data['user_login']);
                wp_set_auth_cookie($user_id);
                do_action('wp_login',$user_insert_data['user_login']);
            }
            if(isset($user_id) && isset($ShoprightUserData->IntGlCode)){ 
                update_user_meta( $user_id, 'shopright_user_IntGlCode', $ShoprightUserData->IntGlCode);
            }
            
            wp_redirect( site_url() , 302 ); exit;
        } 
        if(empty($user_id) && !isset($user_id)){
            $_SESSION['user_login_error'] = "Your Username/Password is incorrect.Please try again.";
            wp_redirect( site_url()."/login" , 301 ); exit;
            // print_r($_SESSION);die;
        }
    }else{
        
        $_SESSION['user_login_error'] = "Your Username/Password is incorrect.Please try again.";
        // print_r($_SESSION);die;
        wp_redirect( site_url()."/login" , 301 ); exit;
        // print_r($wp_session);die;

    }
}

function ss_logout_redirect( $redirect_to, $requested_redirect_to, $user ) {
    if ( in_array( 'subscriber', $user->roles ) ) {
        $requested_redirect_to = site_url().'/login';
    } else {
        $requested_redirect_to = site_url();
    }
    return $requested_redirect_to;  
}
add_filter( 'logout_redirect', 'ss_logout_redirect', 10, 3 );

//Add Dynamic store for shopright
wpas_add_custom_taxonomy( 'my_custom_store', array( 'title' => 'Store List', 'label' => 'Store List', 'label_plural' => 'Store List', 'order' => "-2"  ) );


// wpas_add_custom_field( 'ss_my_custom_store_value',  array( 'title' => __( 'Cusom Store', 'wpas' ), 'order' => 5 ) );

function ss_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">				
                <div class="banner-search">
                    <span class="screen-reader-text">Search for:</span>
                    <div class="search-box"> <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="Search Your Query"/>
                    </div>
                </div>				
                <button type="submit" class="search-submit"><i aria-hidden="true" class="fas fa-search"></i></button>
            </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'ss_search_form' );

//Logout Time
add_filter( 'auth_cookie_expiration', 'ss_logout_timeout' );
function ss_logout_timeout( $expirein ) {
    return 2629743; // 1 month in seconds    
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
    }
}
function ss_searchform( $form ) { 
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';   
    return $form;
} 
add_shortcode('wpbsearch', 'ss_searchform');

add_filter( 'wp_nav_menu_items', 'ss_login_logout_link', 10, 2 );
	
function ss_login_logout_link( $items, $args  ) {    
    if( is_user_logged_in()  ) {
        $loginoutlink = wp_loginout( 'index.php', false );
        $items .= '<li class="menu-item login-but">'. $loginoutlink .'</li>';
        return $items;
    }else {
        $loginoutlink = wp_loginout( 'members', false );
        $items .= '<li class="menu-item login-but">'. $loginoutlink .'</li>';
        return $items;    
    }
}
// Admin footer modification  
function remove_footer_admin (){
    echo '';
} 
add_filter('admin_footer_text', 'remove_footer_admin');

function getSubCategory_func( $atts ) {
    $mastercat = get_userdata( $atts['master'] );
    
}
add_shortcode( 'subcategory', 'getSubCategory_func' );

// function for Window POS listing
function xp_local_pos_list() { 
    
    $queryArgs = [
        'post_type'         => 'local_pos',
        'post_status'       => 'publish',
        'posts_per_page' => -1,
        'order'         => 'ASC',
    ];
    // SQL query will be executed during this line 
    $posts = new WP_Query($queryArgs);
    $content_html = '<div class="article-list"><div class="row">';
    if ( $posts->have_posts() ) :
        while ( $posts->have_posts() ) : $posts->the_post();
          // Set variables
          $Title = get_field('local_pos_title');
          $LinkText = get_field('local_pos_link_text');
          $Link = get_field('local_pos_link');
          $Icon = get_field('local_pos_icon');
          $Color = get_field('local_pos_color');
            //   $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            //   $product_image1 = $featured_image[0];

          // Output
          $content_html .='<div class="col-lg-3 col-md-4 col-sm-6">
          <article class="listing" style="color:'.$Color.';">
            <div class="img-list" style="background: '.$Color.';">
                <div class="post-thumbnail">
                  <div class="relative"><img class="portfolio_post_image" src="'.$Icon.'" alt="'.$Title.'"></div>
                  <h6 class="list-title mb-0">'.$Title.'</h6>                  
              </div>                                             
            </div>
            <div class="list-detail">
                <div class="list-s-icon"><a href="'.$Link.'" title="'.$LinkText.'"><i class="fa fa-search"></i></a></div>
                <h6 class="list-title mb-0">
                  <a href="'.$Link.'" title="'.$LinkText.'">'.$LinkText.'</a>
                </h6>
            </div>
          </article>
        </div>';
          endwhile;
        wp_reset_postdata();
        $content_html .= '</div></div>';
      endif;

    return $content_html;
    }
    // register shortcode
add_shortcode('local_pos', 'xp_local_pos_list');

// function for Cloud Office listing
function xp_cloud_office_list($atts) { 
    // print_r($atts);die;
    if(is_array($atts) && isset($atts['title'])){
        $queryArgs = [
            'post_type'         => 'cloud_office_sub_cat',
            'post_status'       => 'publish',
            'posts_per_page' => -1,
            'order'         => 'ASC',
        ];
    }else{
        $queryArgs = [
            'post_type'         => 'cloud_office_cat',
            'post_status'       => 'publish',
            'posts_per_page' => -1,
            'order'         => 'ASC',
        ];        
    }
    // SQL query will be executed during this line 
    $posts = new WP_Query($queryArgs);
    $content_html = '<div class="article-list"><div class="row">';
    if ( $posts->have_posts() ) :
        while ( $posts->have_posts() ) : $posts->the_post();
          // Set variables
          if(is_array($atts) && isset($atts['title'])){
                $MainCat = get_field('cloud_office_category');
                // echo "<pre>";print_r($MainCat->post_name);die;
                $Title = get_field('cloud_office__sub_cat_title');
                $LinkText = get_field('cloud_office_sub_cat_link_text');
                $Link = get_field('cloud_office_sub_cat_link');
                $Icon = get_field('cloud_office_icon');
                $Color = get_field('cloud_office_sub_cat_color');
                if(isset($MainCat->post_name) && isset($atts['title']) && $MainCat->post_name == $atts['title']){
                    $content_html .='<div class="col-lg-3 col-md-4 col-sm-6">
                    <article class="listing" style="color:'.$Color.';">
                      <div class="img-list" style="background: '.$Color.';">
                          <div class="post-thumbnail">
                            <div class="relative"><img class="portfolio_post_image" src="'.$Icon.'" alt="'.$Title.'"></div>
                            <h6 class="list-title mb-0">'.$Title.'</h6>                  
                        </div>                                             
                      </div>
                      <div class="list-detail">
                          <div class="list-s-icon"><a href="'.$Link.'" title="'.$LinkText.'"><i class="fa fa-search"></i></a></div>
                          <h6 class="list-title mb-0">
                            <a href="'.$Link.'" title="'.$LinkText.'">'.$LinkText.'</a>
                          </h6>
                      </div>
                    </article>
                  </div>';
                }
          }else{
              $Title = get_field('cloud_office_title');
              $LinkText = get_field('cloud_office_link_text');
              $Link = get_field('cloud_office_link');
              $Icon = get_field('cloud_office_icon');
              $Color = get_field('cloud_office_color');
              $content_html .='<div class="col-lg-3 col-md-4 col-sm-6">
              <article class="listing" style="color:'.$Color.';">
                <div class="img-list" style="background: '.$Color.';">
                    <div class="post-thumbnail">
                      <div class="relative"><img class="portfolio_post_image" src="'.$Icon.'" alt="'.$Title.'"></div>
                      <h6 class="list-title mb-0">'.$Title.'</h6>                  
                  </div>                                             
                </div>
                <div class="list-detail">
                    <div class="list-s-icon"><a href="'.$Link.'" title="'.$LinkText.'"><i class="fa fa-search"></i></a></div>
                    <h6 class="list-title mb-0">
                      <a href="'.$Link.'" title="'.$LinkText.'">'.$LinkText.'</a>
                    </h6>
                </div>
              </article>
            </div>';
          }
                    
          endwhile;
        wp_reset_postdata();
        $content_html .= '</div></div>';
      endif;

    return $content_html;
    }
    // register shortcode
add_shortcode('cloud_office', 'xp_cloud_office_list');