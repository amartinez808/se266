<?php 
if(isset($_POST['submitData'])){
echo "<h2>Confirmation Page</h2><br>";
echo '<br> ';
//adding the input filter to all the user input
$first_name = filter_input(INPUT_POST,'fname');
$last_name = filter_input(INPUT_POST,'lname');
$martial_status = filter_input(INPUT_POST, 'married');
$birth = filter_input(INPUT_POST,'birth_date', );
$feet = filter_input(INPUT_POST,'ft', FILTER_VALIDATE_INT);
$inches = filter_input(INPUT_POST,'inches',FILTER_VALIDATE_INT);
$weight = filter_input(INPUT_POST,'weight',FILTER_VALIDATE_INT);

//if its an empty string then warn the user to enter the field they missed
$filled = false;
if($first_name == ""){
	
	echo "<li>You need to put your first name</li>";
	$filled = true;
}
if($last_name == ""){
	echo "<li>You need to put your last name</li>";
	$filled = true;
}
if($martial_status == ""){
	echo "<li>You need to put your martial status</li>";
	$filled = true;
} 
if($birth == ""){
	echo "<li>You need to put your date of birth</li>";
	$filled = true;
} 
if($feet == ""){
	echo "<li>Please put your Height (ft)</li>";
	$filled = true;
} 
if($inches == ""){
	echo "<li>Please put in your height(inches)</li>";
	$filled = true;
} 
if($weight == ""){
	echo "<li>Please put in your weight</li>";
	$filled = true;
} 

//if every field is filled out, then print out what they typed in 
if($filled == false)
{
	$bmi = bmi($feet, $inches, $weight);
	echo'<li>First Name: '. $first_name. '</li>';
	echo'<li>Last Name: '. $last_name. '</li>';
	echo'<li>Martial Status: '. happy($martial_status) . '</li>';
	echo'<li>Date of Birth: '. $birth. ' Age: '. age($birth). '</li>';
	echo'<li>Height: '.  $feet. '\' '. $inches. '"</li>';
	echo'<li>Weight: '. $weight. ' pounds'.  '</li>';
	echo'<li>Bmi: '. $bmi . bmival($bmi) . '</li>';
	//var_dump($_POST);
	exit;
}


// echo $_POST['val1']; (demo video) 

} else {
echo "Initial load of form";
}
//grabbed from canvas
function age ($bdate) {
$date = new DateTime($bdate);
$now = new DateTime();
$interval = $now->diff($date);
return $interval->y;
}

//calculated bmi 
function bmi ($ft, $inch, $weight)
{
$h = ($ft * 12 + $inch) * 0.0254;
$w = ($weight / 2.20462 );
$b = $w / ($h * $h);
return round($b,1);
}   

function bmival ($bmi) {
if($bmi < 18.5){
	echo 'You are underweight';
}
else if($bmi > 18.5 && $bmi < 24.9)
{
	echo 'You are normal weight';
}
else if($bmi > 25.0 && $bmi < 29.9){
	echo 'You are overweight';
}
else{
	echo 'Obese';
}
}
function happy ($martial_status){
return $martial_status == 'Y' ? 'Married' : 'single';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patient form</title>
</head>
<body>
	<h1>Patient Form</h1>
	<form action="form.php" method="post">
		<b> First Name: </b>
		<input type="text" name="fname" placeholder="fname" value="<?=$first_name?>">

		<br>
		<br>
		<b> Last Name: </b><input type="text" name="lname" placeholder="Lastname" value="<?=$last_name?>">

		<br>
		<br>
		<b>Married: </b><input type="radio" name="married" value="Y" <?php if($martial_status == 'Y') echo 'Checked'; ?>>
		Yes
		<input type="radio" name="married" value="N"<?php if($martial_status == 'N') echo 'Checked'; ?>> No
		<br>
		<br>
		<b>Birth Date: </b><input type="date" name="birth_date" value="<?=$birth ?>">
		<br>
		<br>
		<b>Height: </b>
		Feet: <input type="text" name="ft" style="width:40px" value="<?=$feet?>">
		Inches: 
		<input type="text" name="inches" value="<?=$inches ?>" style="width:40px">
		<br>
		<br> 
		<b>Weight(Pounds): </b><input type="text" name="weight"  style="width:40px" value="<?=$weight?>">
		<br>
		<br>
		<input type="submit" name="submitData" value="Store Patient Information"/>

		</body>
	</html>