<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class EDDC_Admin_Notices {

	public function __construct() {
		$this->init();
	}

	public function init() {
		add_action( 'admin_notices', array( $this, 'notices' ) );
	}

	public function notices() {
		if( ! isset( $_GET['page'] ) || $_GET['page'] != 'edd-commissions' ) {
			return;
		}

		if( empty( $_GET['edd-message'] ) ) {
			return;
		}

		$type    = 'updated';
		$message = '';

		switch( strtolower( $_GET['edd-message'] ) ) {

			case 'delete' :

				$message = __( 'Commission deleted successfully', 'eddc' );

				break;

			case 'update' :

				$message = __( 'Commission updated successfully', 'eddc' );

				break;

			case 'mark_as_paid' :

				$message = __( 'Commission marked as paid', 'eddc' );

				break;

			case 'mark_as_unpaid' :

				$message = __( 'Commission marked as unpaid', 'eddc' );

				break;

			case 'mark_as_revoked' :

				$message = __( 'Commission marked as revoked', 'eddc' );

				break;

			case 'mark_as_accepted' :

				$message = __( 'Commission marked as accepted', 'eddc' );

				break;
		}

		if ( ! empty( $message ) ) {
			echo '<div class="' . esc_attr( $type ) . '"><p>' . $message . '</p></div>';
		}

	}

}
$eddc_admin_notices = new EDDC_Admin_Notices;
