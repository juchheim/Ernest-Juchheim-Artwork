<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ernest_Juchheim_Artwork
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="Discover fine art digital downloads for creating stunning prints. Expressive pet paintings with vibrant colors and dynamic brush strokes. Perfect for home decor and art lovers.">
    <meta name="keywords" content="Fine Art, Digital Downloads, Art Prints, Pet Paintings, Expressive Color, Brush Strokes, Pet Portraits, Abstract Art, Colorful Art, Home Decor, Wall Art, Animal Art, Modern Art">
    <meta name="author" content="Ernest Juchheim">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Ernest Juchheim Artwork - Fine Art Digital Downloads">
    <meta property="og:description" content="Explore a collection of fine art digital downloads, featuring expressive pet paintings with vibrant colors and dynamic brush strokes. Perfect for prints and home decor.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ernest Juchheim Artwork - Fine Art Digital Downloads">
    <meta name="twitter:description" content="Discover fine art digital downloads for creating stunning prints. Expressive pet paintings with vibrant colors and dynamic brush strokes. Perfect for home decor and art lovers.">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/images/twitter-image.jpg">

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ernest-juchheim-artwork' ); ?></a>

    <header id="masthead" class="site-header">
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="hamburger-icon">&#9776;</span> <!-- Unicode for hamburger menu icon -->
            </button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->

        <div class="header-background"></div>
        <div class="site-branding">
            <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $ernest_juchheim_artwork_description = get_bloginfo( 'description', 'display' );
            if ( $ernest_juchheim_artwork_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $ernest_juchheim_artwork_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">




<script>

document.addEventListener('DOMContentLoaded', function() {
    console.log('Custom JS loaded');
    var menuToggle = document.querySelector('.menu-toggle');
    var menu = document.querySelector('.main-navigation');

    menuToggle.addEventListener('click', function() {
        console.log('Hamburger clicked');
        menu.classList.toggle('toggled');
        var expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
        menuToggle.setAttribute('aria-expanded', !expanded);
    });
});



</script>