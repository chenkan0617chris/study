<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funny Quiz</title>
</head>
<body>
    
    <?php
        $questions = array(
            "Which sport involves 'birdies'?" => 'Golf',
            'What do you call the top division of professional soccer in England?' => 'Premier',
            "What's the round object used in ice hockey?" => 'Puck',
            'What do you shout to show approval in a stadium?' => 'Goal',
            'What type of race involves obstacles like mud pits and walls?' => 'Tough',
            "What term describes a team's designated home venue?" => 'Stadium',
            'What do you call the metal rim used to support a basketball hoop?' => 'Rim',
            "What's the maximum number of players on a baseball team?" => 'Nine',
            'What do you call the area where sumo wrestlers compete?' => 'Dohyo',
            'In which sport would you find a shuttlecock?' => 'Badminton',
        );
        $points = 0;

        $correct_questions = 0;
        $incorrect_questions = 0;
    
        if(isset($_POST['submit'])) {
            $quiz = $_POST['quiz'];
            echo '<pre>';
            print_r($quiz);
            echo '</pre>';

            foreach($quiz as $question => $answer) {
                if(strlen($answer) === 0) {
                    $incorrect_questions++;
                    echo 'you need to enter an answer! <br/>';
                } else if(strtolower($answer) === strtolower($questions[$question])) {
                    $correct_questions++;
                    echo "your answer is correct! " . $answer . ' <br/>';
                } else {
                    $incorrect_questions++;
                    echo "your answer is incorrect! The answer is " . $questions[$question] . ' <br/>';
                }
            }
            echo '<p>your points: <span>' . $correct_questions * 5 - $incorrect_questions * 2 . '</span></p>';
            echo $incorrect_questions;
            echo '<p><a href="task1.php">try again?</a></p>';
        } else {
            ?>
            <form action="task1.php" method="post">
                <table>
                <?php
                    foreach ($questions as $question => $answer) {
                        echo '<tr><td>';
                        echo '<span>' . $question .'</span>';
                        echo '</td><td>';
                        echo '<input type="text" name="quiz['. $question .']" id="">';
                        echo '</td></tr>';
                    }
                ?>
                    <tr>
                        <td>
                            <input type="submit" value="submit" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        }
    ?>
</body>
</html>