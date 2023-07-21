$(document).ready(function(){
	// var updatePriceMdl = $('#updatePriceMdl');
	var updatePriceMdl = document.getElementById('updatePriceMdl');
	updatePriceMdl.addEventListener('show.bs.modal', function (event) {
	  // Button that triggered the modal
	  var button = event.relatedTarget

	  // Extract info from data-bs-* attributes
	  var productId = button.getAttribute('product-id');
	  var productName = button.getAttribute('product-name');
	  var productOldPrice = button.getAttribute('product-price');

	  // Update the modal's content.
	  var modalTitle = $('.modal-title');
	  // var modalBodyInput = updatePriceMdl.querySelector('.modal-body input')

	  // modalTitle.textContent = 'Update price for ' + productName;
	  modalTitle.text('Update price for ' + productName);
	  $('#productId').val(productId);
	  // modalBodyInput.value = recipient
	});

	$('#updatePriceBtn').click(function (e) {
		e.preventDefault();
		var productId = $('#productId').val();
		var newPrice = $('#newPrice').val();

		if (productId.length < 1) {
			alert('Something went wrong');
			// return;
		} else {
			if (newPrice.length < 1) {
				alert('Something went wrong');
			} else {
				var data = {
					'productId': productId,
					'newPrice': newPrice,
					'updatePriceBtn': true
				};
				// console.log(data);
				$.ajax({
					url: 'process/products.pro.php',
					type: 'post',
					data: data,
					// dataType: 'json',
					beforeSend: function(){

					},
					success: function (response) {
						// alert(response);
						showToast(response);
	                    $('#updatePriceForm')[0].reset();
	                    $('#updatePriceMdl').modal('hide');
					},
					error: function(xhr, status, error){
						console.log(error);
					}
				});
			}
		}
	});

})