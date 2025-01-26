<?php @session_start();
get_includes('head');
get_includes('header');
get_includes('nav');
get_includes('banner');
?>
<?php if ( is_page('home') ) { get_includes('middle'); }?>

<!-- Main -->
<div id="main_area">
	<div class="wrapper">
	<div class="main_con">
			<?php if(is_front_page()) { ?>
				<div class="main_images hidden">
					<figure class="main_img1 wow fadeInUp" data-wow-duration="1955ms" data-wow-delay="1s"><img src="<?php bloginfo('template_url');?>/images/main/main-img1.png" alt=" professional nurse"></figure>
					<figure class="main_img2 wow fadeInUp" data-wow-duration="1955ms"><img src="<?php bloginfo('template_url');?>/images/main/main-img2.png" alt=" professional "></figure>
				</div>
			<?php }?>

			<div class="main_cont">
				<main>
					<?php if(!is_page('home')) { ?>
					<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); } ?>
					<?php }?>
					<?php get_template_part('loop','home') ?>
					
				</main>

			<?php if ( is_front_page() ) { get_includes('mainExtra'); }?>
		</div>	

		</div>

	<div class="clearfix"></div>
	</div>
</div>
<!-- End Main -->


<?php if ( is_page('home') ) { get_includes('bottom'); }?>
<?php get_includes('footer');?>

