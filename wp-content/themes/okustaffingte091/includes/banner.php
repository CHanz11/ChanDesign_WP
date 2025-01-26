<!-- Banner -->
<div id="banner">
	<div class="wrapper">
		<div class="bnr_con">

    <?php if (is_front_page() ) { ?>

			<div class="slider">
				<ul class="rslides rslide_desktop">
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/1.png" alt="group of professional nurses"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/2.png" alt="group of professionals smiling"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/3.png" alt="group of professionals doing meeting"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/4.png" alt="two professional doing discussion"></figure></li>
				</ul>

				<ul class="rslides rslide_tablet">
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/tab1.png" alt="group of professional nurses"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/tab2.png" alt="group of professionals smiling"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/tab3.png" alt="group of professionals doing meeting"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/tab4.png" alt="two professional doing discussion"></figure></li>
				</ul>

				<ul class="rslides rslide_mobile">
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/mobile1.png" alt="group of professional nurses"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/mobile2.png" alt="group of professionals smiling"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/mobile3.png" alt="group of professionals doing meeting"></figure></li>
					<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/mobile4.png" alt="two professional doing discussion"></figure></li>
				</ul>
				<div class="box_skitter box_skitter_large">
					<ul>
						<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/1.png" alt="group of professional nurses" class="fade"></figure></li>
						<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/2.png" alt="group of professionals smiling" class="fade"></figure></li>
						<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/3.png" alt="group of professionals doing meeting" class="fade"></figure></li>
						<li><figure><img src="<?php bloginfo('template_url');?>/images/slider/4.png" alt="two professional doing discussion" class="fade"></figure></li>
					</ul>
				</div>
			</div>

			<div class="bnr_info wow slideInLeft" data-wow-duration="1545ms">
			<?php dynamic_sidebar('bnr_info');?>
			
			</div>

                        <?php } else { ?>
                        <div class="non_ban">
                        <div class="non_ban_img">
                        <?php if(is_home() && is_author() && is_category() && is_tag() && is_single()) { ?>
                          <?php if (has_post_thumbnail() ) {?>
                              <?php the_post_thumbnail('full');?>
                          <?php }else{ ?>
                              <figure><img src="<?php bloginfo('template_url');?>/images/nh-banner.png" alt="professional doctor and nurses happy" /></figure>
                          <?php } ?>
                          <?php } elseif (!is_home() && !is_author() && !is_category() && !is_tag() && !is_single() && has_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail('full');?>
                          <?php } else { ?>
                            <img src="<?php bloginfo('template_url'); ?>/images/nh-banner.png" alt="professional doctor and nurses happy">
                          <?php } ?>
                        </div>

                            <div class="page_title">
                                <?php if(!is_home() && !is_author() && !is_category() && !is_tag() && !is_single()) { ?>
                                <h1 class="h1_title"><?php the_title(); ?></h1>
                                <?php echo do_shortcode("[short_title id='" . get_the_ID() . "']"); ?>
                                <?php } else { ?>
                                <h1 class="h1_title">Blog</h1>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }?>

		</div>
	</div>
</div>
<!-- End Banner -->