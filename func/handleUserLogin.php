<?php
    $pin = $_POST['pin'];
    include '../phpLib.php';

    include 'database.php';


    $id = $_GET['id'];
//    $groupCode = $_GET['groupCode'];
    $groupCode= php_getGroupCode(false);
    $row = $conn->query("SELECT pin FROM User WHERE userID=$id")->fetch_assoc();

    if($pin==$row['pin']) {
        header('Location: ../dashboard.php?id=' . $id . '&groupCode=' . $groupCode);
    } else {
        header('Location: ../groupHome.php?error');
    }

    $conn->close();


