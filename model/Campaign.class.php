<?php

class Campaign extends Conexao{
    private $Camp_idCampaign, $Camp_title, $Camp_master, $Camp_ativo;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Camp_idCampaign, $Camp_title, $Camp_master, $Camp_ativo){

        $this->setCamp_idCampaign($Camp_idCampaign);
        $this->setCamp_title($Camp_title);
        $this->setCamp_master($Camp_master);
        $this->setCamp_ativo($Camp_ativo);
    }

    function GetCampaigns(){
        $query = "SELECT * FROM campanha WHERE ativo = 0 ";
    
        $this->ExecuteSQL($query);
        $this->GetListaJSON();
    }

    function Insert(){
        $query = "INSERT INTO campanha (titulo, mestre) values ";
        $query .= "(:tite, :master)";
        
        $params = array(
            ':tite' => $this->getCamp_title(),
            ':master' => $this->getCamp_master()
        );
        
        $this->ExecuteSQL($query, $params);
    }

    function Delete($id){
        $query = "DELETE FROM campanha WHERE id_Campanha = :id";
        
        $params = array(
            ':id' => (int)$id
        );
        
        $this->ExecuteSQL($query, $params);
    }
 
    private function GetLista(){
        $i = 1;
        //eu estou chamando o meu metodo listar dados da classe conexão
        while($lista = $this->ListarDados()):
        $this->itens[$i] = array(
            'idCampario'=>$lista['id_Campario'],
            'title' => $lista['title'],
            'ativo' => $lista['ativo'],
            'dt_cadastro' =>  date('d/m/Y', strtotime($lista['dt_cadastro'])),
            'nivelAcesso' => $lista['nivelAcesso']
        );
        $i++;
        endwhile;
    }

    private function GetListaJSON(){
        $i = 0;
        while($lista = $this->ListarDados()):
        $this->itens[$i] = array(
            'id_Campanha'=>$lista['id_Campanha'],
            'titulo' => $lista['titulo'],
            'mestre' => $lista['mestre'],
        );
        $i++;
        endwhile;

        echo json_encode($this->itens);
    }

    
    //metods get
    function getCamp_idCampaign(){
        return $this->Camp_idCampaign;
    }
    function getCamp_title(){
        return $this->Camp_title;
    }
    function getCamp_master(){
        return $this->Camp_master;
    }
    function getCamp_ativo(){
        return $this->Camp_ativo;
    }
    
    //metodos set
    function setCamp_idCampaign($Camp_idCampaign){
       $this->Camp_idCampaign = $Camp_idCampaign;
    }
    function setCamp_title($Camp_title){
       $this->Camp_title = $Camp_title;
    }
    function setCamp_master($Camp_master){
       $this->Camp_master = $Camp_master;
    }
    function setCamp_ativo($Camp_ativo){
       $this->Camp_ativo = $Camp_ativo;
    }

}
?>