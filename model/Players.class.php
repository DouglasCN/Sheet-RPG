<?php

class Player extends Conexao{
    private $Play_idPersonagem, $Play_jogador, $Play_nome, $Play_frCampanha, $Play_ativo;

    function __construct(){
        parent::__construct();
    }

    function Preparar($Play_idPersonagem, $Play_jogador, $Play_nome, $Play_frCampanha, $Play_ativo){

        $this->setPlay_idPersonagem($Play_idPersonagem);
        $this->setPlay_jogador($Play_jogador);
        $this->setPlay_nome($Play_nome);
        $this->setPlay_frCampanha($Play_frCampanha);
        $this->setPlay_ativo($Play_ativo);
    }

    function GetPlayers(){
        $query = "SELECT id_Personagem, jogador, nome, titulo as fr_Campanha, personagem.ativo 
            FROM personagem INNER JOIN campanha ON personagem.fr_Campanha = campanha.id_Campanha WHERE personagem.ativo = 0 ";
    
        $this->ExecuteSQL($query);
        $this->GetListaJSON();
    }

    function Insert(){
        $query = "INSERT INTO personagem (jogador, nome, fr_Campanha, ativo) values ";
        $query .= "(:jogador, :nome, :fr_Campanha, :ativo)";
        
        $params = array(
            ':jogador' => $this->getPlay_jogador(),
            ':nome' => $this->getPlay_nome(),
            ':fr_Campanha' => $this->getPlay_frCampanha(),
            ':ativo' => $this->getPlay_ativo()
        );
        
        $this->ExecuteSQL($query, $params);
    }

    function Delete($id){
        $query = "UPDATE personagem SET ativo = 1 WHERE id_Personagem = :id";
        
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
            'id_Personagem' => $lista['id_Personagem'],
            'jogador' => $lista['jogador'],
            'nome' => $lista['nome'],
            'fr_Campanha' => $lista['fr_Campanha'],
            'ativo' => $lista['ativo']
        );
        $i++;
        endwhile;

        echo json_encode($this->itens);
    }

    
    //metods get
    function getPlay_idPersonagem(){
        return $this->Play_idPersonagem;
    }
    function getPlay_jogador(){
        return $this->Play_jogador;
    }
    function getPlay_nome(){
        return $this->Play_nome;
    }
    function getPlay_frCampanha(){
        return $this->Play_frCampanha;
    }
    function getPlay_ativo(){
        return $this->Play_ativo;
    }
    
    //metodos set
    function setPlay_idPersonagem($Play_idPersonagem){
       $this->Play_idPersonagem = $Play_idPersonagem;
    }
    function setPlay_jogador($Play_jogador){
       $this->Play_jogador = $Play_jogador;
    }
    function setPlay_nome($Play_nome){
       $this->Play_nome = $Play_nome;
    }
    function setPlay_frCampanha($Play_frCampanha){
       $this->Play_frCampanha = $Play_frCampanha;
    }
    function setPlay_ativo($Play_ativo){
        $this->Play_ativo = $Play_ativo;
     }

}
?>