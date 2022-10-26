<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" defer></script>
</head>
<body>
<div class="card mb-4" style="margin:3%;">
  <div class="card-body">   
  <div class="row">
          <div class="col-md-6">
          <h3>Visualizar e editar conteúdo</h3>
          </div>
          <div class="col-md-6">
             <a href="../list" style="float:right"><button type="button" class="btn btn-block btn-success btn-xs"><i class="fa-solid fa-circle-arrow-left"></i> VOLTAR</button></a>
          </div>
</div>

<hr>
<div class="alert alert-success" role="alert" style="display:none" id="bxMsg">
Conteúdo atualizado com sucesso
</div>
<div class="alert alert-danger" role="alert" style="display:none" id="bxMsgError">
Erro no servidor
</div>


<form action="{{ $pl->id }}" method="post" id="frmUpdate">
    @csrf
  <!-- Titulo input -->
  <div class="form-outline mb-4">    
  <select class="form-select" name="playlist_id" aria-label="Default select example" required>
  <option selected>Selecione uma playlist</option>
  @if(isset($all))
    @foreach ($all as $a)
       @if($a->id == $pl->playlist_id )
       <option value="{{ $a->id }}" selected>{{ $a->title }}</option>
       @else
       <option value="{{ $a->id }}" >{{ $a->title }}</option>
       @endif
    @endforeach
  @endif
</select>
   
  </div>

  <!-- Titulo input -->
  <div class="form-outline mb-4">
      <input type="text" name="title" maxlength="150" class="form-control" placeholder="Titulo" value="{{ $pl->title }}" required/>
  </div>

  <!-- Url input -->
  <div class="form-outline mb-4">
      <input type="text" name="url" maxlength="255" class="form-control" placeholder="url" value="{{ $pl->url }}" required/>
  </div>

  <!-- Author input -->
  <div class="form-outline mb-4">
    <input type="text" name="author" maxlength="150"  class="form-control" placeholder="Autor" value="{{ $pl->author }}" />
   
  </div>
 
  <!-- Submit button -->
  <button type="button" class="btn btn-primary btn-block mb-4" style="float:right" onclick="update()">Salvar</button>
</form>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<script>

  /* UPDATE EM AJAX */
  function update() {	
	  
		var formulario = document.getElementById('frmUpdate');
		var dados = new FormData(formulario);
	  
	  $.ajax({
		dataType: 'json',
		type: "POST",
		url: "/conteudo/edit/{{ $pl->id }}",
		data: dados,
		processData: false,
		contentType: false,
		success: function(data) {      
      data == 1 ? $("#bxMsg").show() : $("#bxMsg").hide();
			window.scrollTo(0, 0);
		}
	  });
	}
</script>
</div>
</div>

</body>
</html>