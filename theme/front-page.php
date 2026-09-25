<?php
/** Industrial homepage inspired by the supplied visual reference. */
defined( 'ABSPATH' ) || exit;
// Render before the header so Fluent Forms can enqueue its styles in wp_head.
$contact_form_id = absint( fronex_home_value( 'contact_form_id' ) );
$contact_form = shortcode_exists( 'fluentform' ) && $contact_form_id > 0
    ? do_shortcode( sprintf( '[fluentform id="%d"]', $contact_form_id ) ) : '';
get_header();
$services = array(
    array( fronex_home_value( 'services_card_1_title' ), '', fronex_home_value( 'services_card_1_image' ), fronex_home_value( 'services_card_1_description' ) ),
    array( fronex_home_value( 'services_card_2_title' ), '', fronex_home_value( 'services_card_2_image' ), fronex_home_value( 'services_card_2_description' ) ),
    array( fronex_home_value( 'services_card_3_title' ), '', fronex_home_value( 'services_card_3_image' ), fronex_home_value( 'services_card_3_description' ) ),
    array( fronex_home_value( 'services_card_4_title' ), '', fronex_home_value( 'services_card_4_image' ), fronex_home_value( 'services_card_4_description' ) ),
    array( fronex_home_value( 'services_card_5_title' ), '', fronex_home_value( 'services_card_5_image' ), fronex_home_value( 'services_card_5_description' ) ),
);
?>
<main id="content">
<section class="hero" aria-labelledby="hero-title">
    <div class="hero-copy"><h1 id="hero-title"><?php fronex_home_text( 'hero_heading_smart_industry_solutions' ); ?></h1><p><?php fronex_home_text( 'hero_description_innovative_thinking_for_a_sustainable_tomorrow_built_w' ); ?></p><a class="button" href="<?php echo esc_url( fronex_home_value( 'hero_link_destination_services' ) ); ?>"><?php fronex_home_text( 'hero_link_label_our_expertise' ); ?> <span aria-hidden="true">↗</span></a></div>
    <div class="hero-stat"><strong><?php fronex_home_text( 'hero_statistic' ); ?></strong><span><?php fronex_home_text( 'hero_text_your_ambition_our_complete_focus' ); ?></span><i aria-hidden="true"></i></div>
    <div class="hero-wordmark" aria-hidden="true"><?php fronex_home_text( 'hero_text_fronex' ); ?></div>
</section>
<section class="feature-strip" aria-label="Our principles">
    <article><span>(01)</span><h3><?php fronex_home_text( 'principles_heading_professional_ethics' ); ?></h3><p><?php fronex_home_text( 'principles_description_integrity_is_at_the_heart_of_our_work_open_communicati' ); ?></p></article>
    <article><span>(02)</span><h3><?php fronex_home_text( 'principles_heading_high_technology_factory' ); ?></h3><p><?php fronex_home_text( 'principles_description_smarter_equipment_and_connected_systems_bring_practical' ); ?></p></article>
    <article><span>(03)</span><h3><?php fronex_home_text( 'principles_heading_high_standard_engineering' ); ?></h3><p><?php fronex_home_text( 'principles_description_a_careful_approach_to_precision_performance_and_relia' ); ?></p></article>
    <a class="feature-photo" href="<?php echo esc_url( fronex_home_value( 'principles_link_destination_contact' ) ); ?>"><img src="<?php echo esc_url( fronex_home_value( 'principles_image_industry_team_jpg' ) ); ?>" alt="<?php echo esc_attr( fronex_home_value( 'principles_image_description_industrial_engineer_on_site' ) ); ?>"><h3><?php fronex_home_text( 'principles_heading_be_part_of_our_industrial_success' ); ?></h3><span aria-hidden="true">↗</span></a>
