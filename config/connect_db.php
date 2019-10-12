<?php
    $conn = mysqli_connect('localhost','ziad','','ziad');
    if(!$conn){
        echo 'Connection error ' . mysqli_connect_error();
    }
?>
