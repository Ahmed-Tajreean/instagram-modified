<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "configure.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<style>
    /* CSS for All */
*{
    margin: 0 0;
    padding: 0 0;
    font-family: Arial, Helvetica, sans-serif;
}
.container{
    width: 80%;
    margin: 0 auto;
    padding: 1%;
}
.img-responsive{
    width: 100%;
}
.img-curve{
    border-radius: 15px;
}

.text-right{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-left{
    text-align: left;
}
.text-white{
    color: white;
}
.text-aqua{
    color: aqua;
}

.clearfix{
    clear: both;
    float: none;
}

a{
    color: #ff6b81;
    text-decoration: none;
}
a:hover{
    color: #ff4757;
}

.btn{
    padding: 1%;
    border: none;
    font-size: 1rem;
    border-radius: 5px;
    
}
.btn-primary{
    background-color: #ff6b81;
    color: rgba(0,0,0,.5);
    cursor: pointer;
}
.btn-primary:hover{
    color: rgba(0,0,0,.5);
    background-color: #ff4757;
}
h2{
    color: aqua;
    font-size: 2rem;
    margin-bottom: 2%;
}
h3{
    font-size: 1.5rem;
}
.float-container{
    position: relative;
}
.float-text{
    position: absolute;
    bottom: 50px;
    text-align: center;
    left: 40%;
}
fieldset{
    border: 1px solid white;
    margin: 5%;
    padding: 3%;
    border-radius: 5px;
}


/* CSSS for navbar section */

.logo{
    width: 10%;
    float: left;
}
.menu{
    line-height: 60px;
    
}
.menu ul{
    list-style-type: none;
}

.menu ul li{
    display: inline;
    padding: 1%;
    font-weight: bold;
}


/* CSS for Food SEarch Section */

.food-search{
    background-image: url(../images/bg.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding: 7% 0;
}

.food-search input[type="search"]{
    width: 50%;
    padding: 1%;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
}


/* CSS for Categories */
.categories{
    background-color: black;
    padding: 4% 0;
}

.box-3{
    width: 28%;
    float: left;
    margin: 2%;
}


/* CSS for Food Menu */
.food-menu{
    background-color: black ;
    padding: 4% 0;
}
.food-menu-box{
    width: 43%;
    margin: 1%;
    padding: 2%;
    float: left;
    background-color: black;
    border-radius: 15px;
}
.food-menu-box:hover{
    background: #4fb5dd;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px #195097,
                0 0 25px #195097,
                0 0 50px #2629cf,
                0 0 100px #2629cf;
}

.food-menu-img{
    width: 20%;
    float: left;
}

.food-menu-desc{
    color: white;
    width: 70%;
    float: left;
    margin-left: 8%;
}

.food-price{
    font-size: 1.2rem;
    margin: 2% 0;
}
.food-detail{
    font-size: 1rem;
    color: #fff;
}


/* CSS for Social */
.social ul{
    list-style-type: none;
}
.social ul li{
    display: inline;
    padding: 1%;
}

/* for Order Section */
.order{
    width: 50%;
    margin: 0 auto;
}
.input-responsive{
    width: 96%;
    padding: 1%;
    margin-bottom: 3%;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
}
.order-label{
    margin-bottom: 1%; 
    font-weight: bold;
}

/* for login screen*/
.login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(0,0,0,.5);
    box-sizing: border-box;
    box-shadow: 0px 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
  }

  .login-box h2 {
    margin: 0 0 30px;
    padding: 10;
    color: #fff;
    text-align: center;
  }

  .login-box .user-box {
    position: relative;
  }

  .login-box .user-box input {
    width: 100%;
    padding: 20px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 10px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
  }

  .login-box .user-box label {
    position: absolute;
    top: 0px;
    left: 0;
    padding: 15px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
  }
  .login-box .user-box input:focus ~ label,.login-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
  }
  
  .login-box form #submit1 {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px
  }
   #submit1:hover{
    background: #f4032b;
    color: rgba(0,0,0,.5);
    border-radius: 5px;
    box-shadow: 0 0 5px #cc2271,
                0 0 25px #cc2271,
                0 0 50px #cc2271,
                0 0 100px #cc2271;
  }
  #submit2:hover{
    background: #f4032b;
    color: rgba(0,0,0,.5);
    border-radius: 5px;
    box-shadow: 0 0 5px #cc2271,
                0 0 25px #cc2271,
                0 0 50px #cc2271,
                0 0 100px #cc2271;
  }
  /*navication */
  .nav {
    position: relative;
    display: inline-flexbox;
    padding: 2px 5px;
    color: aqua;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: .5px;
    letter-spacing: 1px
  }
  /* order page*/
  .order-box {
    position: absolute;
    top: 80%;
    left: 50%;
    width: 800px;
    height: 600px;
    padding: 20px;
    transform: translate(-50%, -50%);
    background: black;
    box-sizing: border-box;
    box-shadow: 0px 15px 25px rgba(0,0,0,.6);
    border-radius: 10px;
  }
  .order-box h2 {
    margin: 0 0 30px;
    padding: 10;
    color: #fff;
    text-align: center;
  }

  .order-box .user-box {
    position: relative;
  }

  .order-box .user-box input {
    width: 100%;
    padding: 20px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 10px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
  }

  .order-box .user-box label {
    position: absolute;
    top: 0px;
    left: 0;
    padding: 20px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
  }
  .order-box .user-box input:focus ~ label,.order-box .user-box input:valid ~ label {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
  }
  .order body{
      background-image: url(../images/orderbg.jpg); ;
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body >
    
    <div class="login-box">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="user-box">
          
          <input type="text" name="username" required=""  value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
            <label>Username</label>  
          </div> 
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
           
          </div>
          <button type="submit" class="btn" value="Confirm" id="submit1">Log in</button>

          <p style="margin: 15px 0 0;
          color: #b3b3b3;
          font-size: 12px;">Not registered? <a href="registration.php" style="color: #03e9f4;">Create an account</a>
        </p>
        <p style="margin: 15px 0 0;
          color: #b3b3b3;
          font-size: 12px;">Do you want to return home? <a href="index.php" style="color: #03e9f4;">home</a>
        </p>
        </form>
      </div>
</body>
</html>

