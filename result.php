<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background: url('img/hacker.jpg') center/cover no-repeat;
            margin: 0;
            height: 100vh;
            color: white;
            position: relative;
            right: -20px;
            bottom: -20px;
            text-shadow: 1px 1px 10px black;
            font-weight: 530;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    include("connections.php");

    if (empty($_GET["search"])) {
        echo "No data found.";
    } else {
        $check = $_GET["search"];

        $terms = explode(" ", $check);
        $q = "SELECT * FROM mytbl WHERE ";
        $i = 0;

        foreach ($terms as $each) {
            $i++;

            if ($i == 1) {
                $q .= "name LIKE '%$each%' ";
            } else {
                $q .= "OR name LIKE '%$each%' ";
            }
        }

        $query = mysqli_query($connections, $q);
        $c_q = mysqli_num_rows($query);

        if ($c_q > 0 && $check != "") {
            while ($row = mysqli_fetch_assoc($query)) {
                echo $name = $row["name"] . "<br>";
            }
        } else {
            echo "No result.";
        }
    }
    ?>
</body>

</html>