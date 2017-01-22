<?php exit(); // call to extract() below is potentially insecure; please fix.
?>
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

            echo "<td width=\"11.6%\">";
            echo "<input type=\"radio\" style=\"background-color: #8B9587; border: 0px\" value=\"1\" name=\"$var\"></input>";
            echo "</td>";
            echo "<td width=\"11.6%\">";
            echo "<input type=\"radio\" style=\"background-color: #8B9587; border: 0px\" value=\"2\" name=\"$var\"></input>";
            echo "</td>";
            echo "<td width=\"11.6%\">";
            echo "<input type=\"radio\" style=\"background-color: #8B9587; border: 0px\" value=\"3\" name=\"$var\"></input>";
            echo "</td>";
            echo "<td width=\"11.6%\">";
            echo "<input type=\"radio\" style=\"background-color: #8B9587; border: 0px\" value=\"4\" name=\"$var\"></input>";
            echo "</td>";
            echo "<td width=\"11.6%\">";
            echo "<input type=\"radio\" style=\"background-color: #8B9587; border: 0px\" value=\"5\" name=\"$var\"></input>";
            echo "</td>";

        }
        function print_quest($quest, $var)
        {
        echo "<tr>";
        echo "<td width=\"41.66%\">";
        echo  "$quest";
        echo "</td>";
        print_buttons($var);
        echo "</tr>";
        }

    ?>


<!--
<div class="reginfo">
<div style="float:center;">
-->

<p></p>

Thank you for attending Reflections | Projections 2004.  We hope you had a
great time.  Giving your feedback is very important to improving Reflections |
Projections for future years.

<!--
</div>
</div>
-->

<div class="regtype">

<p></p>

Please answer all the questions to the best of your ability.
<form method="GET" action="survey_submit.php">
<table class="b">
<tr>
    <td width="41.66%">
        Email:
    </td>
    <td width="70%" colspan="6">
    <?php
       if($e == "")
       {
            print "<input type=\"text\" name=\"email\"/>";
       }else
       {
           print "<input type=\"text\" name=\"email\" value=\"$e\"/>";
      }
    ?>
    </td>
</tr>
<tr>
    <td width="41.66%">
        Distance traveled (miles):
    </td>
    <td width="70%" colspan="6">
        <input type="text" name="distance" maxlength="5"/>
    </td>
</tr>
<tr>
    <td width="41.66%">
        What made you come to Reflections | Projections?
    </td>
    <td width="70%" colspan="6">
        <textarea width="100%" cols="50" rows="5" name="why"></textarea>
    </td>
</tr>
<tr>
    <td width="41.66%">
        Who was your favorite speaker?
    </td>
    <td width="70%" colspan="6">
            <?php
                $result = mysql_query("SELECT name FROM speakers");

                if($result)
                {
                    print "<select name=\"fav_speaker\">";
                    print "<option value=\"none\">None";
                    while($row = mysql_fetch_row($result))
                    {
                        $name = $row[0];
                        print "<option value=\"$name\">$name\n";
                    }
                    print "</select>";
                }
            ?>
    </td>
</tr>
<tr>
    <td width="41.66%">
        Why?
    </td>
    <td width="70%" colspan="6">
        <textarea name="fav_speaker_why" cols="50" rows="5"></textarea>
   </td>
</tr>
<tr>
    <td width="41.66%">
        Who was your least favorite speaker?
    </td>
    <td width="70%" colspan="6">
        <?php
                $result = mysql_query("SELECT name FROM speakers");

                if($result)
                {
                    print "<select name=\"worse_speaker\">";
                    print "<option value=\"none\">None";
                    while($row = mysql_fetch_row($result))
                    {
                        $name = $row[0];
                        print "<option value=\"$name\">$name\n";
                    }
                    print "</select>";
                }
            ?>
    </td>
</tr>
<tr>
    <td width="41.66%">
        Why?
    </td>
    <td width="70%" colspan="6">
        <textarea name="worse_speaker_why" cols="50" rows="5"></textarea>
    </td>
</tr>
<tr>
    <td Colspan="7" width=100%">
       Please response with how much you agree with the following statements.
    </td>
</tr>
<tr>
    <td width="41.66%">
    </td>     
    <td width="11.6%">
        Strongly Agree
    </td>
   <td width="11.6%">
        Agree
   </td>
   <td width="11.6%">
        Neutral 
   </td>
   <td width="11.6%">
        Disagree
   </td>
   <td width="11.6%">
        Strongly disagree
   </td>

</tr>


