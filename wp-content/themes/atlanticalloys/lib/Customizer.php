<?php
/**
 * WL Customizer.
 *
 * Use this class to fields to Customizer.
 * Here you can find some field types examples. Expand accordingly. External fields may be used.
 * If not needed please remove, don't forget to update
 * functions.php accordingly.
 *
 * WARNING: This file is part of the WL Base theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package WL\Theme\Base
 * @author  Nucleus
 * @license GPL-2.0+
 * @link    http://nucleus.eti.br/
 */

namespace WL\Theme;

/**
 * Theme customizer options.
 *
 * @since  1.0.0
 * @author Nucleus
 */
class Customizer {


	/**
	 * Panel ID.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string
	 */
	private $panel_id = 'wl_options';

	/**
	 * Base URL for public assets.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	private $base_uri;

	/**
	 * Setup hooks.
	 *
	 * @since 1.0.0
	 */
	public function ready() {
		add_action( 'customize_register', array( $this, 'register_panel' ), 15 );
		add_action( 'customize_register', array( $this, 'register_general_section' ) );
		add_action( 'admin_head', array( $this, 'admin_reset_stylesheet' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'css_custom_login' ) );
		add_filter( 'login_headerurl', array( $this, 'custom_loginlogo_url' ) );
	}

	/**
	 * Register the theme options panel.
	 *
	 * @since 1.0.0
	 * @param \WP_Customize_Manager $wp_customize Customizer instance.
	 */
	public function register_panel( $wp_customize ) {
		$wp_customize->add_panel(
			$this->panel_id,
			array(
				'title'          => __( 'Theme Options', 'atlanticalloys' ),
				'description'    => '',
				'priority'       => 10,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
			)
		);
	}

