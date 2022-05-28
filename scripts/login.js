const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
let evento;

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

const signup_button =document.querySelector('#button-signup');
signup_button.addEventListener('click',signup);
const signup_inputs = document.querySelectorAll('.sign-up-container input');
const errore_user= document.querySelector('#username');
errore_user.addEventListener('blur',checkUser);
const errore_pswd = document.querySelector('#password');
errore_pswd.addEventListener('blur',checkPswd);
for(let input of signup_inputs){
	input.addEventListener('blur',validazionejs);
	input.addEventListener('focus',reset);
}
function validazionejs(event){
	if(!event.currentTarget.value)
		event.currentTarget.parentNode.querySelector('.vuoto').classList.remove('hidden');
}
function reset(event){
	if(event.currentTarget.parentNode.querySelector('.vuoto'))
	event.currentTarget.parentNode.querySelector('.vuoto').classList.add('hidden');
	if(event.currentTarget.parentNode.querySelector('.errore'))
	event.currentTarget.parentNode.querySelector('.errore').classList.add('hidden');
}
function checkUser(event){
	if(event.currentTarget.value){
		evento = event.currentTarget;
		const stringa_fetch = 'http://localhost/hw1/checkUser.php?user=' +event.currentTarget.value;
		fetch(stringa_fetch).then(onResponse).then(HandErrore);
	}
}
function onResponse(response){
	return response.text();
}
function HandErrore(text){
	if(text === '1')
		evento.parentNode.querySelector('.errore').classList.remove('hidden');
}
function checkPswd(event){
	if(event.currentTarget.value){
		let pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,16}$/ ;
		if(!pattern.test(event.currentTarget.value))
			event.currentTarget.parentNode.querySelector('.errore').classList.remove('hidden');
	}
}

function signup(event){
	const form_data = new FormData();
	evento = event.currentTarget;
	const inputs= event.currentTarget.parentNode.parentNode.querySelectorAll('input');
	const key = new Array('name','surname','username','password');
	for(i=0;i<4;i++){
    	form_data.append(key[i],inputs[i].value);
	}
	fetch("http://localhost/hw1/signup.php", {method: 'post', body: form_data, mode: 'no-cors'}).then(onResponse).then(onSignup);
}

function onSignup(text){
	if(text === '1')
		evento.parentNode.querySelector('.vuoto').classList.remove('hidden');
	else if(text === '2')
		evento.parentNode.querySelector('.errore').classList.remove('hidden');
	else window.location.replace('http://localhost/hw1/home.php');
}