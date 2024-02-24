<?php

$user_id = $_REQUEST["id"];

include("connections.php");

$query_delete = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");

while ($row_delete = mysqli_fetch_assoc($query_delete)) {

    $user_id = $row_delete["id"];

    $db_name = $row_delete["name"];
    $db_address = $row_delete["address"];
    $db_email = $row_delete["email"];
}

echo "<h1 class='h1'> Are you sure you want to delete $db_name? </h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
</head>

<body>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-image: url(img/sad.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .h1 {
            text-align: center;
            font-size: 40px;
            color: white;
            text-shadow: 2px 2px 10px black;
            position: relative;
            bottom: -15px;
        }

        .h1::selection {
            background-color: #3F95FE;
            text-shadow: 2px 2px 10px black;
        }

        .y-button,
        .n-button {
            position: relative;
            text-align: center;
            right: -478px;
            background-color: transparent;
            color: white;
            border-color: white;
            border-radius: 5px;
            height: 50px;
            width: 150px;
            font-size: 30px;
            box-shadow: 2px 2px 10px black;
            text-shadow: 2px 2px 10px black;
            transition: font-size 0.3s, background-color 0.3s;
            cursor: pointer;
        }

        .y-button:hover {
            background-color: #FF0004;
            font-size: 35px;
            height: 50px;
            width: 150px;
        }

        .n-button:hover {
            background-color: #00EAFF;
            font-size: 35px;
            height: 50px;
            width: 150px;
        }
    </style>


    <form method="POST" action="Delete_Now.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

        <br>
        <br>

        <input type="submit" value="Yes" class="y-button"> &nbsp;
        <input type="submit" value="No" class="n-button"> &nbsp;
    </form>
</body>

</html>