<!DOCTYPE html >
<html>
<head profile="http://gmpg.org/xfn/11">
<title>Stupefy | College Magazine</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<style type="text/css">
#title {
	width: 500px;
	height: 26px;
	color: #5A698B;
	font: bold 11px/18px "Lucida Grande", "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding-top: 5px;
	text-transform: uppercase;
	letter-spacing: 2px;
	text-align: center;
}
form {
	width: 335px;
}
.col1 {
	text-align: right;
	width: 135px;
	height: 31px;
	margin: 0;
	float: left;
	margin-right: 2px;
	
}

.col2 {
	width: 195px;
	height: 50px;
	display: block;
	float: left;
	margin: 0;
	background: url(images/bg_textfield.gif) no-repeat;
}
.col2comment {
	width: 195px;
	height: 98px;
	margin: 0;
	display: block;
	float: left;
}
.col1comment {
	text-align: right;
	width: 135px;
	height: 98px;
	float: left;
	display: block;
	margin-right: 2px;
}
div.row {
	clear: both;
	width: 335px;
}
.submit {
	height: 29px;
	width: 330px;
	padding-top: 5px;
	clear: both;
} 

.input {
	background-color: #fff;
	font: 11px/14px "Lucida Grande", "Trebuchet MS", Arial, Helvetica, sans-serif;
	color: #5A698B;
	margin: 4px 0 5px 8px;
	padding: 1px;
	border: 1px solid #8595B2;
}

.textarea {
	border: 1px solid #8595B2;
	background-color: #fff;
	font: 11px/14px "Lucida Grande", "Trebuchet MS", Arial, Helvetica, sans-serif;
	color: #5A698B;
	margin: 4px 0 5px 8px;
}
#topbar{
	padding:20px 0;
	z-index:1000;
	}


</style>
<link rel="stylesheet" href="../../styles/layout.css" type="text/css" />

</head>


<body id="top">

<body id="top">
<div class="wrapper col0">
  <div id="topline">
    <p>Tel: +91-9342-342-343 | Mail: info@stupefy.com</p>
    <ul>
      <li><a href="#">Archive</a></li>
      <li><a href="#">Discussion Forum</a>
      <li><a href="#">Sign Up</a></li>
      <li class="last"><a href="#">Log In</a></li>
    </ul>
    <br class="clear" />
  </div>
</div>


<!-- ####################################################################################################### -->

<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="#"><strong>S</strong>tupefy <!-- <strong>M</strong>agazine --></a></h1>
      
    </div>
    <div class="fl_right"><a href="#"><img src="../../images/logo.jpg" alt="" width="400" height="60"/></a></div>
    <br class="clear" />
  </div>
</div>



<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li><a href="../../index.html">Home</a></li>
        <li><a href="viewEvents.html">View Events</a></li>
        <li><a href="postEvents.php">Post Events</a></li>
      </ul>
    </div><br>
     <br class="clear" />
  </div>
</div>

<br><br>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <div id="title"><h2><br>Post the details of an upcoming event:</h2></div><br><br>
       <div class="row"><label class="col1">Event Name:</label>
    <span class="col2">    <input type="text" name="ename" required size="20" tabindex="1" ></span>
</div> 
    <br><br>
     <div class="row"><label class="col1">Event Category: </label>
       <span class="col2"><input type="text" name="ecategory" required>
             </span></div><br> <br>
             <div class="row"><label class="col1"> Society/Chapter: </label>
        <span class="col2">   <input type="text" name="organizer" required></span></div><br><br>
        <div class="row"><label class="col1"> Date: </label>
    <span class="col2"><input type="text" name="edate" required></span></div><br><br>
    <div class="row"><label class="col1">Time: </label>
    <span class="col2"><input type="text" name="etime" required></span></div><br><br>
    <div class="row"><label class="col1"> Venue:</label>
         <span class="col2"> <input type="text" name="evenue" required></span></div> <br><br>
     <div class="row"><label class="col1comment">Description:</label>
             <span class="col2comment"><textarea cols="20" class="textarea" rows="4" name="edesc" id="edesc" tabindex="4" ></textarea></span>
             <br><br>
              <div class="row"><label class="col1" for="file">Filename:</label>
                  <span class="col2"><input type="file" name="file" id="file"></span></div><br>
          <div align="center" class="submit"> <input type="submit" name="submit" value="Submit"></div>
    </form>   
           
            <?php
      if(isset($_POST['submit']))
      {
      $con=mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db('login') or die("cannot select database");
      $name=$_POST['ename'];
      $category=$_POST['ecategory'];
      $society=$_POST['organizer'];
      $date=$_POST['edate'];
      $time=$_POST['etime'];
      $venue=$_POST['evenue'];
      $desc=$_POST['edesc'];
      
      $allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0)
      {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } 
  else 
      {
    $imgData = file_get_contents($_FILES["file"]["name"]);
$size = getimagesize($_FILES["file"]["name"]);
$sql = sprintf("INSERT INTO event(image_id,image_type, image, image_size, image_name)
    VALUES
    ('%s', '%s', '%d', '%s')",
    mysql_real_escape_string($size['mime']),
    mysql_real_escape_string($imgData),
    $size[3],
    mysql_real_escape_string($_FILES['file']['name'])
    );
mysql_query($sql);
}
}

      $sq2="INSERT INTO event(name,category,society,venue,descr,status) VALUES('$name', '$category', '$society', '$venue','$desc','N')";
      $query2=mysql_query($sq2);
      if($query2)
      echo "Event Registered !! Kindly wait for approval";
      else
      die("error in insertion".mysql_error($con));
      }
      ?>

    <div class="column">
      

      <!-- 
      <div class="holder">
        <h2 class="title"><img src="images/demo/60x60.gif" alt="" />Related Articles</h2>
        <p>Use this section to Enter information/ Article written by the same Author. Expand this Information Space to a couple of lines more</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>

      <div id="featured">
        <ul>
          <li>
            <h2>Featued Heading</h2>
            <p class="imgholder"><img src="images/demo/240x90.gif" alt="" /></p>
            <p>After reading the article the user might would like to refer to another article of another section. i.e A Featured Article</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
        </ul>
      </div>
      
 -->
 <!--      <div class="holder">
        <h2>Related Information</h2>
        <p>Information Space for Putting up Information on Site</p>
        <ul>
          <li><a href="#">Link if Required</a></li>
          <li>Special Link</li>
          <li><a href="#">Link 2</a></li>
        </ul>
        <p>This Space Can we used for the same information As per the requirements of the user & it will always be the same. (Ingone)</p>
        <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
      </div>

  -->     
    </div>

    <br class="clear" />
  </div>
