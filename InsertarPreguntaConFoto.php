<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Preguntas</title>
    <link rel='stylesheet' type='text/css' href='estilos/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='estilos/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='estilos/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<span class="right"><a href="registro">Registrarse</a></span>
      		<span class="right"><a href="login">Login</a></span>
      		<span class="right" style="display:none;"><a href="/logout">Logout</a></span>
		<h2>Quiz: el juego de las preguntas</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Inicio</a></spam>
		<span><a href='pregunta.html'>Preguntas</a></spam>
		<span><a href='creditos.html'>Creditos</a></spam>
	</nav>
    <section class="main" id="s1">
    
	<div style="float: left;">
		
		<?php

			//Contectar con la base de datos 

			$link = mysqli_connect("localhost", "id2956012_swg10", "SWG10", "id2956012_quiz");
			if (!$link)
			{
			 echo "Fallo al conectar a MySQL: " . $link->connect_error;
			}

			//Insertar los datos



			if ($_FILES['pic']['size'] == 0 ){
				$pic = addslashes(file_get_contents("img/imgPrev.png"));	
			}			
			else{
				$pic = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
			}

			

			$sql= "INSERT INTO preguntas(email, enunciado,correcta,incorrecta1,incorrecta2,incorrecta3,complejidad,tema,img) VALUES ('$_POST[mail]','$_POST[enunciado]','$_POST[Rcor]','$_POST[RIncor1]','$_POST[RIncor2]','$_POST[RIncor3]',$_POST[complej],'$_POST[tema]', '$pic')";

			//Error al insertar
			if (!mysqli_query($link ,$sql))
			 { 	
				die('Error: ' . mysqli_error($link));
				echo "No se ha podido insertar";
			 }


			 echo 'Se ha guardado la pregunta correctamente<br><br><a href="VerPreguntasConFoto.php">Ver todas las preguntas</a>';

			// Cerrar conexión
			mysqli_close($link);

		?>


	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://es.wikipedia.org/wiki/Quiz" target="_blank">Que es un Quiz?</a></p>
		<a href='https://github.com/SWG10CI/Lab2A'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
