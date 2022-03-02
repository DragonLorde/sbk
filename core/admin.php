<?php
define('host', 'localhost');
define('database', 'med');
define('user', 'root');
define('pswd', '');

$mysqli = new mysqli(host , user , pswd , database);
$res = $mysqli->query('SELECT * FROM `users`');
$res2 = $mysqli->query('SELECT * FROM `users`');
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>
	<div class="header">
		<p>ADMIN PANEL</p>
	</div>
	<table>
		<tr>
			<th>Email</th>
			<th>Имя</th>
			<th>Телфон</th>
			<th>Текст сообщения</th>
			<th>Время обращения</th>
		</tr>
		
		<?php 
			while ($row = $res->fetch_assoc()) {
			echo "<tr>";		
				echo "<td>" .  $row['email'] . "</td>";
				echo "<td>" .  $row['name'] . "</td>";
				echo "<td>" .  $row['phone'] . "</td>";
				if(isset($row['text'])) {
					echo "<td>" .  "сообщения нет" . "</td>";
				} else {
					echo "<td>" .  $row['text'] . "</td>";
				}
				echo "<td>" .  $row['time'] . "</td>";

			}
			  echo "</tr>";
			 ?>

	</table>
	<style type="text/css">
		body {
			max-height: 100%;
			overflow: hidden;
		}
		.header {
			display: flex;
			flex: 1 1 auto;
			min-height: 100px;
			background-color: tomato;
			font-size: 32px;
		}
		p {
			margin: 30px auto
		}
		table {
			justify-content: center;
			overflow-y: scroll;
			display: flex;
			flex: 1 1 auto;
			max-height: 500px;
			min-height: 500px;
			max-width: 1200px;
			font-size: 22px;
			color: white;
			background-color: grey;
			text-align: center;
			margin: 200px auto;
			border-radius: 10px;
			box-shadow: 2px 2px 2px black;
		}
		td {
			padding: 15px;
		}
		tr {
			border-bottom: 1px solid black;
			z-index: 200;
		}
		th {
			color: black;
		}

	</style>
</body>
</html>
