$(document).ready(function(){
    totalSales();
    totalProductsSold();
    totalProducts();
    graph();
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

// FUNCTION FOR SHOW TOTAL PRODUCT
    function totalProducts(){
        $.ajax({
            url: 'api/totalProducts',
            method: 'GET',
            success : function(data) {
                $("#totalProducts").html(data);
            }
        })
    }
// FUNCTION FOR SHOW TOTAL PRODUCT


// GRAPH
    function graph(){
        $.ajax({
            url: 'api/graph',
            method: 'GET',
            success : function(data) {
                if(data != ""){
                    const ctx = document.getElementById('soldItems').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                        labels: data.months,
                        datasets: [{
                            label: 'Sales Per Month',
                            data : data.sales,
                            borderWidth: 1,
                            backgroundColor: [
                                '#0C25B6',
                            ],
                            borderColor: [
                                '#0c26b65e',
                            ],
                        }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max:10000
                                },
                                }
                        }
                    });
                }else{
                    var target = document.getElementById("visualization");
                    target.innerHTML += "<div class='text-danger fs-4 text-center' style='position:absolute; top:19rem; width:100%' role='alert'>NO DATA AVAILABLE</div>";
                }
            }
        })
    }
// GRAPH
