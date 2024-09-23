
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
	<label>PRECIPITATION</label>
	<input type="number" name="pre"><BR>
	<label>VENT</label>
	<input type="number" name="vent"><br>
	<label>Temperature</label>
	<input type="number" name="temper"><br>
	<input type="Submit" name="ok">
</form>
<?php 
if (isset($_POST['ok'])) {
	# code...
$pre =$_POST['pre'];
$vent = $_POST['vent'];
$temp = $_POST['temper'];
$image ="";

// maivana ny orana
if ($pre < 100) {

	if ($vent<30) {
		
		if ($temp < 20 ) {
			$image = "17.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="tsara.jpg";
		}else if($temp>35){
			$image ="soleil.jpg"; 
		}

	}
	else if(($vent>=30)&&($vent<50)){
		if ($temp < 20 ) {
			$image = "22.png";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="7.jpg";
		}else if($temp>35){
			$image ="4.jpg"; 
		}
	}else if ($vent>50) {
		
		if ($temp < 20 ) {
			$image = "17.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="tsara.jpg";
		}else if($temp>35){
			$image ="65.jpg"; 
		}

	}

}
// antonotonony ny orana
else if(($pre>=100)&&($pre<=200)){

	if ($vent<30) {
		
		if ($temp < 20 ) {
			$image = "11.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="herika.jpg";
		}else if($temp>35){
			$image ="herika.jpg"; 
		}

	}
	else if(($vent>=30)&&($vent<50)){
		if ($temp < 20 ) {
			$image = "13.png";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="7.jpg";
		}else if($temp>35){
			$image ="4.jpg"; 
		}
	}else if ($vent>50) {
		
		if ($temp < 20 ) {
			$image = "17.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="tsara.jpg";
		}else if($temp>35){
			$image ="orana_masoandro.jpg"; 
		}

	}

} 
// antenantenany 
else if(($pre>=200)&&($pre<=300)){

	if ($vent<30) {
		
		if ($temp < 20 ) {
			$image = "herika.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="herika.jpg";
		}else if($temp>35){
			$image ="herika.jpg"; 
		}

	}
	else if(($vent>=30)&&($vent<50)){
		if ($temp < 20 ) {
			$image = "herika.png";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="herika.jpg";
		}else if($temp>35){
			$image ="herika.jpg"; 
		}
	}else if ($vent>50) {
		
		if ($temp < 20 ) {
			$image = "orana.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="orana.jpg";
		}else if($temp>35){
			$image ="orana_masoandro.jpg"; 
		}

	}

} 

// rehefa avy foan ny orana
else if($pre>300){

	if ($vent<30) {
		
		if ($temp < 20 ) {
			$image = "orana.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="orana.jpg";
		}else if($temp>35){
			$image ="orana.jpg"; 
		}

	}
	else if(($vent>=30)&&($vent<50)){
		if ($temp < 20 ) {
			$image = "orana.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="orana.jpg";
		}else if($temp>35){
			$image ="orana.jpg"; 
		}
	}else if ($vent>50) {
		
		if ($temp < 20 ) {
			$image = "oram_baratra.jpg";

		}else if(($temp>=20)&&($temp<=35)){
			$image ="oram_baratra.jpg";
		}else if($temp>35){
			$image ="oram_baratra.jpg"; 
		}

	}

}



// else if (($pre>=200)&&($Pre < 500)) {
// 	if ($Vent<= 30) {

// 		$image = "nuage.png";
		
// 	}
// 	else if (($Vent>30)&&($Vent <50)) {
// 		$image = "mafana_rivotr.jpg";
		
// 	}
// 	else if ($Vent >=50) {
// 		$image = "tsara_rivotra.jpg";
		
// 	}
// }
// else if (($Pre>=500)&&($Pre<=800)) {
// 	if ($Vent<= 30) {
// 		$image = "herika.jpg";
	
// 	}
// 	else if (($Vent>30)&&($Vent <50)) {
// 		$image = "orana_masoandro.jpg";
		
// 	}
// 	else if ($Vent>= 50) {
// 		$image = "oram_baratra.jpg";
		

// 	}
// }
// else if ($Pre>=800) {
// 	if ($Vent<= 30) {
// 		$image = "oram_baratra.jpg";
	
// 	}
// 	else if (($Vent>30)&&($Vent <50)) {
// 		$image = "oram_baratra.jpg";
		
// 	}
// 	else if ($Vent>= 50) {
// 		$image = "oram_baratra.jpg";
		

// 	}
// }
echo "
<img src='Icone_Climat/".$image."'>
";

}





?>
</body>
</html>


