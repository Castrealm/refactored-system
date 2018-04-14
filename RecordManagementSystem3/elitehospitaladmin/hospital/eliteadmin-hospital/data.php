<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mysqli_prm');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT count(disease) as quantity, disease FROM tbl_appointment WHERE MONTH(pref_date) = MONTH(NOW()) and disease != '' and disease != 'Unknown' GROUP BY disease LIMIT 5");
// $query = sprintf("SELECT  quantity FROM orders");
// $query1 = sprintf("SELECT  product_name FROM orders where dateordered = CURDATE() GROUP BY product_name");
// if ($result = mysqli_query($mysqli,$query) {


// 	mysqli_num_rows($result);

// 	mysqli_free_result($result);
// }


//execute query
$result = $mysqli->query($query);



//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>