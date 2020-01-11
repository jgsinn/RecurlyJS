  <?php

  require_once('./recurly/lib/recurly.php');
  //require_once('./datagen/src/autoload.php');

  Recurly_Client::$subdomain = $_POST['recurly-subdomain'];
  Recurly_Client::$apiKey = $_POST['recurly-privatekey'];

  //$accountdata = Faker\Factory::create();
  //$firstname = $accountdata->firstName($gender = null)
  //$lastname = $accountdata->lastName

  
try {
    $tokenId = $_POST['recurly-token'];

    $subscription = new Recurly_Subscription();
    $subscription->plan_code = $_POST['recurly-plan'];
    $subscription->currency = 'USD';
    $account_code = uniqid();

    $subscription->account = new Recurly_Account($account_code);
    $subscription->account->first_name = 'Benjamin';
    $subscription->account->last_name = 'Du Monde';

    $subscription->account->billing_info = new Recurly_BillingInfo();
    $subscription->account->billing_info->token_id = $tokenId;

    $subscription->create();


  } catch (Exception $e) {

    $error = $e->getMessage();

  }

if (isset($error)) {
    header("Location: error.html");
  } else {
    header("Location: success.html");
  };

