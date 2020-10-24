
<?php 
    ////////check session login///////////////////
    require_once'config.php';
    session_start();;
    if(isset($_SESSION['usertype'])){
        if($_SESSION['usertype'] == 'admin'){
                
        }else{
            echo "<h1>You are not able to access this page okaaaaayyyy! :-(</h1>";
            exit();
        }
    }else{
        header("Location: index.php");
    }
?>
<?php 
    /////////////// add manager details //////////////////
    if(isset($_POST['submit'])){
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $checkstring ='';
            // Loop to store and display values of individual checked checkbox.
            $checkboxes = isset($_POST['checkbox_list']) ? $_POST['checkbox_list'] : array();
            foreach($checkboxes as $value) {
                ////convert permission array to a string//////////
                if(!empty($checkstring)){
                    $checkstring = $checkstring.",".$value;
                }else{
                    $checkstring = $value;
                }
                
            }
         
        ////insert details ////////
        try{
            $stmt = $con->prepare("insert into manager (username,password,permission) values(:username,:password,:permission)");
            $stmt->execute([ 
                'username' => $username,
                'password' => $password,
                'permission'=> $checkstring,
            ]);

            echo '<script language="javascript">';
            echo 'alert("Successfully details added")';
            echo '</script>';

        }catch(PDOExeception $e){
            echo "<h1>Somthing wrong</h1>";

        }
    
            
       
       
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./css/managerform.css">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <!--==== include header ================ -->
    <?php include_once "header.php"; ?>
   
    

<!--=============== start member form ==========-->
   <div class='form_container'>
   <h2>Add New Manager Form</h2>
   <form action="" method='POST'>
                <label for="username">Username<input type="text" name='username' id='username'placeholder='Username' required>
                <label for="password">New Password</label>
                <input type="password" name='password' id='password' placeholder='Password' required>
                <h4>Pages permission:</h4>
                
                <label class='checkbox'><input type="checkbox"name='checkbox_list[]' value='page1'>Page1</label>                                                
                <label class='checkbox'><input type="checkbox" name='checkbox_list[]' value='page2'> Page2</label>
                <label class='checkbox'><input type="checkbox" name='checkbox_list[]' value='page3'> Page3</label>
                <label class='checkbox'><input type="checkbox" name='checkbox_list[]' value='page4'> Page4</label>
                <label class='checkbox'><input type="checkbox" name='checkbox_list[]' value='page5'> Page5</label> 
               
                <input type="submit" name="submit" value="Add"> 
                      
    </form>
    </div>

    <!--=============== end member form ==========--> 
</body>
</html>