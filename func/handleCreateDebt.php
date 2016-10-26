<?php
include "database.php";
$data = json_decode($_POST["hello"]);

$sql = 'INSERT INTO `Debt`( `amount`, `name`) VALUES ('. $data -> dAmount.',"'. $data->dRef . '")';

if ( $conn->query($sql) === TRUE){
    echo 'Success!';
} else {
    echo ("Error: " . $sql . " " . $conn->error);
}

$debtID = $conn -> insert_id;

foreach($data -> uID as $user){
    $sql = 'INSERT INTO `DebtUser`(`debtID`, `userID`) VALUES (' . $debtID . ', ' . $user . ')';
    if ( $conn->query($sql) === TRUE){
        echo 'Success!';
    } else {
        echo ("Error: " . $sql . " " . $conn->error);
    }
}


$conn ->close();




