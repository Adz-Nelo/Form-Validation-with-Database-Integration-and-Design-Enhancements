<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-image: url('img/A\ classroom\ with\ a\ teachers\ desk.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 55em;
        }

        .log-in-form {
            margin: auto;
            height: 270px;
            width: 285px;
            border: 2px solid;
            border-radius: 6px;
            padding: 10px;
            border-color: white;
            margin-bottom: 25px;
            backdrop-filter: blur(40px);
            position: relative;
            bottom: -100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .h1 {
          position: relative;
          padding-left: 0 100px;
        }

        .error {
            color: #FA6A6A;
            text-align: center;
            position: relative;
            top: 5px;
            padding-left: 70px;
            font-size: 15px;
            text-shadow: 1px 1px 2px red;
        }

        .h1 {
            position: relative;
            margin-top: -30px;
            text-align: center;
            color: white;
            text-shadow: 1px 1px 10px black;
        }

        .hr {
            width: 18em;
        }

        .email,
        .lock {
            font-size: 25px;
            color: white;
            vertical-align: middle;
            position: relative;
            top: 9px;
            right: -5px;
        }

        .text {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
            vertical-align: middle;
            border: 1px solid;
            margin-left: auto;
            border-radius: 2px;
            height: 1.8em;
            width: 15.5em;
            position: relative;
            padding-right: 0 15px;
            margin-bottom: 10px;
            top: 15px;
            right: -18px;
            bottom: -10px;
        }

        .log-in {
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
            box-shadow: 1px 1px 10px #4D4B43;
            transition: font-size 0.3s, background-color 0.3s;
            cursor: pointer;
            color: white;
            text-shadow: 5px;
            box-shadow: 5px;
            height: 2.3em;
            width: 10.5em;
            text-shadow: 1px 1px 10px black;
            position: relative;
            bottom: -30px;
        }

        .log-in:hover {
            font-size: large;
            background-color: #ECD917;
            text-shadow: 2px 2px 10px black;
            height: 2.3em;
            width: 10.5em;
        }

    </style>

</head>

<body>
    <?php

    $email = $password = "";
    $emailErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["email"])) {
            $emailErr = "Email is required!";
        } else {
            $email = $_POST["email"];
        }

        if (empty($_POST["password"])) {
            $passwordErr = "Password is required!";
        } else {
            $password = $_POST["password"];
        }

        if ($email && $password) {

            include("connections.php");

            $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email='$email'");
            $check_email_row = mysqli_num_rows($check_email);

            if($check_email_row > 0){
                while($row = mysqli_fetch_assoc($check_email)) {

                    $user_id = $row["id"];

                    $db_password = $row["password"];
                    $db_account_type = $row["account_type"];

                        if($password == $db_password){

                            session_start();

                            $_SESSION["id"] = $user_id;

                            if($db_account_type == "1") {
                                echo "<script>window.location.href='admin';</script>";
                            } else {
                                echo "<script>window.location.href='user';</script>";
                            }

                        } else {
                            $passwordErr = "Password is incorrect!";
                        }
                }
            } else {
                $emailErr = "Email is not registered!";
            }
        }
    }
    ?>

    <div class="log-in-form">
        <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <h1 class="h1">Log-In</h1>
            <hr class="hr">

            <ion-icon name="mail" class="email"></ion-icon><input type="text" name="email" class="text" value="<?php echo $email; ?>"><br>
            <span class="error"><?php echo $emailErr; ?></span><br>

            <ion-icon name="lock-closed" class="lock">></ion-icon><input type="password" name="password" class="text" value="<?php echo $password; ?>"><br>
            <span class="error"><?php echo $passwordErr; ?></span><br>

            <input type="submit" value="login" class="log-in">
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>