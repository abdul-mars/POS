// admin script file

function getNotifications() {
  function notificationAccordion(msg, title, id, type, stock) {
    var accordion = `<div class="accordion-item col-6">
		<h2 class="accordion-header">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion${id}" aria-expanded="false" aria-controls="accordion${id}" style="background-color:  ${type}">
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
          // var type = (stock > 0) ? 'bg-warning' : 'bg-danger';
          var type = (stock > 0) ? '#ffe4b2' : '#ffb2b2';
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

	$('#updateProfileForm').submit(function(e){
		e.preventDefault();
		var username = $('#username');
		var surname = $('#surname');
		var forenames = $('#forenames');
		var phone = $('#phone');
		var newUsername = $('#newUsername');
		if ((username.val().length < 2) || (surname.val().length < 2) || (forenames.val().length < 2) || (phone.val().length != 10)) {
			alert('fill all fields properly');
		} else {
			newUsername = surname.val()+'.'+forenames.val();
			var data = {
				'username': username.val(),
				'surname': surname.val(),
				'forenames': forenames.val(),
				'phone': phone.val(),
				'newUsername': newUsername,
				'updateProfileBtn': true,
			}

			$.ajax({
				url: '../saler/process/profile.pro.php',
				type: 'post',
				data: data,
				beforeSend: function() {},
				success: function (response) {
					alert(response);
				},
				error: function(xhr, status, error){
					console.log(error);
				}
			});
		}
	});

	function updateNewUsername() {
    	var surname = $('#surname').val().toLowerCase();
      	var forenames = $('#forenames').val().toLowerCase();
     	var newUsername = surname + '.' + forenames;
      	$('#newUsername').val(newUsername);
    }

	$('#surname').keyup(updateNewUsername);
    $('#forenames').keyup(updateNewUsername);

    // $('.changePasswordBtn').click(function(){
    $('#changePasswrdForm').submit(function(e) {
    	e.preventDefault();
    	var oldPassword = $('#oldPassword');
    	var newPassword = $('#newPassword');
    	var confirmPassword = $('#confirmPassword');

    	if (oldPassword.val().length < 8) {
    		$('#oldPasswordErr').text('old password cannot be less than 8 characters');
    		oldPassword.focus();
    	} else {
    		if (newPassword.val().length < 8) {
    			$('#newPasswordErr').text('New password must 8 or above characters');
    			newPassword.focus();
    		} else {
    			if (confirmPassword.val().length < 8) {
    				$('#confirmPasswordErr').text('Confirm password must 8 or above characters');
	    			confirmPassword.focus();
    			} else {
    				if (newPassword.val() !== confirmPassword.val()) {
    					$('#confirmPasswordErr').text('Passwords do not match');
    					confirmPassword.focus();
    				} else {
    					var data = {
    						'oldPassword': oldPassword.val(),
    						'newPassword': newPassword.val(),
    						'confirmPassword': confirmPassword.val(),
    						'changePasswordBtn': true,
    					}
    					// console.log(data);
    					$.ajax({
							url: 'process/profile.pro.php',
							type: 'post',
							data: data,
							beforeSend: function() {},
							success: function (response) {
								$('#changePasswordMdl').modal('hide');
								alert(response);
							},
							error: function(xhr, status, error){
								console.log(error);
							}
						});
    				}
    			}
    		}
    	}
    })
});