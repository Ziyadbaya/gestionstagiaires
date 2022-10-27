<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_mail'])){
   
   header('location:index.php');

}
$email = $_SESSION['admin_mail'];
$select = " SELECT * FROM candidat WHERE MAIL = '$email'";

   $result = mysqli_query($conn, $select);
   $row = mysqli_fetch_array($result);

   $name = $row['NOM'] . " " . $row['PRENOM'];

$select1 = " SELECT * FROM candidat WHERE STATUS = 'traitement'";
$select2 = " SELECT * FROM candidat WHERE STATUS = 'accepte'";

$result1 = mysqli_query($conn, $select1);
$result2 = mysqli_query($conn, $select2);

$lengths1 = mysqli_num_rows($result1);
$lengths2 = mysqli_num_rows($result2);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
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
                <li class="nav-item"><a class="nav-link active" href="admin_index.php"><i class="fas fa-tachometer-alt"></i><span>Tableau de bord</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table_users.php"><i class="fas fa-users"></i><span>Liste des utilisateurs</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="fas fa-hourglass-half"></i><span>Liste des candidats</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table_stagier.php"><i class="fas fa-table"></i><span>Liste des stagiaires</span></a></li>
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
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span STYLE="text-transform:uppercase" class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $name?></span><img class="border rounded-circle img-profile" src=<?php echo $row['PHOTO']?>></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Tableau de bord</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 col-xxl-4 mb-4">
                            <div class="card shadow border-start-primary py-2" style="background: rgb(28,200,138);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-size: 17.2px;color: #ffffff;font-weight: bold;">stagiaires</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $lengths2?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-check fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 col-xxl-4 mb-4">
                            <div class="card shadow border-start-primary py-2" style="background: rgb(246,194,62);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-size: 17.2px;color: rgb(255,255,255);">Demandes</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><?php echo $lengths1?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-user-clock fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 col-xxl-4 mb-4">
                            <div class="card shadow border-start-primary py-2" style="background: var(--bs-cyan);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-size: 17.2px;color: #ffffff;font-weight: bold;">Nombre de places dispo</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo 20-$lengths2?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-star fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <a class="btn btn-primary d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="table_stagier.php" role="button" style="width: 260.6875px;height: 57px;margin: auto;margin-top: auto;">Gestions des stagiaires</a>
                    <a class="btn btn-primary d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="table.php" role="button" style="width: 260.6875px;height: 57px;margin: auto;margin-top: auto;">Gestions de demandes</a>
                    <a class="btn btn-primary d-xxl-flex justify-content-xxl-center align-items-xxl-center" href="table_users.php" role="button" style="width: 260.6875px;height: 57px;margin: auto;margin-top: auto;">Gestions des utilisateurs</a>
                        
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