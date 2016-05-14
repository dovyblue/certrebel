<?php
	$states = get_states();
?>
<span style="margin-left:1%; font-weight:bold; font-size:15px;">Billing Address</span>
<hr style="width:98%; margin-top:3px;">
<div class="col-sm-12 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<input type="text" class="form-control" id="company" placeholder="Company">
	</div>
</div>
<div class="col-sm-6 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<input type="text" class="form-control" id="address1" placeholder="Address 1*" required>
	</div>
</div>
<div class="col-sm-6 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<input type="text" class="form-control" id="address2" placeholder="Address 2">
	</div>
</div>
<div class="col-sm-3 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<input type="text" class="form-control" id="city" placeholder="City*" required>
	</div>
</div>
<div class="col-sm-3 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<select id="state_result" class="selectpicker" data-size="10" data-style="form-control" data-width="100%" required>
			<option value="" disabled selected>STATE*</option>
			<?php
				for($i = 1; $i <= count($states); ++$i) {
			?>
					<option value="<?php echo $states[$i][0]['state_id']; ?>"><?php echo $states[$i][0]['state_name']; ?></option>
			<?php
				}
			?>
		</select>
	</div>
</div>
<div class="col-sm-3 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<select id="country_result" class="selectpicker" data-style="form-control" data-width="100%" required>
			<option value="USA">USA</option>
		</select>
	</div>
</div>
<div class="col-sm-3 padding" style="margin-bottom:3%;">
	<div class="col-sm-12 padding-inside">
		<input type="text" class="form-control" id="zip_code" placeholder="Zip Code*" required>
	</div>
</div>
