<?php

/**
 * Classe TaskList - CRUD de tarefas.
 *@autor - Rafael Orlando Mendes
 *@email - rafaorlando3@gmail.com 
 */

include_once 'connection.php';

class TaskList {

    
    private $id;
    private $titulo;
    private $descricao;
    private $status;
    private $datac;
    private $dataedit;
    private $bd; //conexão com o banco
    private $tabela = "task";

    function __construct() {
        global $link;
        $this->connection = $link;

    }

    public function __get($key) {
        return $this->$key;
    }

    public function __set($key, $value) {
        $this->$key = $value;
    }

    /**
     * Insere uma nova Task.
     */
    public function inserir() 
    {

        $sql = "INSERT INTO $this->tabela (dataedit,titulo,status,descricao,datac)".
               "VALUES ('$this->dataedit', '$this->titulo', $this->status, '$this->descricao','$this->datac')";
        $retorno = mysqli_query($this->connection, $sql);
        return $retorno;
    }
    
    /**
     * Lista as Tasks do sistema.
     *@param $complemento - O parametro espera uma String com SQL. É opcional podendo ser utilizado para filtrar a listagem.
     */
    public function listar($complemento = "") 
    {
        $sql = "SELECT * FROM $this->tabela ".$complemento;

        $lista = mysqli_query($this->connection, $sql);
        $retorno = NULL;

        while ($reg = mysqli_fetch_array($lista)) {

            $obj = new TaskList();
            $obj->id = $reg["id"];
            $obj->dataedit = $reg["dataedit"];
            $obj->titulo = $reg["titulo"];
            $obj->status = $reg["status"];
            $obj->descricao = $reg["descricao"];
            $obj->datac = $reg["datac"];
            $retorno[] = $obj;
        }
        
        return $retorno;
    }
    
    /**
     * Exclui uma Task.
     */
    public function excluir() 
    {

        $sql = "delete from $this->tabela where id = $this->id";
        $retorno = mysqli_query($this->connection, $sql);
        return $retorno;
    }

    /**
     * Atualiza uma Task.
     */
    public function atualizar() 
    {
        $retorno = false;
        $sql = "update $this->tabela set 
                        dataedit ='$this->dataedit',
                        titulo = '$this->titulo',
                        status = $this->status,
                        descricao = '$this->descricao',
                        datac = '$this->datac' 
                where id = $this->id";
        
        $retorno = mysqli_query($this->connection, $sql);
        return $retorno;
    }

    /**
     * Retorna o registro de uma Task.
     */
    public function retornarunico() 
    {
        $sql = "Select * FROM $this->tabela where id = $this->id";

        $unico = mysqli_query($this->connection, $sql);
        $retorno = NULL;

        $reg = mysqli_fetch_array($unico);
        if ($reg == true) {
            $obj = new TaskList();
            $obj->id = $reg["id"];
            $obj->dataedit = $reg["dataedit"];
            $obj->titulo = $reg["titulo"];
            $obj->status = $reg["status"];
            $obj->descricao = $reg["descricao"];
            $obj->datac = $reg["datac"];
            $retorno = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }

}
