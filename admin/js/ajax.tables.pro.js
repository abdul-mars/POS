function fetchTables(tableContainerId, fetchUrl) {
	$.ajax({
		url: fetchUrl,
		type: 'GET',
		beforeSend: function() {
			$('.loader').css('display', 'flex');
		},
		success: function (response) {
			$(tableContainerId).html(response);
			$('.loader').css('display', 'none');
		},
		error: function(xhr, status, error){
			console.log(error);
		},
	});
}
$(document).ready(function(){
	
	
	
})