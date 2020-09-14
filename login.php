<html>
<head> 
<style>
        body{
                    font-family:'Open Sans', sans-serif;
                    background-color:lightblue;
                    margin: 0 auto 0 auto;  
                    width:100%; 
                    text-align:center;
                    margin: 20px 0px 20px 0px;   
        }       
        p{
                    font-size:12px;
                    text-decoration: none;
                    color:#ffffff;
                }
        h1{
                    font-size:1.5em;
                    color:#525252;
                }
        .box{
                    background:white;
                    width:300px;
                    border-radius:6px;
                    margin: 0 auto 0 auto;
                    padding:0px 0px 70px 0px;
                    border: #2980b9 4px solid; 
                }
        .email{
                  background:#ecf0f1;
                  border: #ccc 1px solid;
                  border-bottom: #ccc 2px solid;
                  padding: 8px;
                  width:250px;
                  margin-top:10px;
                  font-size:1em;
                  border-radius:4px;
                }
        .btn{
                  background:#3498db;
                  width:125px;
                  padding-top:5px;
                  padding-bottom:5px;
                  color:white;
                  border-radius:4px;
                  border: #27ae60 1px solid;
                  font-size:18px;      
                 
                }
       
</style>
</head>

<body>
    <br>
    <br><br><br>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
        <form method="post" action="">
        <div class="box">
            <h1>LOGIN</h1>
            <br>Username
            <br>
            <input type="text" name="username" placeholder="Username" class="email"/><br>
            PASSWORD
            <input type="password" name="psw" placeholder="password" class="email"/><br><br>
            <input type="submit" name="sub" value="Submit" class="btn"><br><br>
            <a href="signup.php">Sign Up</a>
        </div>
        </form>
</body>
</html>
<?php
ini_set("display_errors",'off');
if(isset($_POST['sub']))
{       
	$a=$_POST['username'];
	$b=$_POST['psw'];
        $con=mysqli_connect("localhost","root","","library");
        $sql="select * from user where username='$a' AND password='$b'";
	$y=mysqli_query($con,$sql);
	$r=mysqli_num_rows($y);
        
	if($r>0)
	{       
                session_start();
                $z = mysqli_fetch_assoc($y);
                $_SESSION["username"] = $z["username"];
                $_SESSION["name"]=$z["name"];
                $_SESSION["id"]=$z["id"];
                if($z['role']=="teacher")
                {
                        header("Location:teacher/upload_teacher.php?user=".$a);
                }
                else
                {
                        header("Location:student/upload_student.php?user=".$a);
                }
	}
	else
	{	
        echo "<script> alert('User-details not found.')</script>";
		header("Location:signup.php");
	}
}
?>
