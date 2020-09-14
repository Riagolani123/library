<html>
	<style type="text/css">
		td{
			padding: 15px;
			line-height:30px;
		}
         div{
				padding: 50px;
				background-color:#f2f4f1;		
				margin: 100px;
				border-radius: 20px; 
		}			      
	</style>
<body style="background:#f2f4f1;">
<div>
<fieldset style="border-radius: 20px"><legend><h1>Upload the file</h1></legend>
	<table>
    <form action="" method="post" enctype="multipart/form-data">
        <tr><td>Choose the subject:
				    <select name="subject" id="select">
                    <option value="">Default</option>
					<option value="Physics">Physics</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Maths">Maths</option>
					<option value="Coding">Coding</option>
                    <option value="other">Other</option>
                    </select>
        </td></tr>
    <tr><td><input type="file" name="file"></td></tr>               
    <tr><td><input type="submit" name="sub"></td></tr>
    <tr><td><input type="button" onclick="location.href='upload_teacher.php';" value="Back" ></td></tr>
    </form>
	</table>
</fieldset>
</div>
</body>
</html>

<?php
//Uploading  file in database & File folder
        session_start();
        if(isset($_SESSION['username']))
        {
            if(isset($_POST["sub"]))
            {
                if($_FILES["file"]["error"] > 0)
                {
                    echo "<script> alert('File has some error.');</script>";
                }
                else
                {
                    $username =$_SESSION['username'];  
                    $subject=$_POST['subject'];                             
                    $name = $_FILES["file"]["name"];
                    $size = $_FILES["file"]["size"];
                    $dir="Files";
                    if( is_dir($dir) === false )
                    {
                        mkdir("../".$dir);
                    }
                    if(file_exists("../".$dir."/".$name))
                    {
                        echo "<script> alert('File is already exists.');</script>";
                    }
                    else
                    {
                        if($subject!= "")
                        {
                            move_uploaded_file($_FILES["file"]["tmp_name"],"../".$dir."/".$name);
                            $conn=new mysqli("localhost","root","","library");
                            $sql="Insert into 
                            upload(username,name,subject,size) 
                            Values('$username','$name','$subject','$size')";                                                   
                            if(mysqli_query($conn,$sql))
                            {
                                echo "<script> alert('File is uploaded.');</script>";
                            }
                            else
                            {
                                echo "<script> alert('File is not uploaded.');</script>";
                            }
                        }
                        else
                        {
                            echo "<script> alert('Subject is not selected.');</script>";
                        }
                    }
                }
            }
        }
        else{
            header("Location:./login.php");
        }
?>

