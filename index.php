<html>
<head>
    <title>college notes gallery</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1 class="title">College Notes Library</h1>
<ul class="ulc">
  <li><a href="index.php">Home</a></li>
  <li><a href="aboutus.html">About Us</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="signup.php">Sign Up</a></li>
 </ul> 
 <div style="max-width:500px">
  <img class="mySlides" id="i1" src="images/img1.jpg" style="width:150%; height:400px">
  <img class="mySlides" id="i2" src="images/book2.jpg" style="width:150%; height:400px">
  <img class="mySlides" id="i3" src="images/img3.jpg" style="width:150%; height:400px">
</div>

<div class="paragraph">
    <div class="para"><p id="para1">Notes enhance your focus.</p></div>
    <div class="para"><p id="para2">Notes act as a cheat sheet for finding important points.</p></div>
    <div class="para"><p id="para3">Notes act as a cheat sheet for finding important points.</p></div>
</div>

<footer>
    <p>&copy Riya</p>
</footer>
<script>
var myIndex = 0;
carousel();
function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000);
}
</script> 
</body>
</html>