</div>


<!-- ############################################## Reference Section ##########################################################################################################################-->
<!-- <div class="wrapper">
  <div id="footer">
    <div class="footbox">
      <h2>Sections</h2>
      <ul>
        <li><a href="#">Section Link</a></li>
        <li><a href="#">Section Link</a></li>
        <li><a href="#">Section Link</a></li>
        <li><a href="#">Section Link</a></li>
        <li><a href="#">Section Link</a></li>
        <li class="last"><a href="#">Section Link</a></li>
      </ul>
    </div>
      <div class="footbox">
      <h2>Stupefy</h2>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Information</a></li>
        <li><a href="#">Reach Out</a></li>
        <li><a href="#">Credit</a></li>
        <li><a href="#">Media</a></li>
        <li class="last"><a href="#">Support Us</a></li>
      </ul>
    </div> 

     <div class="footbox">
      <h2>Stupefy</h2>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Information</a></li>
        <li><a href="#">Reach Out</a></li>
        <li><a href="#">Credit</a></li>
        <li><a href="#">Media</a></li>
        <li class="last"><a href="#">Support Us</a></li>
      </ul>
    </div>

 <div class="footbox">
      <h2>Stupefy</h2>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Information</a></li>
        <li><a href="#">Reach Out</a></li>
        <li><a href="#">Credit</a></li>
        <li><a href="#">Media</a></li>
        <li class="last"><a href="#">Support Us</a></li>
      </ul>
    </div>

    <br class="clear" />
  </div>
</div> -->

<!-- #########################  Socialise Block ################################################################################################################## -->

<div class="wrapper">
  <div id="socialise">
    <h1><a href="#">OUT REACH &raquo;</a></h1>
      
    <ul>
      <li><a href="#"><img src="../../images/Socialize/Facebook.jpg" alt="" /><span>Facebook</span></a></li>
      <li><a href="#"><img src="../../images/Socialize/Instagram.jpg" alt="" /><span>Instagram</span></a></li>
      <li class="last"><a href="#"><img src="../../images/Socialize/Twitter.jpg" alt="" /><span>Twitter</span></a></li>
    </ul>

    <!-- Below Supporting Link for Subcription Link -->


    <!-- <div id="newsletter">
      <h2>NewsLetter Sign Up</h2>
      <p>Please enter your Email and Name to join.</p>
      <form action="#" method="post">
        <fieldset>
          <legend>Digital Newsletter</legend>
          <div class="fl_left">
            <input type="text" value="Enter name here"  onfocus="this.value=(this.value=='Enter name here')? '' : this.value ;" />
            <input type="text" value="Enter email address"  onfocus="this.value=(this.value=='Enter email address')? '' : this.value ;" />
          </div>
          <div class="fl_right">
            <input type="submit" name="newsletter_go" id="newsletter_go" value="&raquo;" />
          </div>
        </fieldset>
      </form>
      <p>To unsubsribe please <a href="#">click here &raquo;</a>.</p>
    </div> -->


<!-- Ending Link-->


    <br class="clear" />
  </div>
</div>
<!-- #########################  Footer Information ############################################ ############################################################################### -->
<div class="wrapper col8">
  <div id="copyright">
    <p align ="middle">Copyright &copy; 2014 - All Rights Reserved - <a href="#">VIT University</a></p>
    
     
    <br class="clear" />
  </div>
</div>
</body>
</html>
