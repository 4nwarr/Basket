<?php
include("./database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="functionalpage.css">
    <style>
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
    <h1>Add new player</h1>
    <form action="add_player.php" method="POST">

        <?php
        $is_first_page = !(array_key_exists("name", $_POST));

        if (!$is_first_page) {

            $exists_player = false;

            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $height = $_POST['height'];

            if ($name !== "" && $surname !== "" && $height !== "") {

                $sql = "
                    Select * 
                    from player 
                    where Name = '" . $name . "' 
                    and Surname = '" . $surname . "'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //PLAYER ALREADY PRESENT IN THE LIST
                    echo "<div class=\"alert alert-danger\" role=\"alert\">
                            PLAYER ALREADY PRESENT IN THE LIST !
                        </div>";
                } else {
                    //PLAYER ADDED TO THE LIST !
                    $add_player_sql = "INSERT INTO player 
                                        values('" . $name . "','" . $surname . "'," . $height . ");";
                    $conn->query($add_player_sql);

                    echo "<div class=\"alert alert-success\" role=\"alert\">
                            PLAYER ADDED TO THE LIST !
                        </div>";
                }
            } else {
                echo "<div class=\"alert alert-warning\" role=\"alert\">
                FILL ALL INPUT FIELDS !
                </div>";
            }
        }

        $conn->close();
        ?>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname">
        </div>
        <div class="">
            <label for="height" class="form-label">Height (cm)</label>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <input type="number" class="form-control" id="height" min="100" max="300" name="height">
                </div>
            </div>
            <div class="col-8">
                <button type="submit" class="btn btn-outline-primary" id="test">Add Player</button>
            </div>
        </div>
    </form>
</body>

</html>