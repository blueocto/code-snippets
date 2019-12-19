function site_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'site_social_contact' , array(
        'title'      => __( 'Social Media / Contact', 'ai' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'social_twitter' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_twitter', array(
        'label'      => __( 'Twitter URL', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'social_twitter',
    ) ) );

    $wp_customize->add_setting( 'social_facebook' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_facebook', array(
        'label'      => __( 'Facebook URL', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'social_facebook',
    ) ) );

    $wp_customize->add_setting( 'social_youtube' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_youtube', array(
        'label'      => __( 'YouTube URL', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'social_youtube',
    ) ) );

    $wp_customize->add_setting( 'social_instagram' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_instagram', array(
        'label'      => __( 'Instagram URL', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'social_instagram',
    ) ) );

    $wp_customize->add_setting( 'contact_phone' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_phone', array(
        'label'      => __( 'Phone Number', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'contact_phone',
    ) ) );

    $wp_customize->add_setting( 'contact_fax' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_fax', array(
        'label'      => __( 'Fax Number', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'contact_fax',
    ) ) );

    $wp_customize->add_setting( 'contact_email' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_email', array(
        'label'      => __( 'Email Address', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'contact_email',
    ) ) );

    $wp_customize->add_setting( 'contact_address' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_address', array(
        'label'      => __( 'Physical Address', 'ai' ),
        'section'    => 'site_social_contact',
        'settings'   => 'contact_address',
    ) ) );    
add_action( 'customize_register', 'site_customize_register' );
