<?php

class MonsterAttack extends Conexao{
    private $Att_idAtaqueMonstro, $Att_frMonstro, $Att_ataque, $Att_detalhe, $Att_quantidadeDados, $Att_valorDado, $Att_ativo;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Att_idAtaqueMonstro, $Att_frMonstro, $Att_ataque, $Att_detalhe, $Att_quantidadeDados, $Att_valorDado, $Att_ativo){

        $this->setAtt_idAtaqueMonstro($Att_idAtaqueMonstro);
        $this->setAtt_frMonstro($Att_frMonstro);
        $this->setAtt_ataque($Att_ataque);
        $this->setAtt_detalhe($Att_detalhe);
        $this->setAtt_quantidadeDados($Att_quantidadeDados);
        $this->setAtt_valorDado($Att_valorDado);
        $this->setAtt_ativo($Att_ativo);
    }

    function GetAttackMonster(){
        $query = "SELECT * FROM ataquemonstro WHERE ativo = 0 AND fr_Monstro = :fr_Monstro";

        $params = array( 
            ':fr_Monstro' => $this->getAtt_frMonstro()
        ); 
        
        $this->ExecuteSQL($query, $params);
        $this->GetListaJSON();
    }

    function Insert(){
        $query = "INSERT INTO ataquemonstro (fr_Monstro, ataque, detalhe, quantidadeDados, valorDado) values ";
        $query .= "(:fr_Monstro, :ataque, :detalhe, :quantidadeDados, :valorDado)";
        
        $params = array(
            ':fr_Monstro' => $this->getAtt_frMonstro(),
            ':ataque' => $this->getAtt_ataque(),
            ':detalhe' => $this->getAtt_detalhe(),
            ':quantidadeDados' => $this->getAtt_quantidadeDados(),
            ':valorDado' => $this->getAtt_valorDado()
        );
        
        $this->ExecuteSQL($query, $params);
    }

    function Delete($id){
        $query = "DELETE FROM atributocampanha WHERE id_AtributoCampanha = :id";
        
        $params = array(
            ':id' => (int)$id
        );
        
        $this->ExecuteSQL($query, $params);
    }


    private function GetListaJSON(){
        $i = 0;
        while($lista = $this->ListarDados()):
        $this->itens[$i] = array(
            'id_AtaqueMonstro'=>$lista['id_AtaqueMonstro'],
            'fr_Monstro' => $lista['fr_Monstro'],
            'ataque' => $lista['ataque'],
            'detalhe' => $lista['detalhe'],
            'quantidadeDados' => $lista['quantidadeDados'],
            'valorDado' => $lista['valorDado'],
            'ativo' => $lista['ativo']
        );
        $i++;
        endwhile;

        echo json_encode($this->itens);
    }

    
    //metods get
    function getAtt_idAtaqueMonstro(){
        return $this->Att_idAtaqueMonstro;
    }
    function getAtt_frMonstro(){
        return $this->Att_frMonstro;
    }
    function getAtt_ataque(){
        return $this->Att_ataque;
    }
    function getAtt_detalhe(){
        return $this->Att_detalhe;
    }
    function getAtt_quantidadeDados(){
        return $this->Att_quantidadeDados;
    }
    function getAtt_valorDado(){
        return $this->Att_valorDado;
    }
    function getAtt_ativo(){
        return $this->Att_ativo;
    }
    
    //metodos set
    function setAtt_idAtaqueMonstro($Att_idAtaqueMonstro){
       $this->Att_idAtaqueMonstro = $Att_idAtaqueMonstro;
    }
    function setAtt_frMonstro($Att_frMonstro){
        $this->Att_frMonstro = $Att_frMonstro;
    }
    function setAtt_ataque($Att_ataque){
       $this->Att_ataque = $Att_ataque;
    }
    function setAtt_detalhe($Att_detalhe){
       $this->Att_detalhe = $Att_detalhe;
    }
    function setAtt_quantidadeDados($Att_quantidadeDados){
       $this->Att_quantidadeDados = $Att_quantidadeDados;
    }
    function setAtt_valorDado($Att_valorDado){
       $this->Att_valorDado = $Att_valorDado;
    }
    function setAtt_ativo($Att_ativo){
       $this->Att_ativo = $Att_ativo;
    }

}
?>