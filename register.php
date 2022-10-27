<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $filiere = mysqli_real_escape_string($conn, $_POST['filiere']);
    $ecole = mysqli_real_escape_string($conn, $_POST['ecole']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $annee = mysqli_real_escape_string($conn, $_POST['annee']);

    $cin = "images/".$_FILES['cin']['name'];
    $cv = "images/".$_FILES['cv']['name'];
    $demande = "images/".$_FILES['demande']['name'];
    $lettre = "images/".$_FILES['lettre']['name'];
    $photo = "images/".$_FILES['photo']['name'];

    $target1 = "images/".basename($cin);
    $target2 = "images/".basename($cv);
    $target3 = "images/".basename($demande);
    $target4 = "images/".basename($lettre);
    $target5 = "images/".basename($photo);


   $select = " SELECT * FROM users WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Email already exist!';

   }else{
        $sql1 = "INSERT INTO candidat(NOM, PRENOM, MAIL, PHOTO, FILIERE, ECOLE, DATE, ANNEE, CIN, CV, LETTRE, DEMANDE) VALUES('$last_name', '$first_name','$email','$photo','$filiere','$ecole','$date','$annee', '$cin', '$cv', '$lettre', '$demande')";
         $insert = "INSERT INTO users( email, password) VALUES('$email','$pass')";
         mysqli_query($conn, $insert);
         mysqli_query($conn, $sql1);
         header('location:index.php');
      
   }
   if (move_uploaded_file($_FILES['cin']['tmp_name'], $target1)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    if (move_uploaded_file($_FILES['cv']['tmp_name'], $target2)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    if (move_uploaded_file($_FILES['demande']['tmp_name'], $target3)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    if (move_uploaded_file($_FILES['lettre']['tmp_name'], $target4)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target4)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

};
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="bg-gradient-primary">
    <div class="container" style="padding-left: 312px;margin-right: 250;margin-left: 250;">
        <div class="card shadow-lg o-hidden border-0 my-5" style="width: 715px;height: auto;">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-7" style="width: 730px;">
                        <div class="p-5">
                            <div class="text-center"><img src="assets/img/LogoONEE.png" style="margin-bottom: 9px;">

                            

                                <h4 class="text-dark mb-4">Créer un compte</h4>
                                <?php
                                                    if(isset($error)) :
                                                ?>

                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong></strong> <?php echo "Email already used!"; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>

                                                <?php 
                                                    unset($error);
                                                    endif;
                                                ?>
                            </div>
                            
                            
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                               
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="first_name" placeholder="Prenom" name="first_name" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="last_name" placeholder="Nom" name="last_name" required></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="password" placeholder="Mot de passe" name="password" required></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="filiere" placeholder="Filière" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" name="ecole" placeholder="Ecole intégrée" required></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><label class="form-label">Date de naissance</label><input class="form-control" type="date" name="date" required></div>
                                    <div class="col-sm-6"><label class="form-label">Année d'étude</label><select name="annee" class="form-select">
                                            <option value="1" selected="">1ère Année</option>
                                            <option value="2">2ème Année</option>
                                        </select></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><label class="form-label">CIN</label><input class="form-control" type="file" name="cin" required></div>
                                    <div class="col-sm-6"><label class="form-label">CV</label><input name="cv" class="form-control" type="file" required></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><label class="form-label">Demande de stage</label><input name="demande" class="form-control" type="file" required></div>
                                    <div class="col-sm-6"><label class="form-label">Lettre de recommendation</label><input name="lettre" class="form-control" type="file" required></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><label class="form-label">Votre Photo</label><input class="form-control" name="photo" type="file" required></div>
                                    </div>
                                <button class="btn btn-primary d-block btn-user w-100" type="submit" name="submit" >Confirmer</button>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="text-center small" href="index.php">Tu as déjà un compte? Login!</a></div>

                           

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header"></div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>