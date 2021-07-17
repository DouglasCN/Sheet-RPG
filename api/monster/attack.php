<?php  
    date_default_timezone_set('America/Sao_Paulo');
    require "../../lib/autoload.php";

    if(!isset($_SESSION)){
        session_start();
    } 

    if(isset($_GET['GET'])){
        $monsterattack = new MonsterAttack();
        $monsterattack->Preparar(null, $_GET['GET'], null, null, null, null, null);
        $monsterattack->GetAttackMonster();
    }

    if(isset($_POST['nameAttack'])){
        $monsterattack = new MonsterAttack();
        $monsterattack->Preparar(null, $_POST['fr'], $_POST['nameAttack'], $_POST['detailAttack'], $_POST['QTDDice'], $_POST['VlrDice'], null);
        $monsterattack->Insert();
    }

    if(isset($_POST['id'])){
        $monsterattack = new MonsterAttack();
        $monsterattack->Delete($_POST['id']);
    }

?>