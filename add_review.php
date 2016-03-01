<?php include("_header.php");?>

<h1>ADD REVIEW</h1>

<form method="post" action='add_review_recieve.php' class="inform">
<ul>
<li><label>ID:</label> <input type="number" name="id" oninput="validity.valid||(value='');" min=0 required>
<li><label>Driver or Passenger:</label>
<select name="Spot">
 <option value="DRIVER">Driver</option>
 <option value="PASSENGER">Passenger</option>
</select>
<li><label>Score (0 to 5):</label> <input type="number" name="user_score" oninput="validity.valid||(value='');" min=0 max=5 required>
<li><label>Recommend?:</label> <input type="checkbox" name="recommend">Yes
<li><label>Comments:</label> <input type="text" name="description">
<li><input type=submit>
</ul>
</form>


<?php include("_footer.php");?>
