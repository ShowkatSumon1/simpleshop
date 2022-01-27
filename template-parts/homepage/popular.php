
    <!--popular product section start-->
<?php if(get_theme_mod('popular_option', true)) : ?>
    <section class="space-3">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2 class="title "><?php echo get_theme_mod('popular_title' , __('Popular Products', 'simpleshop'))?></h2>
                        <!--<div class="sub-title">37 New fashion products arrived recently in our showroom for this-->
                        <!--winter-->
                        <!--</div>-->
                    </div>
                </div>

                <div class="col-md-12">
                    <?php echo do_shortcode('[best_selling_products columns=3 rows=1]');?>
                </div>

            </div>
        </div>
    </section>
<?php endif;?>
    <!-- product section end-->
