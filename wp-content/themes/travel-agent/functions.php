<?php

require get_stylesheet_directory() . '/customizer/customizer.php';

add_action( 'after_setup_theme', 'travel_agent_after_setup_theme' );
function travel_agent_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'travel-agent-featured-image', 2000, 1200, true );
    add_image_size( 'travel-agent-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 */
function travel_agent_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'travel-agent' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'travel-agent' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'travel-agent' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'travel-agent' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'travel-agent' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'travel-agent' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'travel-agent' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'travel-agent' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'travel_agent_widgets_init' );

// enqueue styles for child theme
function travel_agent_enqueue_styles() {
    
    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

    // Theme block stylesheet.
    wp_enqueue_style( 'travel-agent-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'travel-agent-child-style' ), '1.0' );
    
    // enqueue parent styles
    wp_enqueue_style('adventure-travelling-style', get_template_directory_uri() .'/style.css');
    
    // enqueue child styles
    wp_enqueue_style('adventure-travelling-child-style', get_stylesheet_directory_uri() .'/style.css', array('adventure-travelling-style'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );    
}
add_action('wp_enqueue_scripts', 'travel_agent_enqueue_styles');

function travel_agent_admin_scripts() {
    // Backend CSS
    wp_enqueue_style( 'travel-agent-backend-css', get_theme_file_uri( '/assets/css/customizer.css' ) );
}
add_action( 'admin_enqueue_scripts', 'travel_agent_admin_scripts' );

define('TRAVEL_AGENT_CREDIT',__('https://www.themespride.com/themes/free-travel-agent-wordpress-theme/','travel-agent') );
if ( ! function_exists( 'travel_agent_credit' ) ) {
    function travel_agent_credit(){
        echo "<a href=".esc_url(TRAVEL_AGENT_CREDIT)." target='_blank'>".esc_html__('Travel Agent WordPress Theme','travel-agent')."</a>";
    }
}

function travel_agent_header_style() {
    if ( get_header_image() ) :
    $custom_header = "
        .headerbox{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'travel-agent-child-style', $custom_header );
    endif;
}
add_action( 'wp_enqueue_scripts', 'travel_agent_header_style' );

// offer Meta
function travel_agent_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Trip Offer Meta Feilds', 'travel-agent' ), 'travel_agent_meta_callback_trip_offer', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'travel_agent_bn_custom_meta_offer');
}

function travel_agent_meta_callback_trip_offer( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'travel_agent_offer_trip_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $trip_amount = get_post_meta( $post->ID, 'travel_agent_trip_amount', true );
    $trip_days = get_post_meta( $post->ID, 'travel_agent_trip_days', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Amount', 'travel-agent' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="travel_agent_trip_amount" id="travel_agent_trip_amount" value="<?php echo esc_html($trip_amount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Package Days', 'travel-agent' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="travel_agent_trip_days" id="travel_agent_trip_days" value="<?php echo esc_html($trip_days); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function travel_agent_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['travel_agent_offer_trip_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['travel_agent_offer_trip_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Trip Amount
    if( isset( $_POST[ 'travel_agent_trip_amount' ] ) ) {
        update_post_meta( $post_id, 'travel_agent_trip_amount', strip_tags( wp_unslash( $_POST[ 'travel_agent_trip_amount' ]) ) );
    }
    // Save Trip Days
    if( isset( $_POST[ 'travel_agent_trip_days' ] ) ) {
        update_post_meta( $post_id, 'travel_agent_trip_days', strip_tags( wp_unslash( $_POST[ 'travel_agent_trip_days' ]) ) );
    }
}
add_action( 'save_post', 'travel_agent_bn_metadesig_save' );

if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME' ) ) {
    define( 'ADVENTURE_TRAVELLING_PRO_THEME_NAME', esc_html__( 'Travel Agent Pro', 'travel-agent' ));
}
if ( ! defined( 'ADVENTURE_TRAVELLING_PRO_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/travel-guide-wordpress-theme/'));
}

if ( ! defined( 'ADVENTURE_TRAVELLING_FREE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_FREE_THEME_URL', 'https://www.themespride.com/themes/free-travel-agent-wordpress-theme/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DEMO_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DEMO_THEME_URL', 'https://www.themespride.com/travel-agent/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/travel-agent-lite/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_DOCS_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_DOCS_URL', 'https://www.themespride.com/demo/docs/travel-agent/' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_RATE_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_RATE_THEME_URL', 'https://wordpress.org/support/theme/travel-agent/reviews/#new-post' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_CHANGELOG_THEME_URL', get_stylesheet_directory() . '/readme.txt' );
}
if ( ! defined( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL' ) ) {
    define( 'ADVENTURE_TRAVELLING_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/travel-agent/' );
}