<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header"><?=$t->titulo?> <small><?=$t->linguagem?></small></h1>
  </div>

    <div class="col-lg-12">
        <code><?=$t->texto?></code>
        <br>
        <div class='botoes'>
          <a href='?p=deletarTrecho&id=<?=$t->id?>'><button type='button' class='btn btn-dark'>Deletar</button></a>
          <a href='?p=editarTrecho&id=<?=$t->id?>'><button type='button' class='btn btn-info'>Editar</button></a>
        </div>
    </div>

</div>
