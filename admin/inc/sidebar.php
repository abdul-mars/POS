<div class="bg-dark col-auto col-md-4 col-lg-2-5 min-vh-100 d-flex flex-column justify-content-between sidebarMain" style="top: 0; position: sticky;">
	<div class="bg-dark p-2 sideBarItems" style="">
		<!-- <a href="#" class="d-flex text-decoration-none mt-1 align-items-center text-white">
			<span class="fs-4 d-none d-sm-inline">Side Menu</span>
		</a> -->
		<ul class="nav nav-pills flex-column mt-4">
			<li class="nav-item py-2 py-sm-0">
				<a href="?page=dashboard" class="nav-link text-white <?php echo (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] === 'dashboard') ? 'active' : ''; ?>">
					<i class="fs-4 fas fa-tachometer-alt"></i><span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
				</a>
			</li>
			<li class="nav-item py-2 py-sm-0">
				<a href="?page=inventory" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] === 'inventory') ? 'active' : ''; ?>">
					<i class="fs-5 fa fa-clipboard"></i><span class="fs-4 ms-3 d-none d-sm-inline">Inventory</span>
				</a>
			</li>
			<li class="nav-item py-2 py-sm-0">
				<a href="?page=products" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] === 'products') ? 'active' : ''; ?>">
					<i class="fs-5 fas fa-table"></i><span class="fs-4 ms-3 d-none d-sm-inline">Products</span>
				</a>
			</li>
			<li class="nav-item py-2 py-sm-0">
				<a href="#" class="nav-link text-white">
					<i class="fs-5 fas fa-book"></i><span class="fs-4 ms-3 d-none d-sm-inline">Reports</span>
				</a>
			</li>
			<li class="nav-item py-2 py-sm-0">
				<a href="#" class="nav-link text-white">
					<i class="fs-5 far fa-user"></i><span class="fs-4 ms-3 d-none d-sm-inline">Users</span>
				</a>
			</li>
			<li class="nav-item py-2 py-sm-0">
				<a href="#" class="nav-link text-white">
					<i class="fs-5 fa fa-users"></i><span class="fs-4 ms-3 d-none d-sm-inline">Customers</span>
				</a>
			</li>
			<li class="nav-item py-2 py-sm-0">
				<a href="#" class="nav-link text-white">
					<i class="fs-5 far fa-bell"></i><span class="fs-4 ms-3 d-none d-sm-inline">Notifications</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="dropdown open bg-dark downBtnDiv">
		<button class="btn border-none text-white dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" data-aria-expanded="false">
		<i class="fa fa-user"></i> <span class="ms-2 d-none d-sm-inline"><?= ucwords($adminSurname.' '.$adminForenames); ?></span>
		</button>
		<div class="dropdown-menu" aria-labbeledby="triggerId">
			<button class="dropdown-item"><i class="fas fa-cog"></i> Settings</button>
			<button class="dropdown-item"><i class="far fa-user-circle"></i> Profile</button>
			<!-- <button class="dropdown-item"><i class="far fa-user-circle"></i> Notification</button> -->
			<div class="dropdown-divider"></div>
			<a href="../signout.php" class="dropdown-item"><i class="fas fa-power-off"></i> Sign Out</a>
		</div>
	</div>
</div>