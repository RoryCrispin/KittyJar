<?php
    $pin = $_POST['pin'];

    include 'database.php';

    $id = $_GET['id'];
    $row = $conn->query("SELECT pin FROM User WHERE userID=$id")->fetch_assoc();

    if($pin==$row['pin']) {
        header('Location: dashboard.php?' . $id);
    } else {
        header('Location: groupHome.php?error');
    }

    $conn->close();


