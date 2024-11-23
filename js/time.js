(function(){

	var actualizarHora = function(){
				
		// Variables para ir agregando su respectivos valores


		var fecha = new Date();

		var	horas = fecha.getHours();
		var	ampm = '';
		var minutos = fecha.getMinutes();
		var segundos = fecha.getSeconds();
		var diaSemana = fecha.getDay();
			// Obtenemos el dia del mes
		var day = fecha.getDate();
		var mes = fecha.getMonth();
		var year = fecha.getFullYear();

		// Accedemos a los elementos del DOM para agregar mas adelante sus correspondientes valores
		var time = document.getElementById('time');
		var date = document.getElementById('date');
		
		var dayWeek = '';
		var month = '';
		
		// Obtenemos el dia se la semana y lo mostramos
		var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
		dayWeek = semana[diaSemana];
		
		// Obtenemos el Mes
		var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
		month = meses[mes];

		// Detectamos cuando sean las 0 AM y transformamos a 12 AM
		if (horas == 0 ){
			horas = 12;
		}

		// Para mostrar un cero antes de las horas
		if (horas < 10){
			horas = '0' + horas;
		}
		
		// Minutos y Segundos
		if (minutos < 10){ 
			minutos = "0" + minutos; 
		}
		
		if (segundos < 10){ 
			segundos = "0" + segundos; 
		}

		/*pMinutos.textContent = minutos;
		pSegundos.textContent = segundos;*/

		time.textContent = horas + ':' + minutos + ':' + segundos + ' ' + ampm;
		date.textContent = dayWeek + ' ' + day + ' de ' + month + ' del ' + year;

	};

	actualizarHora();
	var intervalo = setInterval(actualizarHora, 1000);
}())