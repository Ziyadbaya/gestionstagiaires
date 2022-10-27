<?php

require('vendor/autoload.php');
require('config.php');
session_start();

if(isset($_POST['download']))
{
    $student_mail = mysqli_real_escape_string($conn, $_POST['download']);

    $query = "SELECT * FROM candidat WHERE MAIL='$student_mail' ";
    $res = mysqli_query($conn, $query);
    
    
	if(mysqli_num_rows($res)>0){
		$html=' <h1 class="d-xxl-flex justify-content-xxl-center">Accord de stage Chez ONEE-BO</h1>';
		$html.=' <h2 class="d-xxl-flex justify-content-xxl-center">Details :</h2>';
		$row=mysqli_fetch_assoc($res);
		$html.=' <h4 class="d-xxl-flex justify-content-xxl-center">Nom et Prénom: '.$row['NOM'].' '.$row['PRENOM'].'</h4>';
		$html.=' <h4 class="d-xxl-flex justify-content-xxl-center">Email: '.$row['MAIL'].'</h4>';
		$html.=' <h4 class="d-xxl-flex justify-content-xxl-center">Date de naissance: '.$row['DATE'].'</h4>';
		$html.=' <h4 class="d-xxl-flex justify-content-xxl-center">Filière: '.$row['FILIERE'].'</h4>';
		$html.=' <h4 class="d-xxl-flex justify-content-xxl-center">Ecole: '.$row['ECOLE'].'</h4>';
		
	}else{
		$html="Data not found";
	}
	$mpdf=new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);
	$file='media/'.time().'.pdf';
	$mpdf->output($file,'I'); 
}
//D
//I
//F
//S
?>

<!DOCTYPE html>
<html>



</html>