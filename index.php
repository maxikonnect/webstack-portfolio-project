<?php 
$pageTitle = "Home - PassOneTouch";
include './includes/header.php';
?>
    <?php require './includes/nav.php' ?>
        <main>
            <h1 class="visually-hidden">Homepage</h1>
            <!--about section start-->
            <section id="about-section" class="about-section">
                <div class="container">
                    <div class="row py-5 g-3 align-items-center">
                        <!-- Text Section -->
                        <div class="col-12 col-md-6 text-center about-text">
                            <h3>About Us</h3>
                            <p>Welcome to <span>Pass One Touch</span>, an interactive platform designed to help workers and students achieve professional and academic success. We specialize in providing objective question-based practice to enhance exam preparation.</p>
                        </div>
                        <!-- Image Section -->
                        <div class="col-12 col-md-6 d-flex justify-content-center about-image">
                            <img class="w-75" height="400" width="400" src="Assets/images/about/teachers.jpeg" alt="teachers picture">
                        </div>
                    </div>
                </div>
            </section>
            <!--about section ends-->

            <!--Testimonials start-->
            <section class="testimonials" id="testimonials">
                <div class="container">
                    <div class="row g-5 mt-5">
                        <div class="col-12 text-center mt-3 header-text">
                            <h3><span>testimonials</span></h3>
                        </div>
                        <!-- Testimonial 1 -->
                        <div data-aos="fade-up" class="col-12 col-md-4 col-sm-6 d-flex flex-column align-items-center text-center testimonialone">
                            <img class="img-fluid w-50 mb-3" src="Assets/images/testimonial/testimonial1.jpeg" alt="testimonial one">
                            <p>Great platform for exam preparation!</p>
                            <h6>Peter Owusu</h6>
                        </div>

                        <!-- Testimonial 2 -->
                        <div data-aos="fade-up" class="col-12 col-md-4 col-sm-6 d-flex flex-column align-items-center text-center testimonialone">
                            <img class="img-fluid w-50 mb-3" src="Assets/images/testimonial/testimonial2.jpeg" alt="testimonial two">
                            <p>Pass One Touch is simply amazing!</p>
                            <h6>Aisha Abu</h6>
                        </div>

                        <!-- Testimonial 3 -->
                        <div data-aos="fade-up" class="col-12 col-md-4 col-sm-6 d-flex flex-column align-items-center text-center testimonialone">
                            <img class="img-fluid w-50 mb-3" src="Assets/images/testimonial/testimonial3.jpeg" alt="testimonial three">
                            <p>Helped me improve my confidence!</p>
                            <h6>Patience Tetteh</h6>
                        </div>
                    </div>
                </div>
            </section>
            <!--Testimonials ends-->
            
             
            <section id="latest-news" class="works">
            <div class="container">
                <div class="col-12 text-center header-text">
                    <h3><span>latest news</span></h3>
                </div>
                <div class="works-content" data-aos="fade-up">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-how-works">
                                <div class="single-how-works-icon">
                                    <img src="Assets/images/testimonial/testimonial5.jpeg" alt="latest news" class="img-fluid w-100 mb-3">
                                </div>
                                <h2><a href="#">find <span> what you want</span></a></h2>
                                <p>
                                    Three pre-tertiary education labour unions have given the government up to the end of September this year to address a number of issues affecting their members as well as teaching and learning in schools.
                                </p>
                                <button class="primary-button" onclick="window.location.href='news/latestnews1.php'">
                                    read more
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="single-how-works">
                                <div class="single-how-works-icon">
                                    <img src="Assets/images/testimonial/testimonial5.jpeg" alt="latest news" class="img-fluid w-100 mb-3">
                                </div>
                                <h2><a href="#">find <span> what you want</span></a></h2>
                                <p>
                                    WAEC Cancels Results of 4,591 Candidates
                                </p>
                                <button class="primary-button" onclick="window.location.href='news/latestnews2.php'">
                                    read more
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="single-how-works">
                                <div class="single-how-works-icon">
                                    <img src="Assets/images/testimonial/testimonial6.jpeg" alt="latest news" class="img-fluid w-100 mb-3">
                                </div>
                                <h2><a href="#">explore <span> amazing</span> place</a></h2>
                                <p>
                                    Three pre-tertiary education labour unions have given the government up to the end of September this year to address a number of issues affecting their members as well as teaching and learning in school.
                                </p>
                                <button class="primary-button" onclick="window.location.href='news/latestnews3.php'">
                                    read more
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--latest news ends-->   
        </main>

        <!--footer start -->
        <?php require './includes/footer.php' ?>
    </body>
</html>