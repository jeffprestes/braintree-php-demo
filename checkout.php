<?php
require 'vendor/autoload.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('4963ym4c6dxrgzng');
Braintree_Configuration::publicKey('w5f9q49md3nwjd8q');
Braintree_Configuration::privateKey('6ef75cc2d78f5e599ede4fba61021474');

$nonce = $_POST["payment_method_nonce"];
//echo "[" . $nonce . "]";


$transData = array(
  'amount' => '100.00',
  'paymentMethodNonce' => $nonce,
  'options' => array(
    'submitForSettlement' => true
  )
);

try {
	$result = Braintree_Transaction::sale($transData);
	if ($result->success)	{
		echo "<html><body><h1>Congratulations! You'll get an awesome car. Your transaction # is: " .  $result->transaction->id;
	} else if ($result->transaction)	{
		print_r("Error processing transaction:");
    	print_r("\n  code: " . $result->transaction->processorResponseCode);
    	print_r("\n  text: " . $result->transaction->processorResponseText);
	}	else {
		print_r("Validation errors: \n");
		print_r($result->errors->deepAll());
	}
} catch (Exception $e) {
	echo "Error: " . $e->getMessage() . " <br />\n";
	var_dump($e->getTraceAsString());
	exit;
}



?>