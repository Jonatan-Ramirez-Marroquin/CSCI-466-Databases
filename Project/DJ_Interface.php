<!--
CSCI 466 Group Project (Spring 2021)
Karaoke Management System
Song Search File
===================================
Brian McCarthy
David Roszkowski
Christopher Vukmir
Jonatan Ramirez-Marroquin
===================================
-->

<html>
	<body>
		<!--
		Change Background color
		-->
		<body style="background-color:powderblue;">

		<!--
		Center text
		-->
		<style>
			h1 {text-align: center;}
			h2 {text-align: center;}
			form {text-align: center;}
			table {margin:auto;}
		</style>

		<!--
		Title
		-->
		<h1>DJ Interface</h1>
	</body>
</html>

<?php
	echo "<p align=center>Free Queue:</p>";
	include("personal_Login.php");
	try{
		//Provide Free Queue table.
		$dsn = "mysql:host=courses;dbname=mydatabase";
		$pdo = new PDO($dsn, $userName, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$rsPart = $pdo->query("SELECT userName, songName, artistName, karaokeID, time 
					FROM User JOIN FreeQueue USING (userName)
					JOIN KaraokeFile USING (karaokeID) 
					JOIN Songs USING (songID) 
					JOIN Artist USING (artistID);");
		$rows = $rsPart->fetchAll(PDO::FETCH_ASSOC);
		if(!$rows) {
			echo "<p align=center>The free queue is empty.</p>";
		} else {
			echo "<table border=2 cell spacing=2>";
			echo "<tr>";
			echo "<th>Singer</th>";
			echo "<th>Song</th>";
			echo "<th>Artist</th>";
			echo "<th>Karaoke File</th>";
			echo "<th>Time Submitted</th>";
			echo "<tr>";
			foreach($rows as $row) {
				echo "<tr>";
				foreach($row as $key => $item) {
					echo "<td>$item</td>";
				}
				echo "<tr>";
			}
			echo "</table>";
		}

		//Provide Paid Queue table.
		echo "<br>";
		echo "<p align=center>Paid Queue:</p>";
		$rsPart = $pdo->query("SELECT userName, songName, artistName, karaokeID, time, price
					FROM User JOIN PaidQueue USING (userName)
					JOIN KaraokeFile USING (karaokeID)
					JOIN Songs USING (songID) 
					JOIN Artist USING (artistID);");
		$rows = $rsPart->fetchAll(PDO::FETCH_ASSOC);
		if(!$rows) {
			echo "<p align=center>The paid queue is empty.</p>";
		} else {
			echo "<table border=2 cell spacing=2>";
			echo "<tr>";
			echo "<th>Singer</th>";
			echo "<th>Song</th>";
			echo "<th>Artist</th>";
			echo "<th>Karaoke File</th>";
			echo "<th>Time Submitted</th>";
			echo "<th>Amount Paid</th>";
			echo "<tr>";
			foreach($rows as $row) {
				echo "<tr>";
				foreach($row as $key => $item) {
					echo "<td>$item</td>";
				}
				echo "<tr>";
			}
			echo "</table>";
		}
	}
	catch(PDOexception $e) {
		echo "Connection to Database failed: " . $e->getMessage();
	}
?>

<html>
	<body>
		<!--
		Return to Main Page
		-->
		<h2>Return to Home</h2>
		<form action = "http://students.cs.niu.edu/~mydatabase/htmlPage_Project.php" method = "GET">
			<input type = "Submit" name = "Submit" value = "Home"/>
		</form>
	</body>
</html>


