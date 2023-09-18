<?php
/**
 * Retrieve the current date and time from a JSON API and format it in a readable format.
 *
 * @return string The formatted current date and time.
 */
function getCurrentDate() {
    // Make an HTTP request to http://date.jsontest.com/
    $jsonResponse = file_get_contents('http://date.jsontest.com/');
    
    // Error handling for the HTTP request
    if ($jsonResponse === false) {
        return 'Failed to retrieve data from the server.';
    }
    
    // Decode the JSON response
    $data = json_decode($jsonResponse, true);
    
    // Error handling for JSON decoding
    if (json_last_error() !== JSON_ERROR_NONE) {
        return 'Failed to parse JSON response.';
    }
    
    // Extract the timestamp from the JSON data
    $timestamp = $data['milliseconds_since_epoch'] / 1000;
    
    // Format the date in a readable format
    $formattedDate = date('l jS \of F, Y - h:i A', $timestamp);
    
    return $formattedDate;
}

// Get and print the current date
echo getCurrentDate();
?>