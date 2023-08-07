$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    getAllCategory();
    getAllSuppliers();
    getAllProducts();
});

// GET CATEGORY FOR DROPDOWN
    function getAllCategory(){
        $.ajax({
        url: "api/getAllCategory",
        dataType:"json",
        method:"GET",
        success:function(response){
            var data = "";
            data+="<option selected>Choose Here</option>";
            for(i=0;i<response.length;i++){
                data+="<option value='"+response[i].cat_id+"'>"+response[i].cat_name+"</option>"
            }
            $('#itemCategoryFilter').html(data)
            $('#itemCategory').html(data)
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
            data+="<option selected>Choose Here</option>";
            for(i=0;i<response.length;i++){
                data+="<option value='"+response[i].supp_id+"'>"+response[i].supp_name+"</option>"
            }
            $('#itemSupplier').html(data)
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
