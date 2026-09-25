<?php
/** Native homepage editing, with bundled content as the default. */
defined( 'ABSPATH' ) || exit;

function fronex_home_fields() {
    static $fields;
    if ( null === $fields ) {
        $fields = json_decode( file_get_contents( __DIR__ . '/homepage-fields.json' ), true );
    }
    return $fields;
}

function fronex_home_default( $key ) {
    $field = fronex_home_fields()[ $key ] ?? null;
    if ( ! $field ) {
        return '';
    }
    if ( 'contact_email' === $key ) {
        return get_option( 'admin_email' );
    }
    return 'image' === $field['type']
        ? get_template_directory_uri() . '/assets/images/' . $field['default']
        : $field['default'];
}

function fronex_home_value( $key ) {
    $saved = get_option( 'fronex_home_content', array() );
    return isset( $saved[ $key ] ) && is_string( $saved[ $key ] )
        ? $saved[ $key ] : fronex_home_default( $key );
}

function fronex_home_text( $key ) {
    echo nl2br( esc_html( fronex_home_value( $key ) ), false );
}

function fronex_home_sanitize( $input ) {
    $previous = get_option( 'fronex_home_content', array() );
    $clean = array();
    if ( ! is_array( $input ) ) {
        return $previous;
    }
    foreach ( fronex_home_fields() as $key => $field ) {
        // Preserve omitted fields, including when a server truncates a large form.
        if ( ! array_key_exists( $key, $input ) ) {
            if ( isset( $previous[ $key ] ) ) {
                $clean[ $key ] = $previous[ $key ];
            }
            continue;
        }
        $raw = $input[ $key ];
        if ( ! is_string( $raw ) ) {
            $clean[ $key ] = $previous[ $key ] ?? fronex_home_default( $key );
            continue;
        }
        $raw = trim( $raw );
        if ( in_array( $field['type'], array( 'url', 'image' ), true ) ) {
            $protocols = 'image' === $field['type'] ? array( 'http', 'https' ) : array( 'http', 'https', 'mailto', 'tel' );
            $value = esc_url_raw( $raw, $protocols );
            $valid = '' === $raw || ( '' !== $value && ( preg_match( '~^https?://[^/]+~i', $value ) || ( 'url' === $field['type'] && preg_match( '~^(#|/|mailto:|tel:)~i', $value ) ) ) );
        } elseif ( 'email' === $field['type'] ) {
            $value = sanitize_email( $raw );
            $valid = (bool) is_email( $raw );
        } else {
            $value = sanitize_textarea_field( $raw );
            $valid = true;
        }
        if ( ! $valid ) {
            add_settings_error( 'fronex_home_content', $key, $field['group'] . ': ' . $field['label'] . ' is invalid. Its previous value was kept.' );
            $value = $previous[ $key ] ?? fronex_home_default( $key );
        }
        // Defaults stay in the theme, so they follow site/theme URL changes.
        if ( $value !== fronex_home_default( $key ) ) {
            $clean[ $key ] = $value;
        }
    }
    return $clean;
}

add_action( 'admin_init', function () {
    register_setting( 'fronex_homepage', 'fronex_home_content', array(
        'type' => 'array',
        'sanitize_callback' => 'fronex_home_sanitize',
        'default' => array(),
    ) );
} );

add_action( 'admin_menu', function () {
    add_theme_page( 'Homepage Content', 'Homepage Content', 'manage_options', 'fronex-homepage', 'fronex_home_admin' );
} );

