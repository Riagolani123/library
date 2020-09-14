<?php
    session_start();
    if(!isset($_SESSION['username']))
    {                           
      header("Location:'../login.php'");
    } 
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body
    {
      background-image:url("../images/img1.jpg");
      /* background-color: red; */
      background-repeat:no-repeat;
      background-size:cover;
    }
    div{
      color:white;
      font-size:40px;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: white;
    }
    button{
      background-color:white;
      font-size:15px;
      color:black;
      font-weight:bold;
    }
    button:hover{
      background-color:rgb(90,100,100);
    }
    table{
      border: 3px solid;
      background-color:white;
      padding:20px;
    }
    th,tr,td{
      padding: 13px;
      line-height:30px;
    }
    a:link, a:visited, a:active {
      color: black;
    }
    a:hover{
      color: blue;
    }
</style>
</head>
<body>
  <div>Welcome! <?php echo $_SESSION['name'];?></div>
  <ul>
    <center><h3>All Files</h3>
  </ul>
  <button style='float:right' onclick="location.href='../logout.php'">Log-out</button>
<br>
<?php
//Display all the filename and read the selected file from File Folder
   
if(isset($_SESSION['username']))
{
    $i=1;                   
    $conn=new mysqli("localhost","root","","library");
    $sql="select * from upload";
    $r=mysqli_query($conn,$sql);
    if(mysqli_num_rows($r)<=0)
    {
        echo "<script> alert('Folder is empty.') </script>";
    }
    else
    { 
        echo "<center><table><th>Index</th> <th>Subject</th> <th>File_Name</th> <th>Size</th>";
        while($row = mysqli_fetch_assoc($r))
        {
            $n=$row['name'];
            echo "<tr><td>".$i."</td>"; 
            echo "<td>".$row['subject']."</td>";      
            echo "<td><a href='../Files/".$n."'>".$row['name']."</a></td>";           
            echo "<td>".(int)($row['size']/1024)."KB</td></tr>";
            $i++;
        }
        echo" </table>";
    }
}
else{
    header("Location:./login.php");
}
?>  
</html>