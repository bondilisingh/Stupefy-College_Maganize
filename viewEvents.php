<!DOCTYPE html>
<html>
<head profile="http://gmpg.org/xfn/11">
<title>Stupefy | College Magazine</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
    

<div class="wrapper col0">
  <div id="topline">
      <p>Tel: +91-9342-342-343 | Mail: info@stupefy.com</p>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="#"><strong>S</strong>tupefy <!-- <strong>M</strong>agazine --></a></h1>
      
    </div>
    <div class="fl_right"><a href="#"><img src="images/demo/logo.jpg" alt="" width="400" height="60"/></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="viewEvents.html">View Events</a></li>
        <li><a href="postEvents.html">Post Events</a></li>
      </ul>
    </div>
      <br class="clear" />
  </div>
</div>

   <?php
$con=mysqli_connect("localhost","root","","login");
if(mysqli_connect_errno())
echo "Connection failed".mysqli_connect_error;
$q1="SELECT *FROM event";
$res=mysqli_query($con,$q1);
$d1=strtotime("tomorrow");
$d2=strtotime("+1 week",$d1);
$e=0;
while($row=mysqli_fetch_array($res))
{
    $d=strtotime($row['edate']);
    if(($d<=$d2)&&($d>=$d1))
    {
echo "<strong>Event name</strong>:".$row['name']."<br>";
echo "<strong>Event Category</strong>:".$row['category']."<br>";
echo "<strong>Society/ Chapter</strong>:".$row['society']."<br>";
echo "<strong>Date</strong>:".$row['edate']."<br>";
echo "<strong>Time</strong>:".$row['etime']."<br>";
echo "<strong>Venue</strong>:".$row['venue']."<br>";
echo "<strong>Description</strong>:".$row['descr']."<br>";
echo "<br><br><br><br>";
$e++;
}}
if($e==0)
  {
    echo 'No events happening this week';    
}


?>
</body>
</html>