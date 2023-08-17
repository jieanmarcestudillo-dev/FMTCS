document.getElementById('processOrderBtn').click();

window.onload = loadShoppingCart();

function loadShoppingCart(){

	let item = JSON.parse(localStorage.getItem('cart'));
	let checkout = document.getElementById('cartCheckout');
	

	let cartList = document.getElementById('cartList');

	let data = '';
	let subtotal = 0;
	let price = 0;
	let qty = 0;
	let total = 0;
	let shipping_fee = 100;
	console.log(localStorage);

	if(localStorage.length > 0){
		localStorage.setItem('fee',shipping_fee);
		console.log(2);
		let size = item.length;
		if(size > 0){
			for(let x = 0; x < size; x++){

				subtotal = number_format(parseInt(item[x].item_qty) * parseInt(item[x].item_price));
				total += parseInt(item[x].item_qty) * parseInt(item[x].item_price);
				price = number_format(item[x].item_price);
				qty = item[x].item_qty;
				data += `
				<tr>
					<td>
						<div class="row">
							<div class="col-4">
								<img src="${item[x].item_pic}" height="50px;">
							</div>
							<div class="col-8">
								<p>${item[x].item_name}</p>
								<small class="text-muted" style="position:relative; top: -17px;">${item[x].item_name}</small>
							</div>
						</div>
					</td>
					<td>
						<span>${price}</span>
					</td>
					<td>
						<div class="input-group d-flex flex-wrap">
							<button class="btn btn-light" type="button" onclick="minusCart(${item[x].item_id})" style="border-top-left-radius: 50%; border-bottom-left-radius: 50%; border: 1px solid #7f7d7d; border-right:none">-</button>
							<input type="number" class="bg-light" value="${qty}" disabled id="product_count" style="border: 1px solid #7f7d7d; width:45px; text-align: right;padding-left:10px;">
							<button class="btn btn-light" style="border-top-right-radius: 50%; border-bottom-right-radius: 50%; border: 1px solid #7f7d7d; border-left:none" type="button" onclick="addedCart(${item[x].item_id})">+</button>
						</div>
					</td>
					<td><span>${subtotal}</span></td>
				</tr>
				`;
				document.getElementById('total_price').innerHTML = number_format(total);
				document.getElementById('final_price').innerHTML = number_format(total + shipping_fee);
				cartList.innerHTML = data;
			}
			localStorage.setItem('total',total);
			checkout.style.display = 'block';
		}else{
			cartList.innerHTML = '';
			checkout.style.display = 'none';
		}
	}else{
		cartList.innerHTML = '';
		checkout.style.display = 'none';
	}
	
}

function addedCart(id){
	if(localStorage.getItem('cart')){
								//check if the item id exists on the cart
		let cart = JSON.parse(localStorage.getItem('cart'));
		for(let x = 0; x < cart.length; x++){
									//if found, then increment the qty
			if(cart[x].item_id == id){
				cart[x].item_qty = 1 + parseInt(cart[x].item_qty);
				localStorage.setItem('cart',JSON.stringify(cart));
				break;
			}
		}

		loadShoppingCart();
	}
}

function minusCart(id){
								//check if the item id exists on the cart
	let cart = JSON.parse(localStorage.getItem('cart'));
	for(let x = 0; x < cart.length; x++){
									//if found, then increment the qty
		if(cart[x].item_id == id){

			if(cart[x].item_qty == 1){
					//remove
				cart.splice(x,1);
				localStorage.setItem('cart',JSON.stringify(cart));
			}else{
					//decrease
				cart[x].item_qty = parseInt(cart[x].item_qty) - 1;
				localStorage.setItem('cart',JSON.stringify(cart));
			}
			break;
		}
	}

	loadShoppingCart();
}

function number_format(value){

	const formatter = new Intl.NumberFormat('fil-PH', {
	  style: 'currency',
	  currency: 'PHP', // Philippine Peso
	});

	const formattedNumber = formatter.format(value);

	return formattedNumber;
}

function check_out(){
	let payment_type = document.getElementById('payment_type').value;
	let total = parseInt(localStorage.getItem('total'));
	let orders = localStorage.getItem('cart');
	let shipping_fee = parseInt(localStorage.getItem('fee'));
	total += shipping_fee;
	console.log(total);
	if(payment_type == 0){
		Swal.fire({
			icon:'warning',
			title:'Process Failed!',
			text:'Select your payment method'
		})
	}else if(payment_type == 1){

		$.ajax({
			url:'order/processOrder',
			data:{
				total:total,
				order:orders,
				payment:'COD'
			},
			success:function(result){

				if(result.message == 'success'){
					localStorage.clear();
					loadShoppingCart();
					Swal.fire({
						icon:'success',
						title:'Process Succeed',
						text:'Order has been processed'
					})
				}else{
					Swal.fire({
						icon:'error',
						title:'Process Failed',
						text:'Something went wrong'
					})
				}
			}
		})
	}else{
		document.getElementById('checkOutBtn').disabled = true;
		$.ajax({
			url:'/order/onlinePayment',
			data:{
				total:total
			},
			success:function(result){
				console.log(result);
				location.replace(result.url);
			}
		})
	}
}

function check_out2(){
	let total = parseInt(localStorage.getItem('total'));
	let orders = localStorage.getItem('cart');
	let shipping_fee = parseInt(localStorage.getItem('fee'));
	total += shipping_fee;
	console.log(total);
	
		$.ajax({
			url:'order/processOrder',
			data:{
				total:total,
				order:orders,
				payment:'ONLINE'
			},
			success:function(result){

				if(result.message == 'success'){
					localStorage.clear();
					loadShoppingCart();
					Swal.fire({
						icon:'success',
						title:'Process Succeed',
						text:'Order has been processed'
					})
				}else{
					Swal.fire({
						icon:'error',
						title:'Process Failed',
						text:'Something went wrong'
					})
				}
			}
		})
}