<html>
<body>
<?php


  

define('DBSERVER',"172.16.210.2");
define('DBUSER',"coursedb");
define('DBPASS',"mypass");
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
Course Information for April 2013</h3></center>
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

<td><b>Quota</b><br>
    <b>Left</b></td>

<td><b>Quota</b></td>

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
        $quotaleft = $quota-$quotaused;

	print '<tr BGCOLOR="#FFFFA0">';
	print "<td>".$courseno."</td>";
	print "<td>".$coursetitle."</td>";
	print "<td>".$startdate."</td>";
	print "<td>".$coursefee."</td>";
        print "<td>".$quotaleft."</td>";
        print "<td>".$quota."</td>";
        print "</tr>";
	$i++;
}
?>

</tr>
</table>
</center>

</body>
</html>