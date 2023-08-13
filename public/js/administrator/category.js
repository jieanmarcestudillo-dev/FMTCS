$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    getAllCategories();
});

// GET CATEGORY
    function getAllCategories(){
        $.ajax({
            url: "api/getAllCategories",
            method: 'GET',
            success : function(data) {
                $("#getAllCategories").html(data);
            }
        })
    }
// GET CATEGORY

// ADD CATEGORY
    $(document).ready(function () {
        $('#addCategoryForm').on( 'submit' , function(e){
            e.preventDefault();
            var currentForm = $('#addCategoryForm')[0];
            var data = new FormData(currentForm);
            $.ajax({
                url: "api/addCategory",
                type:"POST",
                method:"POST",
                dataType: "text",
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response == 1){
                        $('#addCategory').modal('hide');
                        getAllCategories();
                        $("#addCategoryForm").trigger("reset");
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
// ADD CATEGORY

// DELETE CATEGORY
    function deleteCategory(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this category?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0C25B6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            url: 'api/deleteCategory',
            type: 'POST',
            dataType: 'json',
            data: {catId: id},
        });
        Swal.fire({
            title: 'Delete Successfully',
            text: "Category was deactivate successfully",
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        }).then((result) => {
        if (result) {
            getAllCategories();
        }
        });
        }
        });
    }
// DELETE CATEGORY

// SHOW CATEGORY
    function showCategory(id){
        $('#showCategoryModal').modal('show')
        $.ajax({
            url: 'api/showCategory',
            type: 'GET',
            dataType: 'json',
            data: {catId: id},
        })
        .done(function(response) {
            $('#cat_id').val(response[0].cat_id)
            $('#catPhotos').attr("src",response[0].cat_photos)
            $('#categoryPhotos').attr("src",response[0].cat_photos)
            $('#categoryName').val(response[0].cat_name)
        })
    }
// SHOW CATEGORY

// UPDATE CATEGORY
    $(document).ready(function () {
    $('#updateCategoryForm').on( 'submit' , function(e){
        e.preventDefault();
        var currentForm = $('#updateCategoryForm')[0];
        var data = new FormData(currentForm);
        $.ajax({
            url: "api/updateCategory",
            type:"POST",
            method:"POST",
            dataType: "text",
            data:data,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                if(response == 1){
                    $('#showCategoryModal').modal('hide');
                    const input = document.getElementById("categoryPhotos");
                    input.value = "";
                    getAllCategories();
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'CATEGORY HAS BEEN UPDATED',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else if(response == 0){
                    // SOMETHING WRONG IN BACKEND
                    Swal.fire(
                    'Added Failed',
                    'Sorry category has not update',
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
// UPDATE CATEGORY
