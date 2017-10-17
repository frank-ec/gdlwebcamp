var api= 'AIzaSyBMe5zzwFKSjWktOY1BaJz79oARGaC4k9Q';

      function initMap() {
        var latlng ={
            lat: 0.035634,
            lng: -78.150042
        }
        var map = new google.maps.Map(document.getElementById('mapa'), {
          'center': latlng,
          'zoom': 14,
          'mapTypeId': google.maps.MapTypeId.HYBRID
        });

        var contenido='<h2>HBC</h2>'+
                      '<p>Del 10 al 12 de Diciembre</p>' +
                      '<p>Visitanos</p>'

        var informacion = new google.maps.InfoWindow({
            content:contenido
        });

        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: 'HOSPITAL BASICO CAYAMBE'
        });

        marker.addListener('click', function(){
            informacion.open(map, marker)
        });

      }
        


(function(){
  'use strict';
  document.addEventListener('DOMContentLoaded', function(){
    
		//Campos datos usuario
			var nombre = document.getElementById('nombre');
			var apellido = document.getElementById('apellido');
			var email = document.getElementById('email');
		// Campos pases
			var pase_dia = document.getElementById('pase_dia');
			var pase_dosdias = document.getElementById('pase_dosdias');
			var pase_completo = document.getElementById('pase_completo');
    	// Botones y divs
    		var calcular = document.getElementById('calcular');
    		var errorDiv = document.getElementById('error');
    		var botonRegistro = document.getElementById('btnRegistro');
    		var lista_productos = document.getElementById('lista-productos');
    		var suma = document.getElementById('suma-total');
    	//Extras
    		var camisas = document.getElementById('camisa_evento');
    		var etiquetas = document.getElementById('etiquetas');




    		calcular.addEventListener('click',calcularMontos);
    		
            pase_dia.addEventListener('blur',mostrarDias);
    		pase_dosdias.addEventListener('blur',mostrarDias);
    		pase_completo.addEventListener('blur',mostrarDias);

            // Funcion anonima para validar campo
            /*
            nombre.addEventListener('blur', function() {
                if (this.value=='') {
                    errorDiv.style.display='block';
                    errorDiv.innerHTML= "El campo es obligatorio";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                }
            });    */

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            function validarCampos(){
                  if (this.value=='') {
                    errorDiv.style.display='block';
                    errorDiv.innerHTML= "El campo es obligatorio";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                }else{
                    errorDiv.style.display = 'none';
                    this.style.border ='1px solid #cccccc ';
                }   
            }

            function validarMail(){
                if (this.value.indexOf ("@") > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border ='1px solid #cccccc ';    
                } else{
                    errorDiv.style.display='block';
                    errorDiv.innerHTML= "La direccion debe contener @";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';   
                }
            }    


    		function calcularMontos(event){
    			event.preventDefault();
    			if(regalo.value==='') {
    				alert ("Debes elegir un regalo");
    				regalo.focus();
    			}else{
    				var boletosDia = parseInt(pase_dia.value, 10)||0,
    					boletos2Dias = parseInt(pase_dosdias.value, 10)||0,
    					boletosCompletos = parseInt(pase_completo.value, 10)||0,
    					cantCamisas = parseInt(camisa_evento.value, 10)||0,
    					cantEtiquetas = parseInt(etiquetas.value, 10)||0;

    var totalPagar = (boletosDia*30) +	(boletos2Dias*45) + (boletosCompletos*50)+((cantCamisas*10)*0.93)+(cantEtiquetas*2);
    	// alert(totalPagar);	

    			var listadoProductos = [];
    				if(boletosDia>=1){
    					listadoProductos.push(boletosDia + ' Pases por día');	
    				}
    				if (boletos2Dias>=1) {
    					listadoProductos.push(boletos2Dias + ' Pases por 2 días');		
    				}	
    				if (boletosCompletos>=1) {
    					listadoProductos.push(boletosCompletos + ' Pases Completos');	
    				}
    				if (cantCamisas>=1) {
    					listadoProductos.push(cantCamisas + ' Camisetas');		
    				}	
    				if (cantEtiquetas>=1) {
    					listadoProductos.push(cantEtiquetas + ' Paquete(s) Etiquetas');	
    				}

    				lista_productos.style.display= "block";	
    				lista_productos.innerHTML ='';	
    				for (var i = 0; i < listadoProductos.length; i++) {
    					lista_productos.innerHTML+=listadoProductos[i] +'<br/>';
    				}
    				suma.innerHTML='$' +totalPagar.toFixed(2);
    			}
    		}

/*
    		function mostrarDias(){
    			var boletosDia = parseInt(pase_dia.value, 10)||0,
    				boletos2Dias = parseInt(pase_dosdias.value, 10)||0,
    				boletosCompleto = parseInt(pase_completo.value, 10)||0,

    				var diasElegidos =[];
    				if (boletosDia>0) {
    					diasElegidos.push('viernes');
    				}
    				if (boletos2Dias>0) {
    					diasElegidos.push('viernes','sabado');
    				}
    				if (boletosCompleto>0) {
    					diasElegidos.push('viernes','sabado','domingo');
    				}
    				for (var i = 0; i < diasElegidos.length; i++) {
    						document.getElementById(diasElegidos[i]).style.display= "block";						
    					}	
    		}	
                */
            function mostrarDias(){
                var boletosDia = parseInt(pase_dia.value, 10)|| 0,
                    boletos2Dias = parseInt(pase_dosdias.value, 10)|| 0,
                    boletoCompleto = parseInt(pase_completo.value, 10)|| 0;
                    var diasElegidos = [];
                    if(boletosDia > 0){
                      diasElegidos.push('viernes');
                      console.log(diasElegidos);
                    }
                    if(boletos2Dias>0) {
                      diasElegidos.push('viernes','sabado');
                      console.log(diasElegidos);
                    }
                    if(boletoCompleto>0) {
                      diasElegidos.push('viernes', 'sabado', 'domingo');
                      console.log(diasElegidos);
                    }
                    for(var i = 0; i < diasElegidos.length; i++) {
                      document.getElementById(diasElegidos[i]).style.display = 'block';
                    }
              }
  });
  
})();



// Programa de Conferencias

$(function(){
    
    $('div.ocultar').hide(); //Oculta Talleres, Conferencias y Seminarios
    $('.programa-evento .info-curso:first').show(); //Muestra los talleres
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click', function(){
      $('.menu-programa a').removeClass('activo');  
      $(this).addClass('activo');  
      $('.ocultar').hide();  

        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

   // Animaciones para los números 
      $('.resumen-evento li:nth-child(1) p').animateNumber({ number:6},1200);  
      $('.resumen-evento li:nth-child(2) p').animateNumber({ number:15},1200);  
      $('.resumen-evento li:nth-child(3) p').animateNumber({ number:3},1500);  
      $('.resumen-evento li:nth-child(4) p').animateNumber({ number:9},1500);  

   // Cuenta regresiva
      $('.cuenta-regresiva').countdown('2017/10/21 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
      });         

});