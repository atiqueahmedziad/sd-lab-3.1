<?php
    session_start();

    require '../config/connect_db.php';

    $userId = htmlspecialchars($_POST['userId']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    if(!isset($_SESSION)){
        echo "session is not set";
    } else {
        $userId = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE userId='".$userId."'";

        $result = mysqli_query($conn, $sql);

        $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        mysqli_close($conn);

        $userProfile = $resultArray[0];
    }

    if($userId != $userProfile['userId']){
        echo $userProfile['userId'];
    } else {
        if($name == $userProfile['name'] && $email == $userProfile['email']){
            echo "nothing to change";
        } else if($name != $userProfile['name'] && $email == $userProfile['email']){
            $sql = "UPDATE users SET name='$name' WHERE userId='$userId'";
        } else if($name == $userProfile['name'] && $email != $userProfile['email']){
            $sql = "UPDATE users SET email='$email' WHERE userId='$userId'";
        } else if($name != $userProfile['name'] && $email != $userProfile['email']){
            $sql = "UPDATE users SET name='$name', email='$email' WHERE userId='$userId'";
        }

        if(!empty($sql)){
            require '../config/connect_db.php';

            if ($conn->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        }

    }

?>