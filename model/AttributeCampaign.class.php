<?php

class AttributeCampaign extends Conexao{
    private $Att_atributoCampanha, $Att_frCampanha, $Att_tipoAtributo, $Att_nomeAtributo, $Att_ativo;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Att_atributoCampanha, $Att_frCampanha, $Att_tipoAtributo, $Att_nomeAtributo, $Att_ativo){

        $this->setAtt_atributoCampanha($Att_atributoCampanha);
        $this->setAtt_frCampanha($Att_frCampanha);
        $this->setAtt_tipoAtributo($Att_tipoAtributo);
        $this->setAtt_nomeAtributo($Att_nomeAtributo);
        $this->setAtt_ativo($Att_ativo);
    }

    function GetAttributoCampaign(){
        $query = "SELECT * FROM atributocampanha WHERE ativo = 0 AND tipoAtributo = :tipoAtributo ";

        $params = array(
            ':tipoAtributo' => $this->getAtt_tipoAtributo()
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
            'id_AtributoCampanha'=>$lista['id_AtributoCampanha'],
            'fr_Campanha' => $lista['fr_Campanha'],
            'tipoAtributo' => $lista['tipoAtributo'],
            'nomeAtributo' => $lista['nomeAtributo']
        );
        $i++;
        endwhile;

        echo json_encode($this->itens);
    }

    
    //metods get
    function getAtt_atributoCampanha(){
        return $this->Att_atributoCampanha;
    }
    function getAtt_frCampanha(){
        return $this->Att_frCampanha;
    }
    function getAtt_tipoAtributo(){
        return $this->Att_tipoAtributo;
    }
    function getAtt_nomeAtributo(){
        return $this->Att_nomeAtributo;
    }
    function getAtt_ativo(){
        return $this->Att_ativo;
    }
    
    //metodos set
    function setAtt_atributoCampanha($Att_atributoCampanha){
       $this->Att_atributoCampanha = $Att_atributoCampanha;
    }
    function setAtt_frCampanha($Att_frCampanha){
        $this->Att_frCampanha = $Att_frCampanha;
    }
    function setAtt_tipoAtributo($Att_tipoAtributo){
       $this->Att_tipoAtributo = $Att_tipoAtributo;
    }
    function setAtt_nomeAtributo($Att_nomeAtributo){
       $this->Att_nomeAtributo = $Att_nomeAtributo;
    }
    function setAtt_ativo($Att_ativo){
       $this->Att_ativo = $Att_ativo;
    }

}
?>