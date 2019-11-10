<?php
date_default_timezone_set('America/Sao_Paulo');
include_once 'class/TaskList.class.php';

if (!empty($_POST['titulo']) && !empty($_POST['descricao']) && !empty($_POST['status'])) {
    global $link;

    $objTask = new TaskList();
    $objTask->titulo = mysqli_real_escape_string($link, $_POST["titulo"]);
    $objTask->descricao = mysqli_real_escape_string($link, $_POST["descricao"]);
    $objTask->status = mysqli_real_escape_string($link, $_POST["status"]);
    $objTask->datac = date("Y-m-d H:i:s");
    $objTask->dataedit = date("Y-m-d H:i:s");
    $objTask->inserir();

    echo '<div class="alert alert-success" role="alert">
            Task cadastrada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
} else {
   echo '<div class="alert alert-danger" role="alert">
            Verifique se você preencheu corretamente os campos obrigatórios.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>'; 
}


    
    
