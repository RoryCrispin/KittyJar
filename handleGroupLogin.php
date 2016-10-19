<?php
    include 'database.php';

    $code = $_POST['groupCode'];
    $result = $conn->query("SELECT * FROM GroupTable WHERE groupCode LIKE '%$code%'");

    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
echo $code;
        header('Location: groupHome.php?groupCode=' . $code);
    } else {
        header('Location: index.php?error');
    }

    $conn->close();
