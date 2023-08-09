function searchProduct(){
	let value = document.getElementById('search_product_input').value;
	
	if(isAlphanumericWithSpaces(value)){
		var url = '/viewProducts?text=' + JSON.stringify(value);
    	location.replace(url);
	}else{
		Swal.fire({
			icon:'error',
			title:'Invalid Input',
			text:'Only alphabets, numbers and spaces are allowed'
		})
	}
	
}

function isAlphanumericWithSpaces(string) {
  for (var i = 0; i < string.length; i++) {
    var character = string[i];
    if (
      !(
        (character >= 'a' && character <= 'z') ||
        (character >= 'A' && character <= 'Z') ||
        (character >= '0' && character <= '9') ||
        character === ' '
      )
    ) {
      return false;
    }
  }
  return true;
}