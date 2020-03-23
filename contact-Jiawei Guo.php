<?php include 'header-Jiawei Guo.php'; ?>
<!DOCTYPE html>
<html>
            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
				 
				<?php
				    require_once('connection.php');
				
				    @$customername = $_POST['customerName'];
                    @$phonenumber = $_POST['phoneNumber'];
                    @$emailaddress = $_POST['emailAddress'];
					@$referrer = $_POST['referral'];
					
					$errorMessages = Array();
					@$hasError = false;
					if ($_SERVER['REQUEST_METHOD']=='POST'){
                    if(isset($_POST['customerName']) || isset($_POST['phoneNumber']) || isset($_POST['emailAddress'])){
	                if($customername == ""){
					$hasError = true;
	                $errorMessages['customerNameError'] = 'Please enter a name!';
	                }
	                if($phonenumber == ""){
					$hasError = true;
	                $errorMessages['phoneNumberError1'] = 'Please enter a phonenumber!';
	                }
					if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phonenumber)){
					$hasError = true;
	                $errorMessages['phoneNumberError2'] = 'Please enter phonenumber in Right Format! 000-000-0000';
	                }
	                if($emailaddress == "" ){
					$hasError = true;
	                $errorMessages['emailAddressError1'] = 'Please enter a emailaddress!';
					}
					if(!filter_var($emailaddress,FILTER_VALIDATE_EMAIL)){
					$hasError = true;
					$errorMessages['emailAddressError2'] = 'Please enter a CORRECT emailaddress!';
					}
					if($referrer == null){
					$hasError = true;
					$errorMessage['referrerError'] = 'Please select one source!';	
					}
					}
					$hash = password_hash($emailaddress, PASSWORD_DEFAULT);  
				
                    $host = "127.0.0.1";
                    $username = "root";
                    $password = "rootpassword";
                    $dbname = "wp_eatery";

                    $conn = new mysqli($host, $username, $password, $dbname);

                    if ($conn->connect_error){
                    die("Connection failed: " . $conn->connect_error);
                    } 
                    
                    $sql = "INSERT INTO mailingList " . "(customerName, phoneNumber, emailAddress, referrer)" . "VALUES('$customername', '$phonenumber', '$hash', '$referrer')" ;
                    $quer = mysqli_query($conn, "SELECT * FROM mailingList WHERE emailAddress='".$emailaddress."'");
					
					
					
				    if(mysqli_num_rows($quer) > 0){
                    echo '<span style=\'color:red\'>' . 'Email already exists!' . '</span>';
					}else{
					
                    
				    					
				    
					session_start();	
                    if (!$hasError){
					
					if(isset($_SESSION['connect'])){
					
					mysqli_query($conn, $sql);
					
                    echo '<span style=\'color:chocolate\'> '. 'New record created successfully' . '</span>';
                    } else {
						
                    echo '<span style=\'color:red\'>' . 'Error: ' . $sql . '<br>' . $conn->error . '</span>';
					}
				
					header('Location:userlogin1.php');
                    mysqli_close($conn);
					}
					
					
					
					
					
					
					
					$dir = "files/";
				    @$file = $dir . basename($_FILES["fileToUpload"]["name"]);
				    if(isset($_FILES['fileToUpload']['name'])){
					       if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
							  echo "<br>";
                              echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
                              } else {
                              echo "Sorry, there was an error uploading your file.";
                            }
					}
					
                    }
		            
					}
					
                    ?>
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="contact-Jiawei Guo.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'>
								<?php
								if(isset($errorMessages['customerNameError'])){
                                   echo '<span style=\'color:red\'>' . $errorMessages['customerNameError'] . '</span>';
                                 }
								 ?>
								</td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'>
								<?php
								if(isset($errorMessages['phoneNumberError1'])){
                                   echo '<span style=\'color:red\'>' . $errorMessages['phoneNumberError1'] . '</span>';
                                 }else{
								if(isset($errorMessages['phoneNumberError2'])){
                                   echo '<span style=\'color:red\'>' . $errorMessages['phoneNumberError2'] . '</span>';
								 }
								 }
								 ?>
								</td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" size='40'>
								<?php
								if(isset($errorMessages['emailAddressError1'])){
                                   echo '<span style=\'color:red\'>' . $errorMessages['emailAddressError1'] . '</span>';
                                 }else{
								if(isset($errorMessages['emailAddressError2'])){
                                   echo '<span style=\'color:red\'>' . $errorMessages['emailAddressError2'] . '</span>';
                                 }
								 }
								 ?>
						
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'>
									<?php
									 if(isset($errorMessages['referrerError'])){
                                     echo '<span style=\'color:red\'>' . $errorMessages['referrerError'] . '</span>';
                                    }
									?>
                            </tr>
							<tr>
							  <td><input type="file" name="fileToUpload" value="Choose File"></td>
							</tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                            </tr>								
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
    </body>
</html>
<?php include 'footer-Jiawei Guo.php'; ?>