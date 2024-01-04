<?php
	echo "<p align=center>Song Title Results:</p>";
	include("personal_Login.php");
	try{
		//Provide information on specific title.
		$dsn = "mysql:host=courses;dbname=mydatabase";
		$pdo = new PDO($dsn, $userName, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sqlCode = "SELECT artistName, songName, songVersion, karaokeID FROM Artist JOIN Songs USING (artistID) JOIN KaraokeFile USING (songID) WHERE songName = ?;";
		$rsPrepare = $pdo->prepare($sqlCode);
		$rsPrepare->execute(array($_GET["songTitle"]));
		$rows = $rsPrepare->fetchAll(PDO::FETCH_ASSOC);
		if(!$rows) {
			echo "<p align=center>No Result for specified Title.</p>";
		} else {
			echo "<table border=2 cell spacing=2>";
			echo "<tr>";
			echo "<th>Artist Name</th>";
			echo "<th>Song Name</th>";
			echo "<th>Song Version</th>";
			echo "<th>Karaoke File</th>";
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
		Form to sign up to sing.
		-->
		<h2>Sign up to Sing! Pick a song and be sure to press Submit when done!</h2>
		<h2>Free Queue</h2>
		<form action = "http://students.cs.niu.edu/~mydatabase/Sign_Up_Free.php" method = "POST">
			Your Name(First and Last):<input type = "text" name = "userName">
			<br>
			<br>
			Karaoke File:<input type = "text" name = "karaokeFile">
			<br>
			<br>
			<input type = "Submit" name = "Submit" value = "Submit"/>	
		</form>
		<br>
		<h2>Paid Queue</h2>
		<form action = "http://students.cs.niu.edu/~mydatabase/Sign_Up_Paid.php" method = "POST">
			Your Name(First and Last):<input type = "text" name = "userName">
			<br>
			<br>
			Karaoke File:<input type = "text" name = "karaokeFile">
			<br> 
			<br>
			Payment Amount:<input type = "text" name = "paymentAmount">
			<br> 
			<br>
			<input type = "Submit" name = "Submit" value = "Submit"/>
		</form>
		<br>
		<!--
		Send user back to Home Page
		-->
		<h2>Return to Home</h2>
		<form action = "http://students.cs.niu.edu/~mydatabase/htmlPage_Project.php" method = "GET">
			<input type = "Submit" name = "Submit" value = "Home"/>
		</form>
		<br>
	</body>
</html>
