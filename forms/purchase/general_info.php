<?php
	session_start();
	require_once('/var/www/certrebel/functions.php');
	if (!isset($_GET['course']) || !isset($_GET['index'])) {
		header("Location: courses");
	}
?>
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">Hello, nice to meet you.</h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82;">How many people will be joining this course?</h3>
<div class="row" style="margin-top:5%; padding-left:10%; padding-right:10%;">
	<hr>
	<div class="general-info col-md-6 col-sm-6 col-xs-6">
			<div class="course-widget" style="width:90%;">
			Course
			</div>
	</div>
	<div class="general-info col-md-2 col-sm-2 col-xs-2">
			Quantity
	</div>
	<div style="padding-left:8%;" class="general-info col-md-4 col-sm-4 col-xs-4">
			Price
	</div>
</div>
<div class="row" style="margin-top:0%; padding-left:10%; padding-right:10%;">
	<hr>
	<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="course-widget" style="width:90%;">
			<?php
				$course 		 		= htmlentities($_GET['course']);
				$index 		 			= htmlentities($_GET['index']);
				$course_info 		= course_info();
				$single_details = single_course_info()[$course];
				$count 					= count($single_details);
				$title	 			= isset($course_info[$course][0]['course_long_title']) ? $course_info[$course][0]['course_long_title']: 'N/A';
				for ($i = 0; $i < $count; ++$i) {
					if ($single_details[$i]['index'] == $index) {
						$date 	 			= isset($single_details[$i]['course_meeting_date']) ? $single_details[$i]['course_meeting_date'] : 'N/A';
						$time 	 			= isset($single_details[$i]['course_meeting_time']) ? $single_details[$i]['course_meeting_time'] : 'N/A';
						$address 			= isset($single_details[$i]['course_address']) ? $single_details[$i]['course_address'] : 'N/A';
						$cost 	 			= isset($single_details[$i]['course_price']) ? $single_details[$i]['course_price'] : '0';
						$cost					= number_format((float) $cost, 2);
						$fee					= 0.02*$cost;
						$fee					= number_format((float) $fee, 2);
						$total				= $cost + $fee;
						$total				= number_format((float) $total, 2);
						break;
					}
				}
				?>
				<ul>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $title; ?></strong></a></div>
					</li>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $date; ?></strong></a></div>
					</li>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $time; ?></strong></a></div>
					</li>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $address; ?></strong></a></div>
					</li>
				</ul>
			</div>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-2">
		<select id="quantity_result" class="selectpicker" data-width="100px">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>
	</div>
	<div style="padding-left:8%;" class="col-md-4 col-sm-4 col-xs-4">
		<p>$<?php echo $cost; ?> per person</p>
		<p></p>
		<p></p>
		<hr>
		<div class="row">
			<div class="col-xs-8">
			<p style="float: right; margin: 0; padding: 0;">Subtotal:</p>	
			<p style="float: right; margin: 0; padding: 0;">2% Processing Fee:</p>	
			<p style="float: right; margin: 0; padding: 0;">Total:</p>	
			</div>
			<div class="col-xs-4" style="padding: 0;">
				<p style="margin: 0; padding: 0;"><span>$</span><span id="subtotal"><?php echo $cost; ?></span></p>
				<p style="margin: 0; padding: 0;"><span>$</span><span id="fee"><?php echo $fee; ?></span></p>
				<p style="margin: 0; padding: 0;"><span>$</><span id="total"><?php echo $total; ?></span></p>
			</div>
		</div>
	</div>
	<div style="padding-left:43%; padding-right:43%; padding-top:5%; padding-bottom: 1%;" class="col-md-12 col-sm-12 col-xs-12">
		<button id="generalButton" class="btn btn-block btn-primary">Continue</button>
	</div>
	<hr>
	<hr>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<hr style="margin-bottom: 10px;">
		<div class="general-info col-md-6 col-sm-6 col-xs-6">
				<div class="course-widget" style="width:90%;">
				<a style="color: #7a7c82;" href="/course/<?php echo $course; ?>"><i style="padding-right: 3%;" class="fa fa-chevron-left"></i>Back</a>
				</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	function fill_quantity_data() {
		$quantity = parseInt($('#quantity_result').val());
		$cost 		= parseFloat("<?php echo $cost; ?>");
		$subtotal	= $quantity*$cost;
		$subtotal = parseFloat($subtotal).toFixed(2);
		$fee			= 0.02*$subtotal;
		$fee			= parseFloat($fee).toFixed(2);
		$total		= parseFloat($subtotal) + parseFloat($fee);
		$total 		= parseFloat($total).toFixed(2);
		$('#subtotal').html($subtotal);
		$('#fee').html($fee);
		$('#total').html($total);
		localStorage.setItem('quantity', $quantity);
	}
	if(localStorage.getItem('quantity') !== null) {                            
		var quantity = localStorage.getItem('quantity');
		$('#quantity_result').val(quantity).change();
		fill_quantity_data();
	}    
	localStorage.setItem('quantity', $('#quantity_result').val());
	$('#quantity_result').on('change', fill_quantity_data);

	$('#generalButton').on('click', function(){
		$("#middle-box").load("/forms/purchase/buyer_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity="+$('#quantity_result').val());
		$("html, body").stop().animate({ scrollTop: 0 }, 500);
	});
});
</script>
