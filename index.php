<?php
require 'vendor/autoload.php';

/*
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('4963ym4c6dxrgzng');
Braintree_Configuration::publicKey('w5f9q49md3nwjd8q');
Braintree_Configuration::privateKey('6ef75cc2d78f5e599ede4fba61021474');

$clientToken = Braintree_ClientToken::generate();

?>
<html>
	<head>
		<title>Selling Pi Cars</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<h1>Buy this amazing RC Car powered by RaspberryPi</h1>
		<div id="divImage">
			<img src="https://pbs.twimg.com/media/B9crMEeCcAAiOjw.jpg" width="100" height="150" />
		</div>
		<br /><br />
		<form method="post" action="checkout.php">
			<div id="divCheckout">
			</div>
			<br /><br />
			<div id="divButton">
				<input type="submit" value="Pay for it $100" />
			</div>
		</form>

		<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
		<script>
			braintree.setup(	'<?=$clientToken?>',
	  	         				'dropin', {
	                 				container: 'divCheckout'
	                     		}
	                     	);
		</script>
	</body>
</html>


