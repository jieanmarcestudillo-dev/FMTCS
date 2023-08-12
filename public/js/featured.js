window.onload = loadTopSales();

function loadTopSales(){
	$.ajax({
		url:'/products/getTopSales',
		success:function(data){

			let size = Object.keys(data).length;
			let productCard = "";
			let product = document.getElementById('featured_content');
			let id = 0;
					
			for(let x = 0; x < size; x++){
				let price = number_format(data[x].prod_price);
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="margin: 0 auto; object-fit:contain; max-height:100px;">
					    <div class="card-body text-center">
					        <h2 class="single-line-text card-text text-center mt-0 fs-4 fw-bold">${data[x].prod_name}</h2>
					        <p class="text-muted single-line-text">${data[x].cat_name}</p>
					        <h3 style="color:#0C25B6;" class="single-line-text" >${price}</h3>
					        <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0" onclick="view_product_details(${id})" data-bs-toggle="modal" data-bs-target="#addModal">View Product Details</button>
					    </div>
					</div>
					`;
			}
			product.innerHTML = productCard;
		}
	})
}