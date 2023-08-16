//var price = stock = '';
$(document).ready(function() {

  fetchTables('#inventoryTable', 'process/ajax.tables.pro.php?action=inventory_table');
  
  $('#productForm').submit(function(e) {
  // $('#addInventoryBtn').click(function (e) { 
    e.preventDefault(); // Prevent form submission

    // Get form field values
    var productName = $('#productName').val();
    var productPrice = $('#productPrice').val();
    var costPrice = $('#costPrice').val();
    var productImg = $('#productImg').prop('files')[0];
    var productStock = $('#productStock').val();
    var productDesc = $('#productDesc').val();
    var addInventoryBtn = $('#addInventoryBtn'); //alert(addInventoryBtn);

    // Perform custom form validation
    if (productName.trim() === '') {
      alert('Please enter a product name.');
      return;
    } else {
      if (costPrice.trim() === '' || parseFloat(costPrice) === 0) {
        alert('Please enter a valid cost price.');
      } else {
        if (productPrice.trim() === '' || parseFloat(productPrice) === 0) {
          alert('Please enter a valid product price.');
          return;
        } else {
          if (!productImg) {
            alert('Please select a product image.');
            return;
          } else {
            // File type validation
            var allowedExtensions = /(\.png|\.jpeg|\.jpg)$/i;
            if (!allowedExtensions.exec(productImg.name)) {
              alert('Invalid file type. Please select a PNG, JPG, or JPEG image.');
              return;
            } else {
              // File size validation
              var maxSize = 3 * 1024 * 1024; // 3MB
              if (productImg.size > maxSize) {
                alert('File size exceeds the limit. Please select a file up to 3MB.');
                return;
              } else {
                if (productStock.trim() === '') {
                  alert('Please enter the product stock.');
                  return;
                } else {
                  // All form fields are valid, proceed with Ajax submission
                  var formData = new FormData($(this)[0]);
                  var data = {
                    'productName': productName,
                    'productPrice': productPrice,
                    'productImg': productImg,
                    'productStock': productStock,
                    'productDesc': productDesc,
                    'addInventoryBtn': true,
                  }
                  // console.log(data);
                  $.ajax({
                    url: 'process/inventory.pro.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                      showToast(response.message);
                      $('#productForm')[0].reset();
                      $('#addInventMdl').modal('hide');
                      fetchTables('#inventoryTable', 'process/ajax.tables.pro.php?action=inventory_table');
                    },
                    error: function(xhr, status, error) {
                      // Handle error response
                      console.log(xhr.responseText);
                    }
                  });
                }
              }
            }
          }
        }
      } 
    }
  });

  // add stock modal code
  // var updateInventoryMdl = $('#updateInventoryMdl');
  var updateInventoryMdl = document.getElementById('updateInventoryMdl');
  updateInventoryMdl.addEventListener('show.bs.modal', function (event){

    var updateInventoryBtn = event.relatedTarget

    // var productId = updateInventoryBtn.attr('product-id');
    var productId = updateInventoryBtn.getAttribute('product-id');
    var productName = updateInventoryBtn.getAttribute('product-name');
    var modalTitle = $('.modal-title');
    // alert(productId);
    // $('.modal-body').text(productId);
    modalTitle.text('Update stock for ' + productName);
    $('#productId').val(productId);

    // var $row = $(updateInventoryBtn).closest('tr');
    // var price = $row.find('.price').text();
    // var stock = $row.find('.stock').text();

    // showToast(price);
    // showToast(stock);

  });

  $('#updatePriceCheck').change(function () {
    // if ($(this).is(':checked')) {
    if($(this).prop('checked')){
      var newPriceInput = ('<label for="newPrice" class="form-label">New Price</label>\
        <input type="number" name="newPrice" id="newPrice" class="form-control" placeholder="Enter the cost price">');
      
      $('.newPriceDiv').append(newPriceInput);
    } else {
      $('.newPriceDiv').empty();
    }
  });

  $('.updateStockBtn').click(function (e) {
    e.preventDefault();
    var productId = $('#productId').val();
    var stock = $('#stock').val();
    var costPrice = $('#costPrice').val();
    var updatePriceCheck = $('#updatePriceCheck').prop('checked');
    var newPrice = '';
    if ($('#newPrice').length) {
      var newPrice = $('#newPrice').val();
    }

    var data = {
      'productId': productId,
      'newStock': stock,
      'newCostPrice': costPrice,
      'updatePriceCheck': updatePriceCheck,
      'newPrice': newPrice,
      'updateStockBtn': true,
    }

    $.ajax({
      url: 'process/inventory_update.php',
      type: 'post',
      data: data,
      beforeSend: function() {},
      success: function (response) {
        // alert(response);
        showToast(response);
        $('#restockForm')[0].reset();
        $('#updateInventoryMdl').modal('hide');
        // showToast(price);
        fetchTables('#inventoryTable', 'process/ajax.tables.pro.php?action=inventory_table');
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});
