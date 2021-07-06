<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_GET['GET'])){
        $attribute = new AttributeCampaign();
        $attribute->Preparar(null, null, $_GET['GET'], null, null);
        $attribute->GetAttributoCampaign();
    }

    if(isset($_POST['nameAttribute'])){
        $attribute = new AttributeCampaign();
        $attribute->Preparar(null, $_POST['fr'], $_POST['typeAttribute'], $_POST['nameAttribute'], 0);
        $attribute->Insert();
    }

    if(isset($_POST['id'])){
        $attribute = new AttributeCampaign();
        $attribute->Delete($_POST['id']);
    }

    
    

?>