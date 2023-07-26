$(document).ready(function(){
	function getReport(fromDate = '', toDate = ''){
		// alert(time);
		var data = {
			'fromDate': $('#fromDate').val(),
			'toDate': $('#toDate').val(),
			'reportFormBtn': true,
		}
		$.ajax({
			url: 'process/report.pro.php',
			type: 'post',
			data: data,
			beforeSend: function(){

			},
			success: function (response) {
				// alert(response);
				$('.reportCard').html(response);
				// $('#salesList .salesReportDiv').html(response);
			}
		});
	}
	getReport();
	$('#reportFormBtn').click(function(e){
		e.preventDefault();
		var fromDate = $('#fromDate').val();
		var toDate = $('#toDate').val();
		if (fromDate.length < 1 || toDate.length < 1) {
			alert('Please fill the dates');
		} else {
			getReport(fromDate, toDate);
		}
	})
})