<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/index.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/countUp.min.js"></script>


    <meta charset="UTF-8">
    <title>KittyJar - Who are you?</title>
</head>
<body>

<div class="jumbotron">
    <?php
    include 'head.php';
    include 'database.php';
    ?>

    <h1>Who are you?</h1>
    <br/>

    <?php
        $groupID = 1;
        $sql = "SELECT name FROM User WHERE groupID = " . $groupID . " ORDER BY name";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                echo("<button type='button' class='btn btn-primary who-btn'>" . $row['name'] . "</button><br/>");
            }
        }
    ?>
</div>

</body>
</html>