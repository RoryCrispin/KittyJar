4<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/viewDebts.css">

    <?php 'libs.php'; ?>

    <meta charset="UTF-8">
    <title>KittyJar - View Debts</title>
</head>
<body>


<div class="jumbotron">
    <?php
        include 'head.php';
    ?>

    <h1>Your Debts</h1>
    <br/>

    <ul class="list-group">
        <li class="list-group-item list-group-item-danger">Unpaid Debt 1
            <button type="button" class="btn btn-primary btn-sm pay-btn">Pay now</button>
        </li>
        <li class="list-group-item list-group-item-danger">Unpaid Debt 2
            <button type="button" class="btn btn-primary btn-sm pay-btn">Pay now</button>
        </li>
        <li class="list-group-item list-group-item-danger">Unpaid Debt 3
            <button type="button" class="btn btn-primary btn-sm pay-btn">Pay now</button>
        </li>
    </ul>
    <br/>
    <ul class="list-group">
        <li class="list-group-item list-group-item-warning">Waiting for Approval 1
            <span class="date">Paid on 12/11/16 (waiting for approval)</span>
        </li>
        <li class="list-group-item list-group-item-warning">Waiting for Approval 2
            <span class="date">Paid on 12/11/16 (waiting for approval)</span>
        </li>
        <li class="list-group-item list-group-item-warning">Waiting for Approval 3
            <span class="date">Paid on 12/11/16 (waiting for approval)</span>
        </li>
    </ul>
    <br/>

    <h4>History</h4>
    <ul class="list-group">
        <li class="list-group-item list-group-item-success">Paid Debt 1
            <span class="date">Paid on 12/11/16</span>
        </li>
    </ul>
</div>

</body>
</html>
