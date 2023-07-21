// admin script file
// $(document).ready(function(){
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

	  function myFunc() {
	  	alert('why?');
	  }
// })