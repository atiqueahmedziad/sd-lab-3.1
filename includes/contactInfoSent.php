<?php
//require 'config/connect_db.php';
//
//$name = $email = $subject = $message = '';
//$formValid = $nameIsFilled = $emailIsFilled = $subjectIsFilled = $messageIsFilled = false;
//$errors = array('nameErr' => '', 'emailErr' => '', 'subjectErr' =>'', 'messageErr' => '');
//
//if(empty(trim($_POST['name']))) {
//    $errors['nameErr'] = "Name is required";
//} else {
//    $name = htmlspecialchars($_POST['name']);
//    $nameIsFilled = true;
//}
//if(empty(trim($_POST['email']))) {
//    $errors['emailErr'] = "Email is required";
//} else {
//    $email = htmlspecialchars($_POST['email']);
//    $emailIsFilled = true;
//}
//if(empty(trim($_POST['subject']))) {
//    $errors['subjectErr'] = "Subject is required";
//} else {
//    $subject = htmlspecialchars($_POST['subject']);
//    $subjectIsFilled = true;
//}
//if(empty(trim($_POST['message']))) {
//    $errors['messageErr'] = "Message is required";
//} else {
//    $message = htmlspecialchars($_POST['message']);
//    $messageIsFilled = true;
//}
//
//
//if($nameIsFilled && $emailIsFilled && $subjectIsFilled && $messageIsFilled) {
//    $formValid = true;
//}
//
//
//if($formValid){
//    $sql = "INSERT INTO CONTACT (name,email,subject,message) VALUES (?, ?, ?, ?)";
//    $stmt = mysqli_stmt_init($conn);
//    if(!mysqli_stmt_prepare($stmt, $sql)){
//        header("Location: contact.php?error=sqlerror");
//        exit();
//    } else {
//        mysqli_stmt_bind_param($stmt,"ssss", $name, $email, $subject, $message);
//        mysqli_stmt_execute($stmt);
//        header("Location: contact.php?messageSent=success");
//        exit();
//    }
//}

require '../config/connect_db.php';

$name = $email = $subject = $message = '';
$formValid = $nameIsFilled = $emailIsFilled = $subjectIsFilled = $messageIsFilled = false;
$errors = array('nameErr' => '', 'emailErr' => '', 'subjectErr' =>'', 'messageErr' => '');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['name']))) {
        $errors['nameErr'] = "Name is required";
    } else {
        $name = htmlspecialchars($_POST['name']);
        $nameIsFilled = true;
    }
    if (empty(trim($_POST['email']))) {
        $errors['emailErr'] = "Email is required";
    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['emailErr'] = "Please give a valid email";
    } else {
        $email = htmlspecialchars($_POST['email']);
        $emailIsFilled = true;
    }
    if (empty(trim($_POST['subject']))) {
        $errors['subjectErr'] = "Subject is required";
    } else {
        $subject = htmlspecialchars($_POST['subject']);
        $subjectIsFilled = true;
    }
    if (empty(trim($_POST['message']))) {
        $errors['messageErr'] = "Message is required";
    } else {
        $message = htmlspecialchars($_POST['message']);
        $messageIsFilled = true;
    }


    if ($nameIsFilled && $emailIsFilled && $subjectIsFilled && $messageIsFilled) {
        $formValid = true;
    } else {
        echo json_encode($errors);
        exit();
    }

    if ($formValid) {
        $sql = "INSERT INTO CONTACT (name,email,subject,message) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sql error: " . mysqli_stmt_error() . " " . mysqli_error();
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
            mysqli_stmt_execute($stmt);
            echo "success";
            exit();
        }
    }
}

?>