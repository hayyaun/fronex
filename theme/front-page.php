<?php
/** Industrial homepage inspired by the supplied visual reference. */
defined( 'ABSPATH' ) || exit;
get_header();
$asset = get_template_directory_uri() . '/assets/images/';
$services = array(
    array( 'Automation & robotics', 'Smarter systems. Stronger performance.', 'services-2-768x458.jpg', 'Integrate connected equipment and intelligent controls to make everyday production more precise, predictable, and efficient.' ),
    array( 'Precision engineering', 'Built around the smallest details.', 'services-3-768x458.jpg', 'From initial concepts to final components, bring demanding engineering challenges into focus with thoughtful design and precision.' ),
    array( 'Energy & infrastructure', 'Powering what comes next.', 'services-4-768x458.jpg', 'Design resilient infrastructure and energy systems that support your operation today and adapt to the needs of tomorrow.' ),
    array( 'Advanced manufacturing', 'Better ways to make great things.', 'services-5-768x458.jpg', 'Connect people, processes, and equipment to build manufacturing operations that are ready for their next chapter.' ),
    array( 'Materials & maintenance', 'Reliability, by design.', 'services-6-768x458.jpg', 'Keep essential assets working at their best through considered material choices, preventive care, and continuous improvement.' ),
);
?>
<main id="content">
<section class="hero" aria-labelledby="hero-title">
    <div class="hero-copy">
        <p class="eyebrow"><span class="status-dot"></span> Engineering a better tomorrow</p>
        <h1 id="hero-title">Big ideas.<br>Built for <span class="outline-text">industry.</span></h1>
        <div class="hero-bottom"><p>Practical expertise. Progressive thinking. Industrial solutions that move your business forward.</p><a class="button" href="#services">Explore our expertise <span aria-hidden="true">↗</span></a></div>
    </div>
    <div class="hero-photo"><img src="<?php echo esc_url( $asset . 'h1-banner3.jpg' ); ?>" alt="Industrial facility illuminated at sunset" fetchpriority="high" width="540" height="597"><div class="photo-label"><span>Ideas into impact.</span><span aria-hidden="true">↗</span></div></div>
    <a class="scroll-cue" href="#about">Scroll to discover <span aria-hidden="true">↓</span></a>
</section>
<div class="ticker" aria-hidden="true"><div class="ticker-track"><span>ENGINEER THE FUTURE ✳ BUILT TO LAST ✳ THINK FORWARD ✳ </span><span>ENGINEER THE FUTURE ✳ BUILT TO LAST ✳ THINK FORWARD ✳ </span></div></div>
<section id="about" class="section about">
    <div class="section-heading reveal"><p class="eyebrow">01 / Who we are</p><h2>Your ambition.<br>Our <em>expertise.</em></h2></div>
    <div class="about-grid"><div class="about-image reveal"><img loading="lazy" src="<?php echo esc_url( $asset . 'h1-banner5.jpg' ); ?>" alt="Industrial engineering at work" width="640" height="660"><span class="image-stamp">THINK BIG.<br>BUILD BETTER.</span></div><div class="about-copy reveal"><p class="lead">Progress takes more than a good idea. It takes people who know how to make it happen.</p><p>At Fronex, we bring a practical, collaborative approach to complex industrial challenges. From smarter production to more resilient infrastructure, we help turn possibility into lasting progress.</p><a class="text-link" href="#contact">Let’s build something together <span aria-hidden="true">↗</span></a><div class="values"><div><span>01</span><h3>People first</h3><p>Good partnerships are the foundation of great work.</p></div><div><span>02</span><h3>Forward thinking</h3><p>Thoughtful technology with a practical purpose.</p></div><div><span>03</span><h3>Built with care</h3><p>Quality that carries through every detail.</p></div></div></div></div>
</section>
<section id="services" class="section services">
    <div class="section-heading reveal"><p class="eyebrow">02 / Our expertise</p><h2>Solutions for a<br>world in <em>motion.</em></h2><p class="heading-description">Connected expertise, from the factory floor to the infrastructure around it.</p></div>
    <div class="service-list">
    <?php foreach ( $services as $i => $service ) : ?>
        <details class="service reveal" <?php echo 0 === $i ? 'open' : ''; ?>>
            <summary><span class="service-number"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><h3><?php echo esc_html( $service[0] ); ?></h3><span class="service-toggle" aria-hidden="true">+</span></summary>
            <div class="service-body"><img loading="lazy" src="<?php echo esc_url( $asset . $service[2] ); ?>" alt="<?php echo esc_attr( $service[0] ); ?>" width="768" height="458"><div><h4><?php echo esc_html( $service[1] ); ?></h4><p><?php echo esc_html( $service[3] ); ?></p><a class="text-link" href="#contact">Discuss your project <span aria-hidden="true">↗</span></a></div></div>
        </details>
    <?php endforeach; ?>
    </div>
