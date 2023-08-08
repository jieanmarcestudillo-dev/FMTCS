$(document).ready(function(){
    getCustomer();
    getOrderDetails();
    getTotal();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


// GET THE CUSTOMER
    function getCustomer(){
        var orderId = localStorage.getItem('orderId');
        $.ajax({
            url: 'api/getCustomer',
            type: 'GET',
            dataType: 'json',
            data: {orderId: orderId},
        })
        .done(function(response) {
            $('#name').text(response.name)
            $('#address').text(response.address)
            $('#phone').text(response.phone)
            $('#orderDate').text(moment(response.created_at).format('MMM DD, YYYY - hh:mm A'))
        })
    }
// GET THE CUSTOMER

// GET ORDERS
    function getOrderDetails(){
        var orderId = localStorage.getItem('orderId');
        $.ajax({
            url: 'api/getOrderDetails',
            type: 'GET',
            data: {orderId: orderId},
            success : function(data) {
                $("#getAllOrders").html(data);
            }
        })
        // var table = $('#orderDetailsTable').DataTable({
        //     "language": {
        //         "emptyTable": "No Supplier Found"
        //     },
        //     "lengthChange": true,
        //     "scrollCollapse": true,
        //     "paging": true,
        //     "info": true,
        //     "responsive": true,
        //     "ordering": false,
        //     "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        //     "iDisplayLength": 25,
        //     "ajax": {
        //         "url": "api/getOrderDetails",
        //         "data": { orderId: orderId },
        //     },
        //     "columns": [
        //         { "data": "order_details_id" },
        //         { "data": "prod_name" },
        //         { "data": "prod_name" },
        //         { "data": "prod_price" },
        //         { "data": "qty" },
        //         { "data": "total" }
        //     ],
        //     "order": [[1, 'asc']]
        // });

        // table.on('order.dt search.dt', function () {
        //     let i = 1;
        //     table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
        //         this.data(i++);
        //     });
        // }).draw();
    }
// GET ORDERS

// GET AMOUNT
    function getTotal(){
        var orderId = localStorage.getItem('orderId');
        $.ajax({
            url: 'api/getTotal',
            type: 'GET',
            data: {orderId: orderId},
            success : function(data) {
                $("#getTotal").text(data);
            }
        })
    }
// GET AMOUNT
