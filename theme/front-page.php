<?php
/** Industrial homepage inspired by the supplied visual reference. */
defined( 'ABSPATH' ) || exit;
get_header();
$asset = get_template_directory_uri() . '/assets/images/';
$services = array(
    array( 'Automation & robotics', 'Smarter systems. Stronger performance.', 'projects-6-768x436.jpg', 'Integrate connected equipment and intelligent controls to make everyday production more precise, predictable, and efficient.' ),
    array( 'Precision engineering', 'Built around the smallest details.', 'services-3-768x458.jpg', 'From initial concepts to final components, bring demanding engineering challenges into focus with thoughtful design and precision.' ),
    array( 'Energy & infrastructure', 'Powering what comes next.', 'services-4-768x458.jpg', 'Design resilient infrastructure and energy systems that support your operation today and adapt to the needs of tomorrow.' ),
    array( 'Advanced manufacturing', 'Better ways to make great things.', 'services-5-768x458.jpg', 'Connect people, processes, and equipment to build manufacturing operations that are ready for their next chapter.' ),
    array( 'Materials & maintenance', 'Reliability, by design.', 'services-6-768x458.jpg', 'Keep essential assets working at their best through considered material choices, preventive care, and continuous improvement.' ),
);
?>
<main id="content">
<section class="hero" aria-labelledby="hero-title">
    <div class="hero-copy"><h1 id="hero-title">Smart industry<br>solutions</h1><p>Innovative thinking for a sustainable<br>tomorrow. Built with precision.</p><a class="button" href="#services">Our expertise <span aria-hidden="true">↗</span></a></div>
    <div class="hero-stat"><strong>360°</strong><span>Your ambition.<br>Our complete focus.</span><i aria-hidden="true"></i></div>
    <div class="hero-wordmark" aria-hidden="true">FRONEX</div>
</section>
<section class="feature-strip" aria-label="Our principles">
    <article><span>(01)</span><h3>Professional<br>ethics</h3><p>Integrity is at the heart of our work. Open communication and a commitment to quality guide every decision.</p></article>
    <article><span>(02)</span><h3>High technology<br>factory</h3><p>Smarter equipment and connected systems bring practical innovation to the factory floor.</p></article>
    <article><span>(03)</span><h3>High standard<br>engineering</h3><p>A careful approach to precision, performance, and reliability. Built around your needs.</p></article>
    <a class="feature-photo" href="#contact"><img src="<?php echo esc_url( $asset . 'industry-team.jpg' ); ?>" alt="Industrial engineer on site"><h3>Be part of our<br>industrial<br>success.</h3><span aria-hidden="true">↗</span></a>
</section>
<section id="about" class="section about"><span class="section-watermark" aria-hidden="true">ABOUT</span>
    <img class="about-illustration" src="<?php echo esc_url( $asset . 'h1-bg01.png' ); ?>" alt="" loading="lazy"><div class="about-grid"><div class="about-image reveal"><img loading="lazy" src="<?php echo esc_url( $asset . 'h1-banner3.jpg' ); ?>" alt="Industrial facility at sunset" width="540" height="597"><span class="image-stamp"><strong>Built</strong>FOR WHAT<br>COMES NEXT<i aria-hidden="true"></i></span></div>
    <div class="about-copy reveal"><p class="eyebrow">What we do</p><h2>Trusted expertise.<br>Forward-thinking industry.</h2><p class="lead">Welcome to Fronex. We bring practical expertise and fresh thinking to industrial challenges.</p><p>From smarter production to more resilient infrastructure, we connect people, technology, and ideas to create meaningful progress.</p><ul class="about-points"><li>A collaborative approach to every challenge</li><li>Precision engineering and considered design</li><li>Solutions built around your operation</li></ul><a class="button" href="#contact">More about us <span aria-hidden="true">↗</span></a></div></div>
