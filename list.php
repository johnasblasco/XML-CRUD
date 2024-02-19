<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Records</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap');
    *{
        font-family: Fredoka;
    }
    .container {
    width: 80%;
    margin: 0 auto;
    padding-top: 20px;
}

h2 {
    text-align: center;
    font-size: 24px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

button {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    text-decoration: none;
    margin-left: auto;
    padding: 3vh;
    width: 20vw;
    margin-right: auto;
    font-size: larger;
    
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>List Records</h2>
        <table>
            <tr>
                <th>User Name</th>
            </tr>
            <?php 
                // Load the XML file
                $xml = simplexml_load_file("data.xml");

                if ($xml === false) {
                    die('Error: Cannot load XML file');
                }

                // Loop through each user and display their names
                foreach ($xml->user as $user) {
                    echo "<tr><td>" . $user->name . "</td></tr>";
                }

            ?>
        </table>
        <button onclick="window.location.href='index.html'">Back to Home</button>
    </div>
</body>
</html>
