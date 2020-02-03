<html>
<body>

<?php

define('DBSERVER',"localhost");
define('DBUSER',"coursedb");
define('DBPASS',"");
define('DATABASE',"coursedb");

if (!$connection = @ mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("Cannot connect");


@mysql_select_db(DATABASE) or die( "Unable to select database");

$query="SELECT * FROM coursetbl;";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="GENERATOR" content="Mozilla/4.72 [en] (Windows NT 5.0; I) [Netscape]">
   <title>Computer Science &amp; Information Technology</title>
</head>
<body background="back2.gif">

<h3 align="center">Computer Science &amp; Information Technology</h3>
<center>
</center>

<center>
<h3>
Course Information for April 2018</h3></center>
<center><table BORDER >
<tr BGCOLOR="#FFFF64">
      <td><b>Course</b><br>
        <b>Number</b></td>

<td>
<center><b>Course Title / Course Information</b></center>
</td>

      <td><b>Starting</b> <br>
        <b>Date</b></td>

      <td><b>Course</b> <br>
        <b>Fee</b></td>

<td><b>Status</b></td>
</tr>

<?php
$i=0;
while ($i < $num) {
	$courseno = mysql_result($result,$i,"courseno");
	$coursetitle = mysql_result($result,$i,"coursetitle");
	$startdate = mysql_result($result,$i,"startdate");
	$coursefee = mysql_result($result,$i,"coursefee");
	$quota = mysql_result($result,$i,"quota");
	$quotaused = mysql_result($result,$i,"quotaused");

	print '<tr BGCOLOR="#FFFFA0">';
	print "<td>".$courseno."</td>";
	print "<td>".$coursetitle."</td>";
	print "<td>".$startdate."</td>";
	print "<td>".$coursefee."</td>";

	if ( $quota > $quotaused ) {
		$status = "OPEN"; 
	}
	else {
		$status = "CLOSED";
	}	

	print "<td>".$status."</td>";
	print "</tr>";
	$i++;
}
?>

</tr>
</table>
<p>Click for the <a href="apply.htm">Course Application Form </a>.</p>
  <p>Click for the particulars <a href="change.htm">change Form</a>.</p>
  <p>Click for the <a href="quotalist/quotalist.php">quota list of courses</a> (Authorized Users Only)</p>
</center>

</body>
</html>
