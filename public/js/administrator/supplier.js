$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    getAllSuppliers();
});

// GET SUPPLIER
    function getAllSuppliers(){
        var table = $('#supplierTable').DataTable({
            "language": {
                "emptyTable": "No Supplier Found"
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
                "url":"api/getAllSuppliers",
                "dataSrc": "",
            },
            "_columns": [
                { "data": "supp_id" },
                { "data": "supp_name" },
                { "data": "supp_address" },
                { "data": "supp_contact" },
                { "data": "supp_email" },
                {"data": "supp_id",
                mRender: function (data, type, row) {
                return '<button type="button" data-title="Edit Supplier?" onclick=updateSupplier('+data+') class="btn rounded-0 btn-outline-secondary btn-sm px-3 py-2"><i class="bi bi-pencil-square"></i></button> <button data-title="Remove This Supplier?" type="button" onclick=deleteSupplier('+data+') class="btn rounded-0 btn-outline-danger btn-sm px-3 py-2"><i class="bi bi-trash"></i></button>'
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
// GET SUPPLIER

// ADD SUPPLIER
    $(document).ready(function () {
        $('#addSupplierForm').on( 'submit' , function(e){
            e.preventDefault();
            var currentForm = $('#addSupplierForm')[0];
            var data = new FormData(currentForm);
            $.ajax({
                url: "api/addSupplier",
                type:"POST",
                method:"POST",
                dataType: "text",
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response == 1){
                        $('#addSupplier').modal('hide');
                        $("#addSupplierForm").trigger("reset");
                        $('#supplierTable').DataTable().ajax.reload();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'NEW SUPPLIER HAS BEEN STORED',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else if(response == 0){
                        Swal.fire(
                        'Added Failed',
                        'Sorry category has not stored',
                        'error'
                        )
                    }
                },
                error:function(error){
                    console.log(error)
                }
            })
        });
    });
// ADD SUPPLIER

// DELETE SUPPLIER
    function deleteSupplier(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this supplier?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0C25B6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: 'api/deleteSupplier',
            type: 'POST',
            dataType: 'json',
            data: {suppId: id},
        });
        Swal.fire({
            title: 'Delete Successfully',
            text: "Supplier was delete successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
        if (result) {
            $('#supplierTable').DataTable().ajax.reload();
        }
        });
        }
        });
    }
// DELETE CATEGORY

// SHOW SUPPLIER
    function updateSupplier(id){
        $('#updateSupplierModal').modal('show')
        $.ajax({
            url: 'api/getSupplier',
            type: 'GET',
            dataType: 'json',
            data: {suppId: id},
        })
        .done(function(response) {
            $('#supp_id').val(response[0].supp_id)
            $('#fullname').val(response[0].supp_name)
            $('#contact').val(response[0].supp_contact)
            $('#email').val(response[0].supp_email)
            $('#address').val(response[0].supp_address)
        })
    }
// SHOW SUPPLIER

// UPDATE SUPPLIER
    $(document).ready(function () {
        $('#updateSupplier').on( 'submit' , function(e){
            e.preventDefault();
            var currentForm = $('#updateSupplier')[0];
            var data = new FormData(currentForm);
            $.ajax({
                url: "api/updateSupplier",
                type:"POST",
                method:"POST",
                dataType: "text",
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response == 1){
                        $('#updateSupplierModal').modal('hide');
                        $('#supplierTable').DataTable().ajax.reload();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'SUPPLIER HAS BEEN UPDATED',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else if(response == 0){
                        // SOMETHING WRONG IN BACKEND
                        Swal.fire(
                        'Added Failed',
                        'Sorry supplier has not update',
                        'error'
                        )
                    }
                },
                error:function(error){
                    console.log(error)
                }
            });
        });
    });
// UPDATE SUPPLIER
