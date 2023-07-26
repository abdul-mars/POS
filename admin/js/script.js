// admin script file

function getNotifications() {
  function notificationAccordion(msg, title, id, type, stock) {
    var accordion = `<div class="accordion-item col-6">
		<h2 class="accordion-header">
		<button class="accordion-button collapsed ${type}" type="button" data-bs-toggle="collapse" data-bs-target="#accordion${id}" aria-expanded="false" aria-controls="accordion${id}">
		${title}
		</button>
		</h2>
		<div id="accordion${id}" class="accordion-collapse collapse" data-bs-parent="#notifAccord">
			<div class="accordion-body">
				${msg}
			</div>
		</div>
	</div>`;
	// return accordion;
	$('#notifAccord').append(accordion);
  }

  function fetchAndDisplayNotifications() {
    $.ajax({
      url: 'process/notifications.pro.php?action=get_notifications',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        var notificationCount = response.length;
        $(".notificationCount").text(notificationCount);

        $('#notifAccord').empty();
        response.forEach(function (notification) {
          var productId = notification.product_id;
          var productName = notification.product_name;
          var productImg = notification.product_img;
          var stock = notification.stock;

          var msg = (stock > 0) ? `<strong>${productName}</strong> is running low on stock. Current stock level: ${stock}. Consider reordering soon.` : `<strong>${productName}</strong> is currently out of stock. Please take immediate action to restock this product.`; 
          var title = (stock > 0) ? 'Low Stock Alert!' : 'Out of Stock Alert!';
          var type = (stock > 0) ? 'bg-warning' : 'bg-danger';
          notificationAccordion(msg, title, productId, type, stock);
        });
      },	
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  }

  
  fetchAndDisplayNotifications();
  setInterval(fetchAndDisplayNotifications, 5 * 60 * 1000); // 5 minutes in milliseconds
}
function showToast(message) { //show toast function
    // Create the toast element
    var toast = $('<div class="toast text-light" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" style="z-index: 9999999999;">' +
      '<div class="toast-header">' +
      '<strong class="me-auto">Success</strong>' +
      '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
      '</div>' +
      '<div class="toast-body">' + message + '</div>' +
      '</div>');

    // Set the toast background color
    toast.css('background-color', 'forestgreen');

    // Append the toast to the container
    $('#toastContainer').append(toast);

    // Initialize the toast
    var toastElement = toast[0];
    var toastInstance = new bootstrap.Toast(toastElement);

    // Show the toast
    toastInstance.show();

    // Remove the toast after a few seconds
    setTimeout(function() {
      toast.remove();
    }, 5000);
}

$(document).ready(function(){
	getNotifications();
});