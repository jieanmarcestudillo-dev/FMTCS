$(document).ready(function(){
    newOrders();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// FETCH ACTIVE EMPLOYEES FOR TABLES
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
                { "data": "name" },
                { "data": "email" },
                { "data": "lastname" },
                { "data": "created_at" },
                {
                    "data": "order_id ",
                    mRender: function (data, type, row) {
                        return '<button type="button" data-title="Ship This Order?" onclick=shipOrders(' + data + ') class="btn rounded-0 btn-outline-secondary btn-sm py-2 px-3"><i class="bi bi-pencil-square"></i></button> <button type="button" data-title="Deactivate This?" onclick=deactivateEmployees(' + data + ') class="btn rounded-0 btn-outline-danger btn-sm py-2 px-3"><i class="bi bi-archive-fill"></i></button> <a href="viewDetails/' + data + '" class="btn rounded-0 btn-outline-primary btn-sm py-2 px-3" data-title="View Details?"><i class="bi bi-filetype-pdf"></i></a>';
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
// FETCH ACTIVE EMPLOYEES FOR TABLES