</section>
<div class="ticker" aria-hidden="true"><div class="ticker-track"><span>INNOVATION ✦ TECHNOLOGY ✦ INDUSTRY ✦ </span><span>INNOVATION ✦ TECHNOLOGY ✦ INDUSTRY ✦ </span></div></div>
<section id="services" class="section services grid-lines">
    <div class="section-heading reveal"><div><p class="eyebrow">Industrial services</p><h2>A selection of<br>industries we<br>serve</h2></div><div class="heading-description"><p>Connected industrial expertise, supplying technical services, equipment, and practical solutions for complex challenges.</p><a class="button yellow" href="#contact">Discuss your requirements ↗</a></div></div>
    <div class="service-stack" data-service-carousel>
    <?php foreach ( $services as $i => $service ) : ?>
        <article class="service-card<?php echo 0 === $i ? ' is-active' : ''; ?>" data-service-card="<?php echo (int) $i; ?>">
            <div class="service-copy"><span class="service-number"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><h3><?php echo esc_html( $service[0] ); ?></h3><ul class="plus-list"><li>Engineering &amp; design</li><li>Focused on your operation</li><li>A dependable project partner</li></ul><p><?php echo esc_html( $service[3] ); ?></p><a class="text-link" href="#contact">More details ↗</a></div>
            <img loading="lazy" src="<?php echo esc_url( $asset . $service[2] ); ?>" alt="<?php echo esc_attr( $service[0] ); ?>" width="768" height="458">
        </article>
    <?php endforeach; ?>
    </div>
    <div class="service-controls" aria-label="Service cards">
        <button type="button" data-service-prev aria-label="Previous service">←</button>
        <span data-service-count>01 / <?php echo esc_html( sprintf( '%02d', count( $services ) ) ); ?></span>
        <button type="button" data-service-next aria-label="Next service">→</button>
    </div>
</section>
<section id="projects" class="section projects grid-lines">
    <img class="project-illustration" loading="lazy" src="<?php echo esc_url( $asset . 'h1-banner4.png' ); ?>" alt="">
    <div class="section-heading reveal"><div><p class="eyebrow">Project possibilities</p><h2>Delivering our<br>clients more<br>project clarity</h2></div></div>
    <div class="project-grid">
    <?php foreach ( array( array( 'projects-12-768x436.jpg', 'Manufacturing', 'Energy efficient factory infrastructure' ), array( 'projects-11-768x436.jpg', 'Engineering', 'Precision engineering & industrial innovation' ) ) as $project ) : ?>
        <a class="project-card reveal" href="#contact"><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $asset . $project[0] ); ?>" alt="<?php echo esc_attr( $project[2] ); ?>" width="768" height="436"><span class="project-category"><?php echo esc_html( $project[1] ); ?></span></div><div class="project-caption"><h3><?php echo esc_html( $project[2] ); ?></h3><span aria-hidden="true">↗</span></div></a>
    <?php endforeach; ?>
    </div>
</section>
<section id="team" class="section team">
    <div class="section-heading centered reveal"><p class="eyebrow">Meet our team</p><h2>Meet the industry<br>pioneers</h2></div>
    <div class="team-grid">
    <?php foreach ( array( array( 'team-1.jpg', 'Engineering team', 'Precision & design' ), array( 'team-3.jpg', 'Production team', 'Operations & quality' ), array( 'team-5.jpg', 'People & partnerships', 'Collaboration & progress' ) ) as $person ) : ?>
        <article class="team-card reveal"><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $asset . $person[0] ); ?>" alt="Sample portrait for the <?php echo esc_attr( strtolower( $person[1] ) ); ?> team" width="480" height="600"></div><h3><?php echo esc_html( $person[1] ); ?></h3><p><?php echo esc_html( $person[2] ); ?></p></article>
    <?php endforeach; ?>
    </div>
</section>
<section class="section offer grid-lines">
    <div class="reveal"><p class="eyebrow">What we offer</p><h2>Get premium<br>industrial services</h2><div class="offer-grid"><article><span class="offer-icon" aria-hidden="true"><svg width="34" height="34" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 28V15l9-5v7l9-6v17H3Zm18 0V5h6l2 23h-8ZM7 21h3m4 0h3M7 25h3m4 0h3M23 2h5"/></svg></span><div><h3>Full service</h3><p>Connected expertise from the first conversation through project delivery.</p></div></article><article><span class="offer-icon" aria-hidden="true">⚒</span><div><h3>Maintenance</h3><p>Practical support to keep your equipment and operation performing.</p></div></article></div><a class="button yellow" href="#contact">Contact us ↗</a></div><span class="offer-wordmark" aria-hidden="true">INDUSTRY</span>
