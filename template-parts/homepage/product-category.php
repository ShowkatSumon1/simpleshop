    <!--shop category start-->

<?php if(get_theme_mod('categroy_option', true)) : ?>
    <section class="space-3">
        <div class="container sm-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2 class="title"> <?php echo get_theme_mod('category_title', __('Shop By Categories' , 'simpleshop'))?></h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <?php 
                    $col_num = get_theme_mod('category_column', 3);
                    echo do_shortcode("[product_categories columns=$col_num]");
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
    <!--shop category end-->
