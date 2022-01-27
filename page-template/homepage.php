<?php 
/**
 * Template Name: Homepage
 */
get_header();
?>
<!--hero section start-->
<div id="home">
    <?php get_template_part('template-parts/homepage/banner');?>
</div>
<!--hero section end-->

<main class="site-main">
    <?php get_template_part('template-parts/homepage/product-category');?>
    <?php get_template_part('template-parts/homepage/product');?>
    <?php get_template_part('template-parts/homepage/promo');?>
    <?php get_template_part('template-parts/homepage/popular');?>
    <?php get_template_part('template-parts/common/offer');?>
    <?php get_template_part('template-parts/common/flicker');?>

</main>
<?php get_footer();?>