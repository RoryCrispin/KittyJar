<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/index.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <title>KittyJar - Who are you?</title>
</head>
<body>


<?php
    echo ($_GET['groupCode']);
?>
<div class="jumbotron">
    <?php
    include 'head.php';
    include 'database.php';
    ?>

    <div class="page-header">
        <h1>Welcome, <small>Subtext for header</small></h1>
    </div>    <br/>

    <?php
        if(isset($_GET['error'])) {
            echo("<div class='alert alert-danger' role='alert'>Incorrect PIN!</div>");
        }

        $groupID = $_GET['id']; // TODO can't have error and id at the same time
        $sql = "SELECT * FROM User WHERE groupID = " . $groupID . " ORDER BY name";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                if(empty($row['pin'])) {
                    echo("<button type='button' class='btn btn-primary who-btn' data-toggle='modal' data-target='#setPinModal' userID='$row[userID]'>" . $row['name'] . "</button><br/>");
                } else {
                    echo("<button type='button' class='btn btn-primary who-btn' data-toggle='modal' data-target='#loginModal' userID='$row[userID]'>" . $row['name'] . "</button><br/>");
                }
            }
        }
    ?>

    <div id="setPinModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Hey, </h4>
                </div>
                <div class="modal-body">
                    <label for="paypal">Choose a 4 digit pin <span class="tip">(you'll use this to login to your group)</span></label>
                    <div class="input-group">

                        <form id="registerForm" action="handleSetDetails.php?id=" method="post">
                            <div class="input-group">
                                <input required type="text" name="pin" id="enterNewPin" onPaste='return false'
                                   onkeypress='validatePin(event, "enterNewPin")' class="userPin" class="form-control" maxlength="4">
                            </div>

                            <br/>

                            <label for="paypalInput">PayPal.me link</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon3">paypal.me/</span>
                                <input type="text" class="form-control" name="paypal" id="paypalInput" aria-describedby="basic-addon3">
                            </div>

                            <br/>

                            <label for="emailInput">Email address <span class="tip">(optional)</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" id="emailInput" aria-describedby="basic-addon3">
                            </div>

                            <br/>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Hey, </h4>
                </div>
                <div class="modal-body">
                    <form id="loginForm" action="handleUserLogin.php?id=" method="post">
                        <div class="input-group">
                            <label for="enterUserPin" style="margin-right:1rem">Enter your PIN:</label>
                            <input required type="text" name="pin" id='enterUserPin' class="userPin"
                                   onPaste='return false' autocomplete="false" class="form-control" maxlength=4> <!-- TODO: jordan's validation was fucking up pressing enter -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    function validatePin(evt, name) {
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
