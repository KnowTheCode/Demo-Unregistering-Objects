<?php
namespace TitleEnhancer;

class Title_Enhancer {

	/**
	 * Runtime configuration parameters
	 * 
	 * @var array
	 */
	protected $config;

	/**
	 * Title_Enhancer constructor.
	 *
	 * @param array $config
	 */
	public function __construct( array $config ) {
		$this->config = $config;

		$this->init_events();
	}

	/**
	 * Initialize the events.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		add_filter( 'the_title', array( $this, 'add_font_icon_to_the_title' ), 15, 2 );
	}

	/**
	 * Add font icon to the title.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_title
	 * @param int $post_id
	 *
	 * @return string
	 */
	function add_font_icon_to_the_title( $post_title, $post_id ) {
		ob_start();

		include( $this->config['view'] );

		return ob_get_clean();
	}
}