add_action( 'admin_enqueue_scripts', function ( $hook ) {
    if ( 'appearance_page_fronex-homepage' !== $hook ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script( 'fronex-home-editor', get_template_directory_uri() . '/assets/home-editor.js', array( 'media-editor' ), (string) filemtime( get_template_directory() . '/assets/home-editor.js' ), true );
    wp_enqueue_style( 'fronex-home-editor', get_template_directory_uri() . '/assets/home-editor.css', array(), (string) filemtime( get_template_directory() . '/assets/home-editor.css' ) );
} );

function fronex_home_admin() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    $groups = array_fill_keys( array( 'Hero', 'Principles', 'About', 'Ticker', 'Services', 'Projects', 'Team', 'Offer', 'Testimonials', 'Contact', 'News', 'News placeholders', 'Footer' ), array() );
    foreach ( fronex_home_fields() as $key => $field ) {
        $groups[ $field['group'] ][ $key ] = $field;
    }
    foreach ( $groups as &$fields ) {
        uasort( $fields, function ( $a, $b ) {
            preg_match( '/^Card (\d+)/', $a['label'], $a_card );
            preg_match( '/^Card (\d+)/', $b['label'], $b_card );
            return (int) ( $a_card[1] ?? 0 ) <=> (int) ( $b_card[1] ?? 0 );
        } );
    }
    unset( $fields );
    ?>
    <div class="wrap fronex-editor">
        <h1>Homepage Content</h1>
        <p>Edit the content while keeping the Fronex layout and animations. Line breaks in text create new lines. Save Changes publishes your edits.</p>
        <p>Cards keep their existing order and count. News articles are managed under <a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">Posts</a>; placeholders appear only when there are fewer than three posts. The contact form opens an email draft.</p>
        <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php settings_fields( 'fronex_homepage' ); ?>
            <div class="fronex-editor-actions"><?php submit_button( 'Save Changes', 'primary', 'submit', false ); ?> <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" rel="noopener">View homepage ↗</a></div>
            <?php foreach ( $groups as $group => $fields ) : ?>
                <details class="fronex-editor-section" <?php echo 'Hero' === $group ? 'open' : ''; ?>>
                    <summary><?php echo esc_html( $group ); ?></summary>
                    <?php foreach ( $fields as $key => $field ) : $id = 'fronex-' . $key; ?>
                        <div class="fronex-editor-field" data-kind="<?php echo esc_attr( $field['type'] ); ?>">
                            <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
                            <?php if ( 'text' === $field['type'] ) : ?>
                                <textarea id="<?php echo esc_attr( $id ); ?>" name="fronex_home_content[<?php echo esc_attr( $key ); ?>]" rows="<?php echo strlen( $field['default'] ) > 100 ? '3' : '2'; ?>"><?php echo esc_textarea( fronex_home_value( $key ) ); ?></textarea>
                            <?php else : ?>
                                <input id="<?php echo esc_attr( $id ); ?>" type="<?php echo 'email' === $field['type'] ? 'email' : 'text'; ?>" name="fronex_home_content[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( fronex_home_value( $key ) ); ?>" <?php echo 'email' === $field['type'] ? 'required' : ''; ?>>
                            <?php endif; ?>
                            <div class="fronex-field-actions">
                                <?php if ( 'image' === $field['type'] ) : ?><button class="button" type="button" data-media>Choose image</button><?php endif; ?>
                                <button class="button-link" type="button" data-default="<?php echo esc_attr( fronex_home_default( $key ) ); ?>">Restore default</button>
                            </div>
                            <?php if ( 'image' === $field['type'] ) : ?><img class="fronex-image-preview" src="<?php echo esc_url( fronex_home_value( $key ) ); ?>" alt="" <?php echo '' === fronex_home_value( $key ) ? 'hidden' : ''; ?>><?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </details>
            <?php endforeach; ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

add_action( 'wp_enqueue_scripts', function () {
    $rules = array(
        'hero' => array( '.hero', '' ),
        'projects' => array( '.projects', '' ),
        'offer' => array( '.offer', '' ),
        'contact' => array( '.contact', 'linear-gradient(#17232425,#172d3030),' ),
        'footer' => array( '.site-footer', 'linear-gradient(#13232680,#111f27a1),' ),
    );
    $css = '';
    foreach ( $rules as $key => $rule ) {
        // Hex escaping also prevents a URL from closing the inline style element.
        $url = wp_json_encode( esc_url_raw( fronex_home_value( $key . '_background' ), array( 'http', 'https' ) ), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES );
        $css .= $rule[0] . '{background-image:' . $rule[1] . 'url(' . $url . ');}';
    }
    wp_add_inline_style( 'local-theme', $css );
}, 20 );
