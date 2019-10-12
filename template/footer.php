<?php
    include 'includes/aboutme.php';
?>
<footer class="ziad-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ziad-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About me</h2>
                    <p>Atique likes to play with web technologies more often. He is currently working as a full stack developer.</p>
                </div>
            </div>
            <div class="col-md">
                <div class="ziad-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="http://atique.xyz/ziad-sd"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                        <li><a href="http://atique.xyz/ziad-sd/#about-me"><span class="icon-long-arrow-right mr-2"></span>About me</a></li>
                        <li><a href="http://atique.xyz/ziad-sd/resume.php"><span class="icon-long-arrow-right mr-2"></span>Resume</a></li>
                        <li><a href="http://atique.xyz/ziad-sd/#portfolio"><span class="icon-long-arrow-right mr-2"></span>Portfolio</a></li>
                        <li><a href="http://atique.xyz/ziad-sd/contact.php"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ziad-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Social profiles</h2>
                    <ul class="social-profiles list-unstyled float-md-left float-lft mt-2">
                        <li><a target="_blank" href="<?php echo myGithub ?>"><i class="text-white fab fa-3x fa-github"></i></a></li>
                        <li><a target="_blank" href="<?php echo myLinkedin ?>"><i class="text-white fab fa-3x fa-linkedin"></i></a></li>
                        <li><a target="_blank" href="<?php echo myTwitter ?>"><i class="text-white fab fa-3x fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ziad-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 question-footer mb-3">
                        <ul class="list-unstyled">
                            <li><span class="icon icon-map-marker"></span><span class="text"><?php echo myAddress; ?></span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo myPhone; ?></span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo myEmail; ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
            </div>
        </div>
    </div>
</footer>