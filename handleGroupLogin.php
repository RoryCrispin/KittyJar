<?php
    include 'database.php';

    $code = $_POST['code'];
    $result = $conn->query("SELECT * FROM GroupTable WHERE groupPin LIKE '%$code%'");

    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
        $id = $row['groupID'];

        header('Location: groupHome.php?id=' . $id);
    } else {
        header('Location: index.php?error');
    }

    $conn->close();


