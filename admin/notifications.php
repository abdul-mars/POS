<div class="col" style="width: 100vw">
	<div class="card mt-3">
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Notifications</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					
				</div>
			</div>
		</div>
	</div>
	<div id="toastContainer" class="position-absolute top-0 end-0 p-3" style="z-index: 9999"></div>
	<div class="card mt-3 bg-light">
		<div class="card-body">
			<div class="accordion accordion-flush row" id="notifAccord">
				<div class="accordion-item col-6">
					<h2 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
					Low Stock Alert!
					</button>
					</h2>
					<div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#notifAccord">
						<div class="accordion-body">
							Product [Scissors] is running low on stock. Current stock level: [7]. Consider reordering soon.
						</div>
					</div>
				</div>
				<div class="accordion-item col-6">
					<h2 class="accordion-header">
					<button class="accordion-button collapsed bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
					Out of Stock Alert!
					</button>
					</h2>
					<div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#notifAccord">
						<div class="accordion-body">
							Product [Scissors] is currently out of stock. Please take immediate action to restock this product.
						</div>
					</div>
				</div>
				<div class="accordion-item col-6">
					<h2 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
					Accordion Item #3
					</button>
					</h2>
					<div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#notifAccord">
						<div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="updatePriceMdl" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Update Price for </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="#" method="post" id="updatePriceForm">
				<div class="modal-body">
					<label for="newPrice" class="form-label">New Price</label>
					<input type="number" name="newPrice" id="newPrice" class="form-control">
					<input type="hidden" name="productId" id="productId" value="" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
					<button type="button" name="updatePriceBtn" id="updatePriceBtn" class="btn btn-success">Update Price</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- products js -->
<script src="js/notifications.js?s=<?= time(); ?>"></script>