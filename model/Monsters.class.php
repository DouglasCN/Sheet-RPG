<?php

class Monster extends Conexao{
    private $Mons_idMonster, $Mons_nome, $Mons_descricao, $Mons_frCampanha, $Mons_ativo;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Mons_idMonster, $Mons_nome, $Mons_descricao, $Mons_frCampanha, $Mons_ativo){

        $this->setMons_idMonster($Mons_idMonster);
        $this->setMons_nome($Mons_nome);
        $this->setMons_descricao($Mons_descricao);
        $this->setMons_frCampanha($Mons_frCampanha);
        $this->setMons_ativo($Mons_ativo);
    }

    function GetMonsters(){
        $query = "SELECT id_Monstro, nome, descricao, titulo as fr_Campanha, monstro.ativo 
            FROM monstro INNER JOIN campanha ON monstro.fr_Campanha = campanha.id_Campanha WHERE monstro.ativo = 0 ";
    
        $this->ExecuteSQL($query);
        $this->GetListaJSON();
    }

    function GetMonstersID($id){
        $query = "SELECT id_Monstro, nome, descricao, titulo as fr_Campanha, monstro.ativo 
            FROM monstro INNER JOIN campanha ON monstro.fr_Campanha = campanha.id_Campanha WHERE monstro.ativo = 0 
            AND monstro.id_Monstro = $id";
    
        $this->ExecuteSQL($query);
        $this->GetListaJSON();
    }

    function Insert(){
        $query = "INSERT INTO monstro (nome, fr_Campanha, ativo) values ";
        $query .= "(:nome, :fr_Campanha, :ativo)";
        
        $params = array(
            ':nome' => $this->getMons_nome(),
            ':fr_Campanha' => $this->getMons_frCampanha(),
            ':ativo' => $this->getMons_ativo()
        );
        
        $this->ExecuteSQL($query, $params);
    }

    function Delete($id){
        $query = "UPDATE monstro SET ativo = 1 WHERE id_Monstro = :id";
        
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
            'titulo' => $lista['titulo'],
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
            'id_Monstro' => $lista['id_Monstro'],
            'nome' => $lista['nome'],
            'descricao' => $lista['descricao'],
            'fr_Campanha' => $lista['fr_Campanha'],
            'ativo' => $lista['ativo']
        );
        $i++;
        endwhile;

        echo json_encode($this->itens);
    }

    
    //metods get
    function getMons_idMonster(){
        return $this->Mons_idMonster;
    }
    function getMons_nome(){
        return $this->Mons_nome;
    }
    function getMons_frCampanha(){
        return $this->Mons_frCampanha;
    }
    function getMons_ativo(){
        return $this->Mons_ativo;
    }
    function getMons_descricao(){
        return $this->Mons_descricao;
    }
    
    //metodos set
    function setMons_idMonster($Mons_idMonster){
       $this->Mons_idMonster = $Mons_idMonster;
    }
    function setMons_nome($Mons_nome){
       $this->Mons_nome = $Mons_nome;
    }
    function setMons_frCampanha($Mons_frCampanha){
       $this->Mons_frCampanha = $Mons_frCampanha;
    }
    function setMons_ativo($Mons_ativo){
       $this->Mons_ativo = $Mons_ativo;
    }
    function setMons_descricao($Mons_descricao){
        $this->Mons_descricao = $Mons_descricao;
     }

}
?>