<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/dashboard.css" >
    <script src="js/countUp.min.js"></script>
    <?php include 'libs.php'; ?>
    <script src="js/pageCode/dashboard.js"></script>

    <meta charset="UTF-8">
    <title>KittyJar - Dashboard</title>
</head>
<body>

<div class="jumbotron">
    <?php
        include 'head.php';
        include 'func/database.php';
    ?>

    <h1>Your Dashboard</h1>
    <br/>

    <h6>Total Owed:</h6>
    <div class="dashItem">
        <span class="owed h2">£</span><span class="owed h2" id="dashOwed"></span>
    </div>

    <h6>Total You Owe:</h6>
    <div class="dashItem">
        <span class="owe h2">£</span><span class="owe h2" id="dashOwe"></span>
    </div>

    <button type="button" onclick="location.href='viewDebts.php'" class="btn btn-primary nav-btn">Debts You Owe</button><br/>
    <button type="button" class="btn btn-primary nav-btn">Debts You're Owed</button><br/>
    <button type="button" onclick="location.href='createDebt.php?groupCode=<?php echo($_GET['groupCode']) ?>'" class="btn btn-primary nav-btn">Create a Debt</button>

</div>



</body>
</html>
