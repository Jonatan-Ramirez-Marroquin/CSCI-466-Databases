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
		</style>

		<!--
		Title
		-->
		<h1>Song Search</h1>

		<!--
		Searching by Artist
		-->
		<h2>Search by Artist</h2>
		<form action = "http://students.cs.niu.edu/~z1912344/Search_Artist.php" method = "GET">
			Artist Name:<input type = "text" name = "artistName"/>
			<br>
			<br>
			<input type = "Submit" name = "Submit" value = "Submit"/>
			<br>
		</form>
		<br>
		
		<!--
		Search by Title
		-->
		<h2>Search by Song Title</h2>
		<form action = "http://students.cs.niu.edu/~z1912344/Search_Title.php" method = "GET">
			Song Title:<input type = "text" name = "songTitle"/>
			<br>
			<br>
			<input type = "Submit" name = "Submit" value = "Submit"/>
			<br>
		</form>
		<br>
		
		<!--
		Search by Contributor
		-->
		<h2>Search by Contributor (Author, Singer, Guitarist, Drummer, etc.)</h2>
		<form action = "http://students.cs.niu.edu/~z1912344/Search_Contributor.php" method = "GET">
			Contributor Name:<input type = "text" name = "contributorName"/>
			<br>
			<br>
			<input type = "Submit" name = "Submit" value = "Submit"/>
			<br>
		</form>
		<br>

		<!--
		Return to Main Page
		-->
		<h2>Return to Home</h2>
		<form action = "http://students.cs.niu.edu/~z1912344/htmlPage_Project.php" method = "GET">
			<input type = "Submit" name = "Submit" value = "Home"/>
		</form>
	</body>
</html>
