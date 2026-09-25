<?php defined( 'ABSPATH' ) || exit; ?>
<footer class="site-footer grid-lines">
    <div class="footer-wordmark" aria-hidden="true"><?php fronex_home_text( 'footer_text_fronex' ); ?></div>
    <div class="footer-panel">
        <div class="footer-top">
            <div class="footer-company"><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="brand-symbol" aria-hidden="true">✳</span> <?php fronex_home_text( 'footer_text_fronex_2' ); ?></a><p><?php fronex_home_text( 'footer_description_forward_thinking_solid_foundations' ); ?></p><a href="<?php echo esc_url( 'mailto:' . fronex_home_value( 'contact_email' ) ); ?>"><?php fronex_home_text( 'footer_link_label_contact_our_team' ); ?></a></div>
            <nav aria-label="Footer navigation"><h3><?php fronex_home_text( 'footer_heading_quick_links' ); ?></h3><div class="footer-links"><?php foreach ( array( 'about' => 'About us', 'services' => 'Services', 'projects' => 'Projects', 'team' => 'Our team', 'insights' => 'News', 'contact' => 'Contact' ) as $id => $label ) : ?><a href="<?php echo esc_url( home_url( '/#' . $id ) ); ?>"><?php echo esc_html( $label ); ?></a><?php endforeach; ?></div></nav>
            <div class="footer-subscribe"><h3><?php fronex_home_text( 'footer_heading_fresh_perspectives_stay_in_touch' ); ?></h3><p><?php fronex_home_text( 'footer_description_follow_our_latest_articles_and_updates_in_your_preferre' ); ?></p><a class="feed-link" href="<?php echo esc_url( get_feed_link() ); ?>"><?php fronex_home_text( 'footer_link_label_subscribe_via_rss' ); ?> <span aria-hidden="true">↗</span></a></div>
        </div>
        <div class="footer-bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php fronex_home_text( 'footer_text_fronex_3' ); ?></span><a href="<?php echo esc_url( fronex_home_value( 'footer_link_destination_content' ) ); ?>"><?php fronex_home_text( 'footer_link_label_back_to_top' ); ?></a></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
