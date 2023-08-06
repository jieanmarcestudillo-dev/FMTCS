$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    getAllCategory();
    getAllSuppliers();
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
