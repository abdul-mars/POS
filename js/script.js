$(document).ready(function() {
	$('#signinForm').submit(function(event) {
		event.preventDefault();

		var username = $('#username').val();
		var password = $('#password').val();
		var usernameErr = $('#usernameErr');
		var passwordErr = $('#passwordErr');
		// alert(username);
		// alert(password);
		// console.log(username.length);
		if (username.length < 1) {
			usernameErr.text('Please enter username');
			// usernameErr.show();
			$('#username').focus();
		} else {
			if (password.length < 8) {
				passwordErr.text('Password can not be less than 8 characters long');
				// passwordErr.show();
				$('#password').focus();
			} else {
				var data = {
					'username': username,
					'password': password,
					'signinBtn': true,
				}

				$.ajax({
						url: 'process/signin.pro.php',
						type: 'post',
						data: data,
						beforeSend: function(){

						},
						success: function (response) {
							// alert(response)
							if (response == 1) {
								window.location.replace('admin/');
							} else if (response == 0) {
								window.location.replace('saler/');
							} else {
								alert(response);
							}
						},
						error: function(){

						},
					});
			}
		}
	});

	$('#showHidePass').click(function() { //show / hide password
		if ($('#password').attr('type') == 'password') {
			$('#password').attr('type', 'text');
			$(this).html('<i class="far fa-eye-slash"></i>');
		} else {
			$('#password').attr('type', 'password');
			$(this).html('<i class="far fa-eye"></i>');
		}
	});
});