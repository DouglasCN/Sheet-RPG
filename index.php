<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "./lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_POST['player'])){
        if($_POST['player'] == "Mestre" && $_POST['access'] == "123123"){
            Rotas::Redirecionar(0, Rotas::get_SiteMestre());
        }else{
            Rotas::Redirecionar(0, Rotas::get_SiteJogador());
        }
    }

    $smarty = new Template();
    $smarty->assign('ROTA_STYLES', Rotas::get_siteStyles());
    $smarty->display('index.tpl'); 

    
?>