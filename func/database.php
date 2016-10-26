<?php
    $conn = new mysqli('52.25.63.17', 'kitty_admin', 'Basement33', 'kittydb');
    if(mysqli_connect_errno()) {
        printf("Connection failed: %s\n", mysqli_connect_error());
        exit();
    }
