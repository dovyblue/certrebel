<?php
namespace Payments {
$stripe  = $_SERVER['DOCUMENT_ROOT'];
$stripe .= "/libraries/stripe/init.php";
require_once($stripe);
require_once('/var/www/certrebel/functions.php');

class Payment {
	
	function __construct() {
		/**
		 * Set your secret key: remember to change this to your live secret key in production
		 * See your keys here https://dashboard.stripe.com/account/apikeys
		 */
		\Stripe\Stripe::setApiKey(SK_TEST);
		//\Stripe\Stripe::setApiKey(SK_LIVE");
	}
	public function charge($token_id, $amount_in_cents, $description) {
		/**
		 * Create the charge on Stripe's servers - this will charge the user's card
		 */
		 $return = array();
		try {
			$charge = \Stripe\Charge::create(array(
				"amount" => $amount_in_cents, // amount in cents, again
				"currency" => "usd",
				"source" => $token_id,
				"description" => $description
				));
			$return['charge_response'] = json_encode($charge);
			$return['status'] = 'success';	
			return $return;
		} catch (\Stripe\Error\Card $e) { // The card has been declined
			$_SESSION['payment_error'] = 'error processing payment';
			$return['message'] = "Error processing payment";
			$return['error'] = json_encode($e->getJsonBody());
			$return['error_details']  	= json_encode($e->getJsonBody());
			$return['status'] = 'error';	
			return $return;
		} catch (\Stripe\Error\Base $e) {
			$return['message'] = "Error processing payment";
			$return['error'] = json_encode($e->getJsonBody());
			$_SESSION['payment_error'] = 'error processing payment';
			$return['error_details']  	= json_encode($e->getJsonBody());
			$return['status'] = 'error';	
			return $return;
		}	 
	}
}
}
?>
