<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/viewDebts.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/bootstrap.min.js"></script>


    <meta charset="UTF-8">
    <title>KittyJar - View Debts</title>
</head>
<body>


<div class="jumbotron">
    <?php
        include 'head.php';
    ?>

    <ul class="list-group">
        <li class="list-group-item list-group-item-danger">Unpaid Debt 1 <button type="button" class="btn btn-primary btn-xs pay-btn">Pay now</button></li>
        <li class="list-group-item list-group-item-danger">Unpaid Debt 2</li>
        <li class="list-group-item list-group-item-danger">Unpaid Debt 3</li>
    </ul>
    <br/>
    <ul class="list-group">
        <li class="list-group-item list-group-item-warning">Waiting for Approval 1</li>
        <li class="list-group-item list-group-item-warning">Waiting for Approval 2</li>
        <li class="list-group-item list-group-item-warning">Waiting for Approval 3</li>
    </ul>
    <br/>
    <ul class="list-group">
        <li class="list-group-item list-group-item-success">Paid Debt 1</li>
    </ul>
</div>

</body>
</html>
