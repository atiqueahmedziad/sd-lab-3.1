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

        $name = $email = $password = '';

        $errors = array('nameErr' => '', 'emailErr' => '', 'passwordErr' =>'');

        if(isset($_GET['error'])){
            if($_GET['error'] == 'emailisTaken'){
                $errorMsg = "This email already exists!";
            } else if($_GET['error'] == 'emailRequired'){
                $errors['emailErr'] = "Email is required";
            } else if($_GET['error'] == 'passwordRequired'){
                $errors['passwordErr'] = "Password is required";
            }
        }
        else if(isset($_GET['register']) && $_GET['register'] == 'success'){
            $successMsg = "Registration successful";
            $errorMsg = '';
        }

        $formValid = $nameIsFilled = $emailIsFilled = $passwordIsFilled = false;


        if(isset($_POST['register-submit'])){

            require 'config/connect_db.php';

            if(empty(trim($_POST['name']))) {
                $errors['nameErr'] = "Name is required";
            } else {
                $name = htmlspecialchars($_POST['name']);
                $nameIsFilled = true;
            }
            if(empty(trim($_POST['email']))) {
                $errors['emailErr'] = "Email is required";
            } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['emailErr'] = "Please give a valid email";
            } else {
                $email = htmlspecialchars($_POST['email']);
                $emailIsFilled = true;
            }
            if(empty(trim($_POST['password']))) {
                $errors['passwordErr'] = "Password is required";
            } else {
                $password = htmlspecialchars($_POST['password']);
                $passwordIsFilled = true;
            }

            if($nameIsFilled && $emailIsFilled && $passwordIsFilled) {
                $formValid = true;
            }

            if($formValid){
                $sql = "SELECT email FROM users WHERE email=?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: register.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt,"s",$email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if($resultCheck > 0){
                        header("Location: register.php?error=emailisTaken");
                        exit();
                    }

                    else {
                        $sql1 = "INSERT INTO users (userId, name, email, password) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql1)){
                            header("Location: register.php?error=sqlerror");
                            exit();
                        } else {
                            $uniqueId = uniqid();
                            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt,"ssss", $uniqueId,$name,$email,$hashedPass);
                            mysqli_stmt_execute($stmt);
                            header("Location: register.php?register=success");
                            exit();
                        }
                    }
                }

                mysqli_stmt_close($stmt);
                mysqli_close($conn);

            }
        }
    ?>

    <section id="register" class="ziad-section register-section">
        <div class="row">
            <div class="align-self-stretch shadow m-auto">
                <?php
                if(!empty($successMsg)){
                    echo '<p id="registerSuccess" class="font-weight-bold pt-4 pb-2 pl-4 pr-4 form-text text-center text-success">' . $successMsg . '</p>
                          <p class="text-center">Please <a class="text-dark" href="login.php">login</a></p>';
                }
                ?>
                <?php
                if(!empty($errorMsg)){
                    echo '<p id="registerError" class="font-weight-bold pt-4 pb-2 pl-4 pr-4 form-text text-center text-danger">' . $errorMsg . '</p>';
                }
                ?>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex m-auto">
            <div class="justify-content-center align-self-center box p-4 shadow m-auto">
                <form method="post" action="register.php">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" class="form-control" id="exampleInputName" aria-describedby="nameError" placeholder="Enter Name">
                        <small id="nameError" class="form-text text-danger">
                            <?php echo $errors['nameErr'] ?>
                        </small>
                    </div>
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
                    <button type="submit" class="btn m-auto d-block btn-success" value="Submit" name="register-submit">Register</button>

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
