<?php

echo "<br><br>";

include_once 'db_connect.php';

// Show all projects

$sql = mysql_query("SELECT * FROM projects");

while ($row = mysql_fetch_assoc($sql)) {
	echo '<a href="project.php?id='.$row['id'].'">'.$row['name'].'</a>';
}

mysql_free_result($sql);

?>
