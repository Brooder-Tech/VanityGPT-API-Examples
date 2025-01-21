<?php
$url = "https://api.vanityGPT.com/create-address/?letters=AA&method=START";
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
