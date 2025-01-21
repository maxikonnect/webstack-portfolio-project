<?php

    require '../includes/testdashboard.php';
?>

<?php 
$pageTitle = "ADI Check Results - PassOneTouch";
$styleCSS = '../style/style.css';
include '../includes/header.php';
?>

    <body>
        <header class="loggedheader" id="loggedheader">
            <div class="header-container">
              <div class="header-container-sub">
                <div id="menu-toggle-icon" class="fas fa-bars"></div> 
                <div class="logo"><a href="./pshome.html">passonetouch</a></div>
              </div>
            </div>
            <div class="menu-items">
              <div class="user"><i class="fa fa-user-circle" aria-hidden="true"></i><p>Hello <?php echo htmlspecialchars($_SESSION["username"])?></p>
              </div>
              <div class="user" id="user-home"><i class="fa fa-building" aria-hidden="true"></i><a href="./adIhome.html">Home</a></div>
              <div class="user" id="user-start-tests"><i class="fa fa-tasks" aria-hidden="true"></i><a href="./adItestpage.html">Start Tests</a></div>
              <div class="user" id="user-check-tests"><i class="fa fa-tasks" aria-hidden="true"></i><a href="./adIresultspage.html">check tests results</a></div>
              <div class="user"><i class="fa fa-sign-out" aria-hidden="true"></i><p>Logout</p></div>
            </div>
          </header>
          <main>
            <h1 class="visually-hidden">results page</h1>
            <section class="scores">
                <div class="containerscores">
                    <div class="rowscores">
                        <a class="resultslink" href="../quizhtml/ADI/ad1result1.html">test 1 results</a>
                        <a class="resultslink" href="../quizhtml/ADI/ad1result2.html">test 2 results</a>
                        <a class="resultslink" href="../quizhtml/ADI/ad1result3.html">test 3 results</a>
                        <a class="resultslink" href="../quizhtml/ADI/ad1result4.html">test 4 results</a>
                    </div>
                </div>
            </section>
        </main>

        <!-- footer start -->
        <footer class="footer-sect">
            <div class="footer-logged">
                <p class="credit-para">&copy;copyright <span class="credit-span"></span> passonetouch. designed by <a href="https://github.com/maxikonnect">abradu</a></p>
            </div>
        </footer>
        <!--footer ends-->

        
        
        <!--Date update-->
        <script src="../js/date.js"></script>

        <!--Toggle menu-->
        <script src="../js/loggedinmenu.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script>
            AOS.init({
            duration: 600,
            delay: 200,
            });
        </script>   
    </body>
</html>