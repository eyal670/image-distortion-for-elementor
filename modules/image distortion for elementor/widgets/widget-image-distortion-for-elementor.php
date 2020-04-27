<?php
/**
 * author: Eyal Ron
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_image_distortion_for_elementor extends Widget_Base {

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_name() {

		return 'image-distortion-for-elementor';
	}

	public function get_title() {
		return __( 'image distortion for elementor', 'elementor-custom-widget' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	protected function _register_controls() {
		/* List Section */
		$this->start_controls_section(
			'img_section',
			[
				'label' => esc_html__( 'Image', 'elementor-custom-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'display_image',
			[
				'label' => __( 'Display Image', 'happy-pins' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'description' => 'The actual image that will be shown in your post. (which does not have to be a pinable image!)  If you want a different image to be shared on Pinterest add it to the "Pin Image" box below.',
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		// $img_size = '<div style="direction:ltr;color: #3e3e3e;text-align:left">Avaliable sizes:<br />'.implode('<br />',get_intermediate_image_sizes()).'</div>';
		// $this->add_control(
		// 	'img_size',
		// 	[
		// 		'label' => __( 'Image Size', 'happy-pins' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'default' => __( 'large' , 'happy-pins' ),
		// 		'description' => $img_size,
		// 	]
		// );
		$this->add_control(
			'img_width',
			[
				'label' => __( 'Image Width', 'happy-pins' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .c-glitch' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'img_align',
			[
				'label' => __( 'Alignment', 'happy-pins' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'happy-pins' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'happy-pins' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'happy-pins' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
			]
		);
		$this->end_controls_section();
		/* End of List Section */

		$this->start_controls_section(
			'info_section',
			[
				'label' => esc_html__( 'Info', 'elementor-custom-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$html =
			'<div calss="info_section">
				<div style="text-align:center;">
					Built by <span style="color:#c4015d">Happy-Apps</span>
				</div>
			</div>';
		$this->add_control(
			'info',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => __( $html, 'happy-pins' ),
				'content_classes' => 'your-class',
			]
		);
		$this->end_controls_section();
	}

	protected function render( $instance = [] ) {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		//get display image
		$display_img = wp_get_attachment_image( $settings['display_image']['id'], $settings['img_size'] );
		$img_url = $settings['display_image']['url'];
		?>
			<div class="c-glitch"
				style="background-image: url('<?php echo $img_url ?>');">
				<div class="c-glitch__img"
					style="background-image: url('<?php echo $img_url ?>');">
				</div>
				<div class="c-glitch__img"
					style="background-image: url('<?php echo $img_url ?>');">
				</div>
				<div class="c-glitch__img"
					style="background-image: url('<?php echo $img_url ?>');">
				</div>
				<div class="c-glitch__img"
					style="background-image: url('<?php echo $img_url ?>');">
				</div>
				<div class="c-glitch__img"
					style="background-image: url('<?php echo $img_url ?>');">
				</div>
			</div>
		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_image_distortion_for_elementor() );
