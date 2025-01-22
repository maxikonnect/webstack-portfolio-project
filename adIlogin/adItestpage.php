<?php

    require '../includes/testdashboard.php';
?>

<?php 
$pageTitle = "ADI Tests- PassOneTouch";
$styleCSS = '../style/style.css';
include '../includes/header.php';
?>

    <body>
        <header class="loggedheader" id="loggedheader">
            <div class="header-container">
              <div class="header-container-sub">
                <div id="menu-toggle-icon" class="fas fa-bars"></div> <!-- Menu Toggle Icon -->
                <div class="logo"><a href="./adIhome.php">passonetouch</a></div>
              </div>
            </div>
            <div class="menu-items">
                <div class="user"><i class="fa fa-user-circle" aria-hidden="true"></i><p>Hello <?php echo htmlspecialchars($_SESSION["username"])?></p>
                </div>
                <div class="user" id="user-home"><i class="fa fa-building" aria-hidden="true"></i><a href="./adIhome.php">Home</a></div>
                <div class="user" id="user-start-tests"><i class="fa fa-tasks" aria-hidden="true"></i><a href="./adItestpage.php">Start Tests</a></div>
                <div class="user" id="user-check-tests"><i class="fa fa-tasks" aria-hidden="true"></i><a href="./adIresultspage.php">check tests results</a></div>
                <div class="user"><i class="fa fa-sign-out" aria-hidden="true"></i><a href="../logout.php">Logout</a></div>
            </div>
          </header>
          <main>
            <h1 class="visually-hidden">start tests</h1>
            <section id="latest-news" class="works user-tests">
                <div class="container">
                    <div class="col-12 text-center header-text">
                        <h3><span>start tests</span></h3>
                    </div>
                    <div class="works-content" data-aos="fade-up">
                        <div class="row g-3">
                            <div class="col-12 col-md-3 col-6">
                                <div class="single-how-works">
                                    <div class="single-how-works-icon">
                                        <img src="../Assets/images/testimonial/testimonial5.jpeg" alt="ADI Test 1" class="img-fluid w-100 mb-3">
                                    </div>
                                    <h3>TEST 1</h3>
                                    <div class="totalQuestionsContainer">
                                        <p>Total questions: <span>75</span></p>
                                    </div>
                                    <button class="primary-button" onclick="window.location.href='../quizhtml/ADI/ADItest1.html'">start now</button>
                                </div><a href=""></a>
                            </div>
                            <div class="col-12 col-md-3 col-6">
                                <div class="single-how-works">
                                    <div class="single-how-works-icon">
                                        <img src="../Assets/images/testimonial/testimonial5.jpeg" alt="ADI Test 2" class="img-fluid w-100 mb-3">
                                    </div>
                                    <h3>TEST 2</h3>
                                    <div class="totalQuestionsContainer">
                                        <p>Total questions: <span>75</span></p>
                                    </div>
                                    
                                    <button class="primary-button" onclick="window.location.href='../quizhtml/ADI/ADItest2.html'">start now</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-6">
                                <div class="single-how-works">
                                    <div class="single-how-works-icon">
                                        <img src="../Assets/images/testimonial/testimonial5.jpeg" alt="ADI Test 3" class="img-fluid w-100 mb-3">
                                    </div>
                                    <h3>TEST 3</h3>
                                    <div class="totalQuestionsContainer">
                                        <p>Total questions: <span>75</span></p>
                                    </div>
                                    
                                    <button class="primary-button" onclick="window.location.href='../quizhtml/ADI/ADItest3.html'">start now</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-6">
                                <div class="single-how-works">
                                    <div class="single-how-works-icon">
                                        <img src="../Assets/images/testimonial/testimonial5.jpeg" alt="ADI Test 4" class="img-fluid w-100 mb-3">
                                    </div>
                                    <h3>TEST 4</h3>
                                    <div class="totalQuestionsContainer">
                                        <p>Total questions: <span>75</span></p>
                                    </div>
                                    
                                    <button class="primary-button" onclick="window.location.href='../quizhtml/ADI/ADItest4.html'">start now</button>
                                </div>
                            </div>
                        </div>
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
        <script src="../js/menutoggle.js"></script>

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