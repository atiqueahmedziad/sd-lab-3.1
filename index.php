<?php
    include 'includes/aboutme.php';
    include 'includes/portfolio.php';
    include 'includes/blog-summary.php';
?>

<html>
<head>
    <?php
        include 'template/header.php';
    ?>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

    <?php
        include 'template/nav-homepage.php';
    ?>

    <section class="hero-wrap" id="home">
        <!--      <div class="overlay"></div>-->
        <div class="overlay-img"></div>
        <div class="container banner-text">
            <div class="row no-gutters slider-text homepage justify-content-center align-items-center">
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

    <section class="about-ziad img" id="about-me">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 col-lg-6 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/ziad.jpg);">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pl-md-5 py-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">

                            <h2 class="mb-4">About me</h2>
                            <p>Atique likes to play with web technologies more often. He is currently working as a full stack developer.</p>
                            <ul class="about-info mt-4 px-md-0 px-2">
                                <li class="d-flex"><span>Name:</span><span><?php echo myName ?></span></li>
                                <li class="d-flex"><span>Date of birth:</span> <span><?php echo myDateOfBirth ?></span></li>
                                <li class="d-flex"><span>Email:</span> <span><?php echo myEmail ?></span></li>
                                <li class="d-flex"><span>Phone: </span> <span><?php echo myPhone ?></span></li>
                                <li class="d-flex social-icons">
                                    <a target="_blank" href="<?php echo myGithub ?>"><i class="fab fa-github fa-2x"></i></a>
                                    <a target="_blank" href="<?php echo myLinkedin ?>"><i class="fab fa-linkedin fa-2x"></i></a>
                                    <a target="_blank" href="<?php echo myTwitter ?>"><i class="fab fa-twitter fa-2x"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ziad-partner">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <a target="_blank" href="<?php echo myMozillians ?>" class="col-md-10 m-auto partner"><img src="images/mozillians-logo.png" class=" img-fluid"></a>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <a target="_blank" href="<?php echo myReps ?>" class="col-md-10 m-auto partner"><img src="images/mozrep.png" class="img-fluid"></a>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <a href="#" class="col-md-10 m-auto partner"><img src="images/legalx-black.png" class="img-fluid"></a>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <a target="_blank" href="<?php echo myPPH ?>"class="col-md-10 m-auto partner"><img src="images/peopleperhour.png" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </section>

    <div class="portfolio-modal modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mx-auto">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <div class="modal-body">
                    <img src="" id="imagepreview" style="width: 100%; height: auto;" >
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-project" id="portfolio">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center">
                    <h1 class="big big-2">Portfolio</h1>
                    <h2 class="mb-4">My Past Projects</h2>
    <!--                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>-->
                </div>
            </div>
            <div class="row no-gutters">
                <?php foreach($portfolioList as $eachPortfolio): ?>
                <div class="col-md-6">
                    <div id="pop" class="project img d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $eachPortfolio['img_url'] ?>);">
                        <div class="overlay"></div>
                        <div class="text text-center p-4">
                            <h3><?php echo $eachPortfolio['title'] ?></h3>
                            <span><?php echo $eachPortfolio['category'] ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="ziad-section" id="blog">
        <div class="container">
            <div class="row justify-content-center mb-5 mt-4">
                <div class="col-md-7 heading-section text-center">
                    <h2 class="mb-4">My Blog</h2>
                    <p>Sometimes, I do write!</p>
                </div>
            </div>
            <div class="row d-flex">
                <?php foreach ($blogSummaryList as $eachBlog): ?>
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
            <div class="text-center mt-4">
                <a href="blog.php"><button class="btn btn-lg btn-outline-dark">View all blogs</button></a>
            </div>
        </div>
    </section>


    <?php
        include 'template/footer.php';
    ?>

<script src="js/typed-animation.js"></script>
<script src="js/main.js"></script>

</body>
</html>
