<?php
// This script demonstrates a LetterCounter class to count letter occurrences in a string and represent them with asterisks.
class LetterCounter {

    /**
     * Count the occurrences of each letter in the input string and represent them with asterisks.
     *
     * @param string $inputString The input string to count letters in.
     * @return string A string representing the letter counts using asterisks in the format "letter:***".
     */
    public static function CountLettersAsString($inputString) {

        // Convert the input string to lowercase for case-insensitive counting
        $inputString = strtolower($inputString);

        // Initialize an array to store letter counts
        $letterCounts = [];

        // Count the occurrences of each letter
        for ($i = 0; $i < strlen($inputString); $i++) {
            $letter = $inputString[$i];
            if (ctype_alpha($letter)) {
                if (isset($letterCounts[$letter])) {
                    $letterCounts[$letter]++;
                } else {
                    $letterCounts[$letter] = 1;
                }
            }
        }

        // Create the result string with asterisks
        $result = [];
        foreach ($letterCounts as $letter => $count) {
            $result[] = "$letter:" . str_repeat('*', $count);
        }

        return implode(', ', $result);
    }
}

// Example usage
$inputString = "Interview";
$result = LetterCounter::CountLettersAsString($inputString);
echo $result; // Output: "e:**, i:**, n:*, r:*, t:*, v:*, w:*"
?>