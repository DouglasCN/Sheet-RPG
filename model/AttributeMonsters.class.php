<?php

class AttributeMonster extends Conexao{
    private $Att_idAtributoMonstro, $Att_frMonstro, $Att_tipoAtributo, $Att_valor, $Att_nomeAtributo, $Att_ativo;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Att_idAtributoMonstro, $Att_frMonstro, $Att_tipoAtributo, $Att_valor, $Att_nomeAtributo, $Att_ativo){

        $this->setAtt_idAtributoMonstro($Att_idAtributoMonstro);
        $this->setAtt_frMonstro($Att_frMonstro);
        $this->setAtt_tipoAtributo($Att_tipoAtributo);
        $this->setAtt_valor($Att_valor);
        $this->setAtt_nomeAtributo($Att_nomeAtributo);
        $this->setAtt_ativo($Att_ativo);
    }

    function GetAttributoMonster(){
        $query = "SELECT * FROM atributomonstro WHERE ativo = 0 AND tipoAtributo = :tipoAtributo AND fr_Monstro = :fr_Monstro";

        $params = array(
            ':tipoAtributo' => $this->getAtt_tipoAtributo(),
            ':fr_Monstro' => $this->getAtt_frMonstro()
        ); 
        
        $this->ExecuteSQL($query, $params);
        $this->GetListaJSON();
    }

    function Insert(){
        $query = "INSERT INTO atributocampanha (fr_Campanha, tipoAtributo, nomeAtributo, ativo) values ";
        $query .= "(:fr_Campanha, :tipoAtributo, :nomeAtributo, :ativo)";
        
        $params = array(
            ':fr_Campanha' => $this->getAtt_frCampanha(),
            ':tipoAtributo' => $this->getAtt_tipoAtributo(),
            ':nomeAtributo' => $this->getAtt_nomeAtributo(),
            ':ativo' => $this->getAtt_ativo()
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
            'id_AtributoMonstro'=>$lista['id_AtributoMonstro'],
            'fr_Monstro' => $lista['fr_Monstro'],
            'tipoAtributo' => $lista['tipoAtributo'],
            'nomeAtributo' => $lista['nomeAtributo'],
            'valor' => $lista['valor']
        );
        $i++;
        endwhile;

        echo json_encode($this->itens);
    }

    
    //metods get
    function getAtt_idAtributoMonstro(){
        return $this->Att_idAtributoMonstro;
    }
    function getAtt_frMonstro(){
        return $this->Att_frMonstro;
    }
    function getAtt_tipoAtributo(){
        return $this->Att_tipoAtributo;
    }
    function getAtt_valor(){
        return $this->Att_valor;
    }
    function getAtt_nomeAtributo(){
        return $this->Att_nomeAtributo;
    }
    function getAtt_ativo(){
        return $this->Att_ativo;
    }
    
    //metodos set
    function setAtt_idAtributoMonstro($Att_idAtributoMonstro){
       $this->Att_idAtributoMonstro = $Att_idAtributoMonstro;
    }
    function setAtt_frMonstro($Att_frMonstro){
        $this->Att_frMonstro = $Att_frMonstro;
    }
    function setAtt_tipoAtributo($Att_tipoAtributo){
       $this->Att_tipoAtributo = $Att_tipoAtributo;
    }
    function setAtt_valor($Att_valor){
       $this->Att_valor = $Att_valor;
    }
    function setAtt_nomeAtributo($Att_nomeAtributo){
       $this->Att_nomeAtributo = $Att_nomeAtributo;
    }
    function setAtt_ativo($Att_ativo){
       $this->Att_ativo = $Att_ativo;
    }

}
?>