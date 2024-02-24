<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-image: url('img/Design an image showing a magnifying glass examini.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh;
        }

        .text {
            position: relative;
            display: inline-block;
            left: 20px;
            top: 20px;
            height: 20px;
        }

        .error {
            color: #FA6A6A;
            text-align: center;
            font-size: 15px;
            text-shadow: 2px 2px 6px red;
            position: relative;
            display: inline-block;
            left: 20px;
            top: 20px;
        }

        .search {
            position: relative;
            display: inline-block;
            left: 20px;
            top: 15px;
            display: block;
            margin-top: 5px;
            left: 20px;
            top: 21.5px;
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
            height: 2em;
            width: 8.5em;
            left: 72px;
        }

        .search-icon {
            font-size: 25px;
            color: white;
            vertical-align: middle;
            margin-right: 12px;
            text-shadow: 2px 2px 10px black;
            position: relative;
            bottom: -20px;
            right: -28px;
        }

        .search:hover {
            font-size: large;
            background-color: #FEBE41;
            text-shadow: 2px 2px 10px black;
            height: 2.2em;
            width: 9em;
        }
    </style>

</head>

<body>
    <?php

    $search = $searchErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["search"])) {

            $searchErr = "Required!";
        } else {
            $search = $_POST["search"];
        }

        if ($search) {
            echo "<script>window.location.href='result.php?search=$search';</script>";
        }
    }

    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <ion-icon name="search" class="search-icon"></ion-icon><input type="text" name="search" class="text" value="<?php echo $search; ?>">
        <span class="error"><?php echo $searchErr; ?></span>
        <br>
        <input type="submit" class="search"value="search">
    </form>
</body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>