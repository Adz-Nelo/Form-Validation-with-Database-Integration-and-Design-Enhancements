<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>

    <h1 class="dev">Developed By: Adriel M. Bigcas</h1><br>
    <hr>

    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-image: url('img/coding.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .dev {
            text-align: center;
            font-size: 30px;
            color: white;
            text-shadow: 2px 2px 10px black;
            position: relative;
            top: 15px;
        }

        .dev::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 2px 2px 18px black;
        }


        .form-container {
            margin: auto;
            height: 470px;
            width: 285px;
            border: 2px solid;
            border-radius: 6px;
            padding: 10px;
            border-color: white;
            margin-bottom: 25px;
            backdrop-filter: blur(40px);
            position: relative;
            bottom: -10px;
            box-shadow: 1px 1px 10px black;
        }

        .error {
            color: #FA6A6A;
            text-align: center;
            padding: 50px;
            font-size: 15px;
            text-shadow: 2px 2px 6px red;
        }

        .person,
        .home,
        .email,
        .lock {
            font-size: 25px;
            color: white;
            vertical-align: middle;
            margin-right: 12px;
            text-shadow: 2px 2px 10px black;
            padding-left: 2px;
        }

        .form-valid {
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

        .form-valid::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 2px 2px 11px black;
        }

        .t-box,
        .password {
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

        .submit {
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

        .submit:hover {
            font-size: large;
            background-color: #FEBE41;
            text-shadow: 2px 2px 10px black;
            height: 2.3em;
            width: 10.5em;
        }

        .result {
            text-align: center;
            color: white;
            text-shadow: 2px 2px 2px black;
        }

        .table-container {
            text-align: center;
            margin-top: 35px;
            padding-left: 15.5em;

        }

        .table-header {
            font-size: large;
            font-weight: 530;
            text-shadow: 2px 2px 2px black;
        }

        .table-header::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 2px 2px 6px black;
        }

        .tr,
        .table-data {
            backdrop-filter: blur(35px);
            padding: 6px;
            text-shadow: 2px 2px 3px black;
        }

        .table-data::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 2px 2px 6px black;
        }

        .dev::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 2px 2px 18px black;
        }

        .option {
            backdrop-filter: blur(35px);
        }

        .update-link,
        .delete-link {
            font-size: 18px;
            text-shadow: none;
            font-weight: bold;
            color: #BD29E8;
            text-shadow: 1px 1px 40px purple;
            transition: font-size 0.4s, color 0.4s;
        }

        .update-link {
            padding-left: 22px;
        }

        .update-link:hover {
            color: #3BFF86;
            font-size: 20px;
        }

        .delete-link {
            padding-right: 22px;
        }

        .delete-link:hover {
            color: #FF0000;
            font-size: 20px;
        }

        .my-table {
            border-radius: 6px;
            box-shadow: 1px 1.5px 12px black;
        }

        .update-link::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 1px 1px 20px black;
        }

        .delete-link::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 1px 1px 20px black;
        }

        .table-header-option {
            width: 12.51em;
        }

        .table-header-option::selection {
            background-color: #FCFF57;
            color: #2C2F34;
            text-shadow: 2px 2px 6px black;
        }
    </style>
</head>

<body>

    <?php

    include("connections.php");

    $name = $address = $email = $password = $cpassword = "";
    $nameErr = $addressErr = $emailErr = $passwordErr = $cpasswordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required!";
        } else {
            $name = $_POST["name"];
        }

        if (empty($_POST["address"])) {
            $addressErr = "Address is required!";
        } else {
            $address = $_POST["address"];
        }

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

        if (empty($_POST["cpassword"])) {
            $cpasswordErr = "Confirm password is required!";
        } else {
            $cpassword = $_POST["cpassword"];
        }

        if ($name && $address && $email && $password && $cpassword) {

            $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email='$email'");
            $check_email_row = mysqli_num_rows($check_email);

            if ($check_email_row > 0) {
                $emailErr = "Email is already registered!";
            } else {
                $query = mysqli_query($connections, "INSERT INTO mytbl (name,address,email,password,account_type)
                VALUES ('$name','$address','$email','$password','2')");

                echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
        }
    }
    ?>

    <br>

    <?php include("nav.php"); ?>

    <br>
    <br>

    <div class="form-container">

        <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
            <br>
            <span class="form-valid">Form Validation</span><br>
            <hr class="hr">
            <br>

            <ion-icon name="person" class="person"></ion-icon><input type="text" name="name" value="<?php echo $name; ?>" class="t-box"><br>
            <span class="error"><?php echo $nameErr; ?></span><br><br>

            <ion-icon name="home" class="home"></ion-icon><input type="text" name="address" value="<?php echo $address; ?>" class="t-box"><br>
            <span class="error"><?php echo $addressErr; ?></span><br><br>

            <ion-icon name="mail" class="email"></ion-icon><input type="text" name="email" value="<?php echo $email; ?>" class="t-box"><br>
            <span class="error"><?php echo $emailErr; ?></span><br><br>

            <ion-icon name="lock-open" class="lock"></ion-icon><input type="password" name="password" value="<?php echo $password; ?>" class="password"><br>
            <span class="error"><?php echo $passwordErr; ?></span><br><br>

            <ion-icon name="lock-closed" class="lock"></ion-icon><input type="password" name="cpassword" value="<?php echo $cpassword; ?>" class="password"><br>
            <span class="error"><?php echo $cpasswordErr; ?></span><br><br>

            <input type="submit" name="" value="Submit" class="submit"><br>

        </form>
    </div>

    <div class="result">

        <?php

        $view_query = mysqli_query($connections, "SELECT * FROM mytbl");
        ?>

        <div class="table-container">
            <table border='1' width='77.5%' class='my-table'>
                <tr class="tr">
                    <td class="table-header">Name</td>
                    <td class="table-header">Address</td>
                    <td class="table-header">Email</td>

                    <td class="table-header-option">Option</td>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($view_query)) {

                    $user_id = $row["id"];

                    $db_name = $row["name"];
                    $db_address = $row["address"];
                    $db_email = $row["email"];

                    echo "<tr>
                        <td class='table-data'>$db_name</td>
                        <td class='table-data'>$db_address</td>
                        <td class='table-data'>$db_email</td>

                        <td class='option'>
                            <a href='Edit.php?id=$user_id' class='update-link'>Update</a>&nbsp;
                            <a href='ConfirmDelete.php?id=$user_id' class='delete-link'>Delete</a>
                        </td>";
                }
                ?>
            </table>
        </div>

        <hr>

        <?php

        $Elle = "Elle";
        $Aries = "Aries";
        $Sol = "Sol";

        $names = array("Aries", "Elle", "Sol");

        foreach ($names as $display_names) {
            echo $display_names . "<br>";
        }
        ?>
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>