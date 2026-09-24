<?php defined( 'ABSPATH' ) || exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'local-theme' ); ?></a>
<header class="site-header">
    <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Fronex home"><span class="brand-symbol" aria-hidden="true">✳</span> fronex<span class="brand-period">.</span></a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">Menu <span aria-hidden="true">☰</span></button>
    <nav id="primary-nav" class="primary-nav" aria-label="Main navigation">
        <?php foreach ( array( 'about' => 'About us', 'services' => 'Expertise', 'projects' => 'Projects', 'team' => 'Our people' ) as $id => $label ) : ?><a href="<?php echo esc_url( home_url( '/#' . $id ) ); ?>"><?php echo esc_html( $label ); ?></a><?php endforeach; ?>
        <a class="nav-contact" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Let’s talk <span aria-hidden="true">↗</span></a>
    </nav>
</header>
