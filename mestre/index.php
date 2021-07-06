<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    $smarty = new Template();
    $smarty->assign('ROTA_STYLES', Rotas::get_SiteStylesMestre());
    $smarty->assign('ROTA_IMAGES', Rotas::get_SiteImagesMestre());
    $smarty->assign('ROTA_CAMPANHAS', Rotas::get_SiteMestreCampanhas());
    $smarty->display('home.tpl'); 

    
?>