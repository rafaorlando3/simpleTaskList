 <?php
include_once 'class/TaskList.class.php';

$objTask = new TaskList();
$pesquisa = "";

if (isset($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}

$lista = $objTask->listar("WHERE status = 3 AND ((titulo LIKE '%".$pesquisa."%') OR (descricao LIKE '%".$pesquisa."%')) Order BY status, datac DESC");

if ($lista != null) {
  foreach ($lista as $item) {
?>
    <div class="col-md-4 mb-5">
      <div class="card h-100 text-white bg-danger mb-3">
        <div class="card-body">
          <span class="badge badge-secondary">Removida</span>
          <h2 class="card-title"><?=$item->titulo?></h2>
          <p class="card-text"><?=$item->descricao?></p> 
        </div>
        <div class="card-footer">
          <p class="text-dark">
            <u>Atualizada em <?= date('d-m-Y', strtotime($item->dataedit)).
          " às ".date('H:i:s', strtotime($item->dataedit))?> </u>
          </p>
            <input type="button" id="reabrir" onclick="taskList.moduloT.reabrirTask(<?=$item->id?>)" class="btn btn-primary btn-sm" value="Reabrir">
            <input type="button" id="deletar" onclick="taskList.moduloT.deletarTask(<?=$item->id?>)" class="btn btn-dark btn-sm" value="Deletar">
        </div>
        <!-- /.col-md-4 -->
      </div>
    </div>

<?php
  }
} else {
    echo "<div class='alert alert-info'>Nenhuma Task removida.</div>";
} 
?>