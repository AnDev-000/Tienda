const formularioDir = document.getElementById('formulario__direcciones');
const inputsDirecciones = document.querySelectorAll('#formulario__direcciones input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,20}$/, // Letras y espacios, pueden llevar acentos.
	comuna: /^[a-zA-ZÀ-ÿ\s]{1,20}$/,
	direccion: /^[a-zA-ZÀ-ÿ\s]{1,20}$/,
	password: /^.{6,12}$/, // 6 a 12 digitos.
	numero: /^[0-9]{1,5}$/,
	cPostal: /^[0-9]{5,8}$/,
}

const campos ={
	nombre:false,
	apellido:false,
	comuna:false,
	numero:false,
	direccion:false,
	cPostal:false,

}

const validarFormulario = (e) =>{
	switch(e.target.name){
		case "nombre":
			validarcampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
			validarcampo(expresiones.direccion, e.target, 'direccion');
			break;
		case "numero":
			validarcampo(expresiones.numero, e.target, 'numero');
			
		break;
		case "direccion":
			validarcampo(expresiones.direccion, e.target, 'direccion'); 
		break;
		case "comuna":
			validarcampo(expresiones.comuna, e.target, 'comuna'); 
		break;
		case "cPostal":
			validarcampo(expresiones.cPostal, e.target, 'cPostal'); 
			
		
	}}


const validarcampo = (expresion, input, campo) =>{
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('direcciones__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.add('direcciones__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .direcciones__input-error`).classList.remove('direcciones__input-error-activo');
		document.getElementById('btnEnviar').disabled = false;
		campos[campo]=true;
	}else{
		document.getElementById(`grupo__${campo}`).classList.add('direcciones__grupo-incorrecto')
		document.getElementById(`grupo__${campo}`).classList.remove('direcciones__grupo-correcto')
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .direcciones__input-error`).classList.add('direcciones__input-error-activo');
		document.getElementById('btnEnviar').disabled = true;
		campos[campo]=false;

	}
}







inputsDirecciones.forEach((input) =>{
	input.addEventListener('keyup', validarFormulario );
	input.addEventListener('blur', validarFormulario );
});






formularioDir.addEventListener('submit', (e) => {
	if(campos.nombre && campos.apellido && campos.email && campos.password){
		formularioDir.reset();
		Document.querySelectorAll('.direcciones__grupo-correcto').forEach((icono) =>{
			icono.classList.remove('.direcciones__grupo-correcto');
		});
	}else{
		document.getElementById('direcciones__mensaje').classList.add('direcciones__mensaje-activo');
		
	}


});







