<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SUPERO Task List</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SUPERO Task List</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?=($page == 1) ? 'active' : '';?>">
            <a class="nav-link" href="index.php"> Tasks
            </a>
          </li>
          <li class="nav-item <?=($page == 2) ? 'active' : '';?>">
            <a class="nav-link" href="completedTasks.php"> Tasks Finalizadas

            </a>
          </li>
          <li class="nav-item <?=($page == 3) ? 'active' : '';?>">
            <a class="nav-link" href="removedTasks.php"> Tasks Removidas
              <span class="sr-only"><?php ($page == 3) ? "(current)" : ""; ?></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Page Content -->
  <div class="container">
    <div class="d-flex flex-row-reverse bd-highlight">
      <div class="p-2 bd-highlight">
        <button type="button" title="Nova task" class="btn btn-primary" data-toggle="modal" data-target="#modal">+ Task</button>
      </div>
    </div>


  <!-- Modal Nova Task -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="novaTask">
            <div class="form-group">
              <label for="titulo">Título*</label>
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título Task..." required="">
            </div>
            <div class="form-group">
              <label for="descricao">Descrição*</label>
              <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="status">Status*</label>
              <select class="form-control" id="status" name="status">
                <option value="1">Em andamento</option>
                <option value="2">Finalizada</option>
              </select>
            </div>
            <span>*Campos Obrigatórios.</span>
          </form>
          <div id="msg"></div>
        </div>
        <div class="modal-footer">
          <button type="button" id="incluir" class="btn btn-success">Incluir</button>
          <button type="button" class="btn btn-warning" onclick="taskList.moduloT.limpaForm()">Limpar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div id="msgRemover"></div>
  <div id="msgReabrir"></div>
  <div id="msgFinalizar"></div>
  