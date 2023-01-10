<?php
    include("php/dbconnect.php");

    $error = '';
    if(isset($_POST['login']))
    {

    $username =  mysqli_real_escape_string($conn,trim($_POST['username']));
    $password =  mysqli_real_escape_string($conn,$_POST['password']);

    if($username=='' || $password=='')
    {
    $error='All fields are required';
    }

    $sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

    $q = $conn->query($sql);
    if($q->num_rows==1)
    {
    $res = $q->fetch_assoc();
    $_SESSION['rainbow_username']=$res['username'];
    $_SESSION['rainbow_uid']=$res['id'];
    $_SESSION['rainbow_name']=$res['name'];
    echo '<script type="text/javascript">window.location="index.php"; </script>';

    }else
    {
    $error = 'Invalid Username or Password';
    }

    }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Welcome to Edward Kings!</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
    @font-face {
  font-family: Poppins;
  src: url("fonts/Poppins-Regular.ttf");
}

html * {
  font-family: "Poppins", sans-serif;
}
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
}
    .container {
        display: block;

        justify-content: center;
        align-items: center;
        height: 300px;


    }

body{
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url("images/banner13.jpg");

}
    .panel-body{
        position: absolute;
        right: 0;
        margin: 20px;
        width:auto;
        padding: 16px;
        border-radius: 15px;
        display:block;

    }
    h3{
        background-image: linear-gradient(to left, #000000, #b393d3);
        font-weight: 800;
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
    }
    button{
        opacity: 0.9;
    }

    button:hover{
        background: #fffffff;
        opacity: 1;
    }


</style>

</head>
<body >


    <div class="container">
        
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                          
                            <div class="panel-body" style="background-color: #E2E2E2; margin-top:70px; box-shadow: 5px 10px #888888;">
							  <h3 class="myhead">Welcome to Edward Kings!</h3>
                                <form role="form" action="login.php" method="post">
                                    <hr />
                                    <h5>To login, please fill in the username and password</h5>
									<?php
									if($error!='')
									{									
									echo '<h5 class="text-danger text-center">'.$error.'</h5>';
									}
									?>
									
                                   
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Username " name="username" required />
                                        </div>
                                        
									<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Password" name="password" required />
                                        </div>
										
                                   
                                     
                                     <button class="btn btn-info" style="border-radius:0%" type= "submit" name="login">Login</button>
                                   
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
