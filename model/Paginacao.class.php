<?php
class Paginacao extends Conexao{

    public $limite, $inicio, $totalpags, $link = array();

    function GetPaginacao($campo, $tabela){
        $query = "SELECT {$campo} FROM {$tabela} WHERE cancelado = false ";
        $this->ExecuteSQL($query);
        //quantidade de dados na tabela
        $total = $this->TotalDados();
        //limite de dados por pagna
        $this->limite = Config::BD_LIMIT_POR_PAG;
        //quantidade de paginas que ira ter
        $paginas = ceil($total/$this->limite);
        $this->totalpags = $paginas;
        //recebe a pagina em que o usuario esta querendo ir ou que ira iniciar
        $p = (int)isset($_GET['p']) ? $_GET['p'] : 1; 
        //controle de pesquisa, caso o usuario pesquise pela URL uma pagina que não exista, sera jogado para a ultima pagina
        if ($p > $paginas) {
            $p = $paginas;
        }
        $this->inicio = ($p * $this->limite) - $this->limite;

        $tolerancia = 2;
        $mostrar = $p + $tolerancia;
        if($mostrar > $paginas){
            $mostrar = $paginas;
        }
        for($i = ($p - $tolerancia) ;$i <= $mostrar; $i++){
            if ($i < 1) {
                $i = 1;
            }
            array_push($this->link, $i);
        }
    }

    
}

?>

