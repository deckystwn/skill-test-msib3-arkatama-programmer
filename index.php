<?php
	require_once"connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.table {
		    font-family: sans-serif;
		    color: #232323;
		    border-collapse: collapse;
		}
		 
		.table, th, td {
			width: 100%;
		    border: 1px solid #999;
		    padding: 8px 20px;
		}
		.table-container{
			width: 50%;
			margin: 50px auto;
		}
		input[type="text"]{
			width: 99%;
			height: 30px;
		}
		input[type="submit"]{
			width: 100%;
			padding: 10px;
		}
		form{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<?php
		if(isset($_SESSION['alert'])){
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		}
	?>
	<div class="table-container">
		<form method="POST" action="proses.php">
			<input type="text" name="user">
			<input type="submit" value="oke">
		</form>
		<table>
			<tr>
				<td>Nama</td>
				<td>Umur</td>
				<td>Kota</td>
			</tr>
				<?php
					$sql = "SELECT name , age , city  FROM user";
					$query = mysqli_query($con,$sql);
					while($d = mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?=$d['name']?></td>
							<td><?=$d['age']?></td>
							<td><?=$d['city']?></td>
						</tr>
						<?php
					}
				?>
		</table>
	</div>
</body>
</html>