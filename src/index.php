<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>e-Slave - Poseidon</title>
</head>
<body>
    <h1>Here are the best developers you can find:</h1>

    <?php
        $mysqli = new mysqli("db", "root", "example", "eslave");

        $sql = 'SELECT * FROM slaves';

        if($result = $mysqli->query($sql)) {
            while($data = $result->fetch_object()) {
                $slaves[] = $data;
            }
        }

        echo "<div> <br>";
        foreach ($slaves as $slave) {
            echo "<br>";
            echo "Developer: " . $slave->firstname . " " . $slave->lastname;
            echo "<br>";
        }  
        echo "</div>";
    ?>
</body>
</html>