<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["new_name"])) {
    $name = $_POST["name"];
    $newName = $_POST["new_name"];

    // Load the XML file
    $xml = simplexml_load_file("data.xml");

    if ($xml === false) {
        die('Error: Cannot load XML file');
    }

    $userFound = false;

    // Loop through each user to find the one with the matching name
    foreach ($xml->user as $user) {
        if ($user->name == $name) {
            // Update the user's name
            $user->name = $newName;
            $userFound = true;
            break;
        }
    }
    if (!$userFound) {
        // echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
        // echo '<h1 style="font-family: Arial, sans-serif; color: #FF0000; text-align: center;"> User not found</h1>';
        // echo '</div>';
        die('user not found');
        exit(); // You might want to exit the script after displaying the error message
        
    }
    
    

    // Save the changes back to the XML file
    $xml->asXML("data.xml");

    // Redirect back to the update.html page after updating the record
    header("Location: update.html");
    exit();
} else {
    // If the form is not submitted or required data is missing, redirect to index.html
    header("Location: index.html");
    exit();
}
?>
