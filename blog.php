<?php
    include 'includes/aboutme.php';
    include 'includes/all-blog.php';
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

    <section class="ziad-section" id="blog">
        <div class="container">
            <div class="row justify-content-center mb-5 mt-4">
                <div class="col-md-7 heading-section text-center">
                    <h2 class="mb-4">My Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <?php foreach ($blogList as $eachBlog): ?>
                    <div class="col-md-4 d-flex">
                        <div class="blog-entry justify-content-end">
                            <a href="blog-details.php?id=<?php echo $eachBlog['id'] ?>" class="blog-box" style="background-image: url('<?php echo $eachBlog['img_url'] ?>');">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <h3 class="heading"><a href="blog-details.php?id=<?php echo $eachBlog['id'] ?>"><?php echo $eachBlog['title'] ?></a></h3>
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2"><?php echo $eachBlog['date'] ?></span>
                                    </p>
                                </div>
                                <p><?php echo $eachBlog['summary'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
        include 'template/footer.php';
    ?>

<script>
    $(document).ready(function () {
        $("#navTop li:nth-child(5)").addClass("active");
    });
</script>

<script src="js/typed-animation.js"></script>
<script src="js/main.js"></script>
</body>
</html>