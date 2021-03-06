<?php

function q($value)
{
	if (get_magic_quotes_gpc()) {
		$value = stripslashes($value);
	}
	if (!is_numeric($value)) {
		$value = "'" . mysql_real_escape_string($value) . "'";
	}
	return $value;
}

function submit_survey()
{
	mysql_query("INSERT INTO survey_submissions2006(submitter_id) VALUES (".q($_POST['form']).");");
	$id = mysql_insert_id();
	foreach($_POST as $k => $v) {
		if (!empty($v) && (substr($k, 0, 2) == 'q_')) {
			$qid = substr($k, 2);
			$qnum = $_POST["qn_$qid"];
			mysql_query("INSERT INTO survey_responses2006(submission_id, question_id, question_number, response) VALUES (".q($id).", ".q($qid).", ".q($qnum).", ".q($v).");");
		}
	}
}

$g_question_number = 1;

function start_form()
{
	echo "<form method=\"post\" action=\"\"><input type=\"hidden\" name=\"form\" value=\"".htmlspecialchars($_REQUEST['form'])."\"><ol>\n";
}

function end_form()
{
	echo "</ol><a name=\"end\"><input type=\"submit\" name=\"submit\" value=\"Submit survey\"></a></form>\n";
}

function survey_section($intro)
{
	echo "<p><b>$intro</b></p>\n";
}

function long_question($name, $question, $rows = 5)
{
	global $g_question_number;
	echo "<li>$question<br>\n<input type=\"hidden\" name=\"qn_$name\" value=\"$g_question_number\"><textarea name=\"q_$name\" rows=\"$rows\" cols=\"72\"></textarea></li>\n";
	$g_question_number++;
}

function short_question($name, $question)
{
	long_question($name, $question, 1);
}

function multi_question_core($name, $choices)
{
	global $g_question_number;
	echo "<input type=\"hidden\" name=\"qn_$name\" value=\"$g_question_number\"><select name=\"q_$name\">\n";
	foreach ($choices as $c) {
		echo "<option value=\"$c\">$c</option>\n";
	}
	echo "</select>\n";
	$g_question_number++;
}

function multi_question($name, $question, $choices)
{
	echo "<li>$question<br>\n";
	multi_question_core($name, $choices);
	echo "</li>\n";
}

function multi_question_before($name, $question, $choices)
{
	echo "<li>";
	multi_question_core($name, $choices);
	echo " $question</li>\n";
}

?>
