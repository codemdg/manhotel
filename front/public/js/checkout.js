$(document).ready(function() {
    $('#form_search_product').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "http://localhost:8081/search_products.php",
            data: $(this).serialize(),
            success: function(response) {
                // Update the product table with the returned data
                $('#product_table tbody').html(response);
                Checkout.initEvent();
            }
        });
    });

    Checkout.initEvent();

    $('#btn-new-bill').click(function() {
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8081/add_bill.php',
            success: function(response) {
                localStorage.setItem('code', response.code);
                localStorage.setItem('id_bill', response.id);
                Checkout.recupCurrentBill();
            }
        })
    });

    Checkout.recupCurrentBill();
});

Checkout = {
    initEvent: () => {
        $('.btn-add-product').click(function() {
            const idProduct = $(this).data('id-product');
            const qtProduct = $('#qt-' + idProduct).val();
            const idBill = localStorage.getItem('id_bill');
            console.log(idProduct, qtProduct, idBill);
        });
    },
    recupCurrentBill: () => {
        const code = localStorage.getItem("code") ?? "0000";
        $('#code-bill').html(code);
        $('#code-bill').attr('data-id-bill', localStorage.getItem("id_bill") ?? "0000");
        $('#code-bill').attr('data-id-code', code);
    }
}
