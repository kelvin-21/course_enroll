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

 $courseno = $_GET['courseno'];
 $name = $_GET['name'];
 $stid = $_GET['stid'];
 $hkid = $_GET['hkid'];
 $email = $_GET['email'];
 $tel = $_GET['tel'];   

 $query="SELECT * FROM coursetbl;";
 $result=mysql_query($query);
 $num=mysql_numrows($result);
 $i=0;

 
 $query_registered = "SELECT * FROM applytbl;";
 $result_registered = mysql_query($query_registered);
 $num_registered = mysql_numrows($result_registered);
 


while($i <= $num_registered) {
	$courseno_fromTable = (int) (mysql_result($result_registered,$i,"applyno") / 1000);
	$hkid_registered = mysql_result($result_registered,$i,"hkid");

	if($courseno == $courseno_fromTable && $hkid == $hkid_registered){
		echo "You have already registered the course $courseno.";
		return;
	}
	$i++;
}

$i = 0;

while ($i < $num) {
	$courseno1 = mysql_result($result,$i,"courseno");
        $quota = mysql_result($result,$i,"quota");
	$quotaused = mysql_result($result,$i,"quotaused");
	$registered_hkid = mysql_result($result,$i,"hkid");
	
	if( $courseno1 == $courseno)
    {
        if ( $quota > $quotaused ) {
                $quotaused++;
                $sql0 = "UPDATE coursetbl SET quotaused='$quotaused' WHERE courseno='$courseno'";
                mysql_query($sql0);
				
                $applyno = $courseno*1000+$quotaused;
                echo "Success! Your Application No. is $applyno"; 
                $sql = "INSERT INTO applytbl (applyno, name, studentId, hkid, email, tel) VALUES ('$applyno', '$name', '$stid', '$hkid', '$email', '$tel')";
                mysql_query($sql);
				break;
		}
		else {
			echo "The course is full";
            break;
		}	
    }

    $i++;
}
if($i==$num)
{ 
    echo "Course number $courseno does not exist!";
} 


mysql_close($connection);

?>


</body>
</html>