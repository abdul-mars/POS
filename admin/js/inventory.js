$(document).ready(function() {
  $('#productForm').submit(function(e) {
    // $('#addInventoryBtn').click(function (e) {    
    e.preventDefault(); // Prevent form submission

    // Get form field values
    var productName = $('#productName').val();
    var productPrice = $('#productPrice').val();
    var productImg = $('#productImg').prop('files')[0];
    var productStock = $('#productStock').val();
    var productDesc = $('#productDesc').val();
    var addInventoryBtn = $('#addInventoryBtn'); //alert(addInventoryBtn);

    // Perform custom form validation
    if (productName.trim() === '') {
      alert('Please enter a product name.');
      return;
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
                  url: 'process/inventory.pro.php', // Replace with your backend URL
                  type: 'POST',
                  data: formData,
                  dataType: 'json',
                  contentType: false,
                  processData: false,
                  // success: function(response) {
                  //   // Handle success response
                  //   console.log(response);

                  // },
                  success: function(response) {
                    showToast(response.message);
                    $('#productForm')[0].reset();
                    $('#addInventMdl').modal('hide');
                  },
                  error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                    // Display an error message or take appropriate action
                  }
                });
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
  });
});
