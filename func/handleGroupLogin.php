<?php
    include 'database.php';
    include '../phpLib.php';
    $code = $_POST['groupCode'];
    php_setGroupCode($code);
//    $code = php_getGroupCode(false);
    $result = $conn->query("SELECT * FROM GroupTable WHERE groupCode LIKE '%$code%'");

    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
echo $code;
        header('Location: ../groupHome.php?groupCode=' . $code);
    } else {
        header('Location: ../index.php?error');//TODO use getGroup.js error func
    }

    $conn->close();
