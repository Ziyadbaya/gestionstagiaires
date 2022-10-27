<?php
session_start();
require 'config.php';

if(isset($_POST['delete_student']))
{
    $student_mail = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM candidat WHERE MAIL='$student_mail' ";
    $query2 = "DELETE FROM users WHERE email='$student_mail' ";
    $query_run = mysqli_query($conn, $query);
    $query_run = mysqli_query($conn, $query2);
    
    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: table.php");
        exit(0);
    }
}

if(isset($_POST['accept_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['accept_student']);
    $statut = 'accepte';
    $query = "UPDATE candidat SET STATUS='$statut' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Accepted Successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Accepted";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}

if(isset($_POST['reject_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['reject_student']);
    $statut = 'rejete';
    $query = "UPDATE candidat SET STATUS='$statut' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Rejected Successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Rejected";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}

if(isset($_POST['admin_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['admin_student']);
    $statut = 'admin';
    $query = "UPDATE users SET role='$statut' WHERE email='$student_id' ";
    $query_run = mysqli_query($conn, $query);
    $query2 = "UPDATE candidat SET STATUS='nostage' WHERE MAIL='$student_id' ";
    $query_run2 = mysqli_query($conn, $query2);

    if($query_run)
    {
        $_SESSION['message'] = "Now he is ADMIN";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "This operation is failed";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}

if(isset($_POST['user_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['user_student']);
    $statut = 'user';
    $query = "UPDATE users SET role='$statut' WHERE email='$student_id' ";
    $query_run = mysqli_query($conn, $query);
    $query2 = "UPDATE candidat SET STATUS='traitement' WHERE MAIL='$student_id' ";
    $query_run2 = mysqli_query($conn, $query2);

    if($query_run)
    {
        $_SESSION['message'] = "Now he is USER";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "This operation is failed";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $oldmail= $student['MAIL'];
         $sql1 = "UPDATE candidat SET MAIL='$email', FILIERE='$filiere', ECOLE='$ecole', DATE='$date', ANNEE='$annee' WHERE MAIL='$oldmail'";
          $insert = "UPDATE users SET email='$email' WHERE email='$oldmail'";
          mysqli_query($conn, $insert);
          mysqli_query($conn, $sql1);
          $query_run=mysqli_query($conn, $insert);
 

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit(0);
    }

}


?>