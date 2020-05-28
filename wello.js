
function validateForm(){

  const input_uname = document.getElementById("uname");
  const input_psw = document.getElementById("psw");
  const input_error = document.querySelector(".error-input");
  
  if(input_uname.value.trim() == null || input_uname.value.trim() == ''){
    input_error.innerText = 'Vänligen ange ett användarnamn.'
    setTimeout(function(){
			input_error.innerText = ''
		}, 3000);
    return false; 
  }

  if(input_psw.value.trim() == null || input_psw.value.trim() == ''){
    input_error.innerText = 'Vänligen ange ett lösenord.'
    setTimeout(function(){
			input_error.innerText = ''
		}, 3000);
    return false;
  }


  if(input_uname.value.match(/\d+/g) || input_uname.value.match(/\s/g) ){
		input_error.innerText = 'Ditt namn får inte innehålla siffror eller mellanslag.'
		setTimeout(function(){
			input_error.innerText = ''
		}, 3000);
		return false;
  }
  
	if(input_uname.value.length < 5){
		input_error.innerText = 'Ditt namn måste innehålla minst 5 tecken.'
		setTimeout(function(){
			input_error.innerText = ''
		}, 3000);
		return false;
  }

  if(input_psw.value.length < 5){
		input_error.innerText = 'Ditt lösenord måste innehålla minst 5 tecken.'
		setTimeout(function(){
			input_error.innerText = ''
		}, 3000);
		return false;
  }
}


