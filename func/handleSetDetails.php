<?php
    include '../phpLib.php';

    $pin = $_POST['pin'];
    $paypal = $_POST['paypal'];
    $email = $_POST['email'];

    include 'database.php';

    $id = $_GET['id'];
    $groupCode = php_getGroupCode(false);
    $sql = "UPDATE User SET pin='$pin', paypalLink='$paypal', email='$email' WHERE userID=$id";

    mysqli_query($conn, $sql);
    $conn->close();

    header('Location: ../dashboard.php?id=' . $id . '&groupCode=' . $groupCode); //TODO


