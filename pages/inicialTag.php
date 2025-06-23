
<div class="row">

  <div class="col-lg-12 tags-header">
    <h1 class="page-header">Minhas Tags</h1>
    <a href='?p=novaTag' class="page-header no-border"><button type='button' class='btn btn-outline-dark'>+</button></a>
  </div>

  <form action="" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Filtrar por Nome:</label>
      <input type="text" class="filter-name form-control" id="exampleFormControlInput1" placeholder="Tag" name="tag" maxlength="24"
        value="<?php echo isset($_POST['tag']) ? htmlspecialchars($_POST['tag']) : ''; ?>">
    </div>
    <div>
      <button type="submit" class="btn btn-dark">Filtrar</button>
    </div>
  </form>
  

</div>

<hr>
<div class="row">

  <?php

  function getTextColor($bgColor) {
      $bgColor = ltrim($bgColor, '#');

      $r = hexdec(substr($bgColor, 0, 2));
      $g = hexdec(substr($bgColor, 2, 2));
      $b = hexdec(substr($bgColor, 4, 2));

      $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

      return ($brightness > 128) ? '#000' : '#fff';
  }

  foreach ($tags as $t){
    $corTexto = getTextColor($t->color);
    echo "<div class='col-md-4 portfolio-item'>";
      echo "<h3 class='tag tag-grande' style='background-color: $t->color; color: $corTexto;'>$t->tag</h3>";
      echo "<div class='botoes'>";
        echo "<a href='?p=deletarTag&id=$t->id'><button type='button' class='btn btn-dark'>Deletar</button></a>";
        echo "<a href='?p=editarTrecho&id=$t->id'><button type='button' class='btn btn-outline-dark'>Editar</button></a>";
      echo "</div>";  
    echo "</div>";
  }
  ?>

</div>


