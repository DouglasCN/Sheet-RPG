<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_GET['GET'])){
        $player = new Player();
        $player->GetPlayers();
    }

    if(isset($_POST['player'])){
        $player = new Player();
        $player->Preparar(null, $_POST['player'], $_POST['name'], $_POST['campaign'], $_POST['ativo']);
        $player->Insert();
    }

    if(isset($_POST['id'])){
        $player = new Player();
        $player->Delete($_POST['id']);
    }

?>