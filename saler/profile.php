<?php include_once 'inc/header.php'; ?>

<div class="container-fluid">
	<div class="card my-3">
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">User Profile</h1>
				
			</div>
		</div>
	</div>
	<div class="card p-2 my-3" style="background: ;">
		<div class="card-body">
			<div class="row">
				<div class="col-5">
					<h5 class="text-center">Personal Information</h5> <hr>
					<div class="table-responsive">
						<style>
							th{
								align-items: flex-end; justify-content: end; display: flex;
							}
						</style>
						<?php $sql = mysqli_query($con, "SELECT user_role, date_added, last_login FROM users WHERE user_id =".$_SESSION['userId']);
							$data = mysqli_fetch_assoc($sql);
							$lastLoginTime = date('d-M H:i', strtotime($data['last_login']));
							// $last = date($data['last_login']);
							// $lastLoginTime = date('d-M-Y', $last);
						?>
						<table class="table table-striped table-">
							<tr>
								<th style="">Username:</th>
								<td><?= $_SESSION['username']; ?></td>
							</tr>
							<tr>
								<th>Surname:</th>
								<td><?= $_SESSION['surname']; ?></td>
							</tr>
							<tr>
								<th>Forenames:</th>
								<td><?= $_SESSION['forenames']; ?></td>
							</tr>
							<tr>
								<th>Phone:</th>
								<td><?= $_SESSION['phone']; ?></td>
							</tr>
							<tr>
								<th>Date Added:</th>
								<td><?= date('d-M-Y', strtotime($data['date_added'])); ?></td>
							</tr>
							<tr>
								<th>Role:</th>
								<td><?= ucfirst($data['user_role']); ?></td>
							</tr>
							<tr>
								<th>Last Login:</th>
								<td><?= $lastLoginTime; ?></td>
								<!-- <td><?= $data['last_login']; ?></td> -->
							</tr>
						</table>
					</div>
				</div>
				<div class="col-6">
					<h5 class="text-center">Update Information</h5> <hr>
					<div>
						<form action="#" method="post" id="updateProfileForm">
							<div class="row">
								<div class="mb-2 col-6">
									<label for="username" class="form-label">Old Username</label>
									<input type="text" class="form-control border border-success" name="username" id="username" value="<?= $_SESSION['username']; ?>" readonly required style="background: #eee;">
								</div>
								<div class="mb-2 col-6">
									<label for="newUsername" class="form-label">New Username</label>
									<input type="text" class="form-control border border-success" name="newUsername" id="newUsername" value="<?= $_SESSION['username']; ?>" readonly required style="background: #eee;">
								</div>
							</div>
							<div class="row">
								<div class="mb-2 col-6">
									<label for="surname" class="form-label">Surname</label>
									<input type="text" class="form-control border border-success" name="surname" id="surname" value="<?= $_SESSION['surname']; ?>" required>
								</div>
								<div class="mb-2 col-6">
									<label for="forenames" class="form-label">Forenames</label>
									<input type="text" class="form-control border border-success" name="forenames" id="forenames" value="<?= $_SESSION['forenames']; ?>" required>
								</div>
							</div>
							<div class="row">
								<div class="mb-2 col-6">
									<label for="phone" class="form-label">Phone</label>
									<input type="number" class="form-control border border-success" name="phone" id="phone" value="<?= $phone; ?>" maxlength="10" minlenght="10" required>
									<script>
									    // Add event listener to the input field to enforce numeric input
									    document.getElementById("phone").addEventListener("input", function() {
									      this.value = this.value.replace(/\D/g, "");
									    });
									  </script>
								</div>
								<div class="col-6 mt-4 d-flex justify-content-between align-items-center">
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changePasswordMdl">Change Password</button>

									
								</div>
							</div>
							<div class="mt-3">
								<button type="submit" class="btn btn-success btn-g px-4 updateProfileBtn">Update</button>
							</div>
						</form>

						<!-- change password Modal -->
						<div class="modal fade" id="changePasswordMdl" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="" method="post" id="changePasswrdForm">
											<div class="mb-2">
												<label for="oldPassword" class="form-label">Old Passwrd</label>
												<input type="password" class="form-control border border-success" name="oldPassword" id="oldPassword" placeholder="Enter old password" required autocomplete="new-password">
												<small><span class="text-danger" id="oldPasswordErr"></span></small>
											</div>
											<div class="mb-2">
												<label for="newPassword" class="form-label">New Passwrd</label>
												<input type="password" class="form-control border border-success" name="newPassword" id="newPassword" placeholder="Enter new password" required autocomplete="new-password">
												<small><span class="text-danger" id="newPasswordErr"></span></small>
											</div>
											<div class="mb-2">
												<label for="confirmPassword" class="form-label">Confirm Passwrd</label>
												<input type="password" class="form-control border border-success" name="confirmPassword" id="confirmPassword" placeholder="Confirm password" required autocomplete="new-password">
												<small><span class="text-danger" id="confirmPasswordErr"></span></small>
											</div>
											<div class="mb-2">
												<button type="submit" class="btn btn-success changePasswordBtn">Change Password</button>
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
											</div>
										</form>
									</div>
									<!-- <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									</div> -->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bootstrap js -->
		<script src="../js/bootstrap.bundle.min.js?s=<?= time(); ?>"></script>
		<!-- jQuery -->
		<script src="../js/jquery-3.7.js?s=<?= time(); ?>"></script>
		<!-- custom js main -->
		<script src="../js/script.js?s=<?= time(); ?>"></script>
		<script src="js/script.js?s=<?= time(); ?>"></script>
	</body>
</html>
<?//= require_once 'inc/footer.php'; ?>