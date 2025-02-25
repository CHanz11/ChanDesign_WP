<?php
declare(strict_types=1);

namespace WP_Rocket\Engine\Optimization\LazyRenderContent\Frontend;

use WP_Rocket\Engine\Common\Context\ContextInterface;
use WP_Rocket\Engine\Common\PerformanceHints\Frontend\ControllerInterface;
use WP_Rocket\Engine\Optimization\LazyRenderContent\Frontend\Processor\Processor;

class Controller implements ControllerInterface {
	/**
	 * Processor instance
	 *
	 * @var Processor
	 */
	private $processor;

	/**
	 * Context instance
	 *
	 * @var ContextInterface
	 */
	private $context;

	/**
	 * Constructor
	 *
	 * @param Processor        $processor Processor instance.
	 * @param ContextInterface $context Context instance.
	 */
	public function __construct( Processor $processor, ContextInterface $context ) {
		$this->processor = $processor;
		$this->context   = $context;
	}

	/**
	 * Applies optimization.
	 *
	 * @param string $html HTML content.
	 * @param object $row Database Row.
	 *
	 * @return string
	 */
	public function optimize( string $html, $row ): string {
		if ( ! $row->has_lrc() ) {
			return $this->remove_hashes( $html );
		}

		$hashes = json_decode( $row->below_the_fold );

		if ( ! is_array( $hashes ) ) {
			return $this->remove_hashes( $html );
		}

		$result = preg_replace( '/data-rocket-location-hash="(?:' . implode( '|', $hashes ) . ')"/i', 'data-wpr-lazyrender="1"', $html, -1, $count );

		if (
			null === $result
			||
			0 === $count
		) {
			return $this->remove_hashes( $html );
		}

		$html = $result;
		$html = $this->remove_hashes( $html );

		return $this->add_css( $html );
	}

	/**
	 * Remove hashes from the HTML content.
	 *
	 * @param string $html The HTML content.
	 *
	 * @return string
	 */
	private function remove_hashes( $html ) {
		$result = preg_replace( '/data-rocket-location-hash="[^"]*"/i', '', $html );

		if ( null === $result ) {
			return $html;
		}

		return $result;
	}

	/**
	 * Add CSS to the HTML content.
	 *
	 * @param string $html The HTML content.
	 *
	 * @return string
	 */
	private function add_css( $html ) {
		$css = '<style id="rocket-lazyrender-inline-css">[data-wpr-lazyrender] {content-visibility: auto;}</style>';

		$result = preg_replace( '/<\/head>/i', $css . '</head>', $html, 1 );

		if ( null === $result ) {
			return $html;
		}

		return $result;
	}

	/**
	 * Add hashes to the HTML elements if allowed
	 *
	 * @param string $html The HTML content.
	 *
	 * @return string
	 */
	public function add_hashes_when_allowed( $html ) {
		if ( ! $this->context->is_allowed() ) {
			return $html;
		}

		return $this->add_hashes( $html );
	}

	/**
	 * Add hashes to the HTML elements
	 *
	 * @param string $html The HTML content.
	 *
	 * @return string
	 */
	public function add_hashes( $html ) {
		if ( ! $this->context->is_allowed() ) {
			return $html;
		}

		if ( empty( $html ) ) {
			return $html;
		}

		/**
		 * Filters the Lazy Render Content processor to use.
		 *
		 * @since 3.17
		 *
		 * @param string $processor The processor to use.
		 */
		$processor = wpm_apply_filters_typed( 'string', 'rocket_lrc_processor', 'dom' );

		$this->processor->set_processor( $processor );

		return $this->processor->get_processor()->add_hashes( $html );
	}

	/**
	 * Add custom data like the List of elements to be considered for optimization.
	 *
	 * @param array $data Array of data passed in beacon.
	 *
	 * @return array
	 */
	public function add_custom_data( array $data ): array {
		$data['status']['lrc'] = $this->context->is_allowed();

		/**
		 * Filters the LRC threshold
		 *
		 * @since 3.17
		 *
		 * @param int $threshold The LRC threshold value.
		 */
		$data['lrc_threshold'] = wpm_apply_filters_typed( 'integer', 'rocket_lrc_threshold', 1800 );

		return $data;
	}
}
