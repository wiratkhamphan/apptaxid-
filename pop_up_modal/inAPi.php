<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = array(
        "ID_RQ"       => $_POST["ID_RQ"],
        "Cuscode_id"  => $_POST["Cuscode_id"],
        "Date_app"    => $_POST["Date_app"],
        "Sum_sn"      => $_POST["Sum_sn"],
        "Store"       => $_POST["Store"],
        "Acknowledge" => $_POST["Acknowledge"]
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

    // Send the POST request and capture the response
    // print_r($_POST);
    // exit;

    // echo $apiUrl;
    // echo $context;

    $response = file_get_contents($apiUrl, false, $context);
    
    // print_r($response);

    if ($response === FALSE) {
        // Handle the error, including the HTTP response details
        $error = error_get_last();
        echo "Error: Unable to send the request. HTTP response details: " . print_r($error, true);
    } else {
        // Output the API response
        echo "Response from server: " . $response;

        // Redirect back to test.php
        // header("Location: test.php");
        // exit; // Make sure to exit after setting the header
    }

    // Now, the cURL code block
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'cURL Error: ' . curl_error($ch);
    }

    echo "Response from server: " . $response;

    curl_close($ch);
}
?>
