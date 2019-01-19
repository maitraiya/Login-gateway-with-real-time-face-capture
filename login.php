<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
function close1()
{
	var x=document.getElementById('myModal1');
	x.style.display = "none";	
}
function show1()
{
	var x=document.getElementById('myModal1');
	x.style.display="block";	

}
function validate_form1()  
{  
var a= document.forms["myform1"]["name1"].value;
if(a.length < 1)
{
	alert("Please Enter First Name");
	return false;
}
var m= document.forms["myform1"]["mob"].value;
if((m.length != 10) && (m < 7000000000 || m > 9999999999))
{
	alert("Please Enter Valid Mob No.");
	return false;
}
if(document.getElementById('photo').value == 0)
{
	alert('Please Upload The Selfie');
	return false;
}

}
function changeImage() {
    var image = document.getElementById('myimage');
    var image1 = document.getElementById('myimage1');	
    if (image.src.match("images/male-avatar.png") && image1.src.match("images/female-avatar.png")) {
        image.src = "images/male-avatar-tick.png";
    }
    if (image.src.match("images/male-avatar.png") && image1.src.match("images/female-avatar-tick.png")) {
        image1.src = "images/female-avatar.png";
		image.src = "images/male-avatar-tick.png";
    }

}
function changeImage1() {
    var image = document.getElementById('myimage');
    var image1 = document.getElementById('myimage1');	
	if (image.src.match("images/male-avatar.png") && image1.src.match("images/female-avatar.png")) {
        image.src = "images/female-avatar-tick.png";
    }
    if (image.src.match("images/male-avatar-tick.png") && image1.src.match("images/female-avatar.png")) {
        image.src = "images/male-avatar.png";
		image1.src = "images/female-avatar-tick.png";
    }
	
}
function close2()
{
	var x=document.getElementById('myModal2');
	x.style.display="none";	
}
function a()
{	
	var x=document.getElementById('myModal2');
	x.style.display="block";	
	var video = document.getElementById('video');
	
	navigator.getMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia || navigator.mediaDevices || navigator.mediaDevices.getUserMedia);


    if(!navigator.getMedia){
        displayErrorMessage("Your browser doesn't have support for the navigator.getUserMedia interface.");
    }
    else{

        navigator.getMedia(
            {
                video: true
            },
            function(stream){
               video.srcObject = stream;         
            },
            // Error Callback
            function(err){
                displayErrorMessage("There was an error with accessing the camera stream: " + err.name, err);
            }
        );
    }
	var canvas=document.getElementById('canvas');
	var context=canvas.getContext('2d');
	document.getElementById('add-photo').addEventListener('click',function(){
	context.drawImage(video,0,0,100,100);
	
	document.getElementById('download-photo').href = canvas.toDataURL('image/png');
	document.getElementById('download-photo').click();
	});
}

</script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<STYLE>A {text-decoration: none;} </STYLE>
<body onload="a();">
<button style="	top:80%;
	left:20%;
	position: absolute;
 	border: 2px solid black;
	outline: none;
	height: 40px;
	background: #1c8adb;
	color: #fff;
	font-size: 18px;
    border-radius: 20px;
	margin-bottom: 30px;
	width:10%;
" name="submit" id="myBtn1" onClick="show1();">Signup!</button>
<div id="myModal1" style="display:none;" class= "login-box1">
<img src="images/avatar1.png" class="avatar">
<a href="javascript:close1()"><img src="images/close.png" style="radius: 50%; position: absolute;top: 0.0%;left: 92%;" width=20 height=20></a>
<h2>Registration Form</h2>
<form name="myform1" method="post" onsubmit = "return validate_form1();" enctype="multipart/form-data"> 
<input type="text" name="name1" placeholder="Enter Your Name" required >
<input type="number" name="mob" placeholder="Enter Mobile No. " required><br>
Select Your Gender :<br>
<label for="test1">
  <img src="images/male-avatar-tick.png" id="myimage" onClick="javascript:changeImage()" style="radius: 50%; position: absolute; z-index:100;" width=100 height=100>
  <input  id="test1" name="gender" type="radio" style="display:none;"value="male" checked />
</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="test2">
  <img src="images/female-avatar.png" id="myimage1" onClick="javascript:changeImage1()" style="radius: 50%; position: absolute; z-index:100;" width=100 height=100>
    <input  id="test2" name="gender" type="radio" style="display:none;" value="female" />
</label>
<br><br><br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a style="color:#fff;" id="add-photo" href="javascript:a();" class="material-icons">add_a_photo</a><br><br>
<input type="file" value="" accept="image/*" name="photo" capture="camera" id="photo"><br><br>
<input type="submit" name="submit1" value="Signup">

</form>
</div>
<div id="myModal2" style="display:none;" class= "video-box">
	<video id="video" width="200" height="200" autoplay ></video>
      <button id="take-photo" style="top:100%; left:17%; position:absolute; color:#111;" class="material-icons"></button>
      <a href="C:\Users\Maitraiya\Downloads\" onClick="javascript:close2();" id="download-photo" style="top:58%; left:32%; position:absolute; color:#fff;" download="selfie.png" title="Save Photo" class="disabled"><i class="material-icons"></i></a>  
	<canvas id="canvas" width="100" height="100"></canvas>
</div>



<?php
if(isset($_POST['submit1']))
{
	$name=$_POST["name1"];
	$mob=$_POST["mob"];
	$gender=$_POST["gender"];
	$tmp=$_FILES['photo']['tmp_name'];
	$ext=pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
	
	require('db.php');
	   $i= mysqli_query($con,"select * from info where mob='$mob'");
       $row=mysqli_fetch_array($i);
        $x= $row['mob'];
       if($x==$mob)
	{
		?>
               <script>
               alert("Mobile No is already registered");
					<?php unlink('C:\Users\Maitraiya\Downloads\selfie.png');?>
			   </script>
                <?php
        }
		else{
	$i=mysqli_query($con,"insert into info(name,mob,gender)values('$name','$mob','$gender')");
	if($i > 0)
	{			?>
			<script>
					alert('Registration Succesfull');
			</script>
			<?php
			move_uploaded_file($tmp,"images/$name-$mob.".$ext);
			unlink('C:\Users\Maitraiya\Downloads\selfie.png');
	}
	else
	{
		?>
			<script>
					alert('Registration Unsuccesfull, Server Error.Please try again after some time.');
					<?php unlink('C:\Users\Maitraiya\Downloads\selfie.png');?>
			</script>
		
		<?php
	}
		}
	
}
?>
</body>
</html>