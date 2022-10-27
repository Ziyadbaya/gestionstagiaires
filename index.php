<?php

@include 'config.php';

session_start();

if(isset($_SESSION['admin_mail'])){
    header('location:admin_index.php');
 }

 if(isset($_SESSION['user_mail'])){
    header('location:user_index.php');
 }

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_array($result);

    if($row['role'] == 'admin'){

       $_SESSION['admin_mail'] = $row['email'];
       header('location:admin_index.php');

    }elseif($row['role'] == 'user'){

       $_SESSION['user_mail'] = $row['email'];
       header('location:user_index.php');
    }
   
 }else{
    $error[] = 'Incorrect email or password!';
 }
   
};
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="bg-gradient-primary">
    <div class="container" style="width: 781px;height: 536.719px;margin: auto;margin-right: 250;margin-left: 250;">
        <div class="row justify-content-center" style="margin: auto;">
            <div class="col-md-9 col-lg-12 col-xl-10 offset-xxl-0" style="padding-right: 0px;padding-left: 0px;">
                <div class="card shadow-lg o-hidden border-0 my-5" style="width: 530px;height: 485.734px;margin: auto;">
                    <div class="card-body p-0" style="height: 540.719px;">
                        <div class="p-5" style="transform: perspective(0px);height: 493.125px;">
                            <div class="text-center"><img style="background: url(&quot;assets/img/LogoONEE.png&quot;) center / contain;width: 346px;margin: 10px;" src="assets/img/LogoONEE.png"></div>
                            <div class="text-center">
                                <h4 class="text-dark mb-4" style="color: rgb(54,72,255);font-size: 24px;">Se connecter</h4>
                                <?php
                                                    if(isset($error)) :
                                                ?>

                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong></strong> <?php echo "Incorrect Email or Password!"; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>

                                                <?php 
                                                    unset($error);
                                                    endif;
                                                ?>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required></div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox small">
                                        <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                    </div>
                                </div><button class="btn btn-primary d-block btn-user w-100" name="submit" type="submit" style="height: 39.1875px;">Login</button>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="small" href="register.php">Créer un nouveau compte ?</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>