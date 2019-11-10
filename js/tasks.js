/**
 *TaskList
 *@autor - Rafael Orlando Mendes
 *@email - rafaorlando3@gmail.com 
 */

// Definindo projeto taskList
var taskList = taskList || {};

// Definindo o módulo no objeto global.
taskList.moduloT = (function() {
  'use strict';

  function iniciar() {
    listaTasks();
    novaTask();
    editaTask();
    tasksRemovidas();
    tasksFinalizadas();
    buscaTasks();
    buscaTasksFinalizadas();
    buscaTasksRemovidas();

  }

  function novaTask() {
    
    $('#incluir').click(function () {        

        var dados = $("#novaTask").serialize();
        $("#incluir").attr("readonly", true);
        $("#incluir").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/newTask.php",
            data: dados,
            success: function (data)
            {   
                listaTasks();
                tasksFinalizadas();
                $('#msg').html(data);
                $("#incluir").attr("readonly", false);
                $("#incluir").html("Incluir");
            }
        });

        return false;
    });

  }

  function editaTask() {
    $('#atualizar').click(function () {        

        var dados = $("#editTask").serialize();
        $("#atualizar").attr("readonly", true);
        $("#atualizar").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/formUpdateTask.php",
            data: dados,
            success: function (data)
            {   
                $('#msgEdit').html(data);
                $("#atualizar").attr("readonly", false);
                $("#atualizar").html("Salvar");
            }
        });

        return false;
    });
  }

  function finalizaTask(idTask) {   

        var id = idTask;
        var status = "finalizar"
        $("#finalizar").attr("readonly", true);
        $("#finalizar").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/statusTask.php",
            data:{ "idTask": id, "status": status },
            success: function (data)
            {   
                listaTasks();
                $('#msgFinalizar').html(data);
                $("#finalizar").attr("readonly", false);
                $("#finalizar").html("Finalizar");
            }
        });
  }

  function reabrirTask(idTask) {   

        var id = idTask;
        var status = "reabrir"
        $("#reabrir").attr("readonly", true);
        $("#reabrir").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/statusTask.php",
            data:{ "idTask": id, "status": status },
            success: function (data)
            {   
                tasksFinalizadas();
                tasksRemovidas();
                $('#msgReabrir').html(data);
                $("#reabrir").attr("readonly", false);
                $("#reabrir").html("Finalizar");
            }
        });
  }

  function removerTask(idTask) {   

        var id = idTask;
        var status = "remover"
        $("#remover").attr("readonly", true);
        $("#remover").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/statusTask.php",
            data:{ "idTask": id, "status": status },
            success: function (data)
            {   
                tasksFinalizadas();
                listaTasks();
                $('#msgRemover').html(data);
                $("#remover").attr("readonly", false);
                $("#remover").html("Remover");
            }
        });
  }

  function deletarTask(idTask) {   
    var resposta = confirm("Você realmente deseja excluir essa Task?");
    if (resposta) {
        var id = idTask;
        var status = "deletar"
        $("#deletar").attr("readonly", true);
        $("#deletar").html("Carregando...");
        
        $.ajax({
            type: "POST",
            url: "include/statusTask.php",
            data:{ "idTask": id, "status": status },
            success: function (data)
            {   
                 tasksRemovidas();
                $('#msgRemover').html(data);
                $("#deletar").attr("readonly", false);
                $("#deletar").html("Deletar");
            }
        });
    }
  }

  function listaTasks() {
    $.get('include/listTasks.php', function (resultado) {
        $('#listaTasks').html(resultado);

    });
  }

  function tasksFinalizadas() {
    $.get('include/completedListTasks.php', function (resultado) {
        $('#tasksFinalizadas').html(resultado);

    });
  }

  function tasksRemovidas() {
    $.get('include/removedListTasks.php', function (resultado) {
        $('#tasksRemovidas').html(resultado);

    });
  }

  function limpaForm() {
    $('#novaTask').each (function(){
        this.reset();
    });
  }

  function buscaTasks() {
    $("#buscaTask").keypress(function () {
        var pesquisa = $('#buscaTask').val();

        $.get('include/listTasks.php?pesquisa=' + pesquisa, function (resultado) {
            $('#listaTasks').html(resultado);

        });

    });
  }

  function buscaTasksFinalizadas() {
    $("#buscaTasksFinalizadas").keypress(function () {
        var pesquisa = $('#buscaTasksFinalizadas').val();

        $.get('include/completedListTasks.php?pesquisa=' + pesquisa, function (resultado) {
            $('#tasksFinalizadas').html(resultado);

        });

    });
  }

  function buscaTasksRemovidas() {
    $("#buscaTasksRemovidas").keypress(function () {
        var pesquisa = $('#buscaTasksRemovidas').val();

        $.get('include/removedListTasks.php?pesquisa=' + pesquisa, function (resultado) {
            $('#tasksRemovidas').html(resultado);

        });

    });
  }

  return {
    iniciar:iniciar,
    novaTask:novaTask,
    editaTask:editaTask,
    finalizaTask:finalizaTask,
    reabrirTask:reabrirTask,
    removerTask:removerTask,
    limpaForm:limpaForm,
    tasksFinalizadas:tasksFinalizadas,
    tasksRemovidas:tasksRemovidas,
    deletarTask:deletarTask,
    buscaTasks:buscaTasks,
    buscaTasksFinalizadas,
    buscaTasksRemovidas
  };

}());

taskList.moduloT.iniciar();
