<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>I-Ensure | Admin </title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />

<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
<body>
<!--header-->
<!--sticky-->
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('function.php'); ?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into category(Cat_name) values('" . $_POST["t1"] ."')";
	mysqli_query($cn,$s);
	
	echo "<script>alert('Record Save');</script>";
}
?>



<?php include('top.php'); ?>

<div style="height:50px"></div>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post">
<table border="0" width="90%" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Users Travel Details</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="95%" >
<tr>
<td style="font-size:15px; padding:2px; font-weight:bold;">Email</td>
<td style="font-size:15px; padding:2px; font-weight:bold;">County</td>
<td style="font-size:15px; padding:2px; font-weight:bold;">Company</td>
<td style="font-size:15px; padding:2px; font-weight:bold;">Purpose</td>
<td style="font-size:15px; padding:2px; font-weight:bold;">Cover</td>
<td style="font-size:15px; padding:2px; font-weight:bold;">Travel Date</td>
<td style="font-size:15px; padding:2px; font-weight:bold;">Return Date</td>
</tr>

<?php

$s = "select client.email,trip.* from clients, trip where client.Clientid=trip.Clientid";
$result = mysqli_query($cn,$s);

while($row = mysqli_fetch_array($result))
{
?>	
		<tr>
		<td style=' padding:5px;'><?php echo $row["Email"]?></td>
		<td style=' padding:5px;'><?php echo $row["County"]?></td>
		<td style=' padding:5px;'><?php echo $row["Passenger"]?></td>
		<td style=' padding:5px;'><?php echo $row["Purpose"]?></td>
		<td style=' padding:5px;'><?php echo $row["Cover"]?></td>		
		<td style=' padding:5px;'><?php echo $row["TravelDate"]?></td>		
		<td style=' padding:5px;'><?php echo $row["ReturnDate"]?></td>
		</tr>

<?php

}
?>

</table>
</td></tr></table>

</form>
</div>
</div>
<?php include('bottom.php'); ?>
</body>
</html>