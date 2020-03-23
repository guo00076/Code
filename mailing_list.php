<?php include 'header-Jiawei Guo.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    </body>
	<footer>
	<div>
<?php
//include('session.php');
require_once('connection.php');
session_start();

if(isset($_SESSION['connect'])){
    if(!$_SESSION['connect']->isAuthenticated()){
       header('Location:userlogout1.php'); 
    }
} else {
    header('Location:userlogin1.php');
}
    


echo '<br>';
echo '<table>';
echo '<tr>';
echo '<td>' . 'Session AdminID = ' . $_SESSION['connect']->getadminID();
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td>' . 'Last Login Date = ' . $_SESSION['connect']->getlastLogin(); 
echo '</td>';
echo '</tr>';



    $host = "127.0.0.1";
    $username = "root";
    $password = "rootpassword";
    $dbname = "wp_eatery";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
        }
		
    	
    $query = "SELECT _id, customerName, phoneNumber, emailAddress, referrer FROM mailingList" ;
	$results = $conn->query($query);
	echo '<br>';				
	echo '<table border=\'1\'>';
	echo '<tr><th>Name</th><th>Phone</th><th>Email</th><th>Referrer</th></tr>';
	if($results->num_rows > 0){
	while($row = $results->fetch_assoc()){
	echo '<tr>';
	echo '<td>' . $row['customerName'] . '</td>'.'<td>' . $row['phoneNumber'] . '</td>'.'<td>' . $row['emailAddress'] . '</td>'.'<td>' . $row['referrer'] . '</td>';
	echo '</tr>';
    } 
	} else {
		echo "0 results";
	}		
	
	$conn->close();	
?>

	<p>
	<a href="userlogout1.php">Logout!</a>
	</p>
	</div>
	</footer>
</html>