<?php

    require '../includes/testdashboard.php';
?>

<?php 
$pageTitle = "ADI Home - PassOneTouch";
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
              <div class="user"><i class="fa fa-sign-out" aria-hidden="true"></i><p>Logout</p></div>
            </div>
          </header>
          <main>
            <h1 class="visually-hidden">start tests</h1>
            <section class="scores">
                <div class="containerscores">
                    <div class="rowscores">
                        <div class="column">
                            <div class="column-score-header">
                                <div title="Above 35 passed, Below 35 failed">average marks: <span class="averageMarks"></span></div>
                                <div title="Above 50% passed, Below 50% failed"> average score(Percent):<span class="averageMarksPercent"></span> </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column-tests">
                                <div class="tests">
                                    <p class="test">test:</p>
                                    <p class="testscore"><span>score</span></p>
                                    <p class="percentscore"><span>Mark(100%)</span></p>
                                </div>
                                <div class="tests">
                                    <p class="test#1">test1:</p>
                                    <p class="testscore1"><span> - </span></p>
                                    <p class="testscore1percent"><span> - </span></p>
                                </div>
                                <div class="tests">
                                    <p class="test#2">test2:</p>
                                    <p class="testscore2"><span> - </span></p>
                                    <p class="testscore2percent"><span> - </span></p>
                                </div>
                                <div class="tests">
                                    <p class="test#3">test3:</p>
                                    <p class="testscore3"><span> - </span></p>
                                    <p class="testscore3percent"><span> - </span></p>
                                </div>
                                <div class="tests">
                                    <p class="test#4">test4:</p>
                                    <p class="testscore4"><span> - </span></p>
                                    <p class="testscore4percent"><span> - </span></p>
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
        <script>

                // Function to fetch results safely
                const getResultFromStorage = (key) => {
                    try {
                        return JSON.parse(localStorage.getItem(key)) || null;
                    } catch (error) {
                        console.error(`Error parsing localStorage for key "${key}":`, error);
                        return null;
                    }
                };

                // Function to display test results
                const displayResult = (key, selector, percentValue) => {
                    const result = getResultFromStorage(key);
                    const testScoreElement = document.querySelector(selector);
                    const converttestScoreToPercent = document.querySelector(percentValue);

                    if (result && result.totalScore !== undefined && Array.isArray(result.details)) {
                        testScoreElement.textContent = `${result.totalScore} out of ${result.details.length}`;
                        const percentMark = ((result.totalScore / result.details.length) * 100).toFixed(2);
                        converttestScoreToPercent.textContent = `${percentMark}%`;
                        averageMarksPercentArray.push(Number(percentMark));
                        averageMarksArray.push(Number(result.totalScore));
                    } else {
                        testScoreElement.textContent = "Not Done";
                        converttestScoreToPercent.textContent = "Not Done";
                    }
                };

                // Calculate and display results
                const averageMarks = document.querySelector(".averageMarks");
                const averageMarksPercent = document.querySelector(".averageMarksPercent");
                const averageMarksArray = [];
                const averageMarksPercentArray = [];

                displayResult('ad1QuizResults1', '.testscore1', '.testscore1percent');
                displayResult('ad1QuizResults2', '.testscore2', '.testscore2percent');
                displayResult('ad1QuizResults3', '.testscore3','.testscore3percent');
                displayResult('ad1QuizResults4', '.testscore4','.testscore4percent');

                const sumMarks = averageMarksArray.reduce((acc, cum) => acc + cum, 0);
                const sumMarksPercent = averageMarksPercentArray.reduce((acc, cum) => acc + cum, 0);

                if (averageMarksArray.length === 0 || averageMarksPercentArray.length === 0) {
                    averageMarks.textContent = "-";
                    averageMarksPercent.textContent = "-";
                } else {
                    const avgMarks = sumMarks / averageMarksArray.length;
                    const avgPercent = sumMarksPercent / averageMarksPercentArray.length;

                    averageMarks.textContent = avgMarks.toFixed(2);
                    averageMarksPercent.textContent = ` ${avgPercent.toFixed(2)}%`;

                    averageMarks.style.color = avgMarks < 35 ? "red" : "green";
                    averageMarksPercent.style.color = avgPercent < 50 ? "red" : "green";
                }

        </script>
        <!--Link to javascripts used-->
        <!--Date update-->
        <script src="../js/date.js"></script>

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

displayResult('ad1QuizResults1', '.testscore1', '.testscore1percent');
displayResult('ad1QuizResults2', '.testscore2', '.testscore2percent');
displayResult('ad1QuizResults3', '.testscore3','.testscore3percent');
displayResult('ad1QuizResults4', '.testscore4','.testscore4percent');