<footer class="footer">
    <div class="footer-container">
        <!-- Logo and Navigation -->
        <div class="footer-left">
            <h2 class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php 
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/images/main-logo.png" alt="ChanDesigns Logo">';
                    }
                    ?>
                </a>
            </h2>
            <nav>
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'menu_class' => '',
                    'container' => false,
                    'link_before' => '',
                    'link_after' => ' |',
                ]);
                ?>
            </nav>
            <p>&copy; ChanDesigns <?php echo date('Y'); ?></p>
        </div>

        <!-- Address and Contact Info -->
        <div class="footer-center">
            <p>Katipunan St.<br>Labangon, Cebu City 6000</p>
            <p><i class="fa fa-phone"></i> +639369421194</p>
            <p><i class="fa fa-envelope"></i> 
                <a href="mailto:christianbagatua18.com">christianbagatua18.com</a>
            </p>
        </div>

        <!-- About and Social Links -->
        <div class="footer-right">
            <h3>About the company</h3>
            <p>ChanDesigns is a premier web design agency dedicated to delivering customized solutions for businesses and individuals. With a passion for creativity and a focus on functionality, we design websites that not only look great but also drive results.</p>
            <div class="social-icons">
                <?php if (is_active_sidebar('footer-social-links')) {
                     dynamic_sidebar('footer-social-links');
                } ?>
            </div>
        </div>
    </div>
</footer>

<!-- Add Particles.js -->
<div id="particles-js"></div>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/particle.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php wp_footer(); ?>
</body>
</html>
