<?php

Class Conexao extends Config{
    private $host, $user, $senha, $banco;

    protected $obj, $itens=array(), $prefix;

    public $paginacao_links, $totalpags, $limite, $inicio;
    function __construct(){

        $this->host = self::BD_HOST;
        $this->user = self::BD_USER;
        $this->senha = self::BD_SENHA;
        $this->banco = self::BD_BANCO;
        $this->prefix = self::BD_PREFIX;

        try {
            if($this->Conectar() == null){
                $this->Conectar();
            }
        }catch(Exception $e){
            exit($e->getMessage(). '<h2> Erro ao conectar com o banco de dados </h2>');
        }
    }

    function TrocarBanco($bd){
        $this->banco = $bd;
    }
    //função para fazer conexão com o banco de dados
    private function Conectar(){

       if(!isset($this->bd)){
           
            $options = array(
                //trasforma o padrao do banco para utf8
                PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8",
                //traz algum alerta de erro
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            );
            $this->bd = new PDO("mysql:host={$this->host};dbname={$this->banco}", $this->user, $this->senha, $options);
        }
        return $this->bd;
    }

    //função que executa a query
    function ExecuteSQL($query, array $params = NULL){
        $this->obj = $this->Conectar()->prepare($query);

        //eu estou verificando a quantidade de parametros passados na url
        if(@count($params) > 0){
            foreach($params as $key => $value){
                $this->obj->bindvalue($key, $value);
            }
        }
        try{
            return $this->obj->execute();
            
        }catch(Exception $e){
            return false;
            // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
    //função para listar os meus elementos
    function ListarDados(){
        return $this->obj->fetch(PDO::FETCH_ASSOC);
    }

    //função para mostrar um quantidade de dados
    function TotalDados(){
       return $this->obj->rowCount(); 
    }

    //função que armazena os itens dentro de um array
    function GetItens(){
        return $this->itens;
    }

    function GetUltimoID(){
        return $this->Conectar()->lastInsertId();
    }
    
    
}

?>