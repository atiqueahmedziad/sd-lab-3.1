<?php
    include 'includes/blog-summary.php';
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

<?php if(isset($_GET['id'])): ?>

    <?php
        $blogId = $_GET['id'];

        include 'config/connect_db.php';

        $sql = 'SELECT id, title, img_url, blog_details, date FROM BLOG WHERE id='.$blogId;
        // make query and get result
        $result = mysqli_query($conn, $sql);
        //fetch the resulting rows as array
        $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //free result from memory
        mysqli_free_result($result);
        //close conenction to database
        mysqli_close($conn);

        $blogPost = $resultArray[0];
    ?>

    <section class="hero-wrap blog-banner" style="background-image: url('<?php echo $blogPost['img_url'] ?>')">
        <div class="container banner-text">
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-8 col-md-6 d-flex justify-content-center align-items-center">
                    <div class="text shadow blog-heading text-center">
                        <h2><?php echo $blogPost['title']; ?></h2>
                        <h6><?php echo $blogPost['date']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ziad-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ">
                    <?php foreach(explode('&enter&', $blogPost['blog_details']) as $eachParagraph): ?>
<!--                        <img src="images/image_4.jpg" alt="" class="img-fluid">-->
                    <p><?php echo $eachParagraph; ?></p>
                    <?php endforeach; ?>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="images/ziad-small.jpg" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h3>Md Atique Ahmed Ziad</h3>
                            <p>Atique likes to play with web technologies more often. He is currently working as a full stack developer.</p>
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Recent Blog</h3>
                        <?php foreach ($blogSummaryList as $eachBlog): ?>
                        <div class="sidebar-blog-wrapper mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url('<?php echo $eachBlog['img_url'] ?>');"></a>
                            <div class="text">
                                <h3 class="heading"><a href="blog-details.php?id=<?php echo $eachBlog['id'] ?>"><?php echo $eachBlog['title'] ?></a></h3>
                                <div class="meta">
                                    <div><span class="fa fa-calendar"></span> <?php echo $eachBlog['date'] ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'template/footer.php'; ?>
<?php else: ?>
    echo '<h1 class="text-center">'. '404 ERROR' . '</h1>';
<?php endif; ?>



</body>
</html>

