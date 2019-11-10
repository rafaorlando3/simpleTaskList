<?php

include_once "header.php";

if (!empty($_POST["idTask"])) {

	include_once 'include/class/TaskList.class.php';
	$idedit = $_POST['idTask'];
    $objTask = new TaskList();
    $objTask->id = $idedit;
    $item = $objTask->retornarunico();

    if ($item->status == 1) {
     $voltar = "index.php";
    } else if ($item->status == 2) {
    	$voltar = "completedTasks.php"; 
    }

} else {
    echo "<script>window.location.href ='index.php';</script>";
}

?>

<div id="msgEdit"></div>

<form id="editTask">
	<input type="hidden" name="idTask" value="<?=$item->id?>">
	<input type="hidden" name="datac" value="<?=$item->datac?>">
	<div class="form-group">
		<label for="titulo">Título*</label>
		<input type="text" value="<?=$item->titulo?>" class="form-control" id="titulo" name="titulo" placeholder="Título Task..." required="">
	</div>
	<div class="form-group">
		<label for="descricao">Descrição*</label>
		<textarea class="form-control" id="descricao" name="descricao" rows="3"><?=$item->descricao?></textarea>
	</div>
	<div class="form-group">
		<label for="status">Status*</label>
		<select class="form-control" id="status" name="status">
		  <option value="1" <?= ($item->status == 1) ? 'selected' : '';?>>Em andamento</option>
		  <option value="2" <?= ($item->status == 2) ? 'selected' : '';?>>Finalizada</option>
		</select>
	</div>
	<div class="form-group">
		<span>*Campos Obrigatórios.</span>
	</div>
	<div class="form-group" align="center">
	   <button type="button" id="atualizar" class="btn btn-success btn-lg">Salvar</button>
	   <a href="<?=$voltar?>" class="btn btn-dark btn-lg">Voltar</a>
	</div>
	
</form>

<?php

include_once "footer.php";

?>