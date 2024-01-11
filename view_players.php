<?php
include("./database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="functionalpage.css">
    <title>All Basketball Players</title>

    <style>
        body {
            justify-content: start;
        }
    </style>
</head>

<body>
    <h1>All Basketball Players</h1>

    <?php


    $sql = "Select * from player";
    $result = $conn->query($sql);

    echo "<table>";

    echo "<tr>";
    echo "<th>" . "Namee" . "</th>";
    echo "<th>" . "Surname" . "</th>";
    echo "<th>" . "Height" . "</th>";
    echo "</tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Surname"] . "</td>";
            echo "<td>" . $row["Height"] . "</td>";

            echo "</tr>";
        }
    }

    echo "</table>"
    ?>

</body>

</html>