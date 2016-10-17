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
                    <h4 class="modal-title">Hey, </h4>
                </div>
                <div class="modal-body">
                    <label for="paypal">Choose a four digit pin <span class="tip">(you'll use this to login to your group)</span></label>
                    <div class="input-group">
                        <form id="pinForm" action="handleSetDetails.php" method="post">
                            <div class="input-group">
                                <input required type="text" name="save" id="enterNewPin" onPaste='return false'
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
                                <input type="text" class="form-control" id="emailInput" aria-describedby="basic-addon3">
                            </div>

                            <br/>

                            <button type="button" class="btn btn-primary" data-dismiss="modal">Register</button>
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
                    <div class="input-group">
                        <label for="enterUserPin" style="margin-right:1rem">Enter your PIN:</label>
                        <input required type="text" id='enterUserPin' class="userPin" onkeypress='validatePin(event,"enterUserPin")'
                               onPaste='return false' autocomplete="false" class="form-control" maxlength=4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var name;

    $(".who-btn").click(function() {
        name = $(this).html();
        $('.modal-title').each(function() {
            var firstName;
            if(name.indexOf(' ')!=-1) {
                firstName = name.substr(0, name.indexOf(' '));
            } else {
                firstName = name;
            }

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
        var PIN = document.getElementById(name).value;
        var length = PIN.length;

        if(!regex.test(key)) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }
</script>

</body>

</html>
