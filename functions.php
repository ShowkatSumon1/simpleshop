<?php
////////////// Setup Function
add_action('after_setup_theme', 'simpleshop_theme_setup');
function simpleshop_theme_setup(){
    load_theme_textdomain('simpleshop', get_template_directory().'/lang');
    add_theme_support('title-tag');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    // add_theme_support( 'woocommerce' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support(
        'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
    add_theme_support(
        'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        )
    );
    add_theme_support(
        'custom-background',
        apply_filters(
            'outshop_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    //////////// Menu register
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu', 'simpleshop' ),
        )
    );
}

add_action('wp_enqueue_scripts', 'simpleshop_scripts_call');
function simpleshop_scripts_call(){
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900');
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('assets/vendor/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('fontawesome-css', get_theme_file_uri('assets/vendor/font-awesome/css/font-awesome.min.css'));
    wp_enqueue_style('bicon-css', get_theme_file_uri('assets/vendor/bicon/css/bicon.css'));
    wp_enqueue_style('simpleshop-main', get_theme_file_uri('assets/css/main.css'));
    wp_enqueue_style('simpleshop', get_stylesheet_uri());

    wp_enqueue_script('bootstrap-js', get_theme_file_uri('assets/vendor/bootstrap/js/bootstrap.min.js'), array('jquery'), '', true);
    wp_enqueue_script('proper-js', get_theme_file_uri('assets/vendor/popper.min.js'), array('jquery' ,'bootstrap-js'), '', true);
    wp_enqueue_script('scripts-js', get_theme_file_uri('assets/js/scripts.js'),'', '', true);
}

//////// Kirki and Customizer

if(file_exists(get_theme_file_path().'/library/kirki.php')){
    require_once(get_theme_file_path('/library/kirki.php'));
}
if(file_exists(get_theme_file_path().'/library/customizer.php')){
    require_once(get_theme_file_path('/library/customizer.php'));
}

//////////// category number 

add_filter('woocommerce_subcategory_count_html', 'simpleshop_category_count');
function simpleshop_category_count($default){
    if(get_theme_mod('category_number_show') !='1'){
        return '';
    }else {
        return $default;
    }
}

///////// Homepage product option changing

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

//////////// div dhukano
add_action('woocommerce_before_shop_loop_item', 'simpleshop_div_wrapper');
function simpleshop_div_wrapper(){
    echo '<div class="product-wrap">';
}
add_action('woocommerce_before_shop_loop_item_title', 'simpleshop_div_wrapper_close', 11);
function simpleshop_div_wrapper_close(){
    echo '</div><div class="woocommerce-product-title-wrap">';
}

//////// add to cart ana
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10);

///////// filter add kore cart a icon deya.

add_filter('woocommerce_product_add_to_cart_text', 'simpleshop_add_to_cart_icon');
function simpleshop_add_to_cart_icon(){
    return "<i class='fa fa-shopping-basket'></i>";
}

///////// Title

add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_after_shop_loop_item_title', 'simpleshop_after_shop_loop_item_title_2');
function simpleshop_after_shop_loop_item_title_2(){
    echo '<a href="#" class="wish-list"><i class="fa fa-heart-o"></i></a></div>';
}

add_action('woocommerce_after_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 15);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 11);

/////////// shop column

add_filter('loop_shop_columns', 'simpleshop_product_column');
function simpleshop_product_column($products){
	return 3;
}

add_action('woocommerce_before_shop_loop', 'simpleshop_shop_title_in_shop', 10);
function simpleshop_shop_title_in_shop(){ ?>
    <div class="section-title">
        <h2 class="title d-block text-left-sm"">Shop</h2>
<?php }

add_action('woocommerce_before_shop_loop', 'simpleshop_shop_close_shop', 50);
function simpleshop_shop_close_shop(){ ?>
    </div>
<?php }

