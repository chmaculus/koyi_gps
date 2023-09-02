<select name="sociedad">
<option value="">Seleccione</option>
<?php
include("../includes/connect.php");
$q='select sociedad from sociedades order by sociedad';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	echo '<option value="'.$row[0].'">'.$row[0].'</option>'.chr(10);	
}
?>





</select>