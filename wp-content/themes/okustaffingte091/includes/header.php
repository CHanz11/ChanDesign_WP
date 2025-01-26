<header class="header">
    <div class="container">
        <h1 class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/images/main-logo.png" alt="ChanDesigns Logo">';
                }
                ?>
            </a>
        </h1>
        <nav class="navigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary-menu',
                'menu_class' => 'nav-links',
                'container' => false,
            ]);
            ?>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </div>
    <div class="overlay"></div> <!-- Blur overlay -->
</header>
