<!-- Includes: Header -->
<!-- TODO: Fix the links using js - reffer to tutorial site 2020 -->

<!-- Nav bar inspired by my 2020 Tutorial Site  -->
<?php include 'constants.php'; ?>

<header> 

    <!-- Handburger Manu -->
    <div class="burgermenu-logo">
        <div class="burger burger-squeeze">
            <div class="burger-lines"></div>
        </div>

        <!-- Logo in the Middle -->
        <a class="logo-text home-page" href=""><?php echo $title; ?></a>
    </div>
    

    <nav>
        <ul class="nav-links">
            <li><a class="link home-page" href="">Home</a></li>
            <li><p class="link dropdown" >Quizzes</p></li>
            <li><p class="link dropdown-learn" >Learn</p></li>     <!-- NOTE must use sesson vairbales to record the users results for eah quiz -->
            <li><a class="link highscore-page" href="">Highscores</a></li>
        </ul>
    </nav>

    <nav class="flexdisplay-profile">
        <ul class="nav-links">
            <!-- Profile Icon TODO: Add in the vairable profile icon from fontawesome (student/admin) -->
            <li>
                <div class="profile-icn">
                    <i class="fas fa-user-shield"></i>
                </div>
            </li>
            
            <!-- Profile Button -->
            <li id="login"><button class="link login">Login</button></li>

            <!-- Logout Button TODO: As in logour button from fontawesome-->
            <li>
                <div class="logout-icn">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
            </li>
        </ul>


    </nav>

</header>

<!-- Dropdown Content for Hamburger Menu -->
<div class="dropdown-content hidden">
    <ul class="site-map">
        <!-- TODO: Sort out link class' -->
        <?php 

            // Defining func as not to interfear with other PHP commands
            function itterateSubjects() {
                $dbc = mysqli_connect("localhost", "root", 'admin', "srs");
                // Setting up the query 
                $subjectsQuery = 'CALL GetSubjects()'; 
                $subjectsResult = mysqli_query($dbc, $subjectsQuery);

                // echo each Team into a drop down menu
                while($subjectsRecord = mysqli_fetch_assoc($subjectsResult)){
                    echo '<li><a class="link" href="">' . $subjectsRecord['subjectName'] . '</a></li>';
                }
            }

            
            itterateSubjects(); 
            
             
        ?>        
    </ul>
</div>