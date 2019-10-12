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
        require 'config/connect_db.php';

        $userId = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE userId='".$userId."'";

        $result = mysqli_query($conn, $sql);

        $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        mysqli_close($conn);

        $userProfile = $resultArray[0];

    } else {
        header("Location: index.php");
        exit();
    }

    $userId = $userProfile['userId'];
    $name = $userProfile['name'];
    $email = $userProfile['email'];

?>
<?php if(isset($_SESSION['id'])): ?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card shadow">
                <form id="profileInfo">
                    <div class="profile-card card-body">
                        <div class="card-title pt-2 pb-2">
                            <h2 class="text-center">Your profile</h2>
                            <p id="updateError" class="mt-3 text-center text-danger"></p>
                        </div>
                        <p class="card-text"><strong>Your ID:</strong> <input type="text" name="userId" id="userId" disabled value="<?php echo $userProfile['userId']; ?>" /></p>
                        <p class="card-text"><strong>Your name:</strong> <input type="text" name="name" id="name" disabled value="<?php echo $userProfile['name']; ?>" /></p>
                        <p class="card-text"><strong>Your Email:</strong> <input type="text" name="email" id="email" disabled value="<?php echo $userProfile['email']; ?>" /></p>
                    </div>
                </form>
                    <div class="row m-0 mt-4">
                        <button class="btn col btn-dark" id="edit">Edit</button>
                        <button class="btn col btn-success" id="update">Update</button>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="confirmation" class="text-center text-success"></div>
            </div>
        </div>
    </div>
</div>

<?php else: ?>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="profile-card card-body">
                        <div class="card-title pt-2 pb-2">
                            <h2 class="text-center">You have to login to see profile.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
    include 'template/footer.php';
?>

<script>
    $(document).ready(function() {
        var userId = $("#userId").val();
        var name = $("#name").val();
        var email = $("#email").val();

        $("#edit").click(function(){
            $("#updateError").html("");
            $("input#name, input#email").removeAttr("disabled");
        });

        $("button#update").click(function(){
            if(name === $("#name").val() && email === $("#email").val()){
                $("#updateError").html("nothing to update");
            } else {
                $.ajax({
                    url: "includes/profileUpdate.php",
                    type: "POST",
                    data: $("#profileInfo").serialize(),
                    success: result => {
                        if(result === 'success'){
                            $("#confirmation").html("Your profile has been updated");
                            $("#confirmationModal").modal('show');
                        } else {
                            $("#confirmation").html("Error happened");
                            $("#confirmationModal").modal('show');
                        }
                        $("input#name, input#email").attr("disabled","");
                    }
                });
            }
        });

    });
</script>

</body>
</html>