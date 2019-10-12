<?php
    include 'includes/aboutme.php';
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

<section class="hero-wrap banner">
    <div class="container banner-text">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6 d-flex justify-content-center align-items-center">
                <div class="text text-center">
                    <span class="subheading">Hey! I am</span>
                    <h1><?php echo myName ?></h1>
                    <div id="typed-strings">
                        <p>Software Developer</p>
                        <p>Loves <em>JavaScript</em></p>
                        <p>Open Source Enthusiast</p>
                        <p><strong>Foodaholic</strong></p>
                    </div>
                    <span id="typed"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ziad-section-contact contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Contact Me</h2>
                <p>You can reach me in the following ways.</p>
            </div>
        </div>

        <div class="row d-flex contact-info mb-5">
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch w-100 box text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-3x fa-map-marked-alt"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Office Address</h3>
                        <p><?php echo myAddress; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch box w-100 text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone-square-alt fa-3x"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Mobile Number</h3>
                        <p><a href="tel://1234567920"><?php echo myPhone; ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch w-100 box text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-envelope fa-3x"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:<?php echo myEmail; ?>"><?php echo myEmail; ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch w-100 box text-center p-4 shadow">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-3x fa-globe-asia"></span>
                    </div>
                    <div>
                        <h3 class="mb-4">Website</h3>
                        <p><a href="#"><?php echo myWebsite; ?></a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-gutters block-9">
            <div class="col-md-6 order-md-last d-flex bg-light">
                <form id="contactForm" class=" p-4 p-md-5 contact-form">
<!--                    <div id="confirmation"></div>-->
                    <div class="form-group">
                        <input type="text" id="name" class="form-control" name="name" placeholder="Your Name">
                        <small class="form-text text-danger" id="nameErr">
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" class="form-control" name="email" placeholder="Your Email">
                        <small class="form-text text-danger" id="emailErr">
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" class="form-control" name="subject" placeholder="Subject">
                        <small class="form-text text-danger" id="subjectErr">
                        </small>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        <small class="form-text text-danger" id="messageErr">
                        </small>
                    </div>
                    <div class="form-group">
                        <input id="submitBtn" type="button" value="Send Message" name="submit" class="btn btn-dark py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div class="img" style="background-image: url(images/IMG_0005.jpg);"></div>
            </div>
        </div>
    </div>
</section>

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

<?php
include 'template/footer.php';
?>

<script>
    $(document).ready(function () {
        $("#navTop li:nth-child(6)").addClass("active");
    });
</script>

<script src="js/typed-animation.js"></script>
<script src="js/main.js"></script>

<script>

    /**
     * @return {boolean}
     */
    function IsJsonString(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    $(document).ready(function () {
        $("#submitBtn").click(function () {
            $.ajax({
                url: "includes/contactInfoSent.php",
                type: "post",
                data: $("#contactForm").serialize(),
                success: result => {
                    if(IsJsonString(result)){
                        $('#confirmation').html('');
                        let error = JSON.parse(result);
                        $("#nameErr").html(error.nameErr);
                        $("#emailErr").html(error.emailErr);
                        $("#subjectErr").html(error.subjectErr);
                        $("#messageErr").html(error.messageErr);
                    } else {
                        if(result === "success"){
                            $("#nameErr, #emailErr, #subjectErr, #messageErr").html("");
                            $("#name, #email, #subject, #message").val('');
                            $('#confirmation').html('Thanks for contacting me. I will get back to you shortly.');
                            $("#confirmationModal").modal('show');
                        }

                    }
                }
            });
        });
    });

</script>

</body>
</html>