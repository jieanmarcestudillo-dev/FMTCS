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
