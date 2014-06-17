<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style type="text/css">
		div.color{font-family: "Times New Roman", Times, serif; color:white;}
		span.Tnegrilla{font-weight:bold;}
		
	</style>
<script type="text/javascript">

window.onload=function(){
	function descargarArchivo(contenidoEnBlob, nombreArchivo) {
		var reader = new FileReader();
		reader.onload = function (event) {
			var save = document.createElement('a');
			save.href = event.target.result;
			save.target = '_blank';
			save.download = nombreArchivo || 'archivo.dat';
			var clicEvent = new MouseEvent('click', {
				'view': window,
					'bubbles': true,
					'cancelable': true
			});
			save.dispatchEvent(clicEvent);
			(window.URL || window.webkitURL).revokeObjectURL(save.href);
		};
		reader.readAsDataURL(contenidoEnBlob);
	};

	//Función de ayuda: reúne los datos a exportar en un solo objeto
	function obtenerDatos() {
		return {
			codigo: document.getElementById('codMat').value,
			materia: document.getElementById('nomMat').value,
			salon: document.getElementById('salonMat').value,
			profesor: document.getElementById('docMat').value,
			fecha: (new Date()).toLocaleDateString()
		};
	};

	//Función de ayuda: "escapa" las entidades XML necesarias
	//para los valores (y atributos) del archivo XML
	function escaparXML(cadena) {
		if (typeof cadena !== 'string') {
			return '';
		};
		cadena = cadena.replace('&', '&amp;')
			.replace('<', '&lt;')
			.replace('>', '&gt;')
			.replace('"', '&quot;');
		return cadena;
	};

	//Genera un objeto Blob con los datos en un archivo TXT
	function generarTexto(datos) {
		var texto = [];
		texto.push('Datos Personales:\n');
		texto.push('Nombre: ');
		texto.push(datos.nombre);
		texto.push('\n');
		texto.push('Teléfono: ');
		texto.push(datos.telefono);
		texto.push('\n');
		texto.push('Fecha: ');
		texto.push(datos.fecha);
		texto.push('\n');
		//El contructor de Blob requiere un Array en el primer parámetro
		//así que no es necesario usar toString. el segundo parámetro
		//es el tipo MIME del archivo
		return new Blob(texto, {
			type: 'text/plain'
		});
	};


	//Genera un objeto Blob con los datos en un archivo XML
	function generarXml(datos) {
		var texto = [];
		var contadorid = 0;
		var dia2 = "lunes";
		var hora2 = "13:30";
		texto.push('<?xml version="1.0" encoding="UTF-8" ?>\n');
		texto.push('<Docentes>\n');
		texto.push('<docente>\n');
		texto.push('<Cursos>\n');
		texto.push('<curso>\n');
		texto.push('<ID>');
		texto.push(contadorid);
		texto.push('</ID>\n');
		texto.push('<codigo>');
		texto.push(escaparXML(datos.codigo));
		texto.push('</codigo>\n');
		texto.push('<materia>');
		texto.push(escaparXML(datos.materia));
		texto.push('</materia>\n');
		texto.push('<dia>');
		texto.push(dia2);
		texto.push('</dia>\n');
		texto.push('<hora>');
		texto.push(hora2);
		texto.push('</hora>\n');
		texto.push('<salon>');
		texto.push(escaparXML(datos.salon));
		texto.push('</salon>\n');
		texto.push('<profesor>');
		texto.push(escaparXML(datos.profesor));
		texto.push('</profesor>\n');
		texto.push('<fecha>');
		texto.push(escaparXML(datos.fecha));
		texto.push('</fecha>\n');
		texto.push('<curso>\n');
		texto.push('<Cursos>\n');
		texto.push('<docente>\n');
		texto.push('<Docentes>\n');
		//No olvidemos especificar el tipo MIME correcto :)
		return new Blob(texto, {
			type: 'application/xml'
		});
	};

	document.getElementById('boton-xml').addEventListener('click', function () {
		var datos = obtenerDatos();
		descargarArchivo(generarXml(datos), 'archivo.xml');
	}, false);

	document.getElementById('boton-txt').addEventListener('click', function () {
		var datos = obtenerDatos();
		descargarArchivo(generarTexto(datos), 'archivo.txt');
	}, false);
	}  





