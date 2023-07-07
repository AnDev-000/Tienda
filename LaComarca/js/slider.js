/*--variables */
var slider = $('#slider');
var ant = $('#btn-anterior');
var sig = $('#btn-siguiente');

$('#slider section:last').insertBefore('#slider section:first');
slider.css('margin-left', '-'+100+'%');

/*--Funcion mover a la derecha*/
function moverD() {
    slider.animate({
        marginLeft:'-'+200+'%'
    } ,700, function(){
        $('#slider section:first').insertAfter('#slider section:last');
        slider.css('margin-left', '-'+100+'%');
        });
}
/*--Funcion mover a la izquierda*/
function moverI() {
    slider.animate({
        marginLeft:0
    } ,700, function(){
        $('#slider section:last').insertBefore('#slider section:first');
        slider.css('margin-left', '-'+100+'%');
        });
}
/*--Slider automatico */
function automatico(){
    interval = setInterval(function(){
		moverD();
	}, 6000);
}
/*--botones */
sig.on('click',function() {
    moverD();
    clearInterval(interval);
    automatico();
});

ant.on('click',function() {
    moverI();
    clearInterval(interval);
    automatico();
});



automatico();