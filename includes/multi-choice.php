<div class="quiz-cards">

    <?php 

        // SQL for getting answers  
        $currentQuestionID = getQuestionID($currentQuestion);       // used for the answers 
		$answers = getAnswers($currentQuestionID);    // answer pool 

        foreach($answers as $a) {
            echo '<div class="quiz-card-wrapper">';
            echo    '<div class="quiz-card-container">';
            echo        "<a class='card'>";
            echo            '<div class="card-title">';
            echo                '<h1 class="card-title">' . ucwords($a) . '</h1>';
            echo            '</div>';  
            echo        '</a>';
            echo    '</div>';
            echo '</div>';
        }

    ?>

    <!-- <div class="quiz-card-wrapper">
        <div class="quiz-card-container">
            <a class="card" href="">		
                <div class="card-title">
                    <h1 class="card-title">Whenua</h1>
                </div>
            </a>
        </div>
    </div> -->


</div>