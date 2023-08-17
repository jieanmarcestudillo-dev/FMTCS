
window.onload = loadOrders();

function loadOrders(){
   var table = $('#myTable').DataTable();
    table.destroy();

    // Initialize the DataTable again
    table = $('#myTable').DataTable({
        ajax: {
            url: '/order/userOrder',
            dataSrc: ''
        },
        columns: [
            {data: 'track_num'},
            {data: 'name'},
            {data: 'amount'},
            {data: 'date'},
            {data: 'status'},
            {data: 'payment'},
            {data: 'action'}
        ]
    });
}

function orderDelivered(id){
    $.ajax({
        url:'/order/orderDelivered',
        data:{
            order_id:id
        },
        success:function(result){
            if(result){
                loadOrders();
                Swal.fire({
                    icon:'success',
                    title:'Process Success!',
                    text:'Order Updated'
                })
            }else{

                Swal.fire({
                    icon:'error',
                    title:'Process Failed!',
                    text:'Something went wrong'
                })
            }
        }
    })
}

function viewOrders(id){
    var url = '/viewUserOrderDetails?id=' + id;
    location.replace(url);

}