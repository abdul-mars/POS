<div class="col" style="width: 100vw">
	<div class="card mt-3"> <?php //$timeZone = date_default_timezone_get();
		  	//date_default_timezone_set($timeZone);
	 //echo date('d-m-Y h:i:s'); ?>
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Users</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<button class="btn btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addNewUserMdl"><i class="fa fa-plus"></i> Add New User</button>
					<!-- Modal start -->
					<div class="modal fade" id="addNewUserMdl" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body bg-light">
									<form action="#" method="post" id="addUserForm">
										<div class="mb-3">
											<label for="surname" class="form-label">Surname</label>
											<input type="text" class="form-control" name="surname" id="surname" placeholder="Enter user surname" required>
										</div>
										<div class="mb-3">
											<label for="forenames" class="form-label">Forenames</label>
											<input type="text" class="form-control" name="forenames" id="forenames" placeholder="Enter user forenames" required>
										</div>
										<div class="my-3 row">
											<div class="col-8">
												<label for="phone" class="form-label">Phone</label>
												<input type="number" class="form-control" name="phone" id="phone" placeholder="Enter user phone number" maxlength="10">
											</div>
											<div class="col-4">
												<label for="role" class="form-label">User Type</label>
												<select name="role" id="role" class="form-select" required>
													<option value="user">User</option>
													<option value="admin">Admin</option>
												</select>
											</div>
										</div>
									</div>
										<div class="modal-footer">
											<button type="button" name="addUserBtn" id="addUserBtn" class="btn forestgreen btn-success">Add User</button>
											<!-- <input type="submit" name="addInventoryBtn" class="btn forestgreen btn-success" value="Add Product"> -->
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
										</div>
									</form>
								<!-- </div> -->
							</div>
						</div>
					</div>
					<!-- modal end -->
				</div>
			</div>
		</div>
	</div>
	<!-- </div> -->
	<div>
		<div id="liveAlertPlaceholder" class="mt-2"></div>
		<!-- <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->
	</div>
	<div class="card mt-3">
		<div class="card-body">
			<h4>All Users</h4>
			<hr>
			<div class="table-responsive">
				<?php $sql = "SELECT * FROM users";
				$result = $con->query($sql);
				if ($result->num_rows < 1) {
					echo "No Product";
				} else { ?>
					<table class="table table-striped table-sm">
			          <thead>
			            <tr>
			              <th scope="col">#</th>
			              <!-- <th scope="col">Image</th> -->
			              <th scope="col">Name</th>
			              <th scope="col">Phone</th>
			              <th scope="col">Role</th>
			              <th scope="col">Last Login</th>
			              <!-- <th scope="col">l</th> -->
			              <th scope="col">Action</th>
			            </tr>
			          </thead>
			          <tbody style="">
					<?php $count = 1;
					while ($data = $result->fetch_assoc()) { ?>
						<tr class="">
			              <td><?= $count; ?></td>
			              <!-- <td><img src="../assets/products/<?= $data['product_img']; ?>" width="50" height="50" alt="product image" style="border-radius: 50px;"></td> -->
			              <td><?= ucwords($data['user_surname'].' '.$data['user_forenames']); ?></td>
			              <td><?= '0'.$data['user_phone']; ?></td>
			              <td><?= ucfirst($data['user_role']); ?></td>
			              <td><?= $data['last_login']; ?></td>
			              <td>
			              	<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#delUserMdl" user-id="<?=$data['user_id']; ?>" user-name="<?= ucwords($data['user_surname'].' '.$data['user_forenames']); ?>">
			              		<i class="fas fa-trash"></i> Delete
			              	</button>
			              </td>
			            </tr>
					<?php $count++;
					}
				}
				?>
		          </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>

<!-- add stock Modal -->
<div class="modal fade" id="delUserMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" class="p-0">
	      <div class="modal-body text-center">
	      	<input type="hidden" name="userId" id="userId" value="">
	      	<p style="margin-bottom: -2px">Are you sure you want to delete</p>
	      	<h5 id="userName" class="fw-bold"></h5>
	      	<h5 class="text-danger"><i class="fas fa-3x fa-exclamation-triangle"></i></h5>
	      	<p class="text-danger">This action cannot be undone!!!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger px-4 delUserBtn">Yes, Delete</button>
	        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No, Cancel</button>
	      </div>
  	</form>
    </div>
  </div>
</div>
<!-- inventory js -->
<script src="js/users.js?s=<?= time(); ?>"></script>