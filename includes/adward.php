<?php
    include 'config/connect_db.php';

    $sql = 'SELECT * FROM AWARDS';
    // make query and get result
    $result = mysqli_query($conn, $sql);
    //fetch the resulting rows as array
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //free result from memory
    mysqli_free_result($result);
    //close conenction to database
    mysqli_close($conn);

    $adwardList = $resultArray;
?>