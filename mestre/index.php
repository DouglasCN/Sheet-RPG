<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    $smarty = new Template();
    $smarty->assign('ROTA_STYLES', Rotas::get_SiteStylesMestre());
    $smarty->assign('ROTA_IMAGES', Rotas::get_SiteImagesMestre());
    $smarty->assign('ROTA_HOME', Rotas::get_SiteMestre());
    $smarty->assign('ROTA_CAMPANHAS', Rotas::get_SiteMestreCampanhas());
    $smarty->assign('ROTA_PERSONAGENS', Rotas::get_SiteMestrePersonagens());
    $smarty->assign('ROTA_MONSTROS', Rotas::get_SiteMestreMonstros());
    $smarty->display('home.tpl'); 

    
?>