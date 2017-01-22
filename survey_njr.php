<?php exit(); // call to extract() below is potentially insecure; please fix.
?>
<!--- revised questions:

-If RP can offer a group discount rate on hotel reservations for booking a month
in advance, would you book w/ us?

-->

<?php include '_constants.php'; ?>
<?php
	$title = "Survey";
	include '_top.php';

    $link = mysql_connect("localhost","dhar", "monkeyboy");
    mysql_select_db("conference");
    extract($_REQUEST);    

    //Check to see if they are mechmania
    $res = mysql_query("SELECT is_mechmania from registrants WHERE email='$e';");
    $mech = 0;
    if($res)
    {
        if($row = mysql_fetch_row($res))
        {
            $mech = $row[0];
        }
        
    }
    if($debug = 1)
    {
        $mech = 1;
    }
    function print_buttons($var)
    {

        echo "<td>";
        echo "<input type=\"radio\" value=\"1\" name=\"$var\">";
        echo "</td>";
        echo "<td>";
        echo "<input type=\"radio\" value=\"2\" name=\"$var\">";
        echo "</td>";
        echo "<td>";
        echo "<input type=\"radio\" value=\"3\" name=\"$var\">";
        echo "</td>";
        echo "<td>";
        echo "<input type=\"radio\" value=\"4\" name=\"$var\">";
        echo "</td>";
        echo "<td>";
        echo "<input type=\"radio\" value=\"5\" name=\"$var\">";
        echo "</td>";

    }
    function print_quest($quest, $var)
    {
        echo "<tr class='rating'>";
        echo "<th>$quest</th>";
        print_buttons($var);
        echo "</tr>\n";
    }
    
    function rating_header()
    { ?>
        <tr class="question-header">
            <td colspan="7">
               Please indicate how much you agree with the following statements.
            </td>
        </tr>
        
        <tr class="rating">
            <th></th>
            <td>Strongly<br>Agree</td>
            <td>Agree</td>
            <td>Neutral</td>
            <td>Disagree</td>
            <td>Strongly<br>Disagree</td>
        </tr> <?php
    }
?>

Thank you for attending Reflections&nbsp;|&nbsp;Projections 2004.  We hope you had a great time!
<p>
Your feedback is important to us in improving future years&rsquo; Reflections&nbsp;|&nbsp;Projections.
<p>
<form method="GET" action="survey_submit.php">
<table class="questions">
<tr>
    <th>Your email address:</th>
    <td colspan="6">
    <?php print "<input type=\"text\" name=\"email\" value=\"$e\"/>\n"; ?>
    </td>
</tr>
<tr>
    <th>Distance you traveled (miles):</th>
    <td colspan="6">
        <input type="text" name="distance" maxlength="5"/>
    </td>
</tr>
<tr>
    <th>Why did you come to the conference?</th>
    <td colspan="6">
        <textarea cols="50" rows="5" name="why"></textarea>
    </td>
</tr>
<tr>
    <th>Who was your favorite speaker?</th>
    <td colspan="6">
            <?php
                $result = mysql_query("SELECT name FROM speakers");

                if($result)
                {
                    print "<select name=\"fav_speaker\">";
                    print "<option value=\"none\">None";
                    while($row = mysql_fetch_row($result))
                    {
                        $name = $row[0];
                        print "<option value='$name'>$name\n";
                    }
                    print "</select>\n";
                }
            ?>
    </td>
</tr>
<tr>
    <th>Why?</th>
    <td colspan="6">
        <textarea name="fav_speaker_why" cols="50" rows="5"></textarea>
   </td>
</tr>
<tr>
    <th>Who was your least favorite speaker?</th>
    <td colspan="6">
        <?php
                $result = mysql_query("SELECT name FROM speakers");

                if($result)
                {
                    print "<select name=\"worse_speaker\">";
                    print "<option value=\"none\">None";
                    while($row = mysql_fetch_row($result))
                    {
                        $name = $row[0];
                        print "<option value='$name'>$name\n";
                    }
                    print "</select>\n";
                }
            ?>
    </td>
</tr>
<tr>
    <th>Why?</th>
    <td colspan="6">
        <textarea name="worse_speaker_why" cols="50" rows="5"></textarea>
    </td>
</tr>

<?php
    rating_header();
    print_quest("The job fair was well-organized with a decent number of companies.", "jobfair");
    print_quest("A wide variety of talks<br>were presented.", "talk");
    print_quest("The talks were interesting.", "talk2");
    print_quest("The conference staff (maroon shirts) were helpful in answering questions.", "staff");
    print_quest("The conference schedule was sufficently spread out.", "schedule");
    print_quest("The venue (Siebel Center) provided ample space for the conference.", "room");
    print_quest("The conference T-shirt design<br>was well done.", "shirt");
    print_quest("There was plenty of food available throughout the weekend.", "food");
    print_quest("The registration cost was appropriate for this conference.", "costs");
    print_quest("I will attend next year&rsquo;s Reflections&nbsp;|&nbsp;Projections conference.", "attend");
?>

<tr>
    <th>
        Suggestions for different speakers, companies, or events that would make the conference better:
    </th>
    <td colspan="6">
            <textarea name="events" cols="50" rows="5"></textarea>
    </td>   
</tr>

<tr>
    <th>
        Any additional comments?
    </th>
    <td colspan="6">
            <textarea name="comments" cols="50" rows="5"></textarea>
    </td>   
</tr>

<?php
    if($mech == 1)
    {
        echo "<tr class=\"question-header\">";
        echo "<td colspan=\"7\">";
        echo "Now we&rsquo;d like to ask you a few questions about your experience participating in MechMania:";
        echo "</td></tr>";

        echo "<tr>";
        echo "<th>What influenced your decision to enter MechMania this year?</th>";
        echo "<td colspan=\"6\">";
        echo "<textarea name=\"mech_decision\" cols=\"50\" rows=\"5\" ></textarea>";
        echo "</td>";
        echo "</tr>";
        
        rating_header();
        print_quest("MechMania staff provided enough documentation and answers<br>to my questions.","mech_docs");
        print_quest("The time allotted for MechMania was enough to produce a reasonably working client, given the complexity of the competition.", "mech_time");
        print_quest("A wide variety and sufficent quantity of snacks were provided.", "mech_snacks");
        print_quest("Online registration was painless.", "mech_reg");
        print_quest("Given the chance, I would like to participate in MechMania again.", "mech_next");

        echo "<tr>";
        echo "<th>Any comments about<br>the API or design?</th>";
        echo "<td colspan=\"6\">";
        echo "<textarea name=\"mech_design\" cols=\"50\" rows=\"5\" ></textarea>";
        echo "</td>";
        echo "</tr>";
    }
?>
</table>

    <p style="text-align: center;">
        <input type="submit" name="Submit" value="Submit Survey">
    </p>

</form>

<?php include '_bottom.php'; ?>
