<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Avaliação</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  </head>
  <body>
  
  <form id="form1" action="other.php" method="post" >
    <h1>Tabela para apresentação dos dados</h1>
	<div class="container">
		<div class="">
		<label>Opções de ordenação </label>
			<select id="campo_ordem" name="campo_ordem">
				<option value="n" >Nenhum</option>
				<option value="c" >Crescente</option>
				<option value="d" >Decresecente</option>
			</select>
		</div>
	</div>
	</p>
	
	<div class="container-fluid">
	  <div class="row">
	  <input type="hidden" id="campo_ordem_aux" name="campo_ordem_aux" value="n"/>
		<div class="col-sm-2" style="background-color:lavenderblush;">
			<button type="button" id="nome" class="btn btn-info" onclick='$.post("other.php", "campo=nome&campo_ordem_aux="+document.getElementById("campo_ordem_aux").value, function( data ) {console.log(data);});' >Name</button>
		</div>
		<div class="col-sm-2" style="background-color:lavenderblush;">
			<button type="button" id="username" class="btn btn-info" onclick='$.post("other.php", "campo=username", function( data ) {} );'>UserName</button>
		</div>
		<div class="col-sm-2" style="background-color:lavenderblush;">
			<button type="button" id="email" class="btn btn-info" onclick='$.post("other.php", "campo=email", function( data ) {});'>e-mail</button>
		</div>
		<div class="col-sm-2" style="background-color:lavenderblush;">
			<button type="button" id="phone" class="btn btn-info" onclick='$.post("other.php", "campo=phone", function( data ) {});'>Phone</button>
		</div>
		<div>
			
		</div>
	  </div>	  
	  <?php
		$json_file = file_get_contents("https://jsonplaceholder.typicode.com/users");
		$json_str = json_decode($json_file, true);
		$cont=0;
		foreach ( $json_str as $e ) 
		{
			echo '<input type="hidden" name="temporario" id="temporario'.$cont.'"value="'.$e["name"].' | '.$e["username"].' | '.$e["email"].' | '.$e["phone"].'"/>';
			
			echo "<div class='row'>";
			echo '<div class="col-sm-2" style="background-color:lavender;">'.$e['name']."</div>";
			echo '<div class="col-sm-2" style="background-color:lavender;">'.$e['username']."</div>";
			echo '<div class="col-sm-2" style="background-color:lavender;">'.$e['email']."</div>";
			echo '<div class="col-sm-2" style="background-color:lavender;">'.$e['phone']."</div>";
			echo '<div class="col-sm-2" style="background-color:lavender;">
					<button type="button" class="btn btn-info btn-xs"
					onclick=escreverLogConsole(document.getElementById("temporario'.$cont.'").value);
					>
						Imprimir no console
					</button>
				  </div>';
			echo "</div>";
			$cont++;
		}
		?> 
	</div> <!-- Fim container-fluid -->
	
	<script>
		var app = angular.module("myApp", []);
		function escreverLogConsole(texto){
			console.log(texto);
       }
	   
	   $("#campo_ordem").on('change', function(e){
		   document.getElementById("campo_ordem_aux").value = $(this).val();
		  //alert($(this).val());
		  console.log(document.getElementById("campo_ordem_aux").value);
		  return false;
		});
	</script>
	</form>  
  </body>
</html>