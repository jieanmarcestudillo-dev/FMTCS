$(document).ready(function(){
    totalSales();
    totalProductsSold();
    totalProducts();
});


// FUNCTION FOR SHOW TOTAL UPCOMING OPERATION
    function totalSales(){
        $.ajax({
            url: 'api/totalSales',
            method: 'GET',
            success : function(data) {
                $("#totalSales").html(data);
            }
        })
    }
// FUNCTION FOR SHOW TOTAL UPCOMING OPERATION

// FUNCTION FOR SHOW TOTAL COMPLETED OPERATION
    function totalProductsSold(){
        $.ajax({
            url: 'api/totalProductsSold',
            method: 'GET',
            success : function(data) {
                $("#totalProductsSold").html(data);
            }
        })
    }
// FUNCTION FOR SHOW TOTAL COMPLETED OPERATION

// FUNCTION FOR SHOW TOTAL FOREMAN
    function totalProducts(){
        $.ajax({
            url: 'api/totalProducts',
            method: 'GET',
            success : function(data) {
                $("#totalProducts").html(data);
            }
        })
    }
// FUNCTION FOR SHOW TOTAL FOREMAM
