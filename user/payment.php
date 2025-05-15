<?php
session_start();
include("../site/backend/dbcon.php");

require_once('../vendor/autoload.php');

if (isset($_POST['amount'])) {
    $amount = intval($_POST['amount']);


    $client = new \GuzzleHttp\Client();

    $response = $client->request('POST', 'https://api.paymongo.com/v1/links', [
        'body' => json_encode([
            'data' => [
                'attributes' => [
                    'amount' => $amount,
                    'description' => 'Buying Product',
                    'remarks' => 'Donut',
                    'redirect' => [
                        'success' => 'site/pages/donut.html?success',
                        'failed' => 'site/pages/donut.html?failed'
                    ]
                ]
            ]
        ]),
        'headers' => [
            'accept' => 'application/json',
            'authorization' => 'Basic c2tfdGVzdF9yR0ZiRTlZdmh3UWhQM1F6ZnR6UGNWTWg6',
            'content-type' => 'application/json',
        ],
    ]);

    $response_body = json_decode($response->getBody(), true);

    $checkoutUrl = $response_body['data']['attributes']['checkout_url'] ?? null;

    if ($checkoutUrl) {
        header("Location: $checkoutUrl");
        exit;
    } else {
        echo "Error creating payment source:<br><pre>";
        print_r($response_body);
        echo "</pre>";
    }

}
?>