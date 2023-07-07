/*declaracion variables*/
let btnNavUsuario = document.getElementById('btn-nav-usuario');
let menuUsuario = document.getElementById('menu-usuario');
//let tambien puede ser " var ""


/*Funciones*/
btnNavUsuario.addEventListener('click', function(){
    'use strict';
    menuUsuario.classList.toggle('mostrar-menu-usuario');/*recordar toggle alterna, si un objeto se ve entonces desaparece y si no al reves*/

});