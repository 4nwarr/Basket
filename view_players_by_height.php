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
    <title>View Players By Height</title>
    <style>
        form {
            width: 40%;
        }

        .btn {
            color: var(--basket-orange);
            border-color: var(--basket-orange);
            font-size: 1.5rem;
            transition: 0.2s;
        }

        .btn:hover {
            background-color: var(--basket-orange);
            border-color: var(--basket-orange);
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <h1 style="margin-bottom: 30px;">Basketball Players By Height</h1>
    <form action="view_players_by_height.php" method="GET">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <input type="number" class="form-control" id="height" min="100" max="300" name="height" placeholder="Height">
                </div>
            </div>
            <div class="col-8">
                <button type="submit" class="btn btn-outline-primary">View Table</button>
            </div>
        </div>


        <?php

        $is_first_page = !(array_key_exists("height", $_GET));

        if (!$is_first_page) {
            $players_by_height_sql = "
            Select *
            From player
            Where height =" . $_GET["height"] . ";";

            $result = $conn->query($players_by_height_sql);

            if ($result->num_rows > 0) {
                echo "</form>";

                echo "<table>";

                echo "<tr>";
                echo "<th>" . "Name" . "</th>";
                echo "<th>" . "Surname" . "</th>";
                echo "<th>" . "Height" . "</th>";
                echo "</tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";

                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["Surname"] . "</td>";
                    echo "<td>" . $row["Height"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "  <div style=\"margin-top: 40px;\" class=\"alert alert-warning\" role=\"alert\">
                    NOBODY HAS THIS HEIGHT
                </div>
                </form>";
            }
        }
        ?>

</body>

</html>