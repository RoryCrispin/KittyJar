<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/dashboard.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/countUp.min.js"></script>

    <meta charset="UTF-8">
    <title>KittyJar - Dashboard</title>
</head>
<body>

<div class="jumbotron">
    <?php
        include 'head.php';
        include 'database.php';
    ?>

    <h1>Your Dashboard</h1>
    <br/>

    <h6>You're Owed</h6>
    <div class="dashItem">
        <span class="owed h2">£</span><span class="owed h2" id="dashOwed"></span>
    </div>

    <h6>You Owe</h6>
    <div class="dashItem">
        <span class="owe h2">£</span><span class="owe h2" id="dashOwe"></span>
    </div>

    <button type="button" onclick="location.href='viewDebts.php'" class="btn btn-primary nav-btn">Debts You Owe</button><br/>
    <button type="button" class="btn btn-primary nav-btn">Debts You're Owed</button><br/>
    <button type="button" onclick="location.href='createDebt.php'" class="btn btn-primary nav-btn">Create a Debt</button>

</div>

<script>
    $(document).ready(function() {
        var owedAnim = new CountUp("dashOwed", 0, 105.56, 2, 0.8);
        owedAnim.start();

        var oweAnim = new CountUp("dashOwe", 0, 21.02, 2, 0.8);
        oweAnim.start();
    });
</script>

</body>
</html>
