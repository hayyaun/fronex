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
<header>
    <p class="dev-banner"><?php esc_html_e( 'Local theme is live — hello from Docker!', 'local-theme' ); ?></p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
    <p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
</header>
