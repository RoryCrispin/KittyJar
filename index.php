<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

    <?php include 'libs.php'; ?>

    <meta charset="UTF-8">
    <title>KittyJar</title>
</head>
<body>


<div class="jumbotron">
    <?php
        include 'head.php';

        if(isset($_GET['error'])) {
            echo("<div class='alert alert-danger' role='alert'>Could not find the group that belongs to that code!</div>");
        }
    ?>

    <p>Welcome to the simplest bill splitting tool out there! </p>

    <h6>Already got a group?</h6>
    <form action="func/handleGroupLogin.php" method="post">
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