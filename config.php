<?php
$surname=$_POST['surnamei'];
$name=$_POST['onamei'];
$fname=$_POST['fnamei'];
$mname=$_POST['mnamei'];
$aadhar=$_POST['aadhari'];
$sex=$_POST['sexi'];
$dob=$_POST['dobi'];
$age=$_POST['agei'];
$mot=$_POST['moti'];
$swa=$_POST['swai'];
$caste=$_POST['castei'];
$religion=$_POST['religioni'];
$ph=$_POST['phi'];
$lep=$_POST['lepi'];
$yop=$_POST['yopi'];
$roll=$_POST['rolli'];
$mob=$_POST['mobi'];
$oof=$_POST['oofi'];
$prcntg=$_POST['prcntgi'];
$board=$_POST['boardi'];
$lastsc=$_POST['lastsci'];
$udise=$_POST['udisei'];
$scholar=$_POST['scholari'];
$one=$_POST['onei'];
$two=$_POST['twoi'];
$thre=$_POST['threi'];
$four=$_POST['fouri'];
$occ=$_POST['occi'];
$firm=$_POST['firmi'];
$income=$_POST['incomei'];
$coadd=$_POST['coaddi'];
$landline=$_POST['landlinei'];
$mob1=$_POST['mob1i'];
$mob2=$_POST['mob2i'];
$mob3=$_POST['mob3i'];


$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="colgform";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if (mysqli_connect_error()){
	die('Connect Error('.mysql_connect_errno().')'.mysqli_connecterror());
}
else{
	$SELECT="SELECT Aadhar from colginfo Where Aadhar=? Limit 1";
	$INSERT="INSERT Into colginfo (Surname, Name, Father, Mother, Aadhar, Sex, DateofBirth, Age, MotherTongue, Category,Caste, Religion, Handicap, LastExam, YearofPassing, Rollno, MarksObt, OutOf, Percentage, NameofBoards, NameofSchool, UDISE, ScholarshipName, Optionalsubject1, Optionalsubject2, Optionalsubject3, Optionalsubject4, ParentOccupation, Office, Income, CoAdd, Landline, Mobile1, Mobile2, Mobile3) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmt=$conn->prepare($SELECT);
	$stmt->bind_param("i", $aadhar);
	$stmt->execute();
	$stmt->bind_result($aadhar);
	$stmt->store_result();
	$rnum=$stmt->num_rows;
	if($rnum==0){
		$stmt->close();
		$stmt= $conn->prepare($INSERT);
		$stmt->bind_param("ssssississssissississssssssssisiiii", $surname, $name, $fname, $mname, $aadhar, $sex, $dob, $age, $mot, $swa, $caste, $religion, $ph, $lep, $yop, $roll, $mob, $oof, $prcntg, $board, $lastsc, $udise, $scholar, $one, $two, $thre, $four, $occ, $firm, $income, $coadd, $landline, $mob1, $mob2, $mob3);
		$stmt->execute();
		echo '<script type="text/javascript">

      window.onload = function () { alert("New record has inserted successfully");
      window.history.back(-1); }
</script>';
	} else{
		echo '<script type="text/javascript">

      window.onload = function () { alert("Someone has already registered with this aadhar no.");
      window.history.back(-1); }
</script>';
	}
	$stmt->close();
	$conn->close();
}
?>