</section>
<section id="about" class="section about"><span class="section-watermark" aria-hidden="true"><?php fronex_home_text( 'about_text_about' ); ?></span>
    <img class="about-illustration" src="<?php echo esc_url( fronex_home_value( 'about_image_h1_bg01_png' ) ); ?>" alt="" loading="lazy"><div class="about-grid"><div class="about-image reveal"><img loading="lazy" src="<?php echo esc_url( fronex_home_value( 'about_image_h1_banner3_jpg' ) ); ?>" alt="<?php echo esc_attr( fronex_home_value( 'about_image_description_industrial_facility_at_sunset' ) ); ?>" width="540" height="597"><span class="image-stamp"><strong><?php fronex_home_text( 'about_emphasis_built' ); ?></strong><?php fronex_home_text( 'about_emphasis_for_what_comes_next' ); ?><i aria-hidden="true"></i></span></div>
    <div class="about-copy reveal"><p class="eyebrow"><?php fronex_home_text( 'about_description_what_we_do' ); ?></p><h2><?php fronex_home_text( 'about_heading_trusted_expertise_forward_thinking_industry' ); ?></h2><p class="lead"><?php fronex_home_text( 'about_description_welcome_to_fronex_we_bring_practical_expertise_and_fre' ); ?></p><p><?php fronex_home_text( 'about_description_from_smarter_production_to_more_resilient_infrastructur' ); ?></p><ul class="about-points"><li><?php fronex_home_text( 'about_list_item_a_collaborative_approach_to_every_challenge' ); ?></li><li><?php fronex_home_text( 'about_list_item_precision_engineering_and_considered_design' ); ?></li><li><?php fronex_home_text( 'about_list_item_solutions_built_around_your_operation' ); ?></li></ul><a class="button" href="<?php echo esc_url( fronex_home_value( 'about_link_destination_contact' ) ); ?>"><?php fronex_home_text( 'about_link_label_more_about_us' ); ?> <span aria-hidden="true">↗</span></a></div></div>
</section>
<div class="ticker" aria-hidden="true"><div class="ticker-track"><span><?php fronex_home_text( 'ticker_text_innovation_technology_industry' ); ?> </span><span><?php fronex_home_text( 'ticker_text_innovation_technology_industry' ); ?> </span></div></div>
<section id="services" class="section services grid-lines">
    <div class="section-heading reveal"><div><p class="eyebrow"><?php fronex_home_text( 'services_description_industrial_services' ); ?></p><h2><?php fronex_home_text( 'services_heading_a_selection_of_industries_we_serve' ); ?></h2></div><div class="heading-description"><p><?php fronex_home_text( 'services_description_connected_industrial_expertise_supplying_technical_ser' ); ?></p><a class="button yellow" href="<?php echo esc_url( fronex_home_value( 'services_link_destination_contact' ) ); ?>"><?php fronex_home_text( 'services_link_label_discuss_your_requirements' ); ?></a></div></div>
    <div class="service-stack" data-service-carousel>
    <?php foreach ( $services as $i => $service ) : ?>
        <article class="service-card<?php echo 0 === $i ? ' is-active' : ''; ?>" data-service-card="<?php echo (int) $i; ?>">
            <div class="service-copy"><span class="service-number"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><h3><?php echo nl2br( esc_html( $service[0] ), false ); ?></h3><ul class="plus-list"><?php for ( $bullet = 1; $bullet <= 3; ++$bullet ) : ?><li><?php fronex_home_text( 'service_' . ( $i + 1 ) . '_bullet_' . $bullet ); ?></li><?php endfor; ?></ul><p><?php echo nl2br( esc_html( $service[3] ), false ); ?></p><a class="text-link" href="<?php echo esc_url( fronex_home_value( 'service_' . ( $i + 1 ) . '_url' ) ); ?>"><?php fronex_home_text( 'service_' . ( $i + 1 ) . '_link' ); ?></a></div>
            <img loading="lazy" src="<?php echo esc_url( $service[2] ); ?>" alt="<?php echo esc_attr( $service[0] ); ?>" width="768" height="458">
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
    <img class="project-illustration" loading="lazy" src="<?php echo esc_url( fronex_home_value( 'projects_image_h1_banner4_png' ) ); ?>" alt="">
    <div class="section-heading reveal"><div><p class="eyebrow"><?php fronex_home_text( 'projects_description_project_possibilities' ); ?></p><h2><?php fronex_home_text( 'projects_heading_delivering_our_clients_more_project_clarity' ); ?></h2></div></div>
    <div class="project-grid">
    <?php foreach ( array( array( fronex_home_value( 'projects_card_1_image' ), fronex_home_value( 'projects_card_1_category' ), fronex_home_value( 'projects_card_1_title' ) ), array( fronex_home_value( 'projects_card_2_image' ), fronex_home_value( 'projects_card_2_category' ), fronex_home_value( 'projects_card_2_title' ) ) ) as $project_index => $project ) : ?>
        <a class="project-card reveal" href="<?php echo esc_url( fronex_home_value( 'project_' . ( $project_index + 1 ) . '_url' ) ); ?>"><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $project[0] ); ?>" alt="<?php echo esc_attr( $project[2] ); ?>" width="768" height="436"><span class="project-category"><?php echo nl2br( esc_html( $project[1] ), false ); ?></span></div><div class="project-caption"><h3><?php echo nl2br( esc_html( $project[2] ), false ); ?></h3><span aria-hidden="true">↗</span></div></a>
    <?php endforeach; ?>
    </div>
