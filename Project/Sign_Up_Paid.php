<?php
	echo "<p align=center>Paid Queue:</p>";
	include("personal_Login.php");
	try{
		//Add new elements to the Paid Queue.
		$dsn = "mysql:host=courses;dbname=z1912344";
		$pdo = new PDO($dsn, $userName, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sqlCode = "SELECT userName
				FROM PaidQueue
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
			$sqlCode = "INSERT INTO PaidQueue
		       			(userName, karaokeID, price)
					VALUES
					(?, ?, ?);";
			$rsPrepare = $pdo->prepare($sqlCode);
			$rsPrepare->execute(array($_POST["userName"], $_POST["karaokeFile"], $_POST["paymentAmount"]));
			echo "<p align=center>Song added to Paid Queue.</p>";
		} else {
			echo "<p align=center>You are already in the queue!</p>";
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
