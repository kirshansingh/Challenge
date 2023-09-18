<?php
/**
 * Display two arrays in a table format.
 *
 * @param array $array1 The first array to be displayed in the left column.
 * @param array $array2 The second array to be displayed in the right column.
 */
function displayArraysInTable($array1, $array2) {
    // Ensure both arrays have the same length
    $count1 = count($array1);
    $count2 = count($array2);
    $rowCount = max($count1, $count2);

    // Print the table header
    echo "<table border='1'>
            <tr>
                <th>Names that responded 'Yes'</th>
                <th>Names that responded 'No'</th>
            </tr>";

    // Print the table rows
    for ($i = 0; $i < $rowCount; $i++) {
        echo "<tr>
                <td>" . ($i < $count1 ? $array1[$i] : '') . "</td>
                <td>" . ($i < $count2 ? $array2[$i] : '') . "</td>
            </tr>";
    }

    // Close the table
    echo "</table>";
}

// Function to trigger an HTTP request, process the response, and display data in a table
function printResponseColumns() {
    // Make an HTTP request to http://echo.jsontest.com/
    $jsonResponse = file_get_contents('http://echo.jsontest.com/john/yes/tomas/no/belen/yes/peter/no/julie/no/gabriela/no/messi/no');
    
    // Error handling for the HTTP request
    if ($jsonResponse === false) {
        echo 'Failed to retrieve data from the server.';
        return;
    }
    
    // Decode the JSON response
    $data = json_decode($jsonResponse, true);
    
    // Error handling for JSON decoding
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Failed to parse JSON response.';
        return;
    }
    
    // Organize names based on responses
    $yesNames = [];
    $noNames = [];
    
    // Iterate over the data and categorize names into 'yes' and 'no' arrays
    foreach ($data as $name => $response) {
        if ($response === 'yes') {
            $yesNames[] = $name;
        } elseif ($response === 'no') {
            $noNames[] = $name;
        }
    }

    // Display the organized arrays in a table format
    displayArraysInTable($yesNames, $noNames);
}

// Call the function to execute the process
printResponseColumns();
?>
