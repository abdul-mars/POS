$(document).ready(function() {
	var attept = 0;
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
					dataType: 'json',
					beforeSend: function(){

					},
					success: function (response) {
						if (response.success == 1) {
							window.location.replace('admin/');
							// alert(response.lastLogin);
						} else if (response.success == 0) {
							window.location.replace('saler/');
						} else {
							// alert(response);
							attept++;
							// console.log(attept);
							if (attept > 2) {
								// alert('forget password?');
								$('.forgetPassDiv').html('<a href="#forgetPassMdl" data-bs-toggle="modal" class="text-danger nav-link">Forgot Password?</a>');
								$('#forgetPassUsername').val(username);
							}
							var errorAlertContainer = $('#errorAlertContainer');

   							var errorAlert = '<div class="alert alert-danger alert-dismissible" role="alert">' + response + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    						errorAlertContainer.html(errorAlert);
						}
					},
					error: function(){

					},
				});
			}
		}
	});

	$('#errorAlertContainer').on('click', '.btn-close', function() {
		$('#errorAlertContainer').empty();
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

	$('#newUserChangePassForm').submit(function(event){
		event.preventDefault();
		var newPass = $('#newPass');
		var confirmPass = $('#confirmPass');

		if (newPass.val().length < 8) {
			alert('Password cannot be less than 8 characters');
			newPass.focus();
		} else {
			if (confirmPass.val().length < 8) {
				alert('Confirm password cannot be less than 8 characters');
				confirmPass.focus();
			} else {
				if (newPass.val() !== confirmPass.val()) {
					alert('Passwords do not match');
					confirmPass.focus();
				} else {
					var data = {
						'newPass': newPass.val(),
						'confirmPass': confirmPass.val(),
						'newUserChangePassBtn': true,
					}
					// console.log(data);
					$.ajax({
						url: '../process/new_password.pro.php',
						type: 'post',
						data: data,
						beforeSend: function () {},
						success: function (response) {
							alert(response);
							$('.newUserDiv').css('display', 'none');
						},
						error: function (xhr, status, error){
							console.log(error);
						}
					});
				}
			}
		}
	})

	function checkSessionId(){
		// var sessionId = '<?= $_SESSION['userSessionId']; ?>';

		// fetch('../process/checkSession.php').then(function(response){
		// 	return response.json();
		// }).then(function(responseData){
		// 	if(responseData.output == 'logout'){
		// 		//window.location.href = '../signout.php';
		// 		alert('lksjdflds');
		// 		// console.log(responseData);
		// 	} else {
		// 		console.log(responseData);
		// 		// alert('lsdkfjsurei');
		// 	}
		// });

		$.ajax({
			url: '../process/checkSession.php',
			type: 'get',
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				if(response.output == 'logout'){
					window.location.href = '../signout.php';
				}
			}
		});
	}
	setInterval(function(){
		checkSessionId();
	}, 10000);

	$('#forgetPassForm').submit(function(event) {
		event.preventDefault();
		var forgetPassUsername = $('#forgetPassUsername');
		if (forgetPassUsername.val().length < 1) {
			$('#forgetPassUsernameErr').text('Please enter your username');
			forgetPassUsername.focus();
		} else {
			$.ajax({
				url: 'process/forgetPassword.php',
				type: 'post',
				data: {'forgetPassUsername': forgetPassUsername.val()},
				beforeSend: function(){},
				success: function (response) {
					// alert(response);
					if (response == 1) {
						alert('Password reset request is sent successfull');
						$('#forgetPassForm')[0].reset();
						$('#forgetPassMdl').modal('hide');
					} else {
						alert(response);
					}
				},
				error: function(xhr, status, error){
					console.log(error);
				}
			});
		}
	});
});