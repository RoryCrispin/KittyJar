<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/groupHome.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <title>KittyJar - Who are you?</title>
</head>

<body>
<div class="jumbotron">
    <?php
        function errorRedirect(){
           // header( 'Location: index.php?error' ) ;
        }
            include 'head.php';
            include 'database.php';
            include 'groupDetails.php';
        if(isset($_GET['groupCode'])){
            $groupCode = $_GET['groupCode']; // TODO can't have error and id at the same time
        } else {
            errorRedirect();
        }
    ?>

    <div class="page-header">
        <!--<h1>Welcome, <?php echo( getGroupName($groupCode, $conn)) ?><small> <?php echo($groupCode) ?></small></h1>-->
        <h1><?php echo( getGroupName($groupCode, $conn)) ?></h1>
        <br/>
        <h4>Who are you?</h4>
    </div>

    <?php
        if(isset($_GET['error'])) {
            echo("<div class='alert alert-danger' role='alert'>Incorrect PIN!</div>");
        }

        $sql = 'SELECT * FROM `User` WHERE `groupCode` = "' . $groupCode . '" ORDER BY `name`';
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                if(empty($row['pin'])) {
                    echo("<button type='button' class='btn btn-primary who-btn' data-toggle='modal'
                            data-target='#registerModal' userID='$row[userID]'>" . $row['name'] . "</button><br/>");
                } else {
                    echo("<button type='button' class='btn btn-primary who-btn' data-toggle='modal'
                        data-target='#loginModal' userID='$row[userID]'>" . $row['name'] . "</button><br/>");
                }
            }
        } else {
            errorRedirect();
        }

        include 'registerModal.html';
        include 'loginModal.html';
    ?>
</div>

<script>
    var name;

    $(".who-btn").click(function() {
        name = $(this).html();
        var userID = $(this).attr("userID");

        // set the action's id to the userid
        $("#registerForm").attr("action", "handleSetDetails.php?id=" + userID);
        $("#loginForm").attr("action", "handleUserLogin.php?id=" + userID);

        $('.modal-title').each(function() {
            var firstName;
            if(name.indexOf(' ')!=-1) {
                firstName = name.substr(0, name.indexOf(' '));
            } else {
                firstName = name;
            }

            // just get their first name
            $(this).html("Hey, " + firstName);
        });
    });
</script>

<script>
    function validatePin(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]/;

        if(!regex.test(key)) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }
</script>

</body>

</html>
