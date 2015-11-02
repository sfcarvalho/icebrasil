<?php
/**
 * Keratin Theme Customizer
 *
 * @package Keratin
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function keratin_customize_register ( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	// Getting Started Section
	$wp_customize->add_section( 'keratin_getting_started', array(
		'title'       => __( 'Getting Started', 'keratin' ),
		'description' => __( 'Thanks for your interest in Keratin! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'keratin' ),
		'priority'    => 1,
	) );

	// Documentation
	$wp_customize->add_setting ( 'keratin_documentation', array(
		'default' => '',
	) );

	$wp_customize->add_control(
		new WP_Keratin_Button_Control(
			$wp_customize,
			'keratin_documentation',
			array(
				'label'         => __( 'Documentation', 'keratin' ),
				'section'       => 'keratin_getting_started',
				'type'          => 'button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'http://themecot.com/keratin-theme-documentation/',
				'button_target' => '_blank',
			)
		)
	);

	// Contact
	$wp_customize->add_setting ( 'keratin_contact', array(
		'default'           => '',
	) );

	$wp_customize->add_control(
		new WP_Keratin_Button_Control(
			$wp_customize,
			'keratin_contact',
			array(
				'label'         => __( 'Contact Us', 'keratin' ),
				'section'       => 'keratin_getting_started',
				'type'          => 'button',
				'button_tag'    => 'a',
				'button_class'  => 'button button-primary',
				'button_href'   => 'http://themecot.com/contact/',
				'button_target' => '_blank',
			)
		)
	);

	// Theme Options Section
	$wp_customize->add_section( 'keratin_theme_options', array(
		'title'     => __( 'Theme Options', 'keratin' ),
		'priority'  => 2,
	) );

	// Theme Layout
	$wp_customize->add_setting ( 'keratin_theme_layout', array(
		'default'           => 'box',
		'sanitize_callback' => 'keratin_sanitize_theme_layout',
	) );

	$wp_customize->add_control ( 'keratin_theme_layout', array(
		'label'    => __( 'Theme Layout', 'keratin' ),
		'section'  => 'keratin_theme_options',
		'priority' => 2,
		'type'     => 'select',
		'choices'  => array(
			'wide' => __( 'Wide', 'keratin' ),
			'box'  => __( 'Box', 'keratin' ),
		),
	) );

	// Update the Customizer section title for discoverability.
	$wp_customize->get_section('title_tagline')->title = __( 'Site Title, Tagline, and Logo', 'keratin' );

	// Logo
	$wp_customize->add_setting ( 'keratin_logo', array(
		'default'           =>  '',
		'sanitize_callback' => 'keratin_sanitize_url',
	) );

	$wp_customize->add_control (
		new WP_Customize_Image_Control(
	        $wp_customize,
	        'keratin_logo',
	        array(
				'label'    => __( 'Logo', 'keratin' ),
				'section'  => 'title_tagline',
	        )
	    )
	);

}
add_action( 'customize_register', 'keratin_customize_register' );

/**
 * Button Control Class
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class WP_Keratin_Button_Control extends WP_Customize_Control {
		/**
		 * @access public
		 * @var string
		 */
		public $type = 'button';

		/**
		 * HTML tag to render button object.
		 *
		 * @var  string
		 */
		protected $button_tag = 'button';

		/**
		 * Class to render button object.
		 *
		 * @var  string
		 */
		protected $button_class = 'button button-primary';

		/**
		 * Link for <a> based button.
		 *
		 * @var  string
		 */
		protected $button_href = 'javascript:void(0)';

		/**
		 * Target for <a> based button.
		 *
		 * @var  string
		 */
		protected $button_target = '';

		/**
		 * Click event handler.
		 *
		 * @var  string
		 */
		protected $button_onclick = '';

		/**
		 * ID attribute for HTML tab.
		 *
		 * @var  string
		 */
		protected $button_tag_id = '';

		/**
		 * Render the control's content.
		 */
		public function render_content() {
		?>
			<span class="center">
				<?php
				// Print open tag
				echo '<' . esc_html( $this->button_tag );

				// button class
				if ( ! empty( $this->button_class ) ) {
					echo ' class="' . esc_attr( $this->button_class ) . '"';
				}

				// button or href
				if ( 'button' == $this->button_tag ) {
					echo ' type="button"';
				} else {
					echo ' href="' . esc_url( $this->button_href ) . '"' . ( empty( $this->button_tag ) ? '' : ' target="' . esc_attr( $this->button_target ) . '"' );
				}

				// onClick Event
				if ( ! empty( $this->button_onclick ) ) {
					echo ' onclick="' . esc_js( $this->button_onclick ) . '"';
				}

				// ID
				if ( ! empty( $this->button_tag_id ) ) {
					echo ' id="' . esc_attr( $this->button_tag_id ) . '"';
				}

				echo '>';

				// Print text inside tag
				echo esc_html( $this->label );

				// Print close tag
				echo '</' . esc_html( $this->button_tag ) . '>';
				?>
			</span>
		<?php
		}
	}

}

/**
 * Sanitize the Theme layout value.
 *
 * @param string $theme_layout - Layout type.
 * @return string Filtered theme layout type (wide|box).
 */
function keratin_sanitize_theme_layout( $theme_layout ) {
	if ( ! in_array( $theme_layout, array( 'wide', 'box' ) ) ) {
		$theme_layout = 'box';
	}

	return $theme_layout;
}

/**
 * Sanitize URL
 *
 * http://codex.wordpress.org/Function_Reference/esc_url_raw
 *
 * @param string $url - The URL to be cleaned.
 * @return Valid URL | empty string
 */
function keratin_sanitize_url( $url ) {

	if( filter_var( $url, FILTER_VALIDATE_URL ) ) {
		return esc_url_raw( $url );
	}

	return '';

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function keratin_customize_preview_js() {
	wp_enqueue_script( 'keratin_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140120', true );
}
add_action( 'customize_preview_init', 'keratin_customize_preview_js' );