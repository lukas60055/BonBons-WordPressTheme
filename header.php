<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <div class="header-inner">
            <div class="header-title">
                <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                    <a href="<?php echo esc_url(home_url()); ?>" rel="home">
                        <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                    </a>
                <?php } ?>
            </div>
            <svg class="nav-toggle" width="50" height="50" viewBox="0 0 50 50">
                <g>
                    <line class="toggle-line" x1="13" y1="16.5" x2="37" y2="16.5"/>
                    <line class="toggle-line" x1="13" y1="24.5" x2="37" y2="24.5"/>
                    <line class="toggle-line" x1="13" y1="32.5" x2="37" y2="32.5"/>
                </g>
            </svg>
            <nav class="header-navigation">
                <ul class="menu-top">
                <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(
                            array(
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'primary',
                            )
                        );
                    }
                ?>
                </ul>
            </nav>
        </div>
    </header>