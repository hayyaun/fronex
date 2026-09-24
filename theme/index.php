<?php
defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="content">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( is_singular() ) : ?>
                    <h1><?php echo esc_html( get_the_title() ); ?></h1>
                <?php else : ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
                <?php endif; ?>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
            </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <h1><?php esc_html_e( 'Nothing found', 'local-theme' ); ?></h1>
        <?php get_search_form(); ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
