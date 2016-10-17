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

<div class="jumbotron">
    <?php
    include 'head.php';
    include 'database.php';
    ?>

    <h1>Who are you?</h1>
    <br/>

    <?php
        $groupID = 1;
        $sql = "SELECT * FROM User WHERE groupID = " . $groupID . " ORDER BY name";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                if(empty($row['pin'])) {
                    echo("<button type='button' class='btn btn-primary who-btn' data-toggle='modal' data-target='#setPinModal'>" . $row['name'] . "</button><br/>");
                } else {
                    echo("<button type='button' class='btn btn-primary who-btn' data-toggle='modal' data-target='#loginModal'>" . $row['name'] . "</button><br/>");
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
                    <h4 class="modal-title">Register</h4>
                </div>
                <div class="modal-body">
                    <p>Choose a four digit PIN<br/>
                        <span class="tip">You'll use this to login to your group</span></p>
                    <div class="input-group">
                        <form id="pinForm" action="" method="post" onsubmit="return validate()">
                            <input required type="text" name="save" id="enterNewPin" onPaste='return false'
                                   onkeypress='validateNewPin(event)' class="userPin" class="form-control" maxlength="4">
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
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your PIN:</p>
                    <div class="input-group">
                        <input required type="text" id='enterUserPin' class="userPin" onkeypress='validateUserPin(event)'
                               onPaste='return false' autocomplete="false" class="form-control">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function validateUserPin(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]/;
        var PIN = document.getElementById('enterUserPin').value;
        var length = PIN.length;

        if(length == 4 || !regex.test(key)) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }

    function validateNewPin(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]/;
        var PIN = document.getElementById('enterNewPin').value;
        var length = PIN.length;

        if(length == 4 || !regex.test(key)) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }
</script>

</body>

</html>