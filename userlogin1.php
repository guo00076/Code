<?php include 'header-Jiawei Guo.php'; ?>
<?php

require_once('connection.php');
    session_start();
    if(isset($_SESSION['connect'])){
        if($_SESSION['connect']->isAuthenticated()){
            session_write_close();
            header('Location:mailing_list.php');
        }
    }
    $missingFields = false;
    if(isset($_POST['submit'])){
        if(isset($_POST['username']) && isset($_POST['password'])){
            if($_POST['username'] == "" || $_POST['password'] == ""){
                $missingFields = true;
            } else {
                //All fields set, fields have a value
                $connect = new Connection();
                if(!$connect->hasDbError()){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $connect->authenticate($username, $password);
                    if($connect->isAuthenticated()){
                        $_SESSION['connect'] = $connect;
                        header('Location:mailing_list.php');
                    }
                }
            }
        }
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
            //Missing username/password
            if($missingFields){
                echo '<h3 style="color:red;">Please enter both a username and a password</h3>';
            }
            
            //Authentication failed
            if(isset($websiteUser)){
                if(!$websiteUser->isAuthenticated()){
                    echo '<h3 style="color:red;">Login failed. Please try again.</h3>';
                }
            }
        ?>
        
        <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" id="submit" value="Login"></td>
            </tr>
        </table>
        </form>
    </body>
</html>
