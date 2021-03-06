<?php
    $thispage = "mechmaniareg";
    $parent = "register";
    $title = "MechMania Registration";
    include 'includes/_top.php';

    check_status($rp_reg_stat_mechmania);
?>

<div id="content">

<a name="company"><div class="section_title">MechMania Registration</div></a>
<div class="section">
</div>
<br>

All team members must be students at an educational institution and are
strongly encouraged to be <a href="register_attend.php">registered paying
Conference attendees</a> (Which costs $20/person and covers all meals for
the weekend, plus additional exclusive MechMania-only food breaks.  Since
online registration is now closed, please e-mail <a
href="mailto:mechmania@acm.uiuc.edu">mechmania@acm.uiuc.edu</a> if you want
catered meals conveniently located in the Siebel Center while participating
in MechMania and are not yet registered as a paying attendee.).  You will
receive a confirmation e-mail from our staff after we process your
registration.

<p> If you have any questions or concerns, email <a href="mailto:mechmania@acm.uiuc.edu">mechmania@acm.uiuc.edu</a>.
<p></p>

<center>
<form action="mm_reg.php" method="GET">

<table>
	<tr>
	<td class="label"></td>
	<td class="input">Note: All fields are required.
	</td>
	<tr><td></td><td>First Name</td><td>Last Name</td><td>e-mail</td></tr>
	<tr>
	        <td class="label">Member 1</td>
                <td class="input">
	                <input type="text" name="member1_first">
                </td>
                <td class="input">
	                <input type="text" name="member1_last">
                </td>
                <td class="input">
	                <input type="text" name="member1_email">
                </td>
	</tr>
	<tr>
	        <td class="label">Member 2</td>
                <td class="input">
	                <input type="text" name="member2_first">
                </td>
                <td class="input">
	                <input type="text" name="member2_last">
                </td>
                <td class="input">
	                <input type="text" name="member2_email">
                </td>
	</tr>
	<tr>
	        <td class="label">Member 3</td>
                <td class="input">
	                <input type="text" name="member3_first">
                </td>
                <td class="input">
	                <input type="text" name="member3_last">
                </td>
                <td class="input">
	                <input type="text" name="member3_email">
                </td>
	</tr>
        <tr><td>&nbsp;<br></td></tr>
	
	<tr>
	<td class="label">Team Name</td>
	<td class="input" colspan=3>
		<input type="text" name="team_name">
	</td>
	</tr>

	<tr>
	<td class="label">School / Organization</td>
	<td class="input" colspan=3>
		<input type="text" name="school">
	</td>
	</tr>
<!--
	<tr>
	<td class="label">Request printed documentation?</td>
	<td class="input" colspan=3>
		<input type="checkbox" name="print" value="yes">
		(It's over 50 pages; please don't ask for it unless you'll really
                 use it.  Full documentation will be available in electronic form.)
	</td>
	</tr>
-->


	<tr>
	<td class="label">Team colors</td>
	<td class="input" colspan=3>
		<select name="color1">
		<option value="Aqua">Aqua
		<option value="Black">Black
		<option value="Blue">Blue
		<option value="Fuchsia">Fuchsia
		<option value="Gray">Gray
		<option value="Green">Green
		<option value="Lime">Lime
		<option value="Maroon">Maroon
		<option value="Navy">Navy
		<option value="Olive">Olive
		<option value="Purple">Purple
		<option value="Red">Red
		<option value="Silver">Silver
		<option value="Teal">Teal
		<option value="White">White
		<option value="Yellow">Yellow
		</select>
		and
		<select name="color2">
		<option value="Aqua">Aqua
		<option value="Black">Black
		<option value="Blue">Blue
		<option value="Fuchsia">Fuchsia
		<option value="Gray">Gray
		<option value="Green">Green
		<option value="Lime">Lime
		<option value="Maroon">Maroon
		<option value="Navy">Navy
		<option value="Olive">Olive
		<option value="Purple">Purple
		<option value="Red">Red
		<option value="Silver">Silver
		<option value="Teal">Teal
		<option value="White">White
		<option value="Yellow">Yellow
		</select>
	</td>
	</tr>

	<tr>
	<td class="label">Alternate colors</td>
	<td class="input" colspan=3>
		<select name="color3">
		<option value="Aqua">Aqua
		<option value="Black">Black
		<option value="Blue">Blue
		<option value="Fuchsia">Fuchsia
		<option value="Gray">Gray
		<option value="Green">Green
		<option value="Lime">Lime
		<option value="Maroon">Maroon
		<option value="Navy">Navy
		<option value="Olive">Olive
		<option value="Purple">Purple
		<option value="Red">Red
		<option value="Silver">Silver
		<option value="Teal">Teal
		<option value="White">White
		<option value="Yellow">Yellow
		</select>
                and
		<select name="color4">
		<option value="Aqua">Aqua
		<option value="Black">Black
		<option value="Blue">Blue
		<option value="Fuchsia">Fuchsia
		<option value="Gray">Gray
		<option value="Green">Green
		<option value="Lime">Lime
		<option value="Maroon">Maroon
		<option value="Navy">Navy
		<option value="Olive">Olive
		<option value="Purple">Purple
		<option value="Red">Red
		<option value="Silver">Silver
		<option value="Teal">Teal
		<option value="White">White
		<option value="Yellow">Yellow
		</select>
	</td>
	</tr>
	
	<tr>
	<td class="label">Do you have any questions or concerns? (Optional)</td>
	<td class="input" colspan=3>
		<textarea name="note" cols="35" rows="3" wrap="virtual"></textarea>
	</td>
	</tr>
	
	<tr>
	<td class="label"> </td>
	<td class="input">
		<input type="submit" name="mechmania" value="Register">
	</td>
	</tr>
	
</table>
</form>
</center>

</div>

<?php include 'includes/_bottom.php'; ?>
