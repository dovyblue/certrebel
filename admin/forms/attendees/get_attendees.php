<?php
require_once('/var/www/certrebel/classes/attendees/Attendees.php');
require_once('/var/www/certrebel/functions.php');
include_once('/var/www/certrebel/version_number.inc');
$from = isset($_GET['from']) ? htmlentities($_GET['from']) : '';
$to = isset($_GET['to']) ? htmlentities($_GET['to']) : '';
$attendee_ids = get_attendees($from, $to);
$i = 0;
?>
<?php
if ($attendee_ids) {
	foreach ($attendee_ids as $attendee_id) {
	$attendee = new Attendees\Attendee($attendee_id);
	?>
	<div id="middle-box" 
			 class="middle-box col-md-12 col-sm-12 col-xs-12" 
			 data-attendee_id = "<?php echo $attendee_id; ?>" 
			 data-order_number = "<?php echo $attendee->getOrderNumber(); ?>">
		<div class="row" style="margin-top:0%; padding-left:10%; padding-right:10%;">
			<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
							Attendee
					</div>
					<div class="course-widget" style="clear:both;">
						<ul>
							<li>
								<div class="load-data-label">Name: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getAttendeeName(); ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Address: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getAttendeeAddress(); ?></div>
								<div class="load-data-edit load-address hidden"><div class="cd-address"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div></div>
							</li>
							<li>
								<div class="load-data-label">DOB: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getAttendeeDOB(); ?></div>
								<div class="load-data-edit DOB hidden"><div class="cd-DOB"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div></div>
							</li>
							<li>
								<div class="load-data-label">Email: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getAttendeeEmail(); ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Phone: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getAttendeePhone(); ?></div>
								<div class="load-data-edit load-phone hidden"><div class="cd-phone"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div></div>
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
								<div class="load-data-label">Name: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getBuyerName(); ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Company: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getBuyerCompany(); ?></div>
								<div class="load-data-edit load-company hidden"><div class="cd-company"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div></div>
							</li>
							<li>
								<div class="load-data-label">Address: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getBuyerAddress(); ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Email: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getBuyerEmail(); ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Phone: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getBuyerPhone(); ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
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
								<div class="load-data-label">Course: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getPurchasedCourse()->getLongTitle() ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Date: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getPurchasedCourse()->getMeetingDate() ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Time: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getPurchasedCourse()->getMeetingTime() ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
							<li>
								<div class="load-data-label">Address: </div>
								<div class="load-data-info light-bold"><?php echo $attendee->getPurchasedCourse()->getAddress() ?></div>
								<div class="load-data-edit hidden"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							</li>
						</ul>
					</div>
			</div>
		</div><!-- end row -->
	</div><!-- end middle-box -->
<?php
	}
} else {
?>
	<div class="load-data-face col-md-12 col-sm-12 col-xs-12"><i class="fa fa-frown-o" aria-hidden="true"></i></div>
	<div class="load-data-text col-md-12 col-sm-12 col-xs-12">No data</div>
<?php
}
?>
<script type="text/javascript" src="/js/src/main.js?ver=<?php echo $version;?>"></script>
<script type="text/javascript" src="/js/src/modernizr.js?ver=<?php echo $version;?>"></script>
