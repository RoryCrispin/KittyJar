<?php
include "database.php";
include "generateGroupCode.php";

//echo ($_POST['groupname']);

$data = json_decode($_POST["people"]);

$sql = "INSERT INTO `GroupTable`(`groupName`, `groupCode`)
VALUES ('" .$_POST['groupname']  . "', '" . getGroupName($conn)."');";
echo $sql;







if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$groupCode = mysqli_insert_id($conn);

foreach ($data as $member){
    //$sql = "INSERT INTO `User`(	`groupCode`, `name`) VALUES ('". $groupCode."', '" . $member ."');";
    $sql = "INSERT INTO User (groupCode, name) VALUES '$groupCode', '$member'";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



$conn->close();




?>
