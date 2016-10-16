<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/bootstrap.min.js"></script>


    <meta charset="UTF-8">
    <title>KittyJar</title>
</head>
<body>


<div class="jumbotron">
    <?php
    include 'head.php';
    ?>

    <p>Welcome to the simplest house bill splitting tool out there! </p>

    <h6>Already got a house?</h6>
    <form action="groupHome.html" method="get">
        <input type="text" name="groupCode" class="form-control grpCodeText shortTextBox" placeholder="Group code"
               aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-primary grpCodeButton">Enter!</button>
    </form>
    <br>
    <form action="newGroup.php">
        <button type="Submit" class="btn btn-success">Register Group</button>
    </form>

</div>

</body>
</html>