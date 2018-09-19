<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
<div ng-app="myApp" ng-controller="customersCtrl">
  <h2>Table</h2>
  <p>The .table-responsive</p>
  <div class="container">
	<div class="">
	<label>Opções de ordenação </label>
		<select id="ordem" name="ordem">
			<option  value="n" >Nenhum</option>
			<option selected="selected"value="c" >Crescente</option>
			<option value="d" >Decresecente</option>
		</select>
	</div>
</div>
</p>
  <div class="table-responsive">          
  <table class="table" id="myTable">
    <thead>
      <tr>	
		<th>
			<button type="button" id="bt_id" class="btn btn-info" onclick="sortTable(0)" >Id</button>
		</th>
        <th>
			<button type="button" id="bt_nome" class="btn btn-info" onclick="sortTable(1)" >Name</button>
		</th>
        <th>
			<button type="button" id="bt_email" class="btn btn-info" onclick="sortTable(2)" >E-mail</button>
		</th>
        <th>
			<button type="button" id="bt_phone" class="btn btn-info" onclick="sortTable(3)" >Phone</button>
		</th>
        <th>
			<button type="button" id="bt_username" class="btn btn-info" onclick="sortTable(4)" >UserName</button>
		</th>
		<th></th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="x in names" id="linha1">
		<td>{{ x.id }}	
		</td>
		<td>{{ x.name }}</td>
		<td>{{ x.email }}</td>
		<td>{{ x.phone }}</td>
		<td>{{ x.username }}</td>
		<td>
			<button type="button" class="btn btn-info btn-xs" value="/{{ x.id + x.name + x.email}}/"
					onclick="console.log($(this).val());"
					>
						Imprimir no console
			</button>
		</td>
	  </tr>
    </tbody>
  </table>
  </div>
</div>
<script>
var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http) {
	
    //$http.get("https://www.w3schools.com/angular/customers.php").then(function (response) {
	//$json_file = file_get_contents("https://jsonplaceholder.typicode.com/users");
	$http.get("dados_json.php").then(function (response) {
	$scope.names = response.data.records;
	//console.log(response);
	}
	);
});

$("#ordem").on('change', function(e){
  //document.getElementById("campo_ordem_aux").value = $(this).val();
  //alert($(this).val());
  console.log(document.getElementById("ordem").value);
  asc_desc=document.getElementById("ordem").value;
  return false;
});

function sortTable($coluna) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  asc_desc = document.getElementById("ordem").value;
  //console.log(document.getElementById("ordem").value);
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[$coluna];
      y = rows[i + 1].getElementsByTagName("TD")[$coluna];
      //check if the two rows should switch place:
      
	  
	  if (asc_desc == "d")
	  if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
		//console.log(asc_desc);
        shouldSwitch = true;
        break;
      }
	  
	  
	  if (asc_desc == "c")
	  if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
		//console.log(asc_desc);
        shouldSwitch = true;
        break;
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>
</body>
</html>
