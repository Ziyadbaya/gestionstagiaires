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

   $select2 = " SELECT * FROM candidat";
   $stmt = mysqli_query($conn, $select2);

   $name = $row['NOM'] . " " . $row['PRENOM'];

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                <li class="nav-item"><a class="nav-link" href="admin_index.php"><i class="fas fa-tachometer-alt"></i><span>Tableau de bord</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="table_users.php"><i class="fas fa-users"></i><span>Liste des utilisateurs</span></a></li>
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
                    
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Liste des candidats</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                <?php include('message.php'); ?>
                                 
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nom et Prénom</th>
                                            <th>Email</th>
                                            <th>Rôle</th>
                                            <th>Modifier</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                <?php
                                        
                                        while($row2 = mysqli_fetch_array($stmt))
                                        {   

                                            $select3 = " SELECT * FROM users WHERE email = '$row2[MAIL]'";
                                            $stmt3 = mysqli_query($conn, $select3);
                                            $row3 = mysqli_fetch_array($stmt3);
                                            ?>
                                        
                                        <tr>
                                        <td><img class="rounded-circle me-2" width="30" height="30" src=<?php echo $row2['PHOTO']?>><?php echo $row2['NOM'] . " " . $row['PRENOM']?></td>
                                            <td> <?php echo $row2['MAIL']?></td>
                                            <td><?php echo $row3['role']?></td>
                                            <td class="d-xxl-flex justify-content-xxl-start align-items-xxl-center">
                                            <form action="student_modify.php" method="POST" class="d-inline"> 
                                                <button class="btn btn-primary btn-sm" type="submit" name="admin_student" value=<?=$row3['email'];?> style="margin-right: 5px;">Admin  <i class="fas fa-user-shield"></i></button>
                                                <button class="btn btn-dark btn-sm" type="submit" name="user_student" value=<?=$row3['email'];?> style="margin-right: 5px;">User  <i class="fas fa-user"></i></button>
                                                <a class="btn btn-warning btn-sm" href="student_view.php?id=<?= $row2['id']; ?>" style="margin-right: 5px;"><i class="far fa-eye"></i></a>
                                                <button class="btn btn-secondary btn-sm"  type="submit" name="delete_student" value=<?=$row2['MAIL'];?> ><i class="fa fa-trash"></i></button>
                                                </form>
                                        </td>
                                            
                                        </tr>

                                        <?php } ?>


                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Nom et Prénom</strong></td>
                                            <td><strong>Email</strong></td>
                                            <td><strong>Rôle</strong></td>
                                            <td><strong>Modifier</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                  
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
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
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>