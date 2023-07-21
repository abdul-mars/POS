$(document).ready(function(){
	// alert('lsdjfsdfl')
	function getReport(fromDate = '', toDate = ''){
		// alert(time);
		var data = {
			'fromDate': $('#fromDate').val(),
			'toDate': $('#toDate').val(),
			'viewSalesBtn': true,
		}
		$.ajax({
			url: 'process/getReports.php',
			type: 'post',
			data: data,
			beforeSend: function(){

			},
			success: function (response) {
				// alert(response);
				// $('#totalAmount').html(response);
				$('#salesList .salesReportDiv').html(response);
			}
		});
	}
	getReport();
	$('.reportSammaryDiv').click(function () {
		var time = $(this).attr('data-time');
		getReport(time);
	});

	$('#viewSalesForm').submit(function(event) {
		event.preventDefault();
		if ($('#fromDate').val().length != 0) {
			var fromDate = $('#fromDate').val();
			var toDate = $('#toDate').val();
			var data = {
				'fromDate': $('#fromDate').val(),
				'toDate': $('#toDate').val(),
				'viewSalesBtn': true,
			}
			console.log(data);
			// $.ajax({
			// 	url: 'process/getReports.php',
			// 	type: 'post',
			// 	data: data,
			// 	// dataType: 'json',
			// 	beforeSend: function() {},
			// 	success: function (response) {
			// 		alert(response);
			// 	},
			// 	error: function(xhr, status, error){
			// 		console.log(error);
			// 	}
			// });
			getReport(fromDate, toDate);
		} else {
			alert('please select a starting date');
		}
	});
})