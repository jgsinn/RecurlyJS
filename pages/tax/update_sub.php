  <?php

  require_once('../../recurly/lib/recurly.php');
  //require_once('./datagen/src/autoload.php');

  Recurly_Client::$subdomain = $_POST['recurly-subdomain'];
  Recurly_Client::$apiKey = $_POST['recurly-privatekey'];

  //$accountdata = Faker\Factory::create();
  //$firstname = $accountdata->firstName($gender = null)
  //$lastname = $accountdata->lastName

  
try {

  $subscription = Recurly_Subscription::get($_POST['recurly-subscription']);
  $subscription->plan_code = $_POST['recurly-plan'];
  $subscription->quantity = 1;
  $subscription->updateImmediately();    


  } catch (Exception $e) {

    $error = $e->getMessage();

  }

if (isset($error)) {
    header("Location: ../error.html");
  } else {
    header("Location: ../success.html");
  };