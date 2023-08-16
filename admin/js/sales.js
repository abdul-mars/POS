// $(document).ready(function(){
// 	$('.tab').click(function () {
// 		$('.tab').removeClass('active');
// 		$(this).addClass('active');
// 	});
// })

$(document).ready(function() {
	var userId = 0;
    $('.tab').click(function() {
        $('.tab').removeClass('active');
        $(this).addClass('active');
        
        // Logic to update the salesDiv content based on the selected tab
        
        // Get the user_id from the tab's href attribute
        // var userId = $(this).attr('href');
        userId = $(this).attr('user-id');
        // alert(userId);
        
        // Fetch and display sales data for the selected user
        fetchSalesData(userId);
    });

    $('.viewSalesBtn').click(function() {
    	//alert(userId);
        var fromDate = $('#fromDate').val();
        var toDate = $('#toDate').val();

        // Fetch and display sales data based on the selected date range
        fetchSalesData(userId, fromDate, toDate);
    });

    // Function to fetch and display sales data
    function fetchSalesData(userId, fromDate, toDate) {
        // Perform an AJAX request to fetch sales data
        // Use userId, fromDate, and toDate as parameters in your PHP script
        // Update the .salesDiv with the fetched data
        // Example:
        $.ajax({
            url: 'process/sales.pro.php',
            type: 'post',
            data: { userId: userId, fromDate: fromDate, toDate: toDate },
            beforeSend: function() {
                // Show loading indicator if needed
            },
            success: function(response) {
                // Update the .salesDiv content with the fetched data
                $('.salesTbBd').html(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            },
            complete: function() {
                // Hide loading indicator if needed
            }
        });
    }

	var userId = $(".tab:first").attr("user-id");
	$(".tab:first").addClass('active');
	console.log(userId);
    fetchSalesData(userId);


    var viewAllSalesMdl = document.getElementById('viewAllSalesMdl');
	viewAllSalesMdl.addEventListener('show.bs.modal', function (event) {
	  // Button that triggered the modal
	  var button = event.relatedTarget

	  // Extract info from data-bs-* attributes
	  var userId = button.getAttribute('data-user-id');
	  var invoiceNo = button.getAttribute('data-invoice-no');
	  //var productOldPrice = button.getAttribute('product-price');

	  // Update the modal's content.
	  var modalTitle = $('.modal-title');
	  // var modalBodyInput = updatePriceMdl.querySelector('.modal-body input')

	  // modalTitle.textContent = 'Update price for ' + productName;
	  modalTitle.text('All products in invoice ' + invoiceNo);
	  //$('#productId').val(productId);
	  // modalBodyInput.value = recipient

	  $.ajax({
  		url: 'process/sales.viewAll.pro.php',
  		type: 'POST',
  		data: {userId: userId, invoiceNo: invoiceNo},
  		success: function (response) {
  			$('.viewAllSalesTbBd').html(response);
  		}
  	});
	});
});
