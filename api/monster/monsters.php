<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_GET['GET'])){
        $monster = new Monster();
        $monster->GetMonsters();
    }

    if(isset($_POST['monster'])){
        $monster = new Monster();
        $monster->Preparar(null, $_POST['monster'], null,$_POST['campaign'], 0);
        $monster->Insert();
    }

    if(isset($_POST['id'])){
        $monster = new Monster();
        $monster->Delete($_POST['id']);
    }

?>