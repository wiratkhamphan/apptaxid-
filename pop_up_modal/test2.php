<?php

// Data to be sent in the request body
$data = array(
    "ID"          => "",
    "ID_RQ"       => "456",
    "Cuscode_id"  => "789",
    "Date_app"    => 1637038800, // Replace with an appropriate timestamp
    "Sum_sn"      => "ABC123",
    "Store"       => "StoreName",
    "Acknowledge" => "Yes"
);

// Convert data to JSON format
$jsonData = json_encode($data);

// API endpoint URL
$apiUrl = 'http://localhost:8080/albums';

// Set HTTP headers
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => $jsonData,
    ),
);

$context = stream_context_create($options);

// Send the POST request
$response = file_get_contents($apiUrl, false, $context);

// Output the API response
echo $response;
?>
