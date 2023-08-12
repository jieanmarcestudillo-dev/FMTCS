window.onload = function(){
	// Get the current URL
    var currentUrl = window.location.href;

    // Create a URL object
    var url = new URL(currentUrl);

    // Get the value of the "id" parameter
    var text = url.searchParams.get('text');

    if(text !== null){
    	loadSearchProducts(JSON.parse(text));
    }else{
    	loadProducts();
    }
	
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
				let price = number_format(data[x].prod_price);
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="margin: 0 auto; object-fit:contain; height:100px;">
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

function loadSearchProducts(text){
	$.ajax({
		url:'/products/getSearch',
		data:{
			text:text
		},
		success:function(data){

			let size = Object.keys(data).length;
			let productCard = "";
			let product = document.getElementById('products_content');
			let id = 0;
		
			for(let x = 0; x < size; x++){
				let price = number_format(data[x].prod_price);
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="margin: 0 auto; object-fit:contain; height:100px;">
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

function view_product_details(id){
	$.ajax({
		url:'/products/getProduct',
		data:{
			product_id:id
		},
		success:function(data){
			console.log(data);
			let path = data[0].prod_pic;
			document.getElementById('details_id').value = data[0].prod_id;
			document.getElementById('details_img').src = path;
			document.getElementById('details_price').innerHTML = number_format(data[0].prod_price);
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
			let category = document.getElementById('category_list');

			let result = `<li><a onclick="loadFilteredProducts(0)">All</a></li>`;
			let size = Object.keys(data).length;

			for(let x = 0; x < size; x++){
				result += `<li><a onclick="loadFilteredProducts(${data[x].cat_id})">${data[x].cat_name}</a></li>`;
			}
			category.innerHTML = result;
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
				let price = number_format(data[x].prod_price);
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="margin: 0 auto; object-fit:contain; height:100px;">
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

function sort_products(value){
	$.ajax({
		url:'/products/getSorted',
		data:{
			id:value
		},
		success:function(data){

			let size = Object.keys(data).length;
			let productCard = "";
			let product = document.getElementById('products_content');
			let id = 0;
			for(let x = 0; x < size; x++){
				let price = number_format(data[x].prod_price);
				id = data[x].prod_id;
				 productCard += `
					<div class="card m-3 p-3 flex-grow-1" style="width:200px;">
					    <img src="${data[x].prod_pic}" class="card-img-top" alt="Card Image" style="margin: 0 auto; object-fit:contain; height:100px;">
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

function addToCart(){

	$.ajax({
		url:'/checkAuthenticated',
		success:function(result){
			if(result.message != 'success'){
				location.replace('login');
			}else{
				cart_function();
			}
		}
	})
}

function cart_function(){
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

		$.ajax({
			url:'/products/getDetailsById',
			data:{
				id:id
			},
			success:function(result){
				let object = {
					item_id:id,
					item_qty:qty,
					item_price:result[0].prod_price,
					item_name:result[0].prod_name,
					item_pic:result[0].prod_pic
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
		})
	}
	console.log(localStorage.getItem('cart'));
}

function number_format(value){

	const formatter = new Intl.NumberFormat('fil-PH', {
	  style: 'currency',
	  currency: 'PHP', // Philippine Peso
	});

	const formattedNumber = formatter.format(value);

	return formattedNumber;
}