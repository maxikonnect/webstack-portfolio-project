<?php 
$pageTitle = "Home - PassOneTouch";
include './includes/header.php';
?>
<?php require_once './includes/nav.php'; ?>
<main>
    <h1 class="visually-hidden">Homepage</h1>

    <!-- About Section Start -->
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
                    <img class="w-75" height="400" width="400" src="Assets/images/about/teachers.jpeg" alt="Teachers collaborating in a classroom">
                </div>
            </div>
        </div>
    </section>
    <!-- About Section Ends -->
    <!--Testimonials start-->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="row g-5 mt-5">
                <div class="col-12 text-center mt-3 header-text">
                    <h3><span>testimonials</span></h3>
                </div>
                <!-- Testimonial 1 -->
                <div data-aos="fade-up" class="col-12 col-md-4 col-sm-6 d-flex flex-column align-items-center text-center testimonialone">
                    <img class="img-fluid w-50 mb-3" src="Assets/images/testimonial/testimonial1.jpeg" alt="testimonial one" loading="lazy" >
                    <p>Great platform for exam preparation!</p>
                    <h6>Peter Owusu</h6>
                </div>

                <!-- Testimonial 2 -->
                <div data-aos="fade-up" class="col-12 col-md-4 col-sm-6 d-flex flex-column align-items-center text-center testimonialone">
                    <img class="img-fluid w-50 mb-3" src="Assets/images/testimonial/testimonial2.jpeg" alt="testimonial two" loading="lazy">
                    <p>Pass One Touch is simply amazing!</p>
                    <h6>Aisha Abu</h6>
                </div>

                <!-- Testimonial 3 -->
                <div data-aos="fade-up" class="col-12 col-md-4 col-sm-6 d-flex flex-column align-items-center text-center testimonialone">
                    <img class="img-fluid w-50 mb-3" src="Assets/images/testimonial/testimonial3.jpeg" alt="testimonial three" loading="lazy">
                    <p>Helped me improve my confidence!</p>
                    <h6>Patience Tetteh</h6>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonials ends-->

    <!-- Latest News Start -->
    <section id="latest-news" class="works">
        <div class="container">
            <header class="col-12 text-center header-text">
                <h3><span>Latest News</span></h3>
            </header>
            <div class="works-content" data-aos="fade-up">
                <div class="row">
                    <!-- News 1 -->
                    <article class="col-md-4 col-sm-6">
                        <div class="single-how-works">
                            <div class="single-how-works-icon">
                                <img src="Assets/images/news/news3.jpeg" alt="Latest news" class="img-fluid w-100 mb-3" loading="lazy">
                            </div>
                            <p>We’ll improve condition of teachers – Haruna Iddrisu</p>
                            <button class="primary-button" data-href="news/latestnews1.php">Read More</button>
                        </div>
                    </article>

                    <!-- News 2 -->
                    <article class="col-md-4 col-sm-6">
                        <div class="single-how-works">
                            <div class="single-how-works-icon">
                                <img src="Assets/images/news/news2.jpg" alt="Latest news" class="img-fluid w-100 mb-3" loading="lazy">
                            </div>
                            <p>WAEC Cancels Results of 4,591 Candidates</p>
                            <button class="primary-button" data-href="news/latestnews2.php">Read More</button>
                        </div>
                    </article>

                    <!-- News 3 -->
                    <article class="col-md-4 col-sm-6">
                        <div class="single-how-works">
                            <div class="single-how-works-icon">
                                <img src="Assets/images/news/news1.png" alt="Latest news"  class="img-fluid w-100 mb-3" loading="lazy">
                            </div>
                            <p>Three(3) Teacher Unions Make Demands On Govt </p>
                            <button class="primary-button" data-href="news/latestnews3.php">Read More</button>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest News End -->
</main>

<!-- Footer Start -->
<?php require_once './includes/footer.php'; ?>
<script>
    // Attach click events to buttons dynamically
    document.querySelectorAll('.primary-button').forEach(button => {
        button.addEventListener('click', () => {
            window.location.href = button.dataset.href;
        });
    });
</script>
</body>
</html>
