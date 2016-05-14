<?php
	if (!isset($_GET['course']) && !isset($_GET['quantity'])) {
		header("Location: courses");
	}
	$course 	= $_GET['course'];
	$quantity = $_GET['quantity'];
?>
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">We're curious ...</h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82; padding-bottom:5%;">How did you hear about us?</h3>
	<form id="hear_about" class="form-horizontal" style="margin-left:20%; margin-right:10%;">
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_internet" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-search" style="font-size: 100px; margin-top:15%; margin-left: 11%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">Internet Search</p>
			</div>
		</div>
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_email" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-paper-plane-o" style="font-size: 100px; margin-top:15%; margin-left: 11%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">Email</p>
			</div>
		</div>
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_company" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-building-o" style="font-size: 100px; margin-top:19%; margin-left: 19%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">My Company</p>
			</div>
		</div>
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_friend" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-users" style="font-size: 100px; margin-top:20%; margin-left: 11%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">Colleague/Friend</p>
			</div>
		</div>
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_customer" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-user" style="font-size: 100px; margin-top:19%; margin-left: 19%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">I'm a Customer</p>
			</div>
		</div>
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_mail" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-envelope-o" style="font-size: 100px; margin-top:15%; margin-left: 11%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">Mail</p>
			</div>
		</div>
		<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
			<div id="hear_other" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
				<i class="fa fa-question" style="font-size: 100px; margin-top:20%; margin-left: 25%;"></i>
			</div>
			<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
				<p style="text-align: center;padding-top: 8px;font-size: 16px;">Other</p>
			</div>
		</div>
		<div id="other_textbox" class="hidden col-sm-3 padding" style="margin-bottom:3%; margin-top:12%;">
				<textarea rows="3" type="text" class="form-control" id="firstName" placeholder="Other*" required="true"></textarea>
		</div>
		<div style="padding-left:40%; padding-right:40%; padding-top:5%;" class="col-md-12 col-sm-12 col-xs-12">
			<button type="submit" id="customButton" class="btn btn-block btn-primary">Review and Pay</button>
		</div>
	</form>
	<div style="padding-right: 12%; padding-left: 17%;" class="col-md-12 col-sm-12 col-xs-12">
		<hr style="margin-bottom: 10px;">
		<div class="general-info col-md-6 col-sm-6 col-xs-6">
				<div class="course-widget" style="width:90%;">
				<span style="cursor: pointer;" id="backButton"><i style="padding-right: 3%;" class="fa fa-chevron-left"></i>Back</span>
				</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
		 if(localStorage.getItem('hear_about_us') !== null) {                            
				var hear_about_id = localStorage.getItem('hear_about_us');
				$('#'+hear_about_id).css('background','#df4a43');
				$('#'+hear_about_id).find('i').css('color','#FFFFFF');
				$this = $('#other_textbox').find('textarea');	
				$this.removeAttr('required');
			} 
		 if(localStorage.getItem('other_textbox') !== null) {                            
				$this = $('#other_textbox').find('textarea');	
				$this.prop('required',"true");
				$('#other_textbox').removeClass('hidden');
				var other_val = localStorage.getItem('other_textbox');
				$('#other_textbox').find('textarea').val(other_val);
			} 
		  $('#backButton').on('click', function(){
				$("#middle-box").load("attendee_info?course=<?php echo $course; ?>&quantity=<?php echo $quantity; ?>");
  	  });
			$('form div').find('div:first').on('click', function(){
					$('form div').each(function(){
						$(this).find('div:first').css('background','#F7F7F7');
						$(this).find('div:first i').css('color','#7a7c82');
					});
					$(this).css('background','#df4a43');
					$(this).find('i').css('color','#FFFFFF');
					localStorage.setItem('hear_about_us', $(this).attr('id') );
					if ($(this).attr('id') == 'hear_other') {
					 	$('#other_textbox').removeClass('hidden');
						$this = $('#other_textbox').find('textarea');	
						$this.prop('required',"true");
						localStorage.setItem('other_textbox', $('#other_textbox').find('textarea').val());
					} else {
						localStorage.removeItem('other_textbox');
						$this = $('#other_textbox').find('textarea');	
						$this.removeAttr('required');
					 	$('#other_textbox').addClass('hidden');	
					}
			});
			$('body').on('submit','#hear_about', function(e){
				e.preventDefault();
			  if(localStorage.getItem('other_textbox') !== null) {                            
					localStorage.setItem('other_textbox', $('#other_textbox').find('textarea').val());
				} 
				$("#middle-box").load("review_info?course=<?php echo $course; ?>&quantity=<?php echo $quantity; ?>", function(){
					buyer_first_name = localStorage.getItem('buyer_first_name');
					buyer_last_name = localStorage.getItem('buyer_last_name');
					buyer_email = localStorage.getItem('buyer_email');
					buyer_phone = localStorage.getItem('buyer_phone');
					buyer_company = localStorage.getItem('buyer_company');
					buyer_address1 = localStorage.getItem('buyer_address1');
					buyer_address2 = localStorage.getItem('buyer_address2');
					buyer_city = localStorage.getItem('buyer_city');
					buyer_state = localStorage.getItem('buyer_state');
					buyer_country = localStorage.getItem('buyer_country');
					buyer_zip = localStorage.getItem('buyer_zip');
					$quantity = "<?php echo $quantity; ?>";
					$quantity = parseInt($quantity);
					for(i = 1; i <= $quantity; ++i){
							first_name = 'attendee'+i+'_first_name';
							last_name = 'attendee'+i+'_last_name';
							email = 'attendee'+i+'_email';
							phone = 'attendee'+i+'_phone';
						$('#'+first_name).html(localStorage.getItem(first_name));
						$('#'+last_name).html(localStorage.getItem(last_name)+'<br>');
						$('#'+email).html(localStorage.getItem(email)+'<br>');
						$('#'+phone).html(localStorage.getItem(phone)+'<br>');
					}

					$('#firstName').html(buyer_first_name);
					$('#lastName').html(buyer_last_name+'<br>');
					$('#email').html(buyer_email+'<br>');
					$('#phone').html(buyer_phone+'<br>');
					$('#company').html(buyer_company+'<br>');
					$('#address1').html(buyer_address1);
					$('#address2').html(' - '+buyer_address2);
					$('#city').html('<br>'+buyer_city);
					$('#state_result').html(buyer_state);
					$('#zip_code').html(buyer_zip+'<br>');
					$('#country_result').html(buyer_country+'<br>');
				});
			});

		});
	</script>
<?php
?>
