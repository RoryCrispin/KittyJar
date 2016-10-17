<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/main.css" >
     <link rel="stylesheet" href="css/createDebt.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    


    <meta charset="UTF-8">
    <title>KittyJar - Create a Debt</title>
</head>
<body>

<div class="jumbotron">
    <?php
        include 'head.php';
        include 'database.php';
    ?>

    <h1>Create a Debt</h1>
    <br/>

    <h6>Amount:</h6>
    <form method="get">
        <div class="input-group">
            <span class="input-group-addon">£</span>
            <input required type="text" id='debtAmount' onkeypress='validateDebtAmount(event)' class="form-control debtAmount" placeholder="0.00" onPaste='return false' autocomplete='off'>
        </div>
        <br/>
        <h6>Reference:</h6>
        <form method="get">
            <div class="input-group">
                <input required type="text" id='debtReference' class="form-control memberName">
            </div>
        <br/>
    <!-- LOOP FOR ADDING MEMBERS-->
    <h6>Names:</h6>
    <?php
        $groupID = 1;
        $sql = "SELECT name FROM User WHERE groupID = ". $groupID . " ORDER BY name";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                echo ("<div class='row'>
                            <div class='col-lg-6'>
                                <div class='input-group'>
                                    <span class='input-group-addon'>
                                        <input type='checkbox' name='checkbox' onclick='checkBoxTest()' id = '" . $row['name'] . " checkbox'>
                                    </span>
                                        <label class='form-control memberName'>" . $row['name'] . "</label>
                                </div>
                            </div>
                    </div>");
            }
        } else
            echo('fail');
    ?>
    <!-- LOOP END-->
    </form>
    <br/>
    <div class="input-group">
        <span class="input-group-addon">Each person pays: £</span>
        <label id= 'eachAmount' class='form-control debtAmount'>0.00</label>
    </div>

    <script>
        function checkBoxTest(){
            var box = document.getElementsByName('checkbox');
            var textOut = document.getElementById('eachAmount');
            var debtValue = document.getElementById('debtAmount').value;
            var numMembers = 0;
            //TODO: DON'T HARD CODE MAX NUMBER
            for(var i = 0; i < 10; i++){
                if(box[1].checked){
                    numMembers++;
                }
            }
            console.log(debtValue / numMembers);
            //textOut.value = 'hi';

        }

        function validateDebtAmount(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\./;
            var numbersKey = /[0-9]/;
            var decimalKey = /\./;
            var debtValue = document.getElementById('debtAmount').value;
            var stopPlace = debtValue.indexOf(".");
            var length = debtValue.length;

            if(length == 0 && !numbersKey.test(key)){
                theEvent.returnValue = false;
                if(theEvent.preventDefault) 
                    theEvent.preventDefault();  
            }

            if(stopPlace > 0 && length == (stopPlace + 3)){
                theEvent.returnValue = false;
                if(theEvent.preventDefault) 
                    theEvent.preventDefault();
            }

            if(debtValue.indexOf('.') != -1 && decimalKey.test(key)){
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) 
                        theEvent.preventDefault();
            }
            if( !regex.test(key)) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) 
                    theEvent.preventDefault();
            }
    }
    </script>

    <br/>
    <button type="button" class="btn btn-success">Submit Debt</button>
    <br/>
    <br/>
    <button type="button" onclick="location.href='dashboard.php'" class="btn btn-primary">Home</button>


</div>

</body>
</html>