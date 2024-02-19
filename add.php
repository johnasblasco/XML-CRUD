<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $name = $_POST["name"];

    // Load the XML file
    $xml = simplexml_load_file("data.xml");

    if ($xml === false) {
        die('Error: Cannot load XML file');
    }

    // Create a new user node
    $user = $xml->addChild("user");

    // Add name attribute to the user node
    $user->addChild("name", $name);

    // Save the changes back to the XML file
    $result = $xml->asXML("data.xml");

    if ($result === false) {
        die('Error: Cannot save XML file');
    }

    // Use JavaScript to display an alert after the PHP script execution

    header("location: index.html");
    exit();
} else {
    // If the form is not submitted or name is not provided, redirect to index.html
    header("Location: index.html");
    exit();
}
?>
