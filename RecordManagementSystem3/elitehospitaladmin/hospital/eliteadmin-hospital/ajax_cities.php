<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com/
*/
?>
<?php
include('db.php');
if($_REQUEST['id'])
{
$id=$_REQUEST['id'];
if($id==0){echo "<option>Select Doctor</option>";}else{
$sql=mysql_query("select * from tbl_doctor where specialization_id='$id'");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
}
}
}
?>