$(document).ready(function(){
	$('#addUserBtn').click(function(e) {
		e.preventDefault();
		var surname = $('#surname');
		var forenames = $('#forenames');
		var phone = $('#phone');
		var role = $('#role');
		if (surname.val().length < 1) {
			alert('Please fill surname');
			surname.focus();
		} else {
			if (forenames.val().length < 1) {
				alert('Please fill forenames');
				forenames.focus();
			} else {
				if (role.val().length < 1) {
					alert('Please select user type');
					role.focus();
				} else {
					var data = {
						'surname': surname.val(),
						'forenames': forenames.val(),
						'phone': phone.val(),
						'role': role.val(),
						'addUserBtn': true,
					}
					// console.log(data);
					$.ajax({
						url: 'process/users.pro.php',
						type: 'post',
						data: data,
						dataType: 'json',
						beforeSend: function(){},
						success: function (response) {
							// alert(response);
							showToast(response.message);
							// Append the new row to the table
			                var newRow = '<tr class="data-row" data-user-id="' + response.user.user_id + '">' +
			                    '<td>' + response.user.user_id + '</td>' +
			                    '<td>' + response.user.user_surname + ' ' + response.user.user_forenames + '</td>' +
			                    '<td>' + '0' + response.user.user_phone + '</td>' +
			                    '<td>' + response.user.user_role + '</td>' +
			                    '<td>' + response.user.last_login + '</td>' +
			                    '<td>' +
			                    '<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#delUserMdl" user-id="' + response.user.user_id + '" user-name="' + response.user.user_surname + ' ' + response.user.user_forenames + '">' +
			                    '<i class="fas fa-trash"></i> Delete' +
			                    '</button>' +
			                    '</td>' +
			                    '</tr>';

			                $('.table-body').append(newRow); // Assuming .table-body is the class of the table body element
							$('#addUserForm')[0].reset();
							$('#addNewUserMdl').modal('hide');
							var alertPlaceholder = $('#liveAlertPlaceholder');

							function alert(response, type) {
							  var wrapper = document.createElement('div')
							  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + response + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

							  alertPlaceholder.append(wrapper)
							}
							alert(response.message, 'success');
						},
						error: function(xhr, status, error){
							console.log(error);
						}
					});
				}
			}
		}
	});

	var delUserMdl = document.getElementById('delUserMdl');
	delUserMdl.addEventListener('show.bs.modal', function (event) {
	  	// Button that triggered the modal
		var button = event.relatedTarget

		var userId = button.getAttribute('user-id');
		var userName = button.getAttribute('user-name');

		$('#userId').val(userId);
		$('#userName').text(userName+'?');
	});

	function renumberTableRows() {
        // Get all rows of the table body
        var rows = $('.data-row');
        // Loop through each row and update the numbering
        rows.each(function (index) {
            $(this).find('td:first-child').text(index + 1);
        });
    }

	$('.delUserBtn').click(function(){
		var userId = $('#userId').val();
		if (userId.length > 0) {
		$.ajax({
			url: 'process/users.pro.php',
			type: 'post',
			data: {'userId': userId, 'delUserBtn': true},
			success: function (response) {
				// alert(response);
				showToast(response);
				$('#delUserMdl').modal('hide');
				$('.data-row[data-user-id="' + userId + '"]').remove();
				renumberTableRows();
			}
		});
		}
	});

	var passwordResetMdl = document.getElementById('passwordResetMdl');
	passwordResetMdl.addEventListener('show.bs.modal', function (event) {
	  	// Button that triggered the modal
		var button = event.relatedTarget

		var resetUserId = button.getAttribute('user-id');
		var resetUserName = button.getAttribute('user-name');

		$('#resetUserId').val(resetUserId);
		$('#resetUserName').text(resetUserName);
	});

	$('#resetuserPassForm').submit(function(event){
		event.preventDefault()
		var resetUserId = $('#resetUserId');
		var resetUserName = $('#resetUserName');
		if (resetUserId.val().length < 1) {
			alert('Something went wrong');
		} else {
			// alert(resetUserId.val());
			$.ajax({
					url: 'process/resetUserPass.php',
					type: 'post',
					data: {'resetUserId': resetUserId.val()},
					beforeSend: function(){},
					success: function (response) {
						var alertPlaceholder = $('#liveAlertPlaceholder');
						// alert(response);
						function alert(response, type) {
						  var wrapper = document.createElement('div')
						  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + response + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

						  alertPlaceholder.append(wrapper)
						}
						alert(response, 'success');
						$('#passwordResetMdl').modal('hide');
						eval(response);
					},
					error: function(xhr, status, error){
						console.log(error);
					}
				});
		}
	})

})