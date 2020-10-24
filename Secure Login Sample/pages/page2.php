<?php 

    session_start();
    $flag = 0;
    if(isset($_SESSION['usertype'])){
        //////all permission for admin////////
        if($_SESSION['usertype'] == 'admin'){
            $flag =1;
         }else{
                    //////// check page permission///////// 
                    $string = $_SESSION['permission']; 
                    $per_arr = explode (",", $string);
                    foreach($per_arr as $value) {
                        if($value==='page2'){
                            $flag =1;
                            break;
                        }
                    }
        } 

    if($flag==1){
        echo "<h1>Welcome to page 2</h1>";
        echo "<h1>Do whatever you want....... =_= !</h1>";
    }
    else{
        echo "<h1>You are not able to access this page okaaaaayyyy! :-(</h1>";
        exit();

    }

    }else{
        header("Location: index.php");
    }    

?>