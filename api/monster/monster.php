<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_GET['GET'])){
        $attributemonster = new AttributeMonster();
        $attributemonster->Preparar(null, $_GET['fr'], $_GET['GET'], null, null, null);
        $attributemonster->GetAttributoMonster();
    }

    if(isset($_POST['monster'])){
        $attributemonster = new AttributeMonster();
        $attributemonster->Preparar(null, $_POST['monster'], null,$_POST['campaign'], 0);
        $attributemonster->Insert();
    }

    if(isset($_POST['id'])){
        $attributemonster = new AttributeMonster();
        $attributemonster->Delete($_POST['id']);
    }

    if(isset($_GET['MONSTRO'])){
        $monster = new Monster();
        $monster->GetMonstersID($_GET['MONSTRO']);
    }

?>