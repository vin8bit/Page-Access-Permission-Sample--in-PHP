<?php 
    ////////check session login///////////////////
    require_once'config.php';
    session_start();;
    if(isset($_SESSION['usertype'])){
        if($_SESSION['usertype'] == 'employee' || $_SESSION['usertype'] == 'admin'){
                
        }else{
            echo "<h1>You are not able to access this page okaaaaayyyy! :-(</h1>";
            exit();
        }
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="./css/managerform.css">
</head>
<body>
     <!--==== include header ================ -->
     <?php include_once "header.php"; ?>
</body>
</html>