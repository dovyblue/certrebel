<?php
	session_start();
	require_once('/var/www/certrebel/functions.php');
	require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
	if (!isset($_GET['course']) || !isset($_GET['index']))
		header("Location: /courses");

	$course 		 		= htmlentities($_GET['course']);
	$index 		 			= htmlentities($_GET['index']);
	$single_course  = new SingleCourses\SingleCourse($course);
	$single_course->setIndex($index);

?>
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">Hello, nice to meet you.</h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82;">How many people will be joining this course?</h3>
<div class="row" style="margin-top:5%; padding-left:10%; padding-right:10%;">
	<hr>
</div>
<div class="row" style="margin-top:0%; padding-left:10%; padding-right:10%;">
	<div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom:10%;">
			<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
					Course
			</div>
			<div class="course-widget" style="clear:both;">
				<ul>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getLongTitle(); ?></strong></a></div>
					</li>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getMeetingDate(); ?></strong></a></div>
					</li>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getMeetingTime(); ?></strong></a></div>
					</li>
					<li>
						<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
						<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getAddress(); ?></strong></a></div>
					</li>
				</ul>
			</div>
	</div>
	<div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom:15%;">
		<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
				Quantity
		</div>
		<div style="clear:both;">
			<select id="quantity_result" class="selectpicker" data-width="100px">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
			</select>
		</div>
	</div>
	<div style="margin-bottom:10%;" class="col-md-4 col-sm-12 col-xs-12">
		<div class="general-info col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="padding-left:0; clear:both; margin-bottom:5%;">
				Price
		</div>
		<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="padding-left:0;">
		  <p style="clear:both;">$<?php echo $single_course->getPrice('decimal'); ?> per person</p>
		</div>
		<div class="row" style="clear:both;">
			<p></p>
			<p></p>
			<hr>
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td style="float:right;">Subtotal:</td>
						<td><span>$</span><span id="subtotal"><?php echo $single_course->getPrice('decimal');; ?></td>
					</tr>
					<tr>
						<td style="float:right;">2% Processing Fee:</td>
						<td><span>$</span><span id="fee"><?php echo $single_course->getFee('decimal'); ?></span></td>
					</tr>
					<tr>
						<td style="float:right;">Total:</td>
						<td><span>$</span><span id="total"><?php echo $single_course->getTotal('decimal'); ?></span></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-3 col-md-offset-5 col-sm-12 col-xs-12">
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
		$cost 		= parseFloat("<?php echo $single_course->getPrice('decimal'); ?>");
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
