<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Secure Login</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class='form_container'>
        <form action="login.php" method='post'>
                <h2 id="logo">Login Page</h2>
                <label for="type">Login Type </label>
                <select name="logintype" id="type" required>
                    <option value=""></option>
                    <option value="admin">Admin Login</option>
                    <option value="manager">Manager Login</option>
                    <option value="employee">Employee Login</option>
                </select>
                <label for="user_name">Username</label>
                <input id="user_name" name="username" type="text" placeholder="Enter username..." required>
                <label for="user_pass">Password</label>
                <input id="user_pass" name="userpass" type="password" placeholder="Enter password..." required>
                <input type="submit" name="submit" value="Login">
                <h5>Don't have an account?<a href=""><span> Create account</span></a></h5>
                
            </form>
        </div> 
        <p></p>    
        </body>
</html>