<tr>
    <td width="41.66%">
        Job fair was organized well and there were a good number of hiring
        companies. 
    </td>
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="jobfair"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="jobfair"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="jobfair"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="jobfair"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="jobfair"></input>
    </td>


</tr>
<tr>
    <td width="41.66%">
        The conference staff (Maroon shirts) were helpful in answering
        questions.
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="staff"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="staff"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="staff"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="staff"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="staff"></input>
    </td>

</tr>


<tr>
    <td width="41.66%">
        There was a wide variety of talks.
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="talk"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="talk"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="talk"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="talk"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="talk"></input>
    </td>

</tr>

<tr>
    <td width="41.66%">
        The talks were interesting.
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="talk2"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="talk2"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="talk2"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="talk2"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="talk2"></input>
    </td>

</tr>


<tr>
    <td width="41.66%">
        You will attend Reflections | Projections next year.
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="attend"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="attend"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="attend"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="attend"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="attend"></input>
    </td>

</tr>


<tr>
    <td width="41.66%">
        The conference scheduling was sufficently spread out.
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="schedule"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="schedule"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="schedule"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="schedule"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="schedule"></input>
    </td>

</tr>

<tr>
    <td width="41.66%">
        Dan Petersen is a slave driver. 
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="slave"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="slave"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="slave"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="slave"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="slave"></input>
    </td>

</tr>


<tr>
    <td width="41.66%">
        The registrations costs were appropriate for a conference of this size. 
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="costs"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="costs"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="costs"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="costs"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="costs"></input>
    </td>

</tr>


<tr>
    <td width="41.66%">
        The venue (Siebel Center) provided ample space for a conference this
        size.
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="room"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="room"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="room"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="room"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="room"></input>
    </td>

</tr>

<tr>
    <td width="41.66%">
        The conference t-shirt design was well done. 
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="shirt"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="shirt"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="shirt"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="shirt"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="shirt"></input>
    </td>

</tr>


<tr>
    <td width="41.66%">
        There was plenty of food available throughout the weekend. 
    </td>     
    <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="1" name="food"></input>
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="2" name="food"></input> 
    </td>
   <td width="11.6%">
        <input type="radio" style="background-color: #8B9587; border: 0px" value="3" name="food"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="4" name="food"></input>
    </td>
   <td width="11.6%">
         <input type="radio" style="background-color: #8B9587; border: 0px" value="5" name="food"></input>
    </td>

</tr>

<tr>
    <td width="41.66%">
        Do you have any suggestions for different speakers, companies, or
        events that would make the conference better?
    </td>
    <td colspan="6">
            <textarea name="events" width="100%" cols="60" rows="12" ></textarea>
    </td>   
</tr>

<tr>
    <td width="41.66%">
        Any general comments?
    </td>
    <td colspan="6">
            <textarea name="comments" width="100%" cols="60" rows="12" ></textarea>
    </td>   
</tr>

<?php
    if($mech == 1)
    {
        echo "<tr>";
        echo "<td colspan=\"7\">";
        echo "<p /><p /> <p>Now we'll like to ask you a couple questions about MechMania</p>";
        echo "</td></tr>";

        echo "<tr>";
        echo "<td width=\"41.66%\">";
        echo "What influenced your decision to do mechmania this year?";
        echo "</td>";
        echo "<td colspan=\"6\">";
        echo "<textarea name=\"mech_decision\" width=\"100%\" cols=\"60\" rows=\"12\" ></textarea>";
        echo "</td>";
        echo "</tr>";

 
        
        print_quest("The MechMania staff provided detailed documentation and answered any questions.","mech_docs");

        print_quest("The time allotted for MechMania was sufficent to produce a reasonably working client given the complexity of the competition.", "mech_time");

        print_quest("A wide variety and a sufficent number of snacks were provided.", "mech_snacks");

        print_quest("The online registration process was easy and clear.",
        "mech_reg");

        print_quest("Given a chance, I would like to participate in MM again next year.", "mech_next");

         echo "<tr>";
        echo "<td width=\"41.66%\">";
        echo "Do you have any comments about the API or design?";
        echo "</td>";
        echo "<td colspan=\"6\">";
        echo "<textarea name=\"mech_design\" width=\"100%\" cols=\"60\" rows=\"12\" ></textarea>";
        echo "</td>";
        echo "</tr>";

        
    }

?>
    

<tr>
    <td width="41.66%">
        <input type="submit" name="Submit"/> 
    </td>
    <td colspan="6">
    </td>`
</tr>
</table>

</form>

<p></p>

</div>

<?php include '_bottom.php'; ?>
