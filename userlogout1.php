
<?php
session_start();
if(isset($_SESSION['connect'])){
    session_unset();
    session_destroy();
    session_start();
    //session_regenerate_id();
} 

    header('Location:userlogin1.php');
?>




