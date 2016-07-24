<?php
require_once('/var/www/certrebel/classes/attendees/Attendees.php');
require_once('/var/www/certrebel/functions.php');
$from = isset($_GET['from']) ? htmlentities($_GET['from']) : '';
$to = isset($_GET['to']) ? htmlentities($_GET['to']) : '';
$attendee_ids = get_attendees($from, $to);
$i = 0;
foreach ($attendee_ids as $attendee_id) {
//if ($i++ == 5) break;
$attendee = new Attendees\Attendee($attendee_id);
?>
<div id="middle-box" class="col-md-12 col-sm-12 col-xs-12">
	<div class="row" style="margin-top:0%; padding-left:10%; padding-right:10%;">
		<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
						Attendee
				</div>
				<div class="course-widget" style="clear:both;">
					<ul>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Name: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeeFirstName(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">DOB: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeeDOB(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Email: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeeEmail(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Phone: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeePhone(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
					</ul>
				</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
						Buyer
				</div>
				<div class="course-widget" style="clear:both;">
					<ul>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Name: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerFirstName(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Company: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerCompany(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerAddress1(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Email: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerEmail(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Phone: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerPhone(); ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
					</ul>
				</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
						Course
				</div>
				<div class="course-widget" style="clear:both;">
					<ul>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getLongTitle() ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getMeetingDate() ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getMeetingTime() ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
							<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getAddress() ?></strong></a></div>
							<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
						</li>
					</ul>
				</div>
		</div>
	</div><!-- end row -->
</div><!-- end middle-box -->
<?php
}
?>
