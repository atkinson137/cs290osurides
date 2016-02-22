<?php include("_header.php"); ?>
	<div class="info">
		<h1>OSU Rides</h1>
		<p>We are a team of student programmers currently working on completing a website for our CS 290 course. Our group consists of: Ryan Atkinson, Samuel Morey, Takumi Crary, Rebecca Farnham, Charles Koll, and Annie Lei. We hope you enjoy our site!</p>
	</div> 
	<img src="images/filler.png" alt="filler for future map" class="filler-image">
	<?php  if(checkAuth(false) != "") {
		echo "<input type=\"button\" class=\"login-filler\" onclick=\"location.href='logout.php';\" value=\"Log Out\" />";
	} else {
		echo "<input type=\"button\" class=\"login-filler\" onclick=\"location.href='settings.php';\" value=\"Log In\" />";
	} ?>
<script type="text/javascript">
	$(document).ready( function() {
		document.getElementById("mainpage").className += "active";
	});
</script>
<?php include("_footer.php"); ?>
