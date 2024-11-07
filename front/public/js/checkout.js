$(document).ready(function() {
    $('#form_search_product').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url:"http://caissev1.test/search_products.php",
            data: $(this).serialize(),
            success: function(response) {
                // Update the product table with the returned data
                $('#product_table tbody').html(response);
            }
        });
    });
});