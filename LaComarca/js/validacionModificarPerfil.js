const formularioMod = document.getElementById('formulario__modificar');
const inputsModificar = document.querySelectorAll('#formulario__modificar input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{6,12}$/, // 6 a 12 digitos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
}

const campos ={
	nombre:false,
	apellido:false,
	email:false,
	password:false,

}

const validarFormulario = (e) =>{
	switch(e.target.name){
		case "nombre":
			validarcampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
			validarcampo(expresiones.nombre, e.target, 'apellido');
			break;
		case "email":
			validarcampo(expresiones.email, e.target, 'email');
			
		break;
		case "password":
			validarcampo(expresiones.password, e.target, 'password'); // Contraseña Actual
		break;
		case "Npassword":
			validarcampo(expresiones.password, e.target, 'Npassword'); // Contraseña nueva
			validarPassword2();
			break;
		case "Npassword2":
			 validarPassword2(); // Repetir Contraseña nueva
		break;
		
	}}


const validarcampo = (expresion, input, campo) =>{
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('modificar__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.add('modificar__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .modificar__input-error`).classList.remove('modificar__input-error-activo');
		document.getElementById('btnEnviar').disabled = false;
		campos[campo]=true;
	}else{
		document.getElementById(`grupo__${campo}`).classList.add('modificar__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.remove('modificar__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .modificar__input-error`).classList.add('modificar__input-error-activo');
		document.getElementById('btnEnviar').disabled = true;
		campos[campo]=false;

	}
}


const validarPassword2= () =>{
	const inputNpassword1 = document.getElementById('Npassword');
	const inputNpassword2 = document.getElementById('Npassword2');

	if(inputNpassword1.value !== inputNpassword2.value){
		document.getElementById(`grupo__Npassword2`).classList.add('modificar__grupo-incorrecto')
		document.getElementById(`grupo__Npassword2`).classList.remove('modificar__grupo-correcto')
		document.querySelector(`#grupo__Npassword2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__Npassword2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__Npassword2 .modificar__input-error`).classList.add('modificar__input-error-activo');
		document.getElementById('btnEnviar').disabled = true;
		campos[campo]=false;

	}else{
		document.getElementById(`grupo__Npassword2`).classList.remove('modificar__grupo-incorrecto')
		document.getElementById(`grupo__Npassword2`).classList.add('modificar__grupo-correcto')
		document.querySelector(`#grupo__Npassword2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__Npassword2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__Npassword2 .modificar__input-error`).classList.remove('modificar__input-error-activo');
		document.getElementById('btnEnviar').disabled = false;
	}

}






inputsModificar.forEach((input) =>{
	input.addEventListener('keyup', validarFormulario );
	input.addEventListener('blur', validarFormulario );
});






formularioMod.addEventListener('submit', (e) => {
	if(campos.nombre && campos.apellido && campos.email && campos.password){
		formularioMod.reset();
		Document.querySelectorAll('.modificar__grupo-correcto').forEach((icono) =>{
			icono.classList.remove('.modificar__grupo-correcto');
		});
	}else{
		document.getElementById('modificar__mensaje').classList.add('modificar__mensaje-activo');
		
	}


});





var checkbox = document.getElementById('check-cambiar-contra');
checkbox.addEventListener( 'change', function() {
    if(this.checked) {
		$(".datosCuenta").show();
		document.getElementById("check-cambiar-contra").value="1";
		$("#password").prop("required", true);
	}else{
		$(".datosCuenta").hide();
		document.getElementById("check-cambiar-contra").value="0";
		$("#password").removeAttr('required');
}});





/*-----------------Perfil-mostrar-campos-contraseña-----------*/


