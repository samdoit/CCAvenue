
# CCAvenue Payment Gateway PHP

A simple PHP extension for CCAvenue(www.ccavenue.com) payment gateway integration in Laravel


## Installation

Require this package in your composer.json and update composer. This will download the package.

    composer require samdoit/ccavenue

### Laravel

After updating composer, add the ServiceProvider to the providers array in config/app.php

    Samdoit\CCAvenue\CCAvenueServiceProvider::class,
    
packege auto discovery available for laravel version 7.3 or later

After adding ServiceProvider, Run the command 
        
    php artisan vendor:publish

#### Request Payment

	require_once __DIR__ . '/../vendor/autoload.php'; 
	use Samdoit\CCAvenue\CCAvenuePayment;

	$ccavenue = new CCAvenuePayment();

	// set details 
	$ccavenue->setAmount( '<Amount>' );
	$ccavenue->setOrderId( '<order_id>' );
	$ccavenue->setBillingName( '<billing_cust_name>' );
	$ccavenue->setBillingAddress( '<billing_cust_address>' );
	$ccavenue->setBillingCity( '<billing_cust_city>' );
	$ccavenue->setBillingZip( '<billing_cust_zip>' );
	$ccavenue->setBillingState( '<billing_cust_state>' );
	$ccavenue->setBillingCountry( '<billing_cust_country>' );
	$ccavenue->setBillingEmail( '<billing_cust_email>' );
	$ccavenue->setBillingTel( '<billing_cust_tel>' );
	$ccavenue->setBillingNotes( '<billing_cust_notes>' );

	// copy all the billing details to chipping details
	$ccavenue->billingSameAsShipping();

	// get encrpyted data to be passed
	$data = $ccavenue->getEncryptedData();

	// merchant id to be passed along the param
	$access_code = $ccavenue->getAccessCode();
	

#### HTML Redirect
	<html>
	<body>
        <form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
            <input type=hidden name=encRequest value="{{ $data }}">
            <input type=hidden name=access_code value="{{ $access_code }}">
        </form>

        <script language='javascript'>document.redirect.submit();</script>
	</body>
	</html>


#### Payment Response

	require_once __DIR__ . '/../vendor/autoload.php'; 
	use Samdoit\CCAvenue\CCAvenuePayment;

	// Get Response
	$response = $_GET_["encResp"];

	$ccavenue = new CCAvenuePayment();

	// Check if the transaction was successfull.
	echo $ccavenue->response($response);
