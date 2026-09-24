<?php defined( 'ABSPATH' ) || exit; ?>
<footer class="site-footer grid-lines">
    <div class="footer-wordmark" aria-hidden="true">✳ fronex</div>
    <div class="footer-panel">
        <div class="footer-top">
            <div class="footer-company"><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="brand-symbol" aria-hidden="true">✳</span> fronex.</a><p>Forward thinking.<br>Solid foundations.</p><a href="<?php echo esc_url( 'mailto:' . get_option( 'admin_email' ) ); ?>">Contact our team ↗</a></div>
            <nav aria-label="Footer navigation"><h3>Quick links</h3><div class="footer-links"><?php foreach ( array( 'about' => 'About us', 'services' => 'Services', 'projects' => 'Projects', 'team' => 'Our team', 'insights' => 'News', 'contact' => 'Contact' ) as $id => $label ) : ?><a href="<?php echo esc_url( home_url( '/#' . $id ) ); ?>"><?php echo esc_html( $label ); ?></a><?php endforeach; ?></div></nav>
            <div class="footer-subscribe"><h3>Fresh perspectives.<br>Stay in touch.</h3><p>Follow our latest articles and updates in your preferred feed reader.</p><a class="feed-link" href="<?php echo esc_url( get_feed_link() ); ?>">Subscribe via RSS <span aria-hidden="true">↗</span></a></div>
        </div>
        <div class="footer-bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Fronex.</span><a href="#content">Back to top ↑</a></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
