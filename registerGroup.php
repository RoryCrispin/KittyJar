<?php
include "database.php";
include "generateGroupCode.php";

//echo ($_POST['groupname']);

$data = json_decode($_POST["people"]);

$groupCode = getGroupName($conn);
$sql = "INSERT INTO `GroupTable`(`groupName`, `groupCode`)
VALUES ('" .$_POST['groupname']  . "', '" . $groupCode."');";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

foreach ($data as $member){
    $sql = "INSERT INTO User (groupCode, name) VALUES ('$groupCode', '$member')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



$conn->close();

echo "<script> window.location.replace(\"groupHome.php?code=".$groupCode."\" . ); </script>";




?>
