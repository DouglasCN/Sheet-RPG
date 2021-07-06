<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_GET['GET'])){
        $campaign = new Campaign();
        $campaign->GetCampaigns();
    }

    if(isset($_POST['title'])){
        $campaign = new Campaign();
        $campaign->Preparar(null, $_POST['title'], $_POST['master'], null);
        $campaign->Insert();
    }

    if(isset($_POST['id'])){
        $campaign = new Campaign();
        $campaign->Delete($_POST['id']);
    }

    
    

?>