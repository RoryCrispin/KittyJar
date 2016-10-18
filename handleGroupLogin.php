<?php
    include 'database.php';

    $code = $_POST['code'];
    $result = $conn->query("SELECT * FROM GroupTable WHERE groupCode LIKE '%$code%'");

    if($result->num_rows>0) {
        $row = $result->fetch_assoc();

        header('Location: groupHome.php?code=' . $code);
    } else {
        header('Location: index.php?error');
    }

    $conn->close();
