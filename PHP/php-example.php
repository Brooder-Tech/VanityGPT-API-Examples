<?php

// The more complex he api call the longer it takes to create the wallet.  A Standard php execution time in 30 seconds.  
// So this needs to be extended for more complex calls (The example below sets the execution time to 5 minutes, but this can be inreates to infinite )
ini_set('max_execution_time', '300');

$url = "https://api.vanityGPT.com/create-address/?text=AA&method=START";
$headers = [
    "x-api-key: your_api_key",
    "Accept: application/json"
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

$returnedData = json_decode($response, true);

// Example of parsing the response
if ($returnedData['success'] == "true") {

  // Wallet details
  $wallet = $returnedData['data'];

  // Public Key
  echo "Public Key:- " . $wallet['publicKey'];
  echo "Public Key:- " . $wallet['privateKey'];
}
else
{
  // Display error message
  echo $returnedData['message'];
  die();
}
