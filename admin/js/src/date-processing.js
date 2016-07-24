$(document).ready(function(){
	$('.from-date').datepicker({
		format: 'mm-dd-yyyy',
		weekStart: 1,
		startDate: '01/01/2016',
		autoclose: true
	}).on('changeDate', function (selected) {
			var startDate = new Date(selected.date.valueOf());
			console.log('startDate: '+startDate);
			$('.to-date').datepicker('setStartDate', startDate);
	}).on('clearDate', function (selected) {
			$('.to-date').datepicker('setStartDate', null);
	});

	$('.to-date').datepicker({
		format: 'mm-dd-yyyy',
		weekStart: 1,
		startDate: '01/01/2016',
		autoclose: true
	}).on('changeDate', function (selected) {
			var endDate = new Date(selected.date.valueOf());
			$('.from-date').datepicker('setEndDate', endDate);
	}).on('clearDate', function (selected) {
			$('.from-date').datepicker('setEndDate', null);
	});

	$('#date-submit').on('click', function(){
		$('#load-data').html('');
		$from = $('.from-date').val();
		$to = $('.to-date').val();
		$('#data-loader').show();
		$.ajax({
			url: '/forms/attendees/get_attendees?from='+$from+'&to='+$to,
			async: true,
			type: 'GET',
			dataType: 'html',
			beforeSend: function () {
					$("#data-loader").show();
			},
			success: function(data) {
				$('#load-data').html(data);
			},
      complete: function(){
        $('#data-loader').hide();
      }
		});
	});
});
