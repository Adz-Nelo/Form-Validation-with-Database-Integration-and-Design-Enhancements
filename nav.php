<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .nav {
            text-align: center;
        }

        .nav a {
            font-size: 25px;
            text-shadow: 1px 1px 10px black;
            position: relative;
            top: 15px;
            color: white;
            display: inline-block;
            margin: 0 10px;
            text-decoration: none;
            transition: font-size 0.4s, background-color 0.4s;
        }

        .nav a:hover {
            background-color: #FEBE41;
            height: 35px;
            width: 120px;
            border-radius: 10px;
            font-size: 30px;
            font-weight: 500;
            text-shadow: 2px 2px 10px black;
            box-shadow: 1px 1px 3.5px lightgreen;
        }
    </style>
</head>

<body>
    <nav class="nav">
        <a href="index.php">Home</a>
        <a href="search.php">Search</a>
        <a href="log-in.php">Log-In</a>
    </nav>
</body>

</html>