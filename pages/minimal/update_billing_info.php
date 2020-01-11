  <?php

  require_once('../../recurly/lib/recurly.php');
  //require_once('./datagen/src/autoload.php');

  Recurly_Client::$subdomain = $_POST['recurly-subdomain'];
  Recurly_Client::$apiKey = $_POST['recurly-privatekey'];

  //$accountdata = Faker\Factory::create();
  //$firstname = $accountdata->firstName($gender = null)
  //$lastname = $accountdata->lastName

  
try {
    $tokenId = $_POST['recurly-token'];

    $billing_info = new Recurly_BillingInfo();
    $billing_info->account_code = $_POST['recurly-account'];
    $billing_info->token_id = $tokenId; // From Recurly.js

    $billing_info->update();


  } catch (Exception $e) {

    $error = $e->getMessage();

  }

if (isset($error)) {
    header("Location: ../error.html");
  } else {
    header("Location: ../success.html");
  };



  try {
  $billing_info = new Recurly_BillingInfo();
  $billing_info->account_code = 'b6f5783';
  $billing_info->token_id = '7z6furn4jvb9'; // From Recurly.js
  $billing_info->update();

  print "Billing Info: $billing_info";
} catch (Recurly_NotFoundError $e) {
  // Could not find account or token is invalid or expired
  print "Not Found: $e";
}