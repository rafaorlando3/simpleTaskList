<?php
date_default_timezone_set('America/Sao_Paulo');
include_once 'class/TaskList.class.php';

if (!empty($_POST['status'] && !empty($_POST['idTask']))) {
  global $link;
  $objTask = new TaskList();
  
  if ($_POST['status'] == "finalizar") {

    $objTask->id = mysqli_real_escape_string($link, $_POST["idTask"]);
    $item = $objTask->retornarunico();
    $objTask->titulo = $item->titulo;
    $objTask->descricao = $item->descricao;
    $objTask->status = 2;
    $objTask->datac = $item->datac;
    $objTask->dataedit = $item->dataedit;
    $objTask->atualizar();

     echo '<div class="alert alert-success" role="alert">
            A Task foi finalizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';

  } else if ($_POST['status'] == "reabrir") {
    
    $objTask->id = mysqli_real_escape_string($link, $_POST["idTask"]);
    $item = $objTask->retornarunico();
    $objTask->titulo = $item->titulo;
    $objTask->descricao = $item->descricao;
    $objTask->status = 1;
    $objTask->datac = $item->datac;
    $objTask->dataedit = $item->dataedit;
    $objTask->atualizar();

     echo '<div class="alert alert-success" role="alert">
            A Task foi aberta novamente com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  } else if ($_POST['status'] == "remover") {
    
    $objTask->id = mysqli_real_escape_string($link, $_POST["idTask"]);
    $item = $objTask->retornarunico();
    $objTask->titulo = $item->titulo;
    $objTask->descricao = $item->descricao;
    $objTask->status = 3;
    $objTask->datac = $item->datac;
    $objTask->dataedit = $item->dataedit;
    $objTask->atualizar();

     echo '<div class="alert alert-success" role="alert">
            A Task foi removida com sucesso! Verifique todas removidas no menu "Removidas".
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  } else if ($_POST['status'] == "deletar") {
    
    $objTask->id = mysqli_real_escape_string($link, $_POST["idTask"]);
    $objTask->excluir();

     echo '<div class="alert alert-success" role="alert">
            A Task foi deletada com sucesso!".
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
  }
}
