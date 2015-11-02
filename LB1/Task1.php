<!DOCTYPE html>
<html>
	<body>
		<form method = "post" action = "Task1.php">
			Name: 
			<input type = "text" name = "name">
			<input type = "submit">
		<form/>
		<h1>
		<?php 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = $_POST["name"];
			if ($name == ""){
				echo "enter name";
			}
			else{
				echo $name;
			}
		} 
		?>
		</h1>
	</body>
</html>