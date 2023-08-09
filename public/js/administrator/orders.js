$(document).ready(function(){
    newOrders();
    toShipOrders();
    toReceivedOrders();
    completedOrders();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// PENDING ORDERS
    function newOrders(){
        var table = $('#newOrdersTable').DataTable({
            "language": {
                "emptyTable": "No Orders Found"
            },
            "lengthChange": true,
            "scrollCollapse": true,
            "paging": true,
            "info": true,
            "responsive": true,
            "ordering": false,
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": 25,
            "ajax":{
                "url":"api/getNewOrders",
                "dataSrc": "",
            },
            "_columns": [
                { "data": "order_id" },
                { "data": "track_num" },
                { "data": "name" },
                { "data": "phone" },
                {"data": "created_at",
                "render": function(data) {
                return moment(data).format('MMM DD, YYYY | hh:mm A');
                },
                "targets": 1
                },
                {
                    "data": "order_id",
                    mRender: function (data, type, row) {
                        return '<button type="button" data-title="Ship This Order?" onclick=shipOrders(' + data + ') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3"><i class="bi bi-box"></i></button> <a type="button" onclick=viewOrders(' + data + ') data-title="View This Order?"  class="btn rounded-0 btn-outline-secondary btn-sm py-2 px-3"><i class="bi bi-view-stacked"></i></a>';
                    }
                }
            ],
            get "columns"() {
                return this["_columns"];
            },
            set "columns"(value) {
                this["_columns"] = value;
            },
            order: [[1, 'asc']],
        });
        table.on('order.dt search.dt', function () {
            let i = 1;
            table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                this.data(i++);
            });
        }).draw();
    }
// PENDING ORDERS

// TO SHIP ORDERS
    function toShipOrders(){
        var table = $('#toShipTable').DataTable({
            "language": {
                "emptyTable": "No Orders Found"
            },
            "lengthChange": true,
            "scrollCollapse": true,
            "paging": true,
            "info": true,
            "responsive": true,
            "ordering": false,
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": 25,
            "ajax":{
                "url":"api/getToShipOrders",
                "dataSrc": "",
            },
            "_columns": [
                { "data": "order_id" },
                { "data": "track_num" },
                { "data": "name" },
                { "data": "phone" },
                {"data": "created_at",
                "render": function(data) {
                return moment(data).format('MMM DD, YYYY | hh:mm A');
                },
                "targets": 1
                },
                {
                    "data": "order_id",
                    mRender: function (data, type, row) {
                        return '<button type="button" data-title="In Transit This Order?" onclick=inTransitOrders(' + data + ') class="btn rounded-0 btn-outline-success btn-sm py-2 px-3"><i class="bi bi-truck"></i></button> <a type="button" onclick=viewOrders(' + data + ') data-title="View This Order?"  class="btn rounded-0 btn-outline-secondary btn-sm py-2 px-3"><i class="bi bi-view-stacked"></i></a>';
                    }
                }
            ],
            get "columns"() {
                return this["_columns"];
            },
            set "columns"(value) {
                this["_columns"] = value;
            },
            order: [[1, 'asc']],
        });
        table.on('order.dt search.dt', function () {
            let i = 1;
            table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                this.data(i++);
            });
        }).draw();
    }
// TO SHIP ORDERS

// TO RECEIVED ORDERS
    function toReceivedOrders(){
        var table = $('#toReceivedTable').DataTable({
            "language": {
                "emptyTable": "No Orders Found"
            },
            "lengthChange": true,
            "scrollCollapse": true,
            "paging": true,
            "info": true,
            "responsive": true,
            "ordering": false,
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": 25,
            "ajax":{
                "url":"api/getToReceivedOrders",
                "dataSrc": "",
            },
            "_columns": [
                { "data": "order_id" },
                { "data": "track_num" },
                { "data": "name" },
                { "data": "phone" },
                {"data": "created_at",
                "render": function(data) {
                return moment(data).format('MMM DD, YYYY | hh:mm A');
                },
                "targets": 1
                },
                { "mData": function (data, type, row) {
                    return '<a type="button" onclick="viewOrders(' + data.order_id + ')" data-title="View This Order?" class="btn rounded-0 btn-outline-secondary btn-sm py-2 px-3"><i class="bi bi-view-stacked"></i></a> <a href="printOrders/' + data.order_id + '" role="button" data-title="Print This Order?" class="btn rounded-0 btn-outline-primary btn-sm py-2 px-3"><i class="bi bi-file-earmark"></i></a>';
                }},
            ],
            get "columns"() {
                return this["_columns"];
            },
            set "columns"(value) {
                this["_columns"] = value;
            },
            order: [[1, 'asc']],
        });
        table.on('order.dt search.dt', function () {
            let i = 1;
            table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                this.data(i++);
            });
        }).draw();
    }
// TO RECEIVED ORDERS

// TO COMPLETED ORDERS
    function completedOrders(){
        var table = $('#completedOrdersTable').DataTable({
            "language": {
                "emptyTable": "No Orders Found"
            },
            "lengthChange": true,
            "scrollCollapse": true,
            "paging": true,
            "info": true,
            "responsive": true,
            "ordering": false,
            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
            "iDisplayLength": 25,
            "ajax":{
                "url":"api/getCompletedOrders",
                "dataSrc": "",
            },
            "_columns": [
                { "data": "order_id" },
                { "data": "track_num" },
                { "data": "name" },
                { "data": "phone" },
                {"data": "created_at",
                "render": function(data) {
                return moment(data).format('MMM DD, YYYY | hh:mm A');
                },
                "targets": 1
                },
                { "mData": function (data, type, row) {
                    return '<a type="button" onclick="viewOrders(' + data.order_id + ')" data-title="View This Order?" class="btn rounded-0 btn-outline-secondary btn-sm py-2 px-3"><i class="bi bi-view-stacked"></i></a> <a href="printOrders/' + data.order_id + '" role="button" data-title="Print This Order?" class="btn rounded-0 btn-outline-primary btn-sm py-2 px-3"><i class="bi bi-file-earmark"></i></a>';
                }},

            ],
            get "columns"() {
                return this["_columns"];
            },
            set "columns"(value) {
                this["_columns"] = value;
            },
            order: [[1, 'asc']],
        });
        table.on('order.dt search.dt', function () {
            let i = 1;
            table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                this.data(i++);
            });
        }).draw();
    }
// TO COMPLETED ORDERS

// UPDATE TO SHIP ORDERS
    function shipOrders(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to ship this order?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0C25B6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, continue'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: 'api/toShipOrders',
            type: 'POST',
            dataType: 'json',
            data: {order_id: id},
        });
        Swal.fire({
            title: 'Ship Successfully',
            text: "Orders was ship successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
        if (result) {
            $('#newOrdersTable').DataTable().ajax.reload();
        }
        });
        }
        });
    }
// UPDATE TO SHIP ORDERS


// UPDATE TO SHIP ORDERS
    function inTransitOrders(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "In Transit this order?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0C25B6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, continue'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: 'api/toReceivedOrders',
            type: 'POST',
            dataType: 'json',
            data: {order_id: id},
        });
        Swal.fire({
            title: 'In Transit Successfully',
            text: "Orders was in transit successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
        if (result) {
            $('#toShipTable').DataTable().ajax.reload();
        }
        });
        }
        });
    }
// UPDATE TO SHIP ORDERS


// VIEW ORDERS
    function viewOrders(order_id){
        localStorage.setItem('orderId', order_id);
        window.location.href = '/viewOrderDetails';
    }
// VIEW ORDERS