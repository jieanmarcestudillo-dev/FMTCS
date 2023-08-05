window.onload = function(){
	loadProducts();
	loadFilters();
}

function addCount(){
	let details = document.getElementById('product_count'); 
	details.value = parseInt(details.value) + 1;
}

function minusCount(){
	let details = document.getElementById('product_count'); 
	if(details.value > 0){
		details.value = parseInt(details.value) - 1;
	}
}

function loadProducts(){
	$.ajax({
		url:'/products/getAll',
		success:function(data){

			let size = Object.keys(data).length;
			let productCard = "";
			let product = document.getElementById('products_content');
			let id = 0;
			for(let x = 0; x < size; x++){
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="/image/products/${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="max-width: 200px; margin: 0 auto">
					    <div class="card-body text-center">
					        <h2 class="card-text text-center mt-0 fs-4 fw-bold">${data[x].prod_name}</h2>
					        <p class="text-muted">${data[x].cat_name}</p>
					        <h2 style="color:#0C25B6">Php ${data[x].prod_price}</h2>
					        <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0" onclick="view_product_details(${id})" data-bs-toggle="modal" data-bs-target="#addModal">View Product Details</button>
					    </div>
					</div>
					`;
			}
			product.innerHTML = productCard;
		}
	})
}

function view_product_details(id){
	$.ajax({
		url:'/products/getProduct',
		data:{
			product_id:id
		},
		success:function(data){
			console.log(data);
			let path = '/image/products/' + data[0].prod_pic;
			document.getElementById('details_id').value = data[0].prod_id;
			document.getElementById('details_img').src = path;
			document.getElementById('details_price').innerHTML = data[0].prod_price;
			document.getElementById('details_name').innerHTML = data[0].prod_name;
			document.getElementById('details_description').innerHTML = data[0].prod_desc
			document.getElementById('details_stock').innerHTML = data[0].prod_qty;
			document.getElementById('details_category').innerHTML = data[0].cat_name;
		}
	})
}

function loadFilters(){
	$.ajax({
		url:'category/getAll',
		success:function(data){
			let categories = document.getElementById('product_filter');

			let result = "<option value='0'>All</option>";
			let size = Object.keys(data).length;

			for(let x = 0; x < size; x++){
				result += `<option value="${data[x].cat_id}">${data[x].cat_name}</option>`;
			}
			categories.innerHTML = result;
		}
	})
}

function loadFilteredProducts(value){
	$.ajax({
		url:'/products/getByCategory',
		data:{
			category_id:value
		},
		success:function(data){

			let size = Object.keys(data).length;
			let productCard = "";
			let product = document.getElementById('products_content');
			let id = 0;
			for(let x = 0; x < size; x++){
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="/image/products/${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="max-width: 200px; margin: 0 auto">
					    <div class="card-body text-center">
					        <h2 class="card-text text-center mt-0 fs-4 fw-bold">${data[x].prod_name}</h2>
					        <p class="text-muted">${data[x].cat_name}</p>
					        <h2 style="color:#0C25B6">Php ${data[x].prod_price}</h2>
					        <button type="button" style="background-color:#0C25B6" class="btn text-white rounded-0" onclick="view_product_details(${id})" data-bs-toggle="modal" data-bs-target="#addModal">View Product Details</button>
					    </div>
					</div>
					`;
			}
			product.innerHTML = productCard;
		}
	})
}

function addToCart(){
	let id = document.getElementById('details_id').value;
	let qty = document.getElementById('product_count').value;
	let price = document.getElementById('details_price').textContent;
	let closeBtn = document.getElementById('details_close_btn');

	if(qty == 0){
		Swal.fire({
			icon:'error',
			title:'Failed',
			text:'Quantity cannot be 0'
		})
	}else{

		let object = {
			item_id:id,
			item_qty:qty,
			item_price:price
		}

		//check if the cart is already created
		if(localStorage.getItem('cart')){
			let found = true;
			//check if the item id exists on the cart
			let cart = JSON.parse(localStorage.getItem('cart'));
			for(let x = 0; x < cart.length; x++){
				//if found, then increment the qty
				if(cart[x].item_id == id){
					cart[x].item_qty = parseInt(qty) + parseInt(cart[x].item_qty);
					localStorage.setItem('cart',JSON.stringify(cart));
					found = false;
					break;
				}
			}

			//if the id has not match add the object to the array object
			if(found){
				cart.push(object);
				localStorage.setItem('cart',JSON.stringify(cart));
			}
		}else{
			//insert the object to the cart as you create a new one

			let arr = [];
			arr.push(object);

			localStorage.setItem('cart',JSON.stringify(arr));
		}

		document.getElementById('product_count').value = 0;
		closeBtn.click();
		Swal.fire({
			icon:'success',
			title:'Success!',
			text:'Product added successful'
		})
	}
	
}