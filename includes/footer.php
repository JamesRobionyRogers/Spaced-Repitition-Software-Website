<!--  -->


<nav>
    <ul class="nav-links">
        <li><a class="link home-page" href="">Home</a></li>
        <li id="footer-logo-text" ><a class="logo-text home-page" href=""><?php echo $title; ?></a></li>
        <li><a class="link highscore-page" href="">Highscores</a></li>
    </ul>
    
    <!-- Site map tutorial pages -->
    <ul class="site-map">
        <?php itterateSubjects(); ?>
    </ul>
</nav>

<!-- Mobile Back to top Button  -->
<div class="bk2top">
    <a href="#body-wrapper">
        <p class="bk2top-text">Back <span>to</span> Top</p>
        <div class="bk2top-arrows">
            <div class="arrow arrow-first"></div>
            <div class="arrow arrow-second"></div>
            <div class="arrow arrow-third"></div>
        </div>
    </a>
</div>

<!-- Dark mode Toggle Button -->
<!-- <div class="drk-mode">
    <i class="fas fa-moon"></i>
</div> -->