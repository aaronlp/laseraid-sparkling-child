<?php

// Exit if accessed directly

if ( !defined( 'ABSPATH' ) ) exit;



// BEGIN ENQUEUE PARENT ACTION

// AUTO GENERATED - Do not modify or remove comment markers above or below:



if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):

    function chld_thm_cfg_parent_css() {

        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'sparkling-bootstrap','sparkling-icons' ) );

    }

endif;

add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 1 );





function my_theme_enqueue_styles() {



    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.



    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/style.css' );

    wp_enqueue_style( 'child-style',

        get_stylesheet_directory_uri() . '/css/style.css',

        array( $parent_style ),

        wp_get_theme()->get('Version')

    );

}

function theme_scripts()
{
    wp_enqueue_script('waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js');
    wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.js');
    wp_enqueue_script('counterup', get_stylesheet_directory_uri() . '/js/jquery.counterup.js', ['jquery']);
    wp_enqueue_script('pretty-photo', get_stylesheet_directory_uri() . '/js/jquery.prettyPhoto.js', ['jquery']);
    wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/js/theme.js', [
        'jquery',
        'jquery-ui-core',
        'waypoints',
        'owl-carousel',
        'counterup',
        'pretty-photo'
    ]);
     wp_enqueue_style('laseraid-shop-style', get_stylesheet_directory_uri() . '/style.less');

    wp_enqueue_style('laseraid-font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');



    wp_enqueue_script('laseraid-shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);



    wp_enqueue_script('laseraid-shop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    wp_enqueue_script('laseraid-shop-template-js', get_template_directory_uri() . '/js/main.js', array('jquery'), time(), true);

    wp_localize_script('laseraid-shop-template-js', 'AJAX', array('ajaxurl' => admin_url('admin-ajax.php'), 'nextNonce' => wp_create_nonce('myajax-next-nonce')));
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );















// END ENQUEUE PARENT ACTION





register_sidebar(array(

    'id'            => 'top-1',

    'name'          => esc_html__( 'Top button Widget 2', 'sparkling' ),

    'description'   => esc_html__( 'Displays on top header button and phone number', 'sparkling' ),

    'before_widget' => '<div id="%1$s" class="widget %2$s">',

    'after_widget'  => '</div>',

    'before_title'  => '<h3 class="widgettitle">',

    'after_title'   => '</h3>',

  ));
  
  
  
  register_sidebar(array(

    'id'            => 'footer-inner-widget-1',

    'name'          => esc_html__( 'Footer Inner', 'sparkling' ),

    'description'   => esc_html__( 'Displays on top header button and phone number', 'sparkling' ),

    'before_widget' => '<div id="%1$s" class="widget %2$s">',

    'after_widget'  => '</div>',

    'before_title'  => '<h3 class="widgettitle">',

    'after_title'   => '</h3>',

  ));



register_sidebar(array(

    'id'            => 'top-social-links1',

    'name'          => esc_html__( 'Top social links', 'sparkling' ),

    'description'   => esc_html__( 'Displays on top social links', 'sparkling' ),

    'before_widget' => '<div id="%1$s" class="widget %2$s">',

    'after_widget'  => '</div>',

    'before_title'  => '<h3 class="widgettitle">',

    'after_title'   => '</h3>',

  ));





function wpdocs_custom_excerpt_length( $length ) {

    return 15;

}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );





add_action( 'template_redirect', 'sparkling_content_width' );



if ( ! function_exists( 'sparkling_main_content_bootstrap_classes' ) ) :

/**

 * Add Bootstrap classes to the main-content-area wrapper.

 */

function sparkling_main_content_bootstrap_classes() {

	if ( is_page_template( 'page-fullwidth.php' ) ) {

		return 'col-sm-12 col-md-12';

	}

	return 'col-sm-12 col-md-9';

}








// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
		echo '<li class="active"><i class="fa fa-home"></i></li>';
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}



add_shortcode( 'wpv-post-wooimage', 'wpv_wooimage');
function wpv_wooimage(){
    // verify that this is a product category page
    if (is_product_category()){
        global $wp_query;
        // get the query object
        $cat = $wp_query->get_queried_object();
        // get the thumbnail id user the term_id
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
        // get the image URL
        $image = wp_get_attachment_url( $thumbnail_id ); 
        // print the IMG HTML
        echo '<img src="'.$image.'" alt="" width="762" height="365" />';
    }
}




//add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
//add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5);





endif; // sparkling_main_content_bootstrap_classes