	/**
	 * Register the general section.
	 *
	 * @since 1.0.0
	 * @param \WP_Customize_Manager $wp_customize Customizer instance.
	 */
	public function register_general_section( $wp_customize ) {

		$section_id = $this->get_section_id( 'general_settings' );

		$wp_customize->add_section(
			$section_id,
			array(
				'panel'          => $this->panel_id,
				'title'          => __( 'General', 'atlanticalloys' ),
				'description'    => '',
				'priority'       => 10,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
			)
		);

		$fields = array(
			'logo'        => array(
				'type'        => 'media',
				'label'       => _x( 'Logo', 'General Settings', 'atlanticalloys' ),
				'description' => __( 'The WL Base Logo.', 'atlanticalloys' ),
			),
			'wl_text'     => array(
				'label'       => _x( 'wl-base Text Field', 'General Settings', 'atlanticalloys' ),
				'description' => __( 'Please enter your text here...', 'atlanticalloys' ),
			),
			'wl_media'    => array(
				'type'        => 'media',
				'label'       => _x( 'wl-base Media', 'General Settings', 'atlanticalloys' ),
				'description' => __( 'Choose your image', 'atlanticalloys' ),
			),
			'wl_textarea' => array(
				'type'        => 'textarea',
				'label'       => _x( 'wl-base Textarea Field', 'General Settings', 'atlanticalloys' ),
				'description' => __( 'Please enter your text here...', 'atlanticalloys' ),
			),
			'email'       => array(
				'type'              => 'email',
				'label'             => _x( 'Email', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'sanitize_email',
			),
			'facebook'    => array(
				'type'              => 'url',
				'label'             => _x( 'Facebook', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'googleplus'  => array(
				'type'              => 'url',
				'label'             => _x( 'Google+', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'instagram'   => array(
				'type'              => 'url',
				'label'             => _x( 'Instagram', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'linkedin'    => array(
				'type'              => 'url',
				'label'             => _x( 'LinkedIn', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'pinterest'   => array(
				'type'              => 'url',
				'label'             => _x( 'Pinterest', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'twitter'     => array(
				'type'              => 'url',
				'label'             => _x( 'Twitter', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'vimeo'       => array(
				'type'              => 'url',
				'label'             => _x( 'Vimeo', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
			'youtube'     => array(
				'type'              => 'url',
				'label'             => _x( 'Youtube', 'General Settings', 'atlanticalloys' ),
				'description'       => __( 'Leave empty if it does not apply.', 'atlanticalloys' ),
				'sanitize_callback' => 'esc_url',
			),
		);

		$this->register_fields( $wp_customize, $fields, $section_id );
	}

	/**
	 * Determine if we are using a 12h or a 24h format.
	 *
	 * @since  1.0.0
	 * @return bool If true, will use the 12h format. False, for the 24h format.
	 */
	public static function use_am_pm() {
		return (bool) preg_match( '/g|h/', get_option( 'time_format' ) );
	}

	/**
	 * Register a set of fields for a section or a panel.
	 *
	 * @since  1.0.0
	 * @access private
	 * @param  \WP_Customize_Manager $wp_customize Customizer instance.
	 * @param  array                 $fields       The fields to register
	 * @param  string                $section_id   The section ID.
	 */
	private function register_fields( $wp_customize, $fields, $section_id = '' ) {

		if ( empty( $fields ) ) {
			return;
		}

		if ( empty( $section_id ) ) {
			$section_id = $this->panel_id;
		}

		foreach ( $fields as $key => $field ) {

			$field_id          = $this->get_field_id( $key );
			$field_default     = ! empty( $field['default'] ) ? $field['default'] : '';
			$sanitize_callback = ! empty( $field['sanitize_callback'] ) ? $field['sanitize_callback'] : 'sanitize_text_field';

			$wp_customize->add_setting(
				$field_id,
				array(
					'default'           => $field_default,
					'type'              => 'option',
					'capability'        => 'edit_theme_options',
					'transport'         => 'refresh',
					'sanitize_callback' => $sanitize_callback,
				)
			);

			$field_type = ! empty( $field['type'] ) ? $field['type'] : 'text';
			$field_args = array(
				'type'            => $field_type,
				'label'           => ! empty( $field['label'] ) ? $field['label'] : '',
				'description'     => ! empty( $field['description'] ) ? $field['description'] : '',
				'priority'        => ! empty( $field['priority'] ) ? $field['priority'] : 10,
				'section'         => $section_id,
				'settings'        => $field_id,
				'choices'         => ! empty( $field['choices'] ) ? $field['choices'] : array(),
				'input_attrs'     => ! empty( $field['input_attrs'] ) ? $field['input_attrs'] : array(),
				'active_callback' => ! empty( $field['active_callback'] ) ? $field['active_callback'] : '',
			);

			switch ( $field_type ) {

				case 'media':
					$wp_customize->add_control(
						new \WP_Customize_Media_Control(
							$wp_customize,
							$field_id,
							$field_args
						)
					);
					break;

				default:
					$wp_customize->add_control( $field_id, $field_args );
					break;
			}
		}
	}

	/**
	 * Get section ID.
	 *
	 * @since  1.0.0
	 * @access private
	 * @param  string $key Section key.
	 * @return string      Section ID.
	 */
	private function get_section_id( $key ) {
		return sprintf( 'wl_section_%s', $key );
	}

	/**
	 * Get field ID.
	 *
	 * @since  1.0.0
	 * @access private
	 * @param  string $key Field key.
	 * @return string      Field ID.
	 */
	private function get_field_id( $key ) {
		return sprintf( 'wl_%s', $key );
	}

	/**
	 * ADMIN page styles
	 */
	public function admin_reset_stylesheet() { ?>
		<style type="text/css">
			@media (min-width: 782px) {
				.php-error #adminmenuback, 
				.php-error #adminmenuwrap {
					margin-top: 0;
				}
				body.wp-admin.is-fullscreen-mode #adminmenumain, 
				body.wp-admin.is-fullscreen-mode #wpadminbar{
					display: block !important;
				}
				body.wp-admin.is-fullscreen-mode #adminmenu{
					margin: 44px 0 12px !important;
				}
				body.wp-admin.is-fullscreen-mode div.edit-post-layout{
					top: 30px !important;
					left: 160px !important;
				}
				body.wp-admin.is-fullscreen-mode div.edit-post-layout .editor-post-publish-panel{
					top: 32px !important;
				}
			}
		</style> 
		<?php
	}

	/**
	 * FORM LOGIN to admin
	 */
	function css_custom_login() {
		?>
		<style type="text/css">
			/* background */
			body.login {
				display: flex;
				flex-direction: column;
				flex-wrap: wrap;
				justify-content: center;
				align-items: center;
			}

			body.login div#login {
				padding-top: 0;
				padding-bottom: 0;
			}

			/* logo */
			body.login div#login h1 {
				margin-bottom: 30px;
			}
			body.login div#login h1 a {
				background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/dist/images/atlantic_alloys.svg');
				background-repeat: no-repeat;
				background-position: center center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-ms-background-size: cover;
				background-size: cover;
				margin: 0 auto;
				display: block;
				width: 100px;
				height: 100px;
				padding: 0;
				pointer-events: none !important;
			}

			body.login div#login #login-message{
				border-left: 4px solid #2B3990;
			}

			/* form login */
			body.login div#login form#loginform {
				background: none;
				box-shadow: none;
				padding: 0;
				border: none;
				border-radius: 0;
			}
			body.login div#login form#loginform p {}
			body.login div#login form#loginform p label,
			body.login div#login form#loginform label[for=user_pass] {
				font-size: 12px;
				font-weight: bold;
				color: #2B3990;
				text-transform: uppercase;
				letter-spacing: 1px;
			}
			body.login div#login form#loginform input {
				background: rgba(255, 255, 255, .8);
				box-shadow:none;
				border-radius: 0;
				border: none;
				padding: 5px 10px;
				font-size: 20px;
				font-weight: 400;
				color: #012036;
				transition: all .2s ease-in-out;
			}

			body.login div#login form#loginform input:not([type=submit]){
				background: rgba(255, 255, 255, .8) !important;
			}
			body.login div#login form#loginform input:not([type=submit]):hover,
			body.login div#login form#loginform input:not([type=submit]):focus{
				background: rgba(255, 255, 255, 1) !important;
			}
			body.login div#login form#loginform input#user_login {}
			body.login div#login form#loginform input#user_pass {}


			/* checkbox remember */
			body.login div#login form#loginform p.forgetmenot { margin-bottom: 15px; }
			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox] {
				background-color: #2B3990 !important;
			}
			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox]:checked:before {
				color: #2B3990 !important;
			}

			/* button submit */
			body.login div#login form#loginform .user-pass-wrap .wp-pwd button{
				color: #012036;
			}
			body.login div#login form#loginform p.submit {}
			body.login div#login form#loginform p.submit input#wp-submit {
				width: 100%;
				height: 40px;
				padding: 0 20px;
				display: inline-block;
				background-color: #2B3990;
				border: none;
				font-weight: 700;
				font-size: 14px;
				text-transform: uppercase;
				color: #FFFFFF;
				text-shadow: none;
				transition: all .2s ease-in-out;
			}
			body.login div#login form#loginform p.submit input#wp-submit:hover {
				background: white !important;
				color: #2B3990;
			}

			body.login div#login span.dashicons{
				color: #2B3990;
			}

			body.login div#login form#loginform p.forgetmenot input#rememberme[type=checkbox]:checked:before {
				content: '✔';
				display: inline-flex;
				justify-content: center;
				align-items: center;
				color: #FFFFFF !important;
				font-size: 16px;
				margin: -2px -2px;
			}

			body.login div#login p#nav a,
			body.login div#login p#backtoblog a {
				color: #2B3990;
				transition: all .2s ease-in-out;
			}
			body.login div#login p#nav a:hover,
			body.login div#login p#backtoblog a:hover { color: #012036; }
			body.login #language-switcher span.dashicons{
				color: #012036 !important;
			}
		</style>
		<?php
	}

	/**
	 * Replace Login Page logo link.
	 *
	 * @since 1.0.0
	 */
	public function custom_loginlogo_url() {
		return get_home_url();
	}
}