</section>
<section id="team" class="section team">
    <div class="section-heading centered reveal"><p class="eyebrow"><?php fronex_home_text( 'team_description_meet_our_team' ); ?></p><h2><?php fronex_home_text( 'team_heading_meet_the_industry_pioneers' ); ?></h2></div>
    <div class="team-grid">
    <?php foreach ( array( array( fronex_home_value( 'team_card_1_image' ), fronex_home_value( 'team_card_1_name' ), fronex_home_value( 'team_card_1_role' ) ), array( fronex_home_value( 'team_card_2_image' ), fronex_home_value( 'team_card_2_name' ), fronex_home_value( 'team_card_2_role' ) ), array( fronex_home_value( 'team_card_3_image' ), fronex_home_value( 'team_card_3_name' ), fronex_home_value( 'team_card_3_role' ) ) ) as $person ) : ?>
        <article class="team-card reveal"><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $person[0] ); ?>" alt="Sample portrait for the <?php echo esc_attr( strtolower( $person[1] ) ); ?> team" width="480" height="600"></div><h3><?php echo nl2br( esc_html( $person[1] ), false ); ?></h3><p><?php echo nl2br( esc_html( $person[2] ), false ); ?></p></article>
    <?php endforeach; ?>
    </div>
</section>
<section class="section offer grid-lines">
    <div class="reveal"><p class="eyebrow"><?php fronex_home_text( 'offer_description_what_we_offer' ); ?></p><h2><?php fronex_home_text( 'offer_heading_get_premium_industrial_services' ); ?></h2><div class="offer-grid"><article><span class="offer-icon" aria-hidden="true"><svg width="34" height="34" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 28V15l9-5v7l9-6v17H3Zm18 0V5h6l2 23h-8ZM7 21h3m4 0h3M7 25h3m4 0h3M23 2h5"/></svg></span><div><h3><?php fronex_home_text( 'offer_heading_full_service' ); ?></h3><p><?php fronex_home_text( 'offer_description_connected_expertise_from_the_first_conversation_through' ); ?></p></div></article><article><span class="offer-icon" aria-hidden="true">⚒</span><div><h3><?php fronex_home_text( 'offer_heading_maintenance' ); ?></h3><p><?php fronex_home_text( 'offer_description_practical_support_to_keep_your_equipment_and_operation' ); ?></p></div></article></div><a class="button yellow" href="<?php echo esc_url( fronex_home_value( 'offer_link_destination_contact' ) ); ?>"><?php fronex_home_text( 'offer_link_label_contact_us' ); ?></a></div><span class="offer-wordmark" aria-hidden="true"><?php fronex_home_text( 'offer_text_industry' ); ?></span>
</section>
<section class="section testimonials" aria-labelledby="testimonials-title">
    <div class="testimonial-photo reveal"><img loading="lazy" src="<?php echo esc_url( fronex_home_value( 'testimonials_image_h1_banner5_jpg' ) ); ?>" alt="<?php echo esc_attr( fronex_home_value( 'testimonials_image_description_engineer_wearing_safety_equipment' ) ); ?>" width="640" height="660"></div>
    <div class="testimonial-content reveal"><p class="eyebrow"><?php fronex_home_text( 'testimonials_description_testimonials' ); ?></p><h2 id="testimonials-title"><?php fronex_home_text( 'testimonials_heading_hear_from_our_satisfied_customers' ); ?></h2><div class="quote-area"><span class="quote-mark" aria-hidden="true">“</span><div class="quote-slides" aria-live="polite">
    <figure class="quote-slide"><blockquote><?php fronex_home_text( 'testimonials_quote_the_best_results_come_from_a_team_that_listens_careful' ); ?></blockquote><figcaption><img src="<?php echo esc_url( fronex_home_value( 'testimonials_image_avatar_2_jpg' ) ); ?>" alt="" loading="lazy"><div><strong><?php fronex_home_text( 'testimonials_emphasis_a_shared_ambition' ); ?></strong><span><?php fronex_home_text( 'testimonials_text_illustrative_testimonial_manufacturing' ); ?></span></div></figcaption></figure>
    <figure class="quote-slide" hidden><blockquote><?php fronex_home_text( 'testimonials_quote_a_fresh_perspective_can_change_more_than_a_single_proj' ); ?></blockquote><figcaption><strong><?php fronex_home_text( 'testimonials_emphasis_a_forward_looking_partnership' ); ?></strong><span><?php fronex_home_text( 'testimonials_text_illustrative_testimonial_engineering' ); ?></span></figcaption></figure>
    <figure class="quote-slide" hidden><blockquote><?php fronex_home_text( 'testimonials_quote_clear_communication_and_thoughtful_engineering_bring_c' ); ?></blockquote><figcaption><strong><?php fronex_home_text( 'testimonials_emphasis_confidence_at_every_step' ); ?></strong><span><?php fronex_home_text( 'testimonials_text_illustrative_testimonial_infrastructure' ); ?></span></figcaption></figure>
    </div><div class="quote-controls"><button type="button" data-quote="-1" aria-label="Previous testimonial">←</button><span class="quote-count">01 / 03</span><button type="button" data-quote="1" aria-label="Next testimonial">→</button></div></div></div>