</section>
<section class="section testimonials" aria-labelledby="testimonials-title">
    <div class="testimonial-photo reveal"><img loading="lazy" src="<?php echo esc_url( $asset . 'h1-banner5.jpg' ); ?>" alt="Engineer wearing safety equipment" width="640" height="660"></div>
    <div class="testimonial-content reveal"><p class="eyebrow">Testimonials</p><h2 id="testimonials-title">Hear from our<br>satisfied<br>customers</h2><div class="quote-area"><span class="quote-mark" aria-hidden="true">“</span><div class="quote-slides" aria-live="polite">
    <figure class="quote-slide"><blockquote>“The best results come from a team that listens carefully, thinks practically, and cares about the details as much as you do.”</blockquote><figcaption><img src="<?php echo esc_url( $asset . 'avatar-2.jpg' ); ?>" alt="" loading="lazy"><div><strong>A shared ambition</strong><span>Illustrative testimonial · Manufacturing</span></div></figcaption></figure>
    <figure class="quote-slide" hidden><blockquote>“A fresh perspective can change more than a single project. It can change the way you see the future of your entire operation.”</blockquote><figcaption><strong>A forward-looking partnership</strong><span>Illustrative testimonial · Engineering</span></figcaption></figure>
    <figure class="quote-slide" hidden><blockquote>“Clear communication and thoughtful engineering bring confidence to even the most complex industrial challenges.”</blockquote><figcaption><strong>Confidence at every step</strong><span>Illustrative testimonial · Infrastructure</span></figcaption></figure>
    </div><div class="quote-controls"><button type="button" data-quote="-1" aria-label="Previous testimonial">←</button><span class="quote-count">01 / 03</span><button type="button" data-quote="1" aria-label="Next testimonial">→</button></div></div></div>
</section>
<section id="contact" class="section contact grid-lines">
    <div class="contact-copy reveal"><p class="eyebrow">Get in touch</p><h2>Ready to<br>build? Start<br>talk.</h2><div class="contact-details"><div><h3>Our approach</h3><p>Your challenge.<br>Our expertise.<br>One shared ambition.</p></div><div><h3>Support</h3><a href="<?php echo esc_url( 'mailto:' . get_option( 'admin_email' ) ); ?>">Email our team ↗</a><p>Let’s discuss your next project.</p></div></div></div>
    <form class="contact-form reveal" data-recipient="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>">
        <label>Full name<input name="name" autocomplete="name" placeholder="Your name" required maxlength="100"></label>
        <label>Phone<input name="phone" type="tel" autocomplete="tel" placeholder="Your phone number" maxlength="50"></label>
        <label>Email address *<input name="email" type="email" autocomplete="email" placeholder="you@company.com" required maxlength="150"></label>
        <label>Services *<select name="service" required><option value="">Select a service</option><?php foreach ( $services as $service ) : ?><option><?php echo esc_html( $service[0] ); ?></option><?php endforeach; ?></select></label>
        <label class="form-wide">Write message *<textarea name="message" placeholder="Tell us about your project…" required maxlength="3000" rows="5"></textarea></label>
        <div class="form-wide"><button class="button yellow" type="submit">Prepare email ↗</button><p class="form-note" role="status">Opens a draft in your email app for you to send.</p></div>
    </form>
</section>
<?php $news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true ) ); ?>

<section id="insights" class="section insights"><div class="section-heading centered reveal"><p class="eyebrow">Blog &amp; news</p><h2>Our articles, latest news<br>&amp; perspectives</h2></div><div class="news-grid">
<?php $n = 0; while ( $news->have_posts() ) : $news->the_post(); $fallbacks = array( 'blog-1.jpg', 'blog-2.jpg', 'blog-6.jpg' ); ?>
<article class="news-card reveal"><a href="<?php the_permalink(); ?>"><div class="image-zoom"><?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); else : ?><img loading="lazy" src="<?php echo esc_url( $asset . $fallbacks[ $n % 3 ] ); ?>" alt="" width="768" height="500"><?php endif; ?></div><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?> <span aria-hidden="true">↗</span></p><h3><?php the_title(); ?></h3><span class="text-link">Read more ↗</span></a></article>
<?php ++$n; endwhile; wp_reset_postdata(); ?>
<?php
$reading = array(
    array( 'blog-12.jpg', 'Smarter automation on the factory floor', 'A connected factory starts with visibility. Map the production process, identify repetitive work, and measure where automation could improve consistency before choosing equipment.' ),
    array( 'blog-13.jpg', 'Building resilient industrial systems', 'Reliability begins with understanding dependencies. Review critical equipment, maintenance schedules, and supply routes together to identify the areas that need a stronger backup plan.' ),
    array( 'blog-14.jpg', 'A more efficient approach to energy', 'Begin with a baseline of how and when energy is used. Small operational changes, preventive maintenance, and better monitoring can reveal practical opportunities for improvement.' ),
);
for ( $j = $n; $j < 3; ++$j ) : $idea = $reading[ $j ]; ?>
<article class="news-card reveal"><details class="reading-card"><summary><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $asset . $idea[0] ); ?>" alt="" width="768" height="500"></div><p class="eyebrow">Industry perspective</p><h3><?php echo esc_html( $idea[1] ); ?></h3><span class="text-link">Read more ↗</span></summary><p class="reading-content"><?php echo esc_html( $idea[2] ); ?></p></details></article>
<?php endfor; ?>
</div></section>
</main>
<?php get_footer(); ?>
