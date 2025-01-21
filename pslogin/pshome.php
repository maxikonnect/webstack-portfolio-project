<?php

    require '../includes/testdashboard.php';
?>

<?php 
$pageTitle = "PS Home - PassOneTouch";
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
              <div class="user" id="user-home"><i class="fa fa-building" aria-hidden="true"></i><a href="./pshome.php">Home</a></div>
              <div class="user" id="user-start-tests"><i class="fa fa-tasks" aria-hidden="true"></i><a href="./pspagetest.php">Start Tests</a></div>
              <div class="user" id="user-check-tests"><i class="fa fa-tasks" aria-hidden="true"></i><a href="./psresultspage.php">check tests results</a></div>
              <div class="user"><i class="fa fa-sign-out" aria-hidden="true"></i><a href="../logout.php">Logout</a></div>
            </div>
          </header>
          <main>
            <h1 class="visually-hidden">start tests</h1>
            <section class="scores">
                <div class="containerscores">
                    <div class="rowscores">
                        <div class="column">
                            <div class="column-score-header">
                                <div>average marks: <span class="averageMarks"></span></div>
                                <div> average score(Percent):<span class="averageMarksPercent"></span> </div>
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
            // Function to safely extract and display results
            const averageMarks = document.querySelector(".averageMarks");
            const averageMarksPercent = document.querySelector(".averageMarksPercent");
            const averageMarksArray = [];
            const averageMarksPercentArray = [];
            
            const displayResult = (key, selector, percentValue) => {
                const result = JSON.parse(localStorage.getItem(key)) || null;
                const testScoreElement = document.querySelector(selector);
                const converttestScoreToPercent = document.querySelector(percentValue);
                
                if (result && result.totalScore !== undefined && Array.isArray(result.details)) {
                    testScoreElement.textContent = `${result.totalScore} out of ${result.details.length}`;
                    const percentMark = `${((result.totalScore / result.details.length) * 100).toFixed(2)}`;
                    converttestScoreToPercent.textContent = `${percentMark}%`;
                    averageMarksPercentArray.push(Number(percentMark));
                    averageMarksArray.push(Number(result.totalScore));
                } else {
                    testScoreElement.textContent = "Not Done";
                    converttestScoreToPercent.textContent = "Not Done";
                }
            };
        
            displayResult('quizResults1', '.testscore1', '.testscore1percent');
            displayResult('quizResults2', '.testscore2', '.testscore2percent');
            displayResult('quizResults3', '.testscore3','.testscore3percent');
            const sumMarks = averageMarksArray.reduce((acc, cum) => acc + cum, 0);
            const sumMarksPercent = averageMarksPercentArray.reduce((acc, cum)=> acc + cum, 0);

            if(averageMarksArray.length == 0 && averageMarksPercentArray.length == 0){
                averageMarks.textContent += "-";
                averageMarksPercent.textContent += "-";
            }else{
                const aveMarks = `${sumMarks / averageMarksArray.length}`
                

                const aveMarksPercent = `${sumMarksPercent / averageMarksPercentArray.length}`;
                averageMarksPercent.textContent += `aveMarksPercent%`;

                if(aveMarks < 35){
                    averageMarks.style.color = "red";
                    
                }else{
                    averageMarks.style.color = "green";
                }
            }
        </script>
        
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