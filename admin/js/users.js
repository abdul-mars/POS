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
						beforeSend: function(){},
						success: function (response) {
							// alert(response);
							showToast(response);
							$('#addUserForm')[0].reset();
							$('#addNewUserMdl').modal('hide');
							var alertPlaceholder = $('#liveAlertPlaceholder')

							function alert(response, type) {
							  var wrapper = document.createElement('div')
							  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + response + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

							  alertPlaceholder.append(wrapper)
							}
							alert(response, 'success');
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
				}
			});
		}
	})
})