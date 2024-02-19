<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $name = $_POST["name"];

    // Load the XML file
    $xml = simplexml_load_file("data.xml");

    if ($xml === false) {
        die('Error: Cannot load XML file');
    }

    $userFound = false;

    // Loop through each user to find the one with the matching name
    foreach ($xml->user as $user) {
        if ($user->name == $name) {
            // Remove the user node
            $dom = dom_import_simplexml($user);
            $dom->parentNode->removeChild($dom);
            $userFound = true;
            break;
        }
    }

    if (!$userFound) {
        die('Error: User not found');
    }

    // Save the changes back to the XML file
    $xml->asXML("data.xml");

    // Redirect back to the delete.html page after deleting the record
    header("Location: delete.html");
    exit();
} else {
    // If the form is not submitted or required data is missing, redirect to index.html
    header("Location: index.html");
    exit();
}
?>