function createEnquirySelectElement()
{
    $prodCatObjects = get_terms( 'product_cat', [
        'orderby'    => 'ID',
        'order'      => 'ASC',
        'hide_empty' => true
    ]);


    $options = [];

    foreach ($prodCatObjects as $prodCat) {
        $products = get_posts([
            'posts_per_page' => -1,
            'tax_query' => [
                'relation' => 'AND',
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $prodCat->slug
                ]
            ],
            'post_type' => 'product',
            'orderby'    => 'ID'
        ]);

        foreach ($products as $product) {
            $options[$prodCat->name][] = $product->post_title;
        }
    }

    echo '<select id="equipment-list" style="display:none;">';
    foreach ($options as $cat => $items) {
        echo '<optgroup label="' . $cat . '">';
        foreach ($items as $item) {
            echo '<option value="' . $item . '">' . $item . '</option>';
        }
        echo '</optgroup>';
    }
    echo '</select>';
}

function createTwitterFeedArray()
{
    $conKey = 'bH8NjiA7waLzUdsOapP8A';
    $conSecret = 'W4X6asMc21rbmm6nvOQKqtSkoeI22rn44LA3ooeLo90';
    $accessToken = '1632046986-fWG9n9lN2EmluPB6yyfHZG7pvvP06wI8YBMtfX7';
    $accessSecret = '1Hps2ZgkWxqxxEEF3b9Oq5BXsNYRkiSG0g1tHYQixw';

    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

    $oauth = array(
        'oauth_consumer_key' => $conKey,
        'oauth_nonce' => time(),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_token' => $accessToken,
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0'
    );

    $request = [
        'count' => 5
    ];

    $params = array_merge($oauth, $request);

    $baseInfo = buildBaseString($url, 'GET', $params);
    $compositeKey = rawurlencode($conSecret) . '&' . rawurlencode($accessSecret);
    $oauthSignature = base64_encode(hash_hmac('sha1', $baseInfo, $compositeKey, true));
    $oauth['oauth_signature'] = $oauthSignature;

// Make requests
    $header = array(buildAuthorizationHeader($oauth), 'Expect:');
    $options = array( CURLOPT_HTTPHEADER => $header,
        //CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_HEADER => false,
        CURLOPT_URL => $url . '?' . http_build_query($request),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false);

    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);
    $tweets = json_decode($json);

    $formattedTweets = formatTweets($tweets);
    return $formattedTweets;

}

function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
}

function formatTweets($tweetArray)
{
    for ($x = 0; $x < count($tweetArray); $x++) {
        $formattedText = preg_replace(
            [
                "/(https?:\/\/(?>www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-z]{1,6}\b[-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/",
                "/(#\w+)/"
            ],
            [
                "<a href='$0'>$0</a>",
                "<a href='https://twitter.com/hashtag/$1?src=hash'>$1</a>",
            ],
            $tweetArray[$x]->text
        );
        $tweetArray[$x]->formatted_text = $formattedText;
    }
    return $tweetArray;
}


add_filter('loop_shop_per_page', create_function('$cols', 'return 9;'), 20);



remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart');



remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);





// check if user is not login and redirect to login page if not

function check_login_and_redirect()

{

    if (!is_user_logged_in() && (is_woocommerce() || is_cart() || is_checkout())) {

        wp_redirect(site_url('my-account'));

        exit;

    }

}



add_action('template_redirect', 'check_login_and_redirect');





// add confirm password field in registration page

add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10, 3);

function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email)

{

    global $woocommerce;

    extract($_POST);

    if (strcmp($password, $password2) !== 0) {

        return new WP_Error('registration-error', __('Passwords do not match.', 'woocommerce'));

    }

    return $reg_errors;

}



add_action('woocommerce_register_form', 'wc_register_form_password_repeat');

function wc_register_form_password_repeat()

{ ?>

    <p class="form-row form-row-wide">

        <input type="password" class="input-text" name="password2" id="reg_password2" value=""

               placeholder="Confirm Password"/>

    </p><?php

}



// Remove you may also like in cart page

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// add clear my basket after product list in cart

add_action('woocommerce_cart_collaterals', 'woocommerce_empty_cart_button', 1);

function woocommerce_empty_cart_button()

{

    global $woocommerce;

    echo '<div class="basket-btns">

            <a class="button clear-cart" href="' . $woocommerce->cart->get_cart_url() . '?empty-cart">Clear My Cart</a>

            <a class="button update-cart" href="#">Update My Cart</a>

            <a class="button shopping" href="' . get_site_url() . '/shop">Continue Shopping</a>

         </div>';



}



// clear my cart action

add_action('init', 'woocommerce_clear_cart_url');

function woocommerce_clear_cart_url()

{

    global $woocommerce;



    if (isset($_GET['empty-cart'])) {

        $woocommerce->cart->empty_cart();

    }

}



