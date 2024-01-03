<?php
	echo "<p align=center>Free Queue:</p>";
	include("personal_Login.php");
	try{
		//Provide information on specific Artist.
		$dsn = "mysql:host=courses;dbname=z1912344";
		$pdo = new PDO($dsn, $userName, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sqlCode = "SELECT userName
				FROM FreeQueue
				WHERE userName = ?;";
		$rsPrepare = $pdo->prepare($sqlCode);
		$rsPrepare->execute(array($_POST["userName"]));
		$rows = $rsPrepare->fetchAll(PDO::FETCH_ASSOC);
		if(!$rows) {
			$sqlCode = "INSERT INTO User
					(userName)
					VALUES
					(?);";
			$rsPrepare = $pdo->prepare($sqlCode);
			$rsPrepare->execute(array($_POST["userName"]));
			$sqlCode = "INSERT INTO FreeQueue
					(userName, karaokeID)
					VALUES
					(?, ?);";
			$rsPrepare = $pdo->prepare($sqlCode);
			$rsPrepare->execute(array($_POST["userName"], $_POST["karaokeFile"]));
			echo "<p align=center>Song Added to Free Queue</p>";
		} else {
			echo "<p align=center>You are already in the Free Queue!</p>";
		}
	}
	catch(PDOexception $e) {
		echo "Connection to Database failed: " . $e->getMessage();
	}
?>
<html>
	<body>
		<!--
		Change Background color
		-->
		<body style="background-color:powderblue;">

		<!--
		Center Text
		-->
		<style>
			h1 {text-align: center;}
			h2 {text-align: center;}
			form {text-align: center;}
			table {margin:auto;}
		</style>

		<!--
		Send user back to Home Page
		-->
		<h2>Return to Home</h2>
		<form action = "http://students.cs.niu.edu/~z1912344/htmlPage_Project.php" method = "GET">
			<input type = "Submit" name = "Submit" value = "Submit"/>	
		</form>
		<br>
	</body>
</html>