</section>
<section id="contact" class="section contact grid-lines">
    <div class="contact-copy reveal"><p class="eyebrow"><?php fronex_home_text( 'contact_description_get_in_touch' ); ?></p><h2><?php fronex_home_text( 'contact_heading_ready_to_build_start_talk' ); ?></h2><div class="contact-details"><div><h3><?php fronex_home_text( 'contact_heading_our_approach' ); ?></h3><p><?php fronex_home_text( 'contact_description_your_challenge_our_expertise_one_shared_ambition' ); ?></p></div><div><h3><?php fronex_home_text( 'contact_heading_support' ); ?></h3><a href="<?php echo esc_url( 'mailto:' . fronex_home_value( 'contact_email' ) ); ?>"><?php fronex_home_text( 'contact_link_label_email_our_team' ); ?></a><p><?php fronex_home_text( 'contact_description_let_s_discuss_your_next_project' ); ?></p></div></div></div>
    <div class="contact-form contact-form--fluent reveal">
        <?php if ( false !== strpos( $contact_form, '<form' ) ) : ?>
            <?php echo $contact_form; // Trusted HTML generated by Fluent Forms, including its validation and submission scripts. ?>
        <?php else : ?>
            <p>Please email our team with your enquiry.</p>
            <a class="button yellow" href="<?php echo esc_url( 'mailto:' . fronex_home_value( 'contact_email' ) ); ?>">Email our team ↗</a>
        <?php endif; ?>
    </div>
</section>
<?php $news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true ) ); ?>

<section id="insights" class="section insights"><div class="section-heading centered reveal"><p class="eyebrow"><?php fronex_home_text( 'news_description_blog_news' ); ?></p><h2><?php fronex_home_text( 'news_heading_our_articles_latest_news_perspectives' ); ?></h2></div><div class="news-grid">
<?php $n = 0; while ( $news->have_posts() ) : $news->the_post();  ?>
<article class="news-card reveal"><a href="<?php the_permalink(); ?>"><div class="image-zoom"><?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); else : ?><img loading="lazy" src="<?php echo esc_url( fronex_home_value( 'news_fallback_' . ( $n + 1 ) ) ); ?>" alt="" width="768" height="500"><?php endif; ?></div><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?> <span aria-hidden="true">↗</span></p><h3><?php the_title(); ?></h3><span class="text-link"><?php fronex_home_text( 'news_text_read_more' ); ?></span></a></article>
<?php ++$n; endwhile; wp_reset_postdata(); ?>
<?php
$reading = array(
    array( fronex_home_value( 'news_placeholders_card_1_image' ), fronex_home_value( 'news_placeholders_card_1_title' ), fronex_home_value( 'news_placeholders_card_1_description' ) ),
    array( fronex_home_value( 'news_placeholders_card_2_image' ), fronex_home_value( 'news_placeholders_card_2_title' ), fronex_home_value( 'news_placeholders_card_2_description' ) ),
    array( fronex_home_value( 'news_placeholders_card_3_image' ), fronex_home_value( 'news_placeholders_card_3_title' ), fronex_home_value( 'news_placeholders_card_3_description' ) ),
);
for ( $j = $n; $j < 3; ++$j ) : $idea = $reading[ $j ]; ?>
<article class="news-card reveal"><details class="reading-card"><summary><div class="image-zoom"><img loading="lazy" src="<?php echo esc_url( $idea[0] ); ?>" alt="" width="768" height="500"></div><p class="eyebrow"><?php fronex_home_text( 'news_description_industry_perspective' ); ?></p><h3><?php echo nl2br( esc_html( $idea[1] ), false ); ?></h3><span class="text-link"><?php fronex_home_text( 'news_text_read_more_2' ); ?></span></summary><p class="reading-content"><?php echo nl2br( esc_html( $idea[2] ), false ); ?></p></details></article>
<?php endfor; ?>
</div></section>
</main>
<?php get_footer(); ?>
