/*-----------------------------------VALIDAR FORMULARIO REGISTRO------------------------------------- */

const formulario = document.getElementById('formulario__register');
const formularioLogin = document.getElementById('formulario__login');
const inputs = document.querySelectorAll('#formulario__register input');
const inputsLogin = document.querySelectorAll('#formulario__login input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{6,12}$/, // 6 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos ={
	nombre:false,
	apellido:false,
	correo:false,
	password:false,

}

const validarFormulario = (e) =>{
	switch(e.target.name){
		case "nombreR":
			validarcampo(expresiones.nombre, e.target, 'nombreR');
		break;
		case "apellidoR":
			validarcampo(expresiones.nombre, e.target, 'apellidoR');
		break;
		case "correoR":
			validarcampo(expresiones.correo, e.target, 'correoR');
		break;
		case "contrasenaR":
			validarcampo(expresiones.password, e.target, 'contrasenaR');
		break;
		case "correoL":
			validarcampo(expresiones.correo, e.target, 'correoL');
		break;
		case "contrasenaL":
			validarcampo(expresiones.password, e.target, 'contrasenaL');
		break;
	}}


const validarcampo = (expresion, input, campo) =>{
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		document.getElementById('btn').disabled = false;

		campos[campo]=true;
	}else{
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		document.getElementById('btn').disabled = true;
		campos[campo]=false;

	}
}




inputs.forEach((input) =>{
	input.addEventListener('keyup', validarFormulario );
	input.addEventListener('blur', validarFormulario );
});

inputsLogin.forEach((input) =>{
	input.addEventListener('keyup', validarFormulario );
	input.addEventListener('blur', validarFormulario );
});





formulario.addEventsListener('submit', (e) => {
	if(campos.nombre && campos.apellido && campos.correo && campos.contrasena){
		document.getElementById('btn').disabled = false;
		formulario.reset();
		Document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) =>{
			icono.classList.remove('.formulario__grupo-correcto');
		});
	}else{
		document.getElementById('btn').disabled = true;
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		
	}

});



/*-----------------Perfils-mostrar-campos-contraseña-----------*/





