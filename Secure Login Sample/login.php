<?php
    require_once 'config.php';

    //get form values////////////////////
    if(isset($_POST['submit'])){
    $logintype = isset($_POST['logintype']) ? $_POST['logintype'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['userpass']) ? $_POST['userpass'] : '';
    
        //check login type/////////////////
        
        ///////employee login////////////////////

        if($logintype ==='employee'){
            try{
                $query = "select * from `employee` where `username`=:username and `password`=:password";
                $stmt = $con->prepare($query);
                $stmt->bindParam('username', $username, PDO::PARAM_STR);
                $stmt->bindParam('password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $count= $stmt->rowCount();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row)){
                    session_start();
                    $_SESSION['usertype'] = "employee";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['permission'] = $row['permission'];
                    header("location: employee.php");
                }else{
                    echo "Invalid username or password";
                }
                }catch(PDOException $p){
                    echo $p;
    
                }
        
        ///////manager login////////////////////

        }elseif($logintype ==='manager'){
            try{
                $query = "select * from `manager` where `username`=:username and `password`=:password";
                $stmt = $con->prepare($query);
                $stmt->bindParam('username', $username, PDO::PARAM_STR);
                $stmt->bindParam('password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $count= $stmt->rowCount();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row)){
                    session_start();
                    $_SESSION['usertype'] = "manager";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['permission'] = $row['permission'];
                    header("location: manager.php");
                }else{
                    echo "Invalid username or password";
                }
                }catch(PDOException $p){
                    echo $p;
    
                }
        
        ///////admin login////////////////////
        
        }elseif($logintype ==='admin'){
            try{
            $query = "select * from `admin` where `username`=:username and `password`=:password";
            $stmt = $con->prepare($query);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindParam('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count= $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($count == 1 && !empty($row)){
                session_start();
                $_SESSION['usertype'] = "admin";
                $_SESSION['username'] = $row['username'];
                header("location: admin.php");
            }else{
                echo "Invalid username or password";
            }
            }catch(PDOException $p){
                echo 'Somethin wrong...';

            }

        }
    
    }
    else{
        echo "Error 404";
    }
?>