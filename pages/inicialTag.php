
<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header">Meus Trechos <small>Encontre seus códigos rapidamente</small></h1>
  </div>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Filtrar por Nome:</label>
      <input type="text" class="filter-name form-control" id="exampleFormControlInput1" placeholder="Titulo" name="titulo" maxlength="24"
        value="<?php echo isset($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : ''; ?>">
    </div>
    <div>
      <button type="submit" class="btn btn-dark">Filtrar</button>
    </div>
  </form>
  

</div>

<hr>
<div class="row">

  <?php
  foreach ($tags as $t){
    echo "<div class='col-md-4 portfolio-item'>";
      echo "<h3 class='tag tag-grande' style='background-color: $t->color';>$t->tag</h3>";
      echo "<div class='botoes'>";
        echo "<a href='?p=deletarTrecho&id=$t->id'><button type='button' class='btn btn-dark'>Deletar</button></a>";
        echo "<a href='?p=editarTrecho&id=$t->id'><button type='button' class='btn btn-outline-dark'>Editar</button></a>";
      echo "</div>";  
    echo "</div>";
  }
  ?>

</div>


