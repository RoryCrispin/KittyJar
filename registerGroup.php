<?php
$data = json_decode($_POST["people"]);

foreach ($data as $member){
    echo $member -> name;
    echo $member -> paypal;
}

?>


