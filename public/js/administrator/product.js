$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    getAllCategory();
    getAllSuppliers();
    getAllProducts();
    getOutofStocks();
});

function getOutofStocks(){
    $.ajax({
        url:'api/outOfStocks',
        success:function(result){
            if(result.length > 0){
                Swal.fire({
                    icon:'info',
                    title:'Out of stock NOTICE!',
                    text:'We are running low on some of the items'
                })
            }
        }
    })
}

// GET CATEGORY FOR DROPDOWN
    function getAllCategory(){
        $.ajax({
        url: "api/getAllCategory",
        dataType:"json",
        method:"GET",
        success:function(response){
            var data = "";
            for(i=0;i<response.length;i++){
                data+="<option value='"+response[i].cat_id+"'>"+response[i].cat_name+"</option>"
            }
            $('#itemCategoryFilter').html(data)
            $('#itemCategory').html(data)
            $('#itemCategory2').html(data)
        },
        error:function(error){
            console.log(error)
        }
        })
    }
// GET CATEGORY FOR DROPDOWN

// GET SUPPLIER FOR DROPDOWN
    function getAllSuppliers(){
        $.ajax({
        url: "api/getAllSuppliers",
        dataType:"json",
        method:"GET",
        success:function(response){
            var data = "";
            for(i=0;i<response.length;i++){
                data+="<option value='"+response[i].supp_id+"'>"+response[i].supp_name+"</option>"
            }
            $('#itemSupplier').html(data)
            $('#itemSupplier2').html(data)
        },
        error:function(error){
            console.log(error)
        }
        })
    }
// GET SUPPLIER FOR DROPDOWN

// ADD PRODUCT
    $(document).ready(function () {
        $('#addProductForm').on( 'submit' , function(e){
            e.preventDefault();
            var currentForm = $('#addProductForm')[0];
            var data = new FormData(currentForm);
            $.ajax({
                url: "api/addProduct",
                type:"POST",
                method:"POST",
                dataType: "text",
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response == 1){
                        getAllProducts();
                        $('#addProduct').modal('hide');
                        $("#addProductForm").trigger("reset");
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'NEW CATEGORY HAS BEEN STORED',
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
// ADD PRODUCT

// GET PRODUCT
    function getAllProducts(){
        $.ajax({
            url: "api/getAllProducts",
            method: 'GET',
            success : function(data) {
                $("#getAllProducts").html(data);
            }
        })
    }
// GET PRODUCT

// SEARCH PRODUCT BY SERIAL NUMBER
    $(document).ready(function(){
        $('#searchProduct').bind('keyup', function() {
            var product = $(this).val();
            if(product != ''){
                $.ajax({
                    url: "api/searchProducts",
                    method: 'GET',
                    data: {certainProduct: product},
                    dataType: 'text',
                    success:function(data){
                        $('#getAllProducts').html(data);
                    }
                })
            }else{
                getAllProducts();
            }
        });
    });
// SEARCH PRODUCT BY SERIAL NUMBER

// SORT BY CATEGORY
    function itemCategoryFilter(category) {
        $.ajax({
            url: "api/sortByCategory",
            method: 'GET',
            data: {category: category},
            success: function (data) {
                $("#getAllProducts").html(data);
            }
        })
    }
// SORT BY CATEGORY

// DELETE PRODUCT
    function deleteProduct(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this product?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0C25B6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: 'api/deleteProduct',
            type: 'POST',
            dataType: 'json',
            data: {prod_id: id},
        });
        Swal.fire({
            title: 'Delete Successfully',
            text: "Product was delete successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
        if (result) {
            getAllProducts();
        }
        });
        }
        });
    }
// DELETE PRODUCT

// SHOW PRODUCT
    function updateProduct(id){
        $('#showProductModal').modal('show')
        $.ajax({
            url: 'api/showProduct',
            type: 'GET',
            dataType: 'json',
            data: {prod_id: id},
        })
        .done(function(response) {
            $('#catPhotos').attr("src",response[0].cat_photos)
            $('#itemSerialNumber').val(response[0].prod_serial)
            $('#itemName').val(response[0].prod_name)
            $('#itemQty').val(response[0].prod_qty)
            $('#itemCost').val(response[0].prod_cost)
            $('#itemPrice').val(response[0].prod_price)
            $('#itemDescription').val(response[0].prod_desc)
            $('#itemCategory2').val(response[0].category)
            $('#itemSupplier2').val(response[0].supplier)
            $('#prod_id').val(response[0].prod_id)
        })
    }
// SHOW PRODUCT

// UPDATE PRODUCT
    $(document).ready(function () {
        $('#updateProduct').on( 'submit' , function(e){
            e.preventDefault();
            var currentForm = $('#updateProduct')[0];
            var data = new FormData(currentForm);
            $.ajax({
                url: "api/updateProduct",
                type:"POST",
                method:"POST",
                dataType: "text",
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response == 1){
                        $('#showProductModal').modal('hide');
                        const input = document.getElementById("itemImage");
                        input.value = "";
                        getAllProducts();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'PRODUCT HAS BEEN UPDATED',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else if(response == 0){
                        // SOMETHING WRONG IN BACKEND
                        Swal.fire(
                        'Added Failed',
                        'Sorry product has not update',
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
// UPDATE PRODUCT
