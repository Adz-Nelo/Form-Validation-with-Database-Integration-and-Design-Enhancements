<?php

$user_id = $_REQUEST["id"];
include("connections.php");

$get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");

while ($row_edit = mysqli_fetch_assoc($get_record)) {

    $db_name = $row_edit["name"];
    $db_address = $row_edit["address"];
    $db_email = $row_edit["email"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record!</title>

    <h1 class="record">Update Record</h1><br>
    <hr>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-image: url('img/3D\ illustration\ of\ 3\ skyscrapers\ and\ round\ paramet.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .record {
            text-align: center;
            font-size: 35px;
            color: white;
            text-shadow: 2px 2px 10px black;
            position: relative;
            top: 15px;
        }

        .record::selection {
            background-color: #BA12E1;
            color: white;
            text-shadow: 2px 2px 18px black;
        }

        .update-container {
            margin: auto;
            height: 325px;
            width: 285px;
            border: 2px solid;
            border-radius: 6px;
            padding: 10px;
            border-color: white;
            margin-bottom: 25px;
            backdrop-filter: blur(40px);
            position: relative;
            bottom: -10px;
        }

        .update-record {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20.5px;
            position: relative;
            top: -5px;
            padding: 62px;
            color: #2C2F34;
            text-align: center;
            color: white;
            font-weight: semi-bold;
            text-shadow: 1px 1px 10px black;
        }

        .update-record::selection {
            background-color: #BA12E1;
            color: white;
            text-shadow: 2px 2px 11px black;
        }

        .person,
        .home,
        .email {
            font-size: 25px;
            color: white;
            vertical-align: middle;
            margin-right: 12px;
            text-shadow: 2px 2px 10px black;
            padding-left: 2px;
        }

        .new-tbox {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
            vertical-align: middle;
            border: 1px solid;
            margin-left: auto;
            border-radius: 2px;
            height: 1.8em;
            width: 15.5em;
            padding-right: 0 7px;
        }

        .submit-update {
            display: block;
            margin: 0 auto;
            margin-top: -5px;
            padding: 0 50px;
            height: 20px;
            font-size: 16px;
            background-color: transparent;
            border: 1.5px solid;
            border-radius: 5px;
            border-color: white;
            transition: font-size 0.3s, background-color 0.3s;
            cursor: pointer;
            color: white;
            text-shadow: 5px;
            box-shadow: 5px;
            height: 2.3em;
            width: 10.5em;
        }

        .submit-update:hover {
            font-size: large;
            background-color: #BA12E1;
            text-shadow: 2px 2px 10px black;
            height: 2.3em;
            width: 10.5em;
        }
    </style>
</head>

<body>

    <div class="update-container">
        <form method="POST" action="Update_Record.php">
            <br>
            <span class="update-record">Update Record</span><br>
            <hr class="hr">
            <br>

            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <ion-icon name="person" class="person"></ion-icon><input type="text" name="new_name" value="<?php echo $db_name; ?>" class="new-tbox"><br>
            <br><br>

            <ion-icon name="home" class="home"></ion-icon><input type="text" name="new_address" value="<?php echo $db_address; ?>" class="new-tbox"><br>
            <br><br>

            <ion-icon name="mail" class="email"></ion-icon><input type="text" name="new_email" value="<?php echo $db_email; ?>" class="new-tbox"><br>
            <br><br>

            <input type="submit" value="Update" class="submit-update">
        </form>
    </div>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>