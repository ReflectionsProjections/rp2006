<table cellspacing=0>
	<tr>
		<td class="labal"></td>
		<td class="input"><font color="#f00">*</font> indicates a required field.</td>
	</tr>        

	<tr>
		<td class="label">First Name <font color="#f00">*</font></td>
		<td class="input">
			<input type="text" name="firstname">
		</td>
	</tr>
	
	<tr>
		<td class="label">Last Name <font color="#f00">*</font></td>
		<td class="input">
			<input type="text" name="lastname">
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
				<option value="IL" selected>Illinois
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
		<td class="label">Country</td>
		<td class="input">
			<input type="text" name="country" value="USA">
		</td>
	</tr>
	
	<tr>
		<td class="label">Phone</td>
		<td class="input">
			<input type="text" name="phone">
		</td>
	</tr>
	
	<tr>
		<td class="label">E-mail <font color="#f00">*</font></td>
		<td class="input">
			<input type="text" name="email">
		</td>
	</tr>
	
	<tr>
		<td class="label">Organization or School</td>
		<td class="input">
			<input type="text" name="school">
		</td>
	</tr>
	<input type="hidden" name="shirt_size" value="Q">
	<input type="hidden" name="paying" value="no">
<?php
if ($is_volunteer == 1) {
?>
        <tr>
        	<td>&nbsp;</td><td>&nbsp;</td>
        </tr>
        <tr>
		<td class="label">Preferred shirt size (S-XXL) <font color="#f00">*</font></td>
		<td class="input">
			<select name="shirt_size">
			    <option value="none" selected>Please select a shirt size
			    <option value="S">Small
			    <option value="M">Medium
			    <option value="L">Large
			    <option value="XL">X-Large
			    <option value="XX">XX-Large
			</select>
		</td>
        </tr>
        <tr>
        	<td>&nbsp;</td><td>&nbsp;</td>
        </tr>

<?php
if ($is_volunteer == 1) {
?>
        <tr>
		<td colspan=2><center>All registrants receive a free t-shirt.  Volunteers also receive free meals.</center><br>
        	<input type="hidden" name="paying" value="no">
		</td>
	</tr>
<?php
} else {
?>
        <tr>
		<td colspan=2><center>All registrants receive a free t-shirt.  Would you like to purchase meals for the weekend?</center><br></td>
	</tr>
        <tr>
        	<td class="label"><font color="#f00">*</font></td>
		<td class="input">
			<select name="paying">
			    <option value="">(please select response)
			    <option value="yes">Purchase meals for the weekend (costs $20)
			    <option value="no">No meals, t-shirt only (free)
			</select>
		</td>
        </tr>
<?php
}
?>

        <tr>
		<td class="label">Vegetarian food</td>
		<td class="input">
			<input style="background-color: #8B9587; border: 0px" type="checkbox" name="veg">
		</td>
        </tr>
        
	<tr>
		<td class="label">Other Dietary Restrictions</td>
		<td class="input">
			<input type="text" name="dietary_restrictions">
			<br>
			<i>(For example, no eggs, no dairy,<br>no peanuts,
			     Kosher, or vegan.)</i>
		</td>
        </tr>

        <tr>
        	<td>&nbsp;</td><td>&nbsp;</td>
        </tr>
<?php
}
?>

<?php
if ($is_volunteer == 1) {
?>
	<tr>
		<td class="label">
		Would you be available to video record talks?
		<font color="#f00">*</font></td>
		<td class="input">
			<textarea name="referred_by" cols="35" rows="3" wrap="virtual"></textarea>
		</td>
	</tr>
<?php
} else {
?>
	<tr>
		<td class="label">How did you hear about <?php echo $rp_name; ?>?</td>
		<td class="input">
			<textarea name="referred_by" cols="35" rows="3" wrap="virtual"></textarea>
		</td>
	</tr>
<?php
}
?>
	<tr>
		<td class="label"> </td>
		<td class="input">
			<input type="submit" name="registrant" value="Register">
		</td>
	</tr>
</table>
