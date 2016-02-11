<?php
	include("_header.php");

	if (checkAuth(true) != "") {
		echo "<div class=\"main\"><h1>This is the settings page! You've been authenticated.</h1></div>";
		//echo "<h1>This is the settings page!</h1>";
?>
	<script type="text/javascript">
	$(document).ready( function() {
		document.getElementById("settingspage").className += "active";
	});
	</script>
<html>
<body>

<h1>My Profile</h1>

<p>Make a post:</p>
<form action="settings.php" method="POST">
	Name: <input type="text" name="name">
	<br>
	Email: <input type="text" name="email">
	<br>
	Starting location: <input type="text" name="start">
	<br>
	Destination: <input type="text" name="end">
	<br>
	<!-- Note: maybe change status values to easy ints? -->
	I would like to be a: <br>
	<input type="radio" name="status" value="Driver">Driver<br>
	<input type="radio" name="status" value="Passenger">Passenger<br>
	<!-- Will hide this subform from passengers later -->
	Seats available: <input type="text" name="seats"><br>
	Comments: <textarea name="comments"></textarea><br>
	<br>
	<input type="submit" name="submit" value="Make post">
</form>

<?php 
	echo "Your post: "; 
	echo "<br><br>";
	echo $_POST["name"];
	echo "<br>";
	echo $_POST["email"];
	echo "<br>";
	echo $_POST["start"];
	echo "<br>";
	echo $_POST["end"];
	echo "<br>";
	echo $_POST["status"];
	echo "<br>";
	if ($_POST["status"] === "Driver") {
		echo $_POST["seats"];	
		echo "<br>";
	}
	echo $_POST["comments"];
	echo "<br><br>";
?>
</body>
</html>

<?php
	}	
	include("_footer.php");
?>

