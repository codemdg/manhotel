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
            const unitPrice = $(this).data('unit-price');
            console.log(idProduct, qtProduct, idBill);
            // TODO: add selected product to current bill
            // TODO: send idProduct, qtProduct, idBill to database via ajax
            // TODO: create ajax to refresh list products bill
            $.ajax({
                type: 'POST',
                url: "http://localhost:8081/add_product_bill.php",
                data: { idBill: idBill, qtProduct: qtProduct, idProduct: idProduct, unitPrice: unitPrice },
                success: function(response) {
                    // TODO: refresh list products bill (create ajax to list products bill)
                    Checkout.refreshListBillProducts(idBill);
                }
            })
        });
    },
    recupCurrentBill: () => {
        const code = localStorage.getItem("code") ?? "0000";
        $('#code-bill').html(code);
        $('#code-bill').attr('data-id-bill', localStorage.getItem("id_bill") ?? "0000");
        $('#code-bill').attr('data-id-code', code);
    },
    refreshListBillProducts: (idBill) => {
        $.ajax({
            type: "GET",
            url: "http://localhost:8081/list_product_bill.php",
            data: { idBill: idBill },
            success: function(response) {
                $('#bill_details tbody').html(response);
            }
        })
    }
}
