<?php
    ob_start();
?>

<html>
<head>
    <?php
        include 'template/header.php';
    ?>
</head>
<body data-spy="scroll" data-target="#navi" data-offset="130">

    <?php
        include 'template/nav.php';
    ?>

    <?php

        if(isset($_SESSION['id'])){
            header("Location: index.php");
            exit();
        }

        if(isset($_GET['error'])){
            if($_GET['error'] == 'nouser'){
                $errorMsg = 'Invalid email and password';
            } else if($_GET['error'] == 'wrongPassword'){
                $errorMsg = 'Password is wrong!';
            }
            exit();
        }

        $email = $password = '';

        $errors = array('emailErr' => '', 'passwordErr' =>'');

        $formValid = false;


        if(isset($_POST['login'])) {
            require 'config/connect_db.php';

            if(empty(trim($_POST['email']))) {
                $errors['emailErr']  = 'Email is required.';
            } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['emailErr'] = "Please give a valid email";
            } else {
                $email = $_POST['email'];
            }
            if(empty(trim($_POST['password']))) {
                $errors['passwordErr'] = "Password is required.";
            } else {
                $password = $_POST['password'];
            }


            if(!empty(trim($email)) && !empty(trim($password))) {
                $formValid = true;
            }

            if($formValid){

                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: login.php?error=sqlerrorasd");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)){
                        $passCheck = password_verify($password, $row['password']);
                        if($passCheck == false){
                            header("Location: login.php?error=wrongPassword");
                            exit();
                        } else if($passCheck == true){
                            session_start();
                            $_SESSION['id'] = $row['userId'];
                            header("Location: index.php?login=success");
                            exit();
                        } else {
                            header("Location: login.php");
                            exit();
                        }
                    } else {
                        header("Location: login.php?error=nouser");
                        exit();
                    }
                }
            }
        }
    ?>

<section id="login" class="ziad-section login-section">
    <div class="row">
        <div class="align-self-stretch shadow m-auto">
            <?php
                if(!empty($errorMsg)){
                    echo '<p id="loginError" class="font-weight-bold pt-4 pb-2 pl-4 pr-4 form-text text-center text-danger">' . $errorMsg . '</p>';
                }
            ?>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 d-flex m-auto">
        <div class="align-self-center box p-4 shadow m-auto">
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="exampleInputEmail">Email address</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailError" placeholder="Enter email">
                    <small id="emailError" class="form-text text-danger">
                        <?php echo $errors['emailErr'] ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                    <small id="passError" class="form-text text-danger">
                        <?php echo $errors['passwordErr'] ?>
                    </small>
                </div>
                <button type="submit" class="btn m-auto d-block btn-dark" value="Submit" name="login">Login</button>
                <p class="text-center dont-have-account">Don't have an account? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</section>

<?php
include 'template/footer.php';
?>

<script src="js/main.js"></script>

</body>
</html>
