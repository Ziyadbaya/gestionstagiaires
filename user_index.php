<?php
require 'config.php';

session_start();

if(!isset($_SESSION['user_mail'])){
   
   header('location:index.php');

}
$email = $_SESSION['user_mail'];
$select = " SELECT * FROM candidat WHERE MAIL = '$email'";

   $result = mysqli_query($conn, $select);
   $student = mysqli_fetch_array($result);

   $name = $student['NOM'] . " " . $student['PRENOM'];

   
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>ONEE-Bo</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="user_edit.php"><i class="fas fa-edit"></i><span>Modifier Profile</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span STYLE="text-transform:uppercase" class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $name?></span><img class="border rounded-circle img-profile" src=<?php echo $student['PHOTO']?>></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="user_index.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="user_edit.php"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Paramètre</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                <form action="pdf.php" method="POST" class="d-inline">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    
                        <h3 class="text-dark mb-0">Profile</h3>
                        <?php if($student['STATUS']=='accepte'){?>
                                    <button class="btn btn-primary btn-sm d-none d-sm-inline-block" value=<?=$student['MAIL'] ?> type="submit" name="download" ><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Accord de stage</button>
                                    <?php  } ?>
                        
                    </div></form>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"> <div class="container"><img class="rounded-circle mb-3 mt-4" src=<?php echo $student['PHOTO'] ?> width="160" height="160" ></div>
                                    <div class="mb-3"></div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Ton statut</h6>
                                </div>
                                <div class="card-body d-xxl-flex justify-content-xxl-center">
                                    <div class="mb-3">
                                    
                                    <?php if($student['STATUS']=='accepte'){
                                    echo '<button class="btn btn-success btn-sm active" type="button" style="margin-right: 15px;width: 107.6562px;height: 45px;">Accepté<i class="fa fa-check" style="margin-left: 5px;"></i></button>';}
                                    elseif($student['STATUS']=='traitement'){
                                        echo '<button class="btn btn-warning btn-sm active" type="button" style="margin-right: 15px;width: 130.6562px;height: 45px;">Traitement ...<i class="fa fa-gear" style="margin-left: 5px;"></i></button>';}
                                        else{
                                            echo '<button class="btn btn-danger btn-sm active" type="button" style="margin-right: 15px;width: 107.6562px;height: 45px;">Rejeté<i class="fa fa-remove" style="margin-left: 5px;"></i></button>';}
                                            ?>
                                            </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Informations Candidat</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="username"><strong>Nom et Prénom</strong></label><input class="form-control" type="text" id="username" name="username" STYLE="text-transform:uppercase" placeholder="<?php echo $student['NOM'] . " " . $student['PRENOM'] ?>" readonly=""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" placeholder="<?php echo $student['MAIL'] ?>" name="email" readonly=""></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Date de naissane</strong></label><input class="form-control" type="text" id="first_name" placeholder="<?php echo $student['DATE'] ?>" name="first_name" readonly=""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Filière</strong></label><input class="form-control" type="text" id="last_name" STYLE="text-transform:uppercase" placeholder="<?php echo $student['FILIERE'] ?>" name="last_name" readonly=""></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Ecole</strong></label><input class="form-control" type="text" id="first_name-1" STYLE="text-transform:uppercase" placeholder="<?php echo $student['ECOLE'] ?>" name="first_name" readonly=""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Année</strong></label><input class="form-control" type="text" id="last_name-1" placeholder="<?php echo $student['ANNEE'] ?> année" name="last_name" readonly=""></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>CIN</strong></label><a class="d-xxl-flex" href="<?php echo $student['CIN'] ?>" target="_blank" style="font-size: 19px;">CIN</a></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>CV</strong></label><a class="d-xxl-flex" href="<?php echo $student['CV'] ?>" target="_blank" style="font-size: 19px;">CV</a></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Demande de stage</strong></label><a class="d-xxl-flex" href="<?php echo $student['DEMANDE'] ?>" target="_blank" style="font-size: 19px;">DEMANDE</a></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Lettre</strong></label><a class="d-xxl-flex" href="<?php echo $student['LETTRE'] ?>" target="_blank" style="font-size: 19px;">Lettre</a></div>
                                                    </div>
                                                </div>
                                               </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © ziyad</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>