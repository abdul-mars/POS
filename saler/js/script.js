function getTodayTotalSalesAmount(){
	// get today's sales total amount
    $.ajax({
		url: 'process/getReports.php?action=getTodaySales',
		type: 'GET',
		success: function (response) {
			$('.totalSales').text(response);
			// alert(response);
		}
	});
}
$(document).ready(function(){
	getTodayTotalSalesAmount(); // run to get today total sales by user

	$.ajax({
		url: 'products.php?action=load',
		type: 'post',
		data: {},
		beforeSend: function(){
			// alert('slkfjsf');
			$('.loader').css('display', 'flex');
		},
		success: function (response) {
			$('.cards').append(response);
			$('.loader').css('display', 'none');
		}
	});

	$('#searchProduct').keyup(function() {
	  var searchProduct = $(this).val();
	  
	  if (searchProduct.length !== 0) {
	    $.ajax({
	      url: 'process/products.pro.php?action=search',
	      type: 'post',
	      data: { action: 'search', searchProduct: searchProduct },
	      success: function(response) {
	        $('.searchResultsMain').show();
	        $('.searchResults').html(response);
	      }
	    });
	  } else {
	    $('.searchResultsMain').hide();
	    $('.searchResults').empty();
	  }
	});

	function productClicked() {
	  	var productName = $(this).attr('product-name');
	 	var productId = $(this).attr('product-id');
	  	var productPrice = parseFloat($(this).attr('product-price'));
	  	var productImg = $(this).attr('product-img');
	  	var productStock = parseInt($(this).attr('product-stock')); // Convert stock to integer

		  // Check if the product quantity is equal to the stock
		  var existingProduct = $('.productItems').find('.product-item[data-product-id="' + productId + '"]');
		  if (existingProduct.length > 0) {
		    var quantity = parseInt(existingProduct.find('.quantity').text());
		    if (quantity >= productStock) {
		      // Quantity is equal to or greater than stock, show an alert message or disable click event
		      alert("Product quantity cannot exceed available stock!");
		      return;
		    }
		    var newQuantity = quantity + 1;
		    existingProduct.find('.quantity').text(newQuantity);

		    var totalPrice = parseFloat(existingProduct.find('.product-price').data('price')) * newQuantity;
		    existingProduct.find('.product-price').html('¢ ' + totalPrice.toFixed(2));
		  } else {
		    var product = '\
		      <div class="product-item" data-product-id="' + productId + '">\
		        <figure class="product-image">\
		          <img src="../assets/products/' + productImg + '" alt="product image">\
		        </figure>\
		        <div class="product-details">\
		          <div class="product-name-quantity">\
		            <h5>' + productName + '</h5>\
		            <div class="quantity-controls">\
		              <span class="minus"><i class="fas fa-minus"></i></span>\
		              <span class="quantity">1</span>\
		              <span class="plus"><i class="fas fa-plus"></i></span>\
		            </div>\
		          </div>\
		          <div class="product-price" data-price="' + productPrice + '">\
		            <h4>¢ ' + productPrice.toFixed(2) + '</h4>\
		          </div>\
		        </div>\
		      </div>';

		    $('.productItems').append(product);
		  }

	  	updateTotalPrice();
	  	updateItemsInCart();
	}

	$('.cards').on('click', '.proCard', productClicked);
	$('.searchResults').on('click', '.proCard', productClicked);
	
	$('.searchResults').on('click', '.outOfStock', function() {
		alert('Product out of stock.');
	});

	$('.productItems').on('click', '.plus', function() {
	  var productItem = $(this).closest('.product-item');
	  var quantity = parseInt(productItem.find('.quantity').text());
	  var productStock = parseInt(productItem.attr('product-stock'));

	  if (quantity >= productStock) {
	    // Quantity is equal to or greater than stock, show an alert message
	    alert("Product quantity cannot exceed available stock!");
	    return;
	  }

	  var newQuantity = quantity + 1;
	  productItem.find('.quantity').text(newQuantity);

	  var productPrice = parseFloat(productItem.find('.product-price').data('price'));
	  var totalPrice = productPrice * newQuantity;
	  productItem.find('.product-price').html('¢ ' + totalPrice.toFixed(2));

	  updateTotalPrice();
	  updateItemsInCart();
	});

	$('.productItems').on('click', '.minus', function() {
	  var productItem = $(this).closest('.product-item');
	  var quantity = parseInt(productItem.find('.quantity').text());
	  
	  if (quantity > 1) {
	    var newQuantity = quantity - 1;
	    productItem.find('.quantity').text(newQuantity);
	    
	    var productPrice = parseFloat(productItem.find('.product-price').data('price'));
	    var totalPrice = productPrice * newQuantity;
	    productItem.find('.product-price').html('¢ ' + totalPrice.toFixed(2));
	    
	    updateTotalPrice();
	    updateItemsInCart();
	  } else {
	    productItem.remove();
	    updateTotalPrice();
	    updateItemsInCart();
	  }
	});

	function updateTotalPrice() {
	  var totalPrice = 0;
	  
	  $('.product-item').each(function() {
	    var quantity = parseInt($(this).find('.quantity').text());
	    var productPrice = parseFloat($(this).find('.product-price').data('price'));
	    totalPrice += quantity * productPrice;
	  });
	  
	  $('.totalDiv .totalPrice').html('Ghc ' + totalPrice.toFixed(2));
	}

	function updateItemsInCart() {
	  var itemsInCart = $('.product-item').length;
	  $('.itemsInCart').text(itemsInCart);
	}

	// function to get the products id and quatity for further processing in the backed
	function getProductItemsData() {
	  var productItemsData = [];
	  
	  $('.product-item').each(function() {
	    var productId = $(this).data('product-id');
	    var quantity = parseInt($(this).find('.quantity').text());
	    
	    var itemData = {
	      productId: productId,
	      quantity: quantity
	    };
	    
	    productItemsData.push(itemData);
	  });
	  
	  return productItemsData;
	}

	$('.checkoutBtn').click(function() {
	  var itemsData = getProductItemsData();
	  // console.log(itemsData);
	  getTodayTotalSalesAmount();
	  
	  if (itemsData.length === 0) {
	  	alert('nothing in cart');
	    return; // Exit the function if product items are empty
	}
	 

	$.ajax({
	    url: 'process/products.pro.php?action=checkout',
	    type: 'POST',
	    data: { items: itemsData },
	    success: function(response) {
	      // Handle the response from the backend
	      // console.log(response);
	      $('.prntChkout').html(response);
	      $('.prntChkout').show();
	    },
	    error: function(xhr, status, error) {
	      // Handle any errors that occur during the AJAX request
	    }
	});
	});

	// print invoice
	$('.prntChkout').on('click', '.prtBtn', function() {
		$('.productItems').empty();
		updateTotalPrice();
		updateItemsInCart();
		window.print();
		$('.prntChkout').hide();
	});

	// cancel print
	$('.prntChkout').on('click', '.cancelBtn', function() {
		$('.prntChkout').css('display', 'none');
		$('.productItems').empty();
		updateTotalPrice();
		updateItemsInCart();
	});

	// clear items in cart
	$('.clearBtn').click(function () {
		$('.productItems').empty();
		updateTotalPrice();
		updateItemsInCart();
	});

	// $('.updateProfileBtn').click(function () {
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
				url: 'process/profile.pro.php',
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
    });

    
});