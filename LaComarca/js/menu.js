/*declaracion variables*/
let btnMenu = document.getElementById('btnmenu');
let menu = document.getElementById('menu');
//let tambien puede ser " var ""


/*Funciones*/
btnMenu.addEventListener('click', function(){
    'use strict';
    menu.classList.toggle('mostrar');/*recordar toggle alterna, si un objeto se ve entonces desaparece y si no al reves*/

});