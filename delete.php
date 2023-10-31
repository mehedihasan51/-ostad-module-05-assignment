<?php
// Specify the path to your JSON file
$jsonFilePath = 'users.json';

// Load the JSON data from the file into a PHP array
$jsonData = file_get_contents($jsonFilePath);
$userData = json_decode($jsonData, true);

// Email to delete
$emailToDelete = '';

// Iterate through the array to find and remove the email data
foreach ($userData as $key => $user) {
    if (isset($user['email']) && $user['email'] === $emailToDelete) {
        unset($userData[$key]); // Remove the user data
    }
}

// Encode the modified array back to JSON
$newJsonData = json_encode(array_values($userData), JSON_PRETTY_PRINT);

// Save the modified data back to the JSON file
file_put_contents($jsonFilePath, $newJsonData);

echo "Email data deleted successfully.";

?>
