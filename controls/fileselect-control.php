<?php
/**
 * FileSelect control.
 *
 * A control for selecting any type of files.
 *
 * @since 1.0.0
 */
class FileSelect_Control extends \Elementor\Base_Data_Control {

	/**
	 * Get control type.
	 *
	 * Retrieve the control type, in this case `FILESELECT`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'file-select';
	}

	/**
	 * Enqueue control scripts and styles.
	 *
	 * Used to register and enqueue custom scripts and styles
	 * for this control.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_media();
		wp_enqueue_style('thickbox');
	    wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
		// Scripts
		wp_register_script( 'fileselect-control', plugins_url( '/js/fileselect-control.js', __FILE__ ), [ 'jquery' ], '1.0.0', true );
		wp_enqueue_script( 'fileselect-control' );
	}

	/**
	 * Get default settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
		];
	}

	/**
	 * Render control output in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field">
			<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<a href="#" class="tnc-select-file elementor-button elementor-button-success" style="padding: 10px 15px; display: block;text-align: center;" id="select-file-<?php echo esc_attr( $control_uid ); ?>" ><?php echo esc_html__( "Choose / Upload File", 'file-select-control-for-elementor' ); ?></a> <br />

				<input type="text" class="tnc-selected-fle-url" id="<?php echo esc_attr( $control_uid ); ?>" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}">
			</div>
		</div>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}
}