// register a widget

function laseraid_new_widgets_init()

{

    register_sidebar(array(

        'name' => esc_html__('Dropdown Widget', 'laseraid'),

        'id' => 'sidebar-dropdown',

        'description' => '',

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h2 class="widget-title">',

        'after_title' => '</h2>',

    ));

}



add_action('widgets_init', 'laseraid_new_widgets_init');





//removed related products

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);





add_filter('loop_shop_per_page', create_function('$cols', 'return -1;'), 20);





function bulk_add_to_cart_function()

{

    // check nonce

    $nonce = $_POST['nextNonce'];

    if (!wp_verify_nonce($nonce, 'myajax-next-nonce')) {

        die ('Busted!');

    }

    // generate the response

    $product_list = $_POST['product_id'];

    $product_qnty = $_POST['product_quantity'];

    global $woocommerce;

    $count = 0;

    $errors = [];

    while ($product_list[$count]) {

        try {

            $woocommerce->cart->add_to_cart($product_list[$count], $product_qnty[$count]);

        } catch (Exception $e) {

            $errors[$product_list] = $e->getMessage();

        }

        $count++;

    }

    if(count($errors) > 0){

        foreach($errors as $error){

            echo '<p class="error"><span></span>'. $error .'</p>';

        }

    } else {

        echo '<p class="success"><span><i class="fa fa-check" aria-hidden="true"></i>

</span>The selected products were added successfully.</p>';

        echo '<a href="'. site_url() .'/cart/">View my cart</a>';

    }

    exit;

}



add_action('wp_ajax_bulk_add_to_cart', 'bulk_add_to_cart_function');

add_action('wp_ajax_nopriv_bulk_add_to_cart', 'bulk_add_to_cart_function');





/* User approval */

function user_autologout(){

    if ( is_user_logged_in() ) {

        $current_user = wp_get_current_user();

        $user_id = $current_user->ID;

        $approved_status = get_user_meta($user_id, 'wp-approve-user', true);

        //if the user hasn't been approved yet by WP Approve User plugin, destroy the cookie to kill the session and log them out

        if ( $approved_status == 1 ){

            return $redirect_url;

        }

        else{

            wp_logout();

            return get_permalink(woocommerce_get_page_id('myaccount')) . "?approved=false";

        }

    }

}

remove_filter('woocommerce_registration_redirect', 'wcs_register_redirect');

add_action('woocommerce_registration_redirect', 'user_autologout', 2);

function registration_message(){

    $not_approved_message = '<p class="registration">NOTE: Your account will be held for moderation and you will be unable to login until it is approved.</p>';

    if( isset($_REQUEST['approved']) ){

        $approved = $_REQUEST['approved'];

        if ($approved == 'false')  echo '<p class="registration successful"><i class="fa fa-check-circle" aria-hidden="true"></i>

 Thank you for creating an account with us.<br/>We will activate your account and be in touch within 48 hours.</p>';

        else echo $not_approved_message;

    }

    else echo $not_approved_message;

}

add_action('woocommerce_before_customer_login_form', 'registration_message', 2);





// remove Flat rate on shipping method price

add_filter( 'woocommerce_cart_shipping_method_full_label', 'laseraid_remove_flat_rate' );

function laseraid_remove_flat_rate( $label ) {

    $label = str_replace( 'Flat Rate:', '', $label );

    return $label;

}





/* reduce the password strength */

function reduce_woocommerce_min_strength_requirement( $strength ) {

    return 2;

}

add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );





/**

 * Replace 'customer' role (WooCommerce use by default) with your own one.

 **/

add_filter('woocommerce_new_customer_data', 'wc_assign_custom_role', 10, 1);



function wc_assign_custom_role($args) {

    $args['role'] = 'non-activated-customer';



    return $args;

}





/**

 * Send admin email notification on account creation

 **/

add_action('woocommerce_created_customer', 'wc_add_admin_notification_of_new_user_registration' );

function wc_add_admin_notification_of_new_user_registration($customer_id){



    wp_new_user_notification( $customer_id );



}





add_action( 'init', 'cptui_register_my_cpts_parts' );

