<?php
$server = 'localhost';
$mySQLUsername = 'php';
$mySQLPassword = 'pa$$W00RD';
$database = 'sem2login';
$mysqli = new mysqli($server, $mySQLUsername, $mySQLPassword);
//convert so we can use in query
$databaseQ = $mysqli->real_escape_string($database);

$mysqli->query("USE $databaseQ");
$commentsQuery = $mysqli->query("SELECT id,username,text FROM pancakescommentsold ");


?>

<h3 class = "reference">  Comments </h3>
<div class="commentsContainer">
    <?php
    while($row = $commentsQuery->fetch_object()){
        echo "<div class=\"singleComment\">";
        echo "<aside class=\"comments\">";
        echo "<p>".$row->username."</p>";
//        echo "<p>"."user"."</p>";
        echo "</aside>";
        echo "<div class=\"comments\">";
        echo "<p>".$row->text."</p>";
    ////If user is logged in
        if(isset($_COOKIE["user"])){
            ////if comment was written by current user show delete
            if($_COOKIE["user"] == $row->username) {

                echo "<form class=\"formComment\" action=\"deleteComment.php\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"recipe\" value=\"pancakescommentsold\" />";
                echo "<input type=\"hidden\" name=\"commentId\" value=\"".$row->id."\" />";
                echo "<input type=\"hidden\" name=\"user\" value=\"".$row->username."\" />";
                echo "<input type=\"hidden\" name=\"site\" value=\"".htmlspecialchars(basename($_SERVER['REQUEST_URI']))."\" />";
                echo "<input type=\"submit\" value=\"Delete Comment\" />";
                echo "</form>";
            }
        }
     ////
        echo "</div>";
        echo "</div>";



    }
    ?>

</div>
<!--    <div class="singleComment">-->
<!--        <aside class="comments">-->
<!--            <p>Peter</p>-->
<!--        </aside>-->
<!--        <div class="comments">-->
<!--            <p> Nice recipe easy to follow and the result were delicious!-->
<!--                Nice recipe easy to follow and the result were delicious!-->
<!--                Nice recipe easy to follow and the result were delicious!-->
<!--                Nice recipe easy to follow and the result were delicious!-->
<!--                Nice recipe easy to follow and the result were delicious!-->
<!--                Nice recipe easy to follow and the result were delicious!-->
<!---->
<!---->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="singleComment">-->
<!--        <aside class="comments">-->
<!--            <p>Geralt</p>-->
<!--        </aside>-->
<!--        <div class="comments">-->
<!--            <p> Not bad, not bad at all!</p>-->
<!--        </div>-->
<!--    </div>-->
