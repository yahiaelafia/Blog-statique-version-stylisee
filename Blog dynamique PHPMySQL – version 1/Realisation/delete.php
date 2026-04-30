<?php
session_start() ;
require_once "article.php" ;
if (!isset($_SESSION['email']) && !empty($_SESSION['password']))  {
    header("Location: index.php") ; 
    exit ;

}
if (!isset($_GET["id"]) ||  empty($_GET["id"]) ) {
    header('Location: dashbord.php') ;
    exit ;
    
    }
    $id = $_GET['id'];
    $db = new database() ;
    $db->getConnection() ;
    $delete=Article::delete($id);
    if ($delete) {
        header('Location: dashbord.php');
        exit ;
    }
