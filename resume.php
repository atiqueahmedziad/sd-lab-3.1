<?php
    include 'includes/aboutme.php';
    include 'includes/education.php';
    include 'includes/work-experience.php';
    include 'includes/org-experience.php';
    include 'includes/skills.php';
    include 'includes/adward.php';
    include 'includes/project.php';
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

    <section class="resume-section" id="resume-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 asdas">
                    <nav id="navi"  class="navbar side-nav navbar-light sticky-top showbar">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#page-1" class="nav-link"><span>Education</span></a></li>
                            <li class="nav-item"><a href="#page-2" class="nav-link"><span>Work Experience</span></a></li>
                            <?php
                                if(isset($_SESSION['id'])){
                                    echo '<li class="nav-item"><a href="#page-3" class="nav-link"><span>Organization Experience</span></a></li>
                                          <li class="nav-item"><a href="#page-4" class="nav-link"><span>Skills</span></a></li>
                                          <li class="nav-item"><a href="#page-5" class="nav-link"><span>Awards</span></a></li>
                                          <li class="nav-item"><a href="#page-6" class="nav-link"><span>Projects</span></a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div id="page-1" class= "page one">
                        <h2 class="heading">Education</h2>
                        <?php foreach ($educationList as $educationEach): ?>
                        <div class="resume-wrap d-flex">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date"><?php echo $educationEach['from_year'] ?> - <?php echo ($educationEach['current'] == 1 ? "Current" : $educationEach['to_year']); ?> </span>
                                <h2><?php echo $educationEach['degree']; ?></h2>
                                <span class="position"><?php echo $educationEach['institution'] ?></span>
                                <p><?php echo $educationEach['description'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Work Experience -->
                    <div id="page-2" class= "page two">
                        <h2 class="heading text-uppercase">Work Experience</h2>
                        <?php if(isset($_SESSION['id'])): ?>
                            <?php foreach ($workList as $workEach): ?>
                            <div class="resume-wrap d-flex">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-ideas"></span>
                                </div>
                                <div class="text pl-3">
                                    <span class="date"><?php echo $workEach['from_year'] ?> - <?php echo ($workEach['current'] == 1 ? "Current" : $workEach['to_year']); ?></span>
                                    <h2><?php echo $workEach['company'] ?></h2>
                                    <span class="position"><?php echo $workEach['designation'] ?></span>
                                    <?php if(!empty($workEach['p_description'])): ?>
                                        <p><?php echo $workEach['p_description']; ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($workEach['li_description'])): ?>
                                    <ul class="ul-work-description">
                                        <?php foreach (explode('&Each&', $workEach['li_description']) as $listItem): ?>
                                            <li><?php echo htmlspecialchars($listItem) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                    <?php if(!empty($workEach['button'])): ?>
                                        <?php foreach(explode('&Each&', $workEach['button']) as $buttonAll): ?>
                                        <?php $eachButton = explode(',', $buttonAll); ?>
                                            <a target="_blank" href="<?php echo $eachButton[0]; ?>"><button class="btn btn-dark"><?php echo $eachButton[1]; ?></button></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="ask-login-section">
                                <h2 class="text-center">To see the full resume, please <a class="text-success ask-login-btn" href="login.php">login</a></h2>
                            </div>
                        <?php endif; ?>


                    </div>
                        <!-- Organization Experience -->
                    <?php if(isset($_SESSION['id'])) : ?>
                        <div id="page-3" class= "page three">
                        <h2 class="heading text-uppercase">Organization Experience</h2>
                        <?php foreach ($orgList as $eachOrg): ?>
                            <div class="resume-wrap d-flex">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-ideas"></span>
                                </div>
                                <div class="text pl-3">
                                    <span class="date"><?php echo $eachOrg['from_year'] ?> - <?php echo ($eachOrg['current'] == 1 ? "Current" : $workEach['to_year']); ?></span>
                                    <h2><?php echo $eachOrg['company'] ?></h2>
                                    <span class="position"><?php echo $eachOrg['designation'] ?></span>
                                    <?php if(!empty($eachOrg['p_description'])): ?>
                                        <p><?php echo $eachOrg['p_description']; ?></p>
                                    <?php endif; ?>
                                    <?php if(!empty($eachOrg['li_description'])): ?>
                                        <ul class="ul-work-description">
                                            <?php foreach (explode('&Each&', $eachOrg['li_description']) as $listItem): ?>
                                                <li><?php echo htmlspecialchars($listItem) ?></li>
                                            <?php endforeach; ?>
                                        </ul>

                                    <?php endif; ?>
                                    <?php if(!empty($eachOrg['button'])): ?>
                                        <?php foreach(explode('&Each&', $eachOrg['button']) as $buttonAll): ?>
                                            <?php $eachButton = explode(',', $buttonAll); ?>
                                            <a target="_blank" href="<?php echo $eachButton[0]; ?>"><button class="btn btn-dark"><?php echo $eachButton[1]; ?></button></a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Skills -->

                    <?php if(isset($_SESSION['id'])): ?>
                        <div id="page-4" class= "page four">
                        <h2 class="heading">Skills</h2>
                        <div class="row">
                            <?php foreach($skillList as $eachSkill): ?>
                                <div class="col-md-6 animate-box">
                                    <div class="progress-wrap">
                                        <h3><?php echo $eachSkill['language']; ?></h3>
                                        <div class="progress">
                                            <div class="progress-bar color-1" role="progressbar" aria-valuenow="70"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $eachSkill['level']; ?>">
                                                <span><?php echo $eachSkill['level']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Awards -->

                    <?php if(isset($_SESSION['id'])): ?>
                        <div id="page-5" class= "page five">
                        <h2 class="heading">Awards</h2>
                        <?php foreach ($adwardList as $eachAward): ?>
                        <div class="resume-wrap d-flex">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date"><?php echo $eachAward['year']; ?></span>
                                <h2><?php echo $eachAward['award_title']; ?></h2>
                                <span class="position"><?php echo $eachAward['organizer']; ?></span>
                                <p><?php echo $eachAward['p_description']; ?></p>
    <!--                            <a href="https://blog.mozilla.org/addons/2016/10/05/friend-of-add-ons-atique-ahmed-ziad"><button class="btn btn-dark">Detail Blog Post</button></a>-->
                                <?php if(!empty($eachAward['button'])): ?>
                                    <?php foreach(explode('&Each&', $eachAward['button']) as $buttonAll): ?>
                                        <?php $eachButton = explode(',', $buttonAll); ?>
                                        <a target="_blank" href="<?php echo $eachButton[0]; ?>"><button class="btn btn-dark"><?php echo $eachButton[1]; ?></button></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Projects -->
                    <div id="page-6" class= "page six">
                        <h2 class="heading">Projects</h2>
                        <?php foreach($projectList as $eachProject): ?>
                        <div class="resume-wrap d-flex">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-ideas"></span>
                            </div>
                            <div class="text pl-3">
                                <span class="date"><?php echo $eachProject['date']; ?></span>
                                <h2><?php echo $eachProject['project_name']; ?></h2>
                                <span class="position"><?php echo $eachProject['tech_uses']; ?></span>
                                <p><?php echo $eachProject['p_description']; ?></p>
                                <?php if(!empty($eachProject['button'])): ?>
                                    <?php foreach(explode('&Each&', $eachProject['button']) as $buttonAll): ?>
                                        <?php $eachButton = explode(',', $buttonAll); ?>
                                        <a target="_blank" href="<?php echo $eachButton[0]; ?>"><button class="btn btn-dark"><?php echo $eachButton[1]; ?></button></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <?php
        include 'template/footer.php';
    ?>

<script>
    $(document).ready(function () {
        $("#navTop li:nth-child(3)").addClass("active");
    });
</script>

<script src="js/typed-animation.js"></script>
<script src="js/main.js"></script>

</body>
</html>

