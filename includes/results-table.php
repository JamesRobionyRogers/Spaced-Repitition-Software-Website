<div class="results-table-wrapper">
    <div class="results-table-container">
        <table class="results-table">
            <tr class="table-titles">
                <th class="question-num">#</th>
                <th class="question-text">Question:</th>
                <th class="answer-state">Answer:</th>
            </tr>
        </table>
        <?php 
            // Setting vairables 
            $questions = $_SESSION['questions'];		// creating array out of get string 
            $questionNumber = 1; 								// used in table 

            // TODO: Itterate through the answer states

            // Itterating through questions into table 
            foreach ($questions as $q) {
                if(!isset($_SESSION['answerList'][$questionNumber])){$_SESSION['answerList'][$questionNumber] = 'NULL';}
                if(!isset($_SESSION['questions'][$questionNumber])){$_SESSION['questions'][$questionNumber] = 'NULL';}

                // Spacer Row
                echo 	"<div class='spacer'>";
                echo 		"<div class='spacer'></div>";
                echo	"</div>";
                // Data Row 
                echo 	"<div class='row'>";
                echo 		"<div class='question-num'>$questionNumber</div>";
                echo 		"<div class='question-text'>" . $q . "</div>";
                echo 		"<div class='answer-state " . $_SESSION['answerList'][$questionNumber-1] . "'>" . $_SESSION['answerList'][$questionNumber-1] . "</div>";
                echo	"</div>";

                $questionNumber++;
            }
        ?>
    </div>
</div>

<div class="add-highscore-wrapper">
    <div class="add-highscore-container">
        <form class="add-highscore-form" method="post">
            <input name="initials" placeholder="Initials" minlength="3" maxlength="3" type="text" class="add-highscore-name">
            <button id="add-highscore-btn" onclick="AddHighscore()">Add Highscore</button>
        </form>
    </div>
</div>