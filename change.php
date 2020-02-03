<html>
<body>
<?php


define('DBSERVER',"172.16.210.2");
define('DBUSER',"coursedb");
define('DBPASS',"mypass");
define('DATABASE',"coursedb");

if (!$connection =  mysql_connect(DBSERVER, DBUSER, DBPASS))
  die("Cannot connect");
@mysql_select_db(DATABASE) or die("Unable to connect");

 $applyno = $_GET['applyno'];
 $hkid = $_GET['hkid'];
 $email = $_GET['new_email'];
 $tel = $_GET['new_tel'];   
 $query="SELECT * FROM applytbl;";
 $result=mysql_query($query);
 $num=mysql_numrows($result);
 $i=0;

while ($i < $num) {
	$applyno1 = mysql_result($result,$i,"applyno");
        $hkid1  = mysql_result($result,$i,"hkid");
 if($applyno1==$applyno)
{
if ($hkid==$hkid1)
 {
$sql = "UPDATE applytbl SET email='$email', tel='$tel'WHERE applyno='$applyno'";
 mysql_query($sql);
echo "Success changing!";
break;
}
else
{
echo "HKID is not corresponded to apply no.!";
break;
}
}
$i++;
}               
if($i==$num)
{ 
    echo "apply number $applyno does not exist!";
} 

mysql_close($connection);

?>


</body>
</html>