</script>
	<script src="../js/jquery-1.11.0.min.js">

	</script> 
	
  </head>
<body>
  
	<br>
  
	<div class="navbar-wrapper">
      <div class="container">
		
		<div class="col-md-9">
		
			<div class="navbar navbar-inverse navbar-static-top" role="navigation">
			  <div class="container">
				<div class="navbar-header">
				<br>
				<img src="logoU.jpg"></img>
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="">Notas CWW</a>
				</div>
				<div class="navbar-collapse collapse">
				  <ul class="nav navbar-nav">
					<li><a href="index.php">Inicio</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="horario.php">Horario</a></li>
						<li><a href="notas.php">Historico de Notas</a></li>
						<li><a href="listadocursos.php">Listado de cursos</a></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administracion <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><a href="cursos.php">Cursos</a></li>
						<li><a href="horario.php">Horaios</a></li>
						<li><a href="profesores.php">Profesores</a></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informacion <b class="caret"></b></a>
					  <ul class="dropdown-menu">
					  	<li><a href="informacion.php">Información</a></li>
						<li><a href="turno.php">Turno</a></li>
						<li><a href="reglas.php">Reglas</a></li>
						<li><a href="electivas.php">Electivas</a></li>
					  </ul>
					</li>
					<li><a href="login.html">Salir</a></li>
				  </ul>
				</div>
			  </div>
			</div>
			
		</div>
		<div class="col-md-3">
		
			<div class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<br>
												<?php
						$xml=simplexml_load_file("datosEstud.xml");?>
						<div class="color"> <span class="Tnegrilla">Estudiante:</span> <?php echo $xml->nombre." ". $xml->apellidos;	 ?> </div>
						<div class="color"> <span class="Tnegrilla">Codigo:</span><?php echo $xml->codigo.""; ?> </div>
						<div class="color"> <span class="Tnegrilla">Programa:</span> <?php echo $xml->programa."" ;?> </div>
						<div class="color"> <span class="Tnegrilla">Jornada:</span> <?php echo $xml->jornada."" ;?> </div>
						<div class="color"> <span class="Tnegrilla">Promedio:</span> <?php echo $xml->promedio."" ;?></div>
						<br>		
					</div>
				</div>	
			</div>
		
		</div>		

      </div>
	  <br>
	
	<div class="container">
	
	<div class="row">
	
		<div class="col-md-3">
			
			<div class="panel panel-info">	
				<div class="panel-heading">
					<h3 class="panel-title">Formulario</h3>
				</div>
			</div>
		 <form  action = "guardarcurso.php" method="post" >
			<div class="form-group"> 
				<input type="text" name = "codmateria" class="form-control" placeholder="Codigo materia" id="codMat">
				<input type="text" name = "nombmat" class="form-control" placeholder="Nombre materia" id="nomMat">
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="diaOK">
					Dia <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" name = "diaS" role="menu" id="dia">
					<li><a href="#">Dia</a></li>
					<li role="presentation" class="divider"></li>
					<li><a href="#">Lunes</a></li>
					<li><a href="#">Martes</a></li>
					<li><a href="#">Miercoles</a></li>
					<li><a href="#">Jueves</a></li>
					<li><a href="#">Viernes</a></li>
					<li><a href="#">Sabado</a></li>
				  </ul>
				</div>
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="horaOK">
					Hora <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" name = "horam" role="menu" id="hora">
					<li><a href="#">Hora</a></li>
					<li role="presentation" class="divider"></li>
					<li><a href="#">7:00</a></li>
					<li><a href="#">8:30</a></li>
					<li><a href="#">10:00</a></li>
					<li><a href="#">11:30</a></li>
					<li><a href="#">13:30</a></li>
					<li><a href="#">15:00</a></li>
					<li><a href="#">16:30</a></li>
					<li><a href="#">18:30</a></li>
					<li><a href="#">20:00</a></li>
				  </ul>
				</div>
				<input type="text" class="form-control" placeholder="Salon" id="salonMat">
				<input type="text" class="form-control" placeholder="Docente" id="docMat">
			</div>
			<imput type="submit" class="btn btn-primary" id="botonCrear" value = "Crear">Crear
				<span class="glyphicon glyphicon-thumbs-up"></span> 
			<imput type="submit" class="btn btn-primary" id="boton-xml" value = "Crear">descargar
		</form>
		</div>
		
		<div class="col-md-6">
		
			<div class="panel panel-info">	
				<div class="panel-heading">
					<h3 class="panel-title">Listado de Materias</h3>
				</div>
			</div>
			
		
			<table class="table">
				<thead>
				  <tr>
					<th>#</th>
					<th>Codigo</th>
					<th>Curso</th>
					<th>Dia</th>
					<th>Hora</th>
					<th>Salon</th>
					<th>Docente</th>
				  </tr>

				</thead>
				<tbody id="tablaMat">
				 
				  
				  <!-- <tr> -->
					<!-- <td>1</td> -->
					<!-- <td>Mark</td> -->
					<!-- <td>Otto</td> -->
					<!-- <td>@mdo</td> -->
					<!-- <td>@mdo</td> -->
					<!-- <td>@mdo</td> -->
					<!-- <td>@mdo</td> -->
				  <!-- </tr> -->
				  
				</tbody>
				
			</table>
			<tr>
				  
				  
				  <table class="table" id="tablaMat">  <thead>
				   <tr>

				    <?php  
				   $xml=simplexml_load_file("datoscursos.xml");
				    foreach ($xml->docente->Cursos->curso as $personaje) {?>	

					<td> <input type="checkbox" id="1"></td><td><?php echo $personaje->ID." "; ?></td> <td>  <?php echo $personaje->codigo." "; ?> </td><td>  <?php echo $personaje->materia." "; ?> </td><td> 
					<?php echo $personaje->dia." "; ?> </td><td>  <?php echo $personaje->hora." "; ?> </td><td>  <?php echo $personaje->salon." "; ?> </td><td>  
					<?php echo $personaje->profesor." "; ?> </td>   </tr>
					<?php	}	?>
				   

				</thead></table>


			      </tr>
		
		</div>

		<div class="col-md-3">
		
			<div class="panel panel-info">	
				<div class="panel-heading">
					<h3 class="panel-title">Ajustes</h3>
				</div>
			</div>
		
			<button type="button" class="btn btn-danger" id="botonEliminar">
				<span class="glyphicon glyphicon-thumbs-down"></span> Eliminar
			</button>
			<button type="button" class="btn btn-info" id="botonModificar">
				<span class="glyphicon glyphicon-wrench"></span> Modificar
			</button>
			
			<div class="form-group" id="edita"> 
				<input type="text" class="form-control" placeholder="Codigo materia" id="codMat2">
				<input type="text" class="form-control" placeholder="Nombre materia" id="nomMat2">
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="diaOK2">
					Dia <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" id="dia2">
					<li><a href="#">Dia</a></li>
					<li role="presentation" class="divider"></li>
					<li><a href="#">Lunes</a></li>
					<li><a href="#">Martes</a></li>
					<li><a href="#">Miercoles</a></li>
					<li><a href="#">Jueves</a></li>
					<li><a href="#">Viernes</a></li>
					<li><a href="#">Sabado</a></li>
				  </ul>
				</div>
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="horaOK2">
					Hora <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" id="hora2">
					<li><a href="#">Hora</a></li>
					<li role="presentation" class="divider"></li>
					<li><a href="#">7:00</a></li>
					<li><a href="#">8:30</a></li>
					<li><a href="#">10:00</a></li>
					<li><a href="#">11:30</a></li>
					<li><a href="#">13:30</a></li>
					<li><a href="#">15:00</a></li>
					<li><a href="#">16:30</a></li>
					<li><a href="#">18:30</a></li>
					<li><a href="#">20:00</a></li>
				  </ul>
				</div>
				<input type="text" name = "salon" class="form-control" placeholder="Salon" id="salonMat2">
				<input type="text" name = "docen" class="form-control" placeholder="Docente" id="docMat2">
				
			</div>
			<button type="button" class="btn btn-default" id="botonActualizar">
				<span class="glyphicon glyphicon-ok"></span> Aplicar
			</button>		
			<button type="button" class="btn btn-default" id="botonCancelar">
				<span class="glyphicon glyphicon-remove"></span> Cancelar
			</button>
			
		</div>		
	
	</div>
	
	</div>
	
	<script>
	
	var consec = 0;
	
	$('#edita').hide();
	$('#botonActualizar').hide();
	$('#botonCancelar').hide();
	
	$('#dia li a').on('click', function(){
		var dia = $(this).text();
		$('#diaOK').text(dia);
		$('#diaOK').append(' <span class="caret"></span>');
	});
	
	$('#hora li a').on('click', function(){
		var hora = $(this).text();
		$('#horaOK').text(hora);
		$('#horaOK').append(' <span class="caret"></span>');
	});
	
	$('#dia2 li a').on('click', function(){
		var dia = $(this).text();
		$('#diaOK2').text(dia);
		$('#diaOK2').append(' <span class="caret"></span>');
	});
	
	$('#hora2 li a').on('click', function(){
		var hora = $(this).text();
		$('#horaOK2').text(hora);
		$('#horaOK2').append(' <span class="caret"></span>');
	});
	
	$('#botonCrear').on('click', function(){
		var codCur = $('#codMat').val();
		var nomCur = $('#nomMat').val();
		var dia =  $('#diaOK').text();
		var hora =  $('#horaOK').text();
		var salon = $('#salonMat').val();
		var prof = $('#docMat').val();
		
		
		if( codCur == null || codCur.length == 0 ) {
			alert('El codigo del curso es requerido');
			return false;
		}
		
		if( nomCur == null || nomCur.length == 0 ) {
			alert('El nombre del curso es requerido');
			return false;
		}
		
		if( dia == null || dia.length == 0 || ($.trim(dia) == 'Dia')) {
			alert('El dia es requerido');
			return false;
		}
		
		if( hora == null || hora.length == 0 || ($.trim(hora) == 'Hora')) {
			alert('La hora es requerida');
			return false;
		}
		
		if( salon == null || salon.length == 0 ) {
			alert('El salon del curso es requerido');
			return false;
		}
		
		if( prof == null || prof.length == 0 ) {
			alert('El docente del curso es requerido');
			return false;
		}
		
		consec = consec+1;		
		
		$('#tablaMat').append('<tr>	 <td> <input type="checkbox" id="'+consec+'"> '+consec+' </td> <td>'+codCur+' </td> <td>'+nomCur+'</td> <td>'+dia+'</td> <td>'+hora+'</td> <td>'+salon+'</td> <td>'+prof+'</td>  </tr>')
			
		$('#codMat').val("");
		$('#nomMat').val("");
		$('#diaOK').text("Dia");
		$('#diaOK').append(' <span class="caret"></span>');
		$('#horaOK').text("Hora");
		$('#horaOK').append(' <span class="caret"></span>');
		$('#salonMat').val("");
		$('#docMat').val("");
		
	});
	
	
	$('#botonEliminar').on('click', function(){
	
		$('#tablaMat input:checked').each(function() {
			//$(this) es el checkbox correspondiente
			$(this).parent().parent().remove();
		});
		
	});
	
	$('#botonModificar').on('click', function(){
	
		//variables	
		var cont = 0;
		var codCur2 = '';
		var nomCur2 = '';
		var dia2 =  '';
		var hora2 =  '';
		var salon2 = '';
		var prof2 = '';
		
		$('#tablaMat input:checked').each(function() {
			//$(this) es el checkbox correspondiente
			cont = cont+1;
			
			codCur2 = $(this).parent().next().text();
			nomCur2 = $(this).parent().next().next().text();
			dia2 = $(this).parent().next().next().next().text();
			hora2 = $(this).parent().next().next().next().next().text();
			salon2 = $(this).parent().next().next().next().next().next().text();
			prof2 = $(this).parent().next().next().next().next().next().next().text();
			
		});
		
		if (cont > 1) {
			alert('Debe seleccionar solo uno');
			return false;
		}
		
		if (cont == 0) {
			alert('No marco ningun checkbox!');
			return false;
		}		
		
		//llenar todos los datos
		
		$('#codMat2').val(codCur2);
		$('#nomMat2').val(nomCur2);
		$('#diaOK2').text(dia2);
		$('#diaOK2').append(' <span class="caret"></span>');
		$('#horaOK2').text(hora2);
		$('#horaOK2').append(' <span class="caret"></span>');
		$('#salonMat2').val(salon2);
		$('#docMat2').val(prof2);
		
		
		$('#edita').show();
		$('#botonActualizar').show();
		$('#botonCancelar').show();
		
	});
	
	$('#botonActualizar').on('click', function(){
		
		var ide3 = 0;
		
		var codCur3 = '';
		var nomCur3 = '';
		var dia3 =  '';
		var hora3 =  '';
		var salon3 = '';
		var prof3 = '';
		
		codCur3 = $('#codMat2').val();
		nomCur3 = $('#nomMat2').val();
		dia3 =  $('#diaOK2').text();
		hora3 =  $('#horaOK2').text();
		salon3 = $('#salonMat2').val();
		prof3 = $('#docMat2').val();
		
		
		$('#tablaMat input:checked').each(function() {
			//$(this) es el checkbox correspondiente
			ide3 = $(this).attr("id");			
		});
		
		if( codCur3 == null || codCur3.length == 0 ) {
			alert('El codigo de la actualizacion del curso es requerido');
			return false;
		}
		
		if( nomCur3 == null || nomCur3.length == 0 ) {
			alert('El nombre de la actualizacion del curso es requerido');
			return false;
		}
		
		if( dia3 == null || dia3.length == 0 || ($.trim(dia3) == 'Dia')) {
			alert('El dia de la actualizacion es requerido');
			return false;
		}
		
		if( hora3 == null || hora3.length == 0 || ($.trim(hora3) == 'Hora')) {
			alert('La hora de la actualizacion es requerida');
			return false;
		}
		
		if( salon3 == null || salon3.length == 0 ) {
			alert('El salon de la actualizacion del curso es requerido');
			return false;
		}
		
		if( prof3 == null || prof3.length == 0 ) {
			alert('El docente de la actualizacion del curso es requerido');
			return false;
		}
		
		$('#tablaMat #'+ide3).parent().next().text(codCur3);
		$('#tablaMat #'+ide3).parent().next().next().text(nomCur3);
		$('#tablaMat #'+ide3).parent().next().next().next().text(dia3);
		$('#tablaMat #'+ide3).parent().next().next().next().next().text(hora3);
		$('#tablaMat #'+ide3).parent().next().next().next().next().next().text(salon3);
		$('#tablaMat #'+ide3).parent().next().next().next().next().next().next().text(prof3);	
		
		$('#edita').hide();
		$('#botonActualizar').hide();
		$('#botonCancelar').hide();
		
	});
	
	$('#botonCancelar').on('click', function(){
		$('#edita').hide();
		$('#botonActualizar').hide();
		$('#botonCancelar').hide();
	});
	
	</script> 
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.js"></script>
  </body>
</html>