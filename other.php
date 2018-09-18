<?php
	var_dump($_POST);
	
	//$nome = $_POST["campo"];
	//$ord = $_POST["campo_ordem_aux"];
	
		
	function crescente($a, $b)
	{
		$nome = $_POST["campo"];
		return $a["name"] > $b["name"];
	}
	
	function decrescente()
	{
		$nome = $_POST["campo"];
		return $a[$nome] < $b[$nome];
	}
	
	function ordenar($param)
	{
		$json_file = file_get_contents("https://jsonplaceholder.typicode.com/users");
		$json_str = json_decode($json_file, true);
		
		$o = usort($json_str, 'crescente');
		/*
		echo '<pre>';
		print_r( $o );
		echo '</pre>';
		*/
	}
?>