</section>
<section id="projects" class="section projects">
    <div class="section-heading reveal"><p class="eyebrow">03 / Possibilities in practice</p><h2>A new perspective.<br>A stronger <em>outcome.</em></h2><p class="heading-description">Illustrative project concepts showing where industrial thinking can take us.</p></div>
    <div class="project-grid">
    <?php foreach ( array( array( 'projects-11-768x436.jpg', '01 / Smart manufacturing', 'A more connected factory' ), array( 'projects-12-768x436.jpg', '02 / Infrastructure', 'Powering the next generation' ), array( 'projects-6-768x436.jpg', '03 / Industrial innovation', 'Precision at every scale' ) ) as $project ) : ?>
        <a class="project-card reveal" href="#contact"><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $asset . $project[0] ); ?>" alt="<?php echo esc_attr( $project[2] ); ?>" width="768" height="436"><span class="round-arrow" aria-hidden="true">↗</span></div><p class="eyebrow"><?php echo esc_html( $project[1] ); ?></p><h3><?php echo esc_html( $project[2] ); ?></h3></a>
    <?php endforeach; ?>
    </div>
</section>
<section id="team" class="section team">
    <div class="section-heading reveal"><p class="eyebrow">04 / The human element</p><h2>Great work.<br>Even better <em>people.</em></h2><p class="heading-description">Meet the roles behind an integrated industrial team. Sample profiles for this design.</p></div>
    <div class="team-grid">
    <?php foreach ( array( array( 'team-1.jpg', 'Engineering', 'Turning complex challenges into clear solutions' ), array( 'team-2.jpg', 'Operations', 'Keeping people and processes moving together' ), array( 'team-3.jpg', 'Innovation', 'Exploring better ways to build the future' ), array( 'team-4.jpg', 'Partnerships', 'Making every collaboration count' ) ) as $person ) : ?>
        <article class="team-card reveal"><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $asset . $person[0] ); ?>" alt="Sample portrait for the <?php echo esc_attr( strtolower( $person[1] ) ); ?> team" width="480" height="600"></div><h3><?php echo esc_html( $person[1] ); ?></h3><p><?php echo esc_html( $person[2] ); ?></p></article>
    <?php endforeach; ?>
    </div>
</section>
<section class="section testimonials" aria-labelledby="testimonials-title">
    <div class="testimonial-intro reveal"><p class="eyebrow">05 / Working together</p><h2 id="testimonials-title">Partnerships<br>that make a<br><em>difference.</em></h2><p>Sample testimonials for layout preview.</p></div>
    <div class="quote-area reveal"><span class="quote-mark" aria-hidden="true">“</span><div class="quote-slides" aria-live="polite">
    <figure class="quote-slide"><blockquote>“The best results come from a team that listens carefully, thinks practically, and cares about the details as much as you do.”</blockquote><figcaption><strong>A shared ambition</strong><span>Example client perspective · Manufacturing</span></figcaption></figure>
    <figure class="quote-slide" hidden><blockquote>“A fresh perspective can change more than a single project. It can change the way you see the future of your entire operation.”</blockquote><figcaption><strong>A forward-looking partnership</strong><span>Example client perspective · Engineering</span></figcaption></figure>
    <figure class="quote-slide" hidden><blockquote>“Clear communication and thoughtful engineering bring confidence to even the most complex industrial challenges.”</blockquote><figcaption><strong>Confidence at every step</strong><span>Example client perspective · Infrastructure</span></figcaption></figure>
    </div><div class="quote-controls"><button type="button" data-quote="-1" aria-label="Previous testimonial">←</button><span class="quote-count">01 / 03</span><button type="button" data-quote="1" aria-label="Next testimonial">→</button></div></div>
</section>
<section id="contact" class="section contact">
    <p class="eyebrow reveal">06 / Your next chapter starts here</p><div class="contact-row reveal"><h2>Ready to build<br><em>what’s next?</em></h2><a class="contact-arrow" href="<?php echo esc_url( 'mailto:' . antispambot( get_option( 'admin_email' ) ) ); ?>" aria-label="Email Fronex about your project">↗</a></div><div class="contact-bottom reveal"><p>Bring your challenge. Share your ambition.<br>Let’s find a better way forward, together.</p><a class="text-link" href="<?php echo esc_url( 'mailto:' . antispambot( get_option( 'admin_email' ) ) ); ?>">Start a conversation <span aria-hidden="true">↗</span></a></div>
</section>
<?php $news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true ) ); ?>
<?php if ( $news->have_posts() ) : ?>
<section id="insights" class="section insights"><div class="section-heading reveal"><p class="eyebrow">07 / Fresh perspectives</p><h2>Ideas worth<br><em>exploring.</em></h2></div><div class="news-grid">
<?php $n = 0; while ( $news->have_posts() ) : $news->the_post(); $fallbacks = array( 'blog-1.jpg', 'blog-2.jpg', 'blog-6.jpg' ); ?>
<article class="news-card reveal"><a href="<?php the_permalink(); ?>"><div class="image-zoom"><?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); else : ?><img loading="lazy" src="<?php echo esc_url( $asset . $fallbacks[ $n % 3 ] ); ?>" alt="" width="768" height="500"><?php endif; ?></div><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?> <span aria-hidden="true">↗</span></p><h3><?php the_title(); ?></h3></a></article>
<?php ++$n; endwhile; wp_reset_postdata(); ?>
</div></section>
<?php endif; ?>
</main>
<?php get_footer(); ?>