function cptui_register_my_cpts_parts() {

    $labels = array(

        "name" => __( 'Parts', 'las_shop' ),

        "singular_name" => __( 'Part', 'las_shop' ),

        "menu_name" => __( 'Parts Catalogue', 'las_shop' ),

        "all_items" => __( 'All Parts', 'las_shop' ),

        "add_new" => __( 'Add New Part', 'las_shop' ),

        "add_new_item" => __( 'Add New Part', 'las_shop' ),

        "edit_item" => __( 'Edit Part', 'las_shop' ),

        "new_item" => __( 'New Part', 'las_shop' ),

        "view_item" => __( 'View Part', 'las_shop' ),

        "search_items" => __( 'Search Part', 'las_shop' ),

        "not_found" => __( 'No Parts Found', 'las_shop' ),

        "not_found_in_trash" => __( 'No Parts found in Trash', 'las_shop' ),

        "parent_item_colon" => __( 'Parent Part', 'las_shop' ),

        "featured_image" => __( 'Featured Image for this part', 'las_shop' ),

        "set_featured_image" => __( 'Set featured Image', 'las_shop' ),

        "archives" => __( 'Part Archives', 'las_shop' ),

        "insert_into_item" => __( 'Insert into part', 'las_shop' ),

        "uploaded_to_this_item" => __( 'Uploaded to this part', 'las_shop' ),

        "filter_items_list" => __( 'Filter parts list', 'las_shop' ),

        "parent_item_colon" => __( 'Parent Part', 'las_shop' ),

        );



    $args = array(

        "label" => __( 'Parts', 'las_shop' ),

        "labels" => $labels,

        "description" => "",

        "public" => true,

        "publicly_queryable" => true,

        "show_ui" => true,

        "show_in_rest" => false,

        "rest_base" => "",

        "has_archive" => true,

        "show_in_menu" => true,

                "exclude_from_search" => false,

        "capability_type" => "post",

        "map_meta_cap" => true,

        "hierarchical" => false,

        "rewrite" => array( "slug" => "parts", "with_front" => true ),

        "query_var" => true,

        "menu_icon" => "dashicons-admin-tools",

        "supports" => array( "title", "thumbnail" ),                    );

    register_post_type( "parts", $args );



// End of cptui_register_my_cpts_parts()

}



add_action( 'init', 'cptui_register_my_taxes' );

function cptui_register_my_taxes() {

    $labels = array(

        "name" => __( 'Brands', 'las_shop' ),

        "singular_name" => __( 'Brand', 'las_shop' ),

        );



    $args = array(

        "label" => __( 'Brands', 'las_shop' ),

        "labels" => $labels,

        "public" => true,

        "hierarchical" => true,

        "label" => "Brands",

        "show_ui" => true,

        "show_in_menu" => true,

        "show_in_nav_menus" => true,

        "query_var" => true,

        "rewrite" => array( 'slug' => 'brand', 'with_front' => true, ),

        "show_admin_column" => true,

        "show_in_rest" => false,

        "rest_base" => "",

        "show_in_quick_edit" => false,

    );

    register_taxonomy( "brand", array( "parts" ), $args );



// End cptui_register_my_taxes()

}









function ajax_get_parts() {



    if ( ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) && strtoupper( $_SERVER['REQUEST_METHOD'] ) != "POST" ) {

        die( "Not allowed" );

    }



    $part_brand = ! empty( $_POST['part_brand'] ) ? sanitize_text_field( $_POST['part_brand'] ) : false;

    $part_type  = ! empty( $_POST['part_type'] ) ? sanitize_text_field( $_POST['part_type'] ) : false;

    $s          = ! empty( $_POST['s'] ) ? sanitize_text_field( $_POST['s'] ) : false;

    $paged      = ! empty( $_POST['paged'] ) ? sanitize_text_field( $_POST['paged'] ) : false;

    $args       = [ 'post_type' => 'parts', 'post_status' => 'publish', 'posts_per_page' => 6 ];



    if ( $part_brand ) {

        $args['tax_query'][] = [

            'taxonomy' => 'brand',

            'field'    => 'term_id',

            'terms'    => [ $part_brand ]

        ];

    }

    if ( $part_type ) {

        $args['meta_key']     = 'part_type';

        $args['meta_value']   = $part_type;

        $args['meta_compare'] = 'LIKE';

    }



    if ( $s ) {

        $args['s'] = $s;

    }

    if ( $paged ) {

        $args['paged'] = $paged;

    }

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {

        global $i; $i=0;

        while ( $query->have_posts() ) {

            $i++;

            $query->the_post();

            get_template_part( 'template-parts/content', 'parts' );

            if($i==3)$i=0;

        }

    } else {

        echo "NOT_FOUND";

    }

    exit;

}



add_action( 'wp_ajax_ajx_get_parts', 'ajax_get_parts' );

add_action( 'wp_ajax_nopriv_ajx_get_parts', 'ajax_get_parts' );



// Hook in

add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_company_fields' );



// Our hooked in function - $address_fields is passed via the filter!

function custom_override_default_company_fields( $company_fields ) {

     $company_fields['company']['required'] = true;



     return $company_fields;

}




