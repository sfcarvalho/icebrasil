<?php
/**
 * Setup the WordPress core custom header feature.
 * http://codex.wordpress.org/Custom_Headers
 *
 * @uses keratin_header_style()
 * @uses keratin_admin_header_style()
 * @uses keratin_admin_header_image()
 *
 * @package Keratin
 */
function keratin_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'keratin_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1920,
		'height'                 => 250,
		'flex-width'             => true,
		'flex-height'            => true,
		'default-text-color'     => '181818',
		'header-text'            => true,
		'wp-head-callback'       => 'keratin_header_style',
		'admin-head-callback'    => 'keratin_admin_header_style',
		'admin-preview-callback' => 'keratin_admin_header_image'
	) ) );
}
add_action( 'after_setup_theme', 'keratin_custom_header_setup' );

if ( ! function_exists( 'keratin_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see keratin_custom_header_setup().
 */
function keratin_header_style() {
?>

	<?php if ( get_header_image() ) : ?>
	<style type="text/css">
		.site-header {
			background: url(<?php esc_url( header_image() ); ?>) repeat top center;
		}
	</style>
	<?php endif; ?>

<?php
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>

<?php
}
endif; // keratin_header_style

if ( ! function_exists( 'keratin_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see keratin_custom_header_setup().
 */
function keratin_admin_header_style() {
?>

	<style type="text/css">
		.appearance_page_custom-header #headimg {
			<?php if ( get_header_image() ) : ?>
			background: url(<?php esc_url( header_image() ); ?>) repeat top center;
			<?php endif; ?>
			border: none;
			padding: 30px;
			overflow: hidden;
			width: 100%;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
			font-family: 'Lato', sans-serif;
			font-size: 24px;
			line-height: 1.2;
			margin: 0;
			padding: 0;
		}
		#headimg h1 a,
		#headimg h1 a:visited {
			color: #0a070f;
			text-decoration: none;
		}
		#headimg h1 a:hover,
		#headimg h1 a:focus,
		#headimg h1 a:active {
		  color: #666;
		}
		#desc {
			font-family: 'Questrial', sans-serif;
			font-size: 14px;
			margin: 10px 0 0;
			padding: 0;
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // keratin_admin_header_style

if ( ! function_exists( 'keratin_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see keratin_custom_header_setup().
 */
function keratin_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
	</div>
<?php
}
endif; // keratin_admin_header_image