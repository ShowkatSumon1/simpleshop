 <!--product section start-->
<?php if(get_theme_mod('product_option', true)) : ?>
    <section class="space-3 space-adjust">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2 class="title "><?php echo get_theme_mod('product_title' , __('New Arrival', 'simpleshop'))?></h2>
                        <div class="sub-title"><?php echo get_theme_mod('product_subtitle' , __('37 New fashion products arrived recently in our showroom for this winter'))?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <?php echo do_shortcode('[products columns=3 rows=2]'); ?>
                    <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>" class="view-all-product mt-md-5">View All Products</a>
                </div>

            </div>
        </div>
    </section>
<?php endif;?>
    <!-- product section end-->
