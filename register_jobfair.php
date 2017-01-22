<?php
	$thispage = "jobfairreg";
  $parent = "register";
	$title = "Register";
	include 'includes/_top.php';

  check_status($rp_reg_stat_jobfair);
?>

<div id="content">

Employer participation in the job fair costs $1,000, and includes a 6-foot
booth, chairs, parking passes, a break room with breakfast and lunch,
refreshments delivered to your booth, and assistance with shipping and
logistics.  Due to space constraints, we are currently limited to 25
employers at the job fair.  To discuss further sponsorship details, please
contact <a href="mailto:corporate@acm.uiuc.edu">corporate@acm.uiuc.edu</a>.
You will receive an automated confirmation e-mail after submitting this
form, and one of our corporate relations students will contact you via
e-mail shortly thereafter.<p></p>

<form action="registered_jobfair.php" method="POST">
<table>
        <tr>
        <td class="label"></td>
        <td class="input"">Note: All fields are required.
        </td>
	<!--<tr>
	<td class="label">Sponsor Type</td>
	<td class="input">
		<table border=0>
		<tr><td><input type="radio" style="background-color: #8B9587; border: 0px" name="type" value="keystone" checked></td><td>Keystone Sponsorship ($1000)</td></tr>
		<tr><td><input type="radio" style="background-color: #8B9587; border: 0px" name="type" value="foundation"></td><td>Foundation Sponsorship<br/> (additional&nbsp;support;&nbsp;contact&nbsp;for&nbsp;details)</td></tr>
		</table>
	</td>
	</tr>
	
--><input type="hidden" name="type" value="keystone">
	<tr>
	<td class="label">Company Name</td>
	<td class="input">
		<input type="text" name="company_name">
	</td>
	</tr>
	
	<tr>
	<td class="label">Representative's Name</td>
	<td class="input">
		<input type="text" name="rep_name">
	</td>
	</tr>
	
	<tr>
	<td class="label">Representative's E-mail</td>
	<td class="input">
		<input type="text" name="rep_email">
	</td>
	</tr>
	
	<tr>
	<td class="label">Address</td>
	<td class="input">
		<input type="text" name="address">
		<br>
		<input type="text" name="address2">
	</td>
	</tr>
	
	<tr>
	<td class="label">City</td>
	<td class="input">
		<input type="text" name="city">
	</td>
	</tr>
	
	<tr>
	<td class="label">State</td>
	<td class="input">
		<select name="state">
			<option value="AL">Alabama 
			<option value="AK">Alaska
			<option value="AZ">Arizona
			<option value="AR">Arkansas
			<option value="CA">California
			<option value="CO">Colorado
			<option value="CT">Connecticut
			<option value="DE">Delaware
			<option value="FL">Florida
			<option value="GA">Georgia
			<option value="HI">Hawaii
			<option value="ID">Idaho
			<option value="IL">Illinois
			<option value="IN">Indiana
			<option value="IA">Iowa
			<option value="KS">Kansas
			<option value="KY">Kentucky
			<option value="LA">Louisiana
			<option value="ME">Maine
			<option value="MD">Maryland
			<option value="MA">Massachusetts
			<option value="MI">Michigan
			<option value="MN">Minnesota
			<option value="MS">Mississippi
			<option value="MO">Missouri
			<option value="MT">Montana
			<option value="NE">Nebraska
			<option value="NV">Nevada
			<option value="NH">New Hampshire
			<option value="NJ">New Jersey
			<option value="NM">New Mexico
			<option value="NY">New York
			<option value="NC">North Carolina
			<option value="ND">North Dakota
			<option value="OH">Ohio
			<option value="OK">Oklahoma
			<option value="OR">Oregon
			<option value="PA">Pennsylvania
			<option value="RI">Rhode Island
			<option value="SC">South Carolina
			<option value="SD">South Dakota
			<option value="TN">Tennessee
			<option value="TX">Texas
			<option value="UT">Utah
			<option value="VT">Vermont
			<option value="VA">Virginia
			<option value="WA">Washington
			<option value="WV">West Virginia
			<option value="WI">Wisconsin
			<option value="WY">Wyoming
		</select>
	</td>
	</tr>
	
	<tr>
	<td class="label">Zip</td>
	<td class="input">
		<input type="text" name="zip">
	</td>
	</tr>
	
	<tr>
	<td class="label">Phone</td>
	<td class="input">
		<input type="text" name="phone">
	</td>
	</tr>
	
	<tr>
	<td class="label">Fax</td>
	<td class="input">
		<input type="text" name="fax">
	</td>
	</tr>
	
	<tr>
	<td class="label">Do you have any questions or concerns? (Optional)</td>
	<td class="input">
		<textarea name="note" cols="35" rows="3" wrap="virtual"></textarea>
	</td>
	</tr>
	
	<tr>
	<td class="label"> </td>
	<td class="input">
		<input type="submit" name="company" value="Register">
	</td>
	</tr>
	
</table>
</form>
</center>
</div>

<?php include '_bottom.php'; ?>
