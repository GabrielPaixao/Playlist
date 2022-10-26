<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">  


</head>
<body>

<div class="card mb-4" style="margin:3%;">
  <div class="card-body">   

<div class="row">
          <div class="col-md-6">
          <h3>Conteúdos</h3>
          </div>
          <div class="col-md-6">
             <a href="create" style="float:right"><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa-sharp fa-solid fa-circle-plus"></i> CONTEUDO</button></a>
             <a href="../playlist/list" style="float:right;margin-right:2px;"><button type="button" class="btn btn-block btn-primary btn-xs"><i class="fa-solid fa-list"></i> PLAYLISTS</button></a> 
          </div>
</div>
<hr>
<br>
<table id="playlists" class="table table-striped table-bordered" style="width:100%;">
        <thead class="table-primary" >
            <tr>
                <th>ID</th>
                <th>Playlist</th>
                <th>Titulo</th>
                <th>Url</th>
                <th>Autor</th>
                <th style="width:10%;"></th>
            </tr>
        </thead>
</table>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function () {
    var table = $('#playlists').DataTable({
        ajax: '/api/conteudo/listAjax', //<=== CONSUMINDO A API POR AJAX
        columns: [
            { data: 'id' },
            { data: 'playlist' },
            { data: 'title' },
            { data: 'url' },
            { data: 'author' },
            {
                targets: -1,
                data: null,
                defaultContent: '<button type="button" class="btn btn-primary btn-sm edit" title="Visualizar / Editar"><i class="fa-solid fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger btn-sm delete"  title="Excluir"><i class="fa-sharp fa-solid fa-trash"></i></button>',
            },
            
        ],

        //TRADAUÇÃO DO DATATABLE
        "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Pesquisar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
        },
    });

    //CONFIGURA BOTÕES DE AÇÃO
    $('#playlists tbody').on('click', '.edit', function () {
        var data = table.row($(this).parents('tr')).data();
        location.href = "/conteudo/edit/"+data['id'];
    });

    $('#playlists tbody').on('click', '.delete', function () {
        var data = table.row($(this).parents('tr')).data();
        if(confirm('Deseja realmente deletar esse conteudo?')){ location.href = "/conteudo/delete/"+data['id']; }
        
    });

});
</script>
</body>
</html>