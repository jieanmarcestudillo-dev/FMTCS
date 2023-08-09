
window.onload = loadOrders();

function loadOrders(){
    // Get the current URL
    var currentUrl = window.location.href;

    // Create a URL object
    var url = new URL(currentUrl);

    // Get the value of the "id" parameter
    var id = url.searchParams.get('id');

    $.ajax({
        url:'order/orderDetails',
        data:{
            orderId:id
        },
        success:function(result){
            document.getElementById('orderDetails').innerHTML = result.data;
            document.getElementById('getTotal').innerHTML = result.total;
        }
    })

}
