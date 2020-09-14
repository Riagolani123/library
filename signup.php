<?php  
session_start();
ini_set("display_errors","off");
$conn = mysqli_connect("localhost","root","","library"); 
$nerr="";$emerr="";$uerr="";$perr="";$roerr="";
$name=$_POST['name'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$psw=$_POST['psw'];
$psw2=$_POST['psw2'];
$role=$_POST['role'];
$_SESSION['uname']=$uname;
if(isset($_POST['submit']))
{
    $nerr="";$emerr="";$uerr="";$perr="";$roerr="";
    if (empty($psw)){$perr="password required";}
    else if(!preg_match("/^[a-zA-Z0-9+@]{6,12}*$/",$psw)){$perr="alphanumeric password 6 to 12 characters required";} 
    if(empty($name)){$nerr="Name Required";}
    else if(!preg_match("/^[a-zA-Z]*$/",$name)){$nerr="alphabets only required";}
    if(empty($uname)){$uerr="Username Required";}
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$uname)){$uerr="alphabets and numerical required";}
    if(empty($email)){$emerr="Email Required";}
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {$emerr = "Invalid email format";}
    else if(($psw==$psw2) && (!empty($psw)) )
    {
        if(isset($uname))
        {
            
             $sql="SELECT * from user WHERE username='$uname'";
            $rowcount=mysqli_num_rows(mysqli_query($conn,$sql));
            if ($rowcount > 0)
            {
                echo "<script>alert('User already exist');</script>";
                header("Location:login.php");
            }    
            else
            {
                    $insert = "INSERT into user (username,password,name,email,role) values ('$uname','$psw','$name','$email','$role')";
                    $query = mysqli_query($conn,$insert);
                    header("Location:login.php");   
            }
        }
    }
    
    else
    {
        echo "<script type='text/javascript'>alert('Enter same password!');</script>";
    }
}
?>

<html>
<head>
    <style>
            body{
                    font-family: 'Open Sans', sans-serif;
                    background-color:lightblue;
                }       
            h1{
                    font-size:1.5em;
                    color:#525252;
                }
            table{
                    background:white;
                    border-radius:6px;
                    padding:10px 10px 80px 10px;
                    border: #2980b9 4px solid; 
                }
             .em{
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
            table tr td{
                    padding-top:10px;
                }
            .btn:hover{
                    background-color:black; 
                }
                .error{
                    color:red;
                }
    </style>
</head>
<body>
    <br><br>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
        <form method="post" action=" ">
        <center><table>
            <h1>SIGN-UP</h1>
            <br><tr><th>Name:</th>
            <td><input type="text" name="name" placeholder="Name" class="em"/><span class="error">*<?php echo $nerr;?></span></td></tr>
            <tr><th>Email:</th>
            <td><input type="text" name="email" placeholder="Email-id" class="em"  /><span class="error">*<?php echo $emerr;?></span></td></tr>
            <tr><th>Username:</th>
            <td><input type="text" name="uname" placeholder="Username" class="em"  /><span class="error">*<?php echo $uerr;?></span></td></tr>
            <tr><th>Password:</th>
            <td><input type="password" name="psw" placeholder="Password" class="em"  /><span class="error">*<?php echo $perr;?></span></td></tr>
            <tr><th>Confirm password:</th>
            <td><input type="password" name="psw2" placeholder="Password" class="em" /><span class="error">*</span></td></tr>
            <tr><th>Role:</th>
            <td><input type="radio" name="role" value="teacher">Teacher
            <input type="radio" name="role" value="student">Student<span class="error">*<?php echo $roerr;?></span><br></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Submit" class="btn"></td></tr>
        </table>
        </form>
</body>
</html>