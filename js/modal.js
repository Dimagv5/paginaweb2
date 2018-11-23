let modal = document.getElementById('modal');
let img = document.getElementById('modal-img');
let imagenes = document.getElementsByClassName('gallery-img');
let boton = document.getElementById('modal-button');

for(let i = 0; i < imagenes.length; i++){
	imagenes[i].addEventListener('click', function(e){
		modal.classList.toggle('modal-open');
		let src = e.target.src;
		img.setAttribute('src', src);
	});
}

boton.addEventListener('click', function(){
	modal.classList.toggle('modal-open');
});