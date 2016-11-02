<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/index.css" >
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/createDebt.css" >
    <?php include 'libs.php'; ?>
    <script src="js/pageCode/createDebt.js"></script>



    <meta charset="UTF-8">
    <title>KittyJar - Create Debt</title>
</head>
<body>

<div class="jumbotron">
    <?php
        include 'head.php';
        include 'func/database.php';
    ?>

    <h1>Create Debt</h1>
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
    <!-- LOOP FOR ADDING MEMBERS -->
    <h6>Names:</h6>

        <div id="controlBox" class="btn-group btn-group-sm" role="group">
            <button type="button" onclick = 'selectAllFunction()' class="btn btn-default whiteBut">Select All</button>
            <button type="button" onclick = 'selectInverseFunction()' class="btn btn-default whiteBut">Inverse Selection</button>
            <button type="button" onclick = 'selectNoneFunction()' class="btn btn-default whiteBut">Select None</button>
        </div>


    <?php
        //$groupCode = $_GET['groupCode'];
        $groupCode = php_getGroupCode(false);
        $sql = 'SELECT * FROM User WHERE groupCode = "'. $groupCode . '" ORDER BY name';
        $result = $conn->query($sql);
        $numOfMembers = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $numOfMembers++;
                echo ("<div class='row'>
                            <div class='col-lg-6'>
                                <div class='input-group memberBox'>
                                    <span class='input-group-addon'>
                                        <input type='checkbox' userID = '" . $row['userID'] . "' name='checkbox' onclick='checkBoxTest()' id = '" . $row['name'] . " checkbox'>
                                    </span>
                                    <label name='memberNames' class='form-control memberName'>" . $row['name'] . "</label>
                                </div>
                            </div>
                    </div>");
            }
        } else
            echo('fail');
        //echo($numOfMembers);
    ?>
    <!-- LOOP END-->
    </form>
    <br/>
    <div class="input-group">
        <span class="input-group-addon">Everyone pays: £</span>
        <label id= 'eachAmount' class='form-control debtAmount'>0.00</label>
    </div>

    <script>
        var totalMembers = <?php echo($numOfMembers); ?> ;
    </script>

    <br/>
    <button type="button" onclick = 'confirmDebt()' class="btn btn-success">Submit Debt</button>
    <br/><br/>
    <button type="button" onclick="location.href='dashboard.php'" class="btn btn-primary">Home</button>


</div>

</body>
</html>
