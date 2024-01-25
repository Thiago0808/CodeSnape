
<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header">Meus Trechos <small>Encontre seus códigos rapidamente</small></h1>
  </div>

</div>



<div class="row">

  <?php
  foreach ($trechos as $t){
    echo "<div class='col-md-4 portfolio-item'>";
      echo "<code class='code_inicial'>$t->texto</code>";
      echo "<h3><a href='?p=verTrecho&id=$t->id'>$t->titulo</a></h3>";
      echo "<p>$t->linguagem</p>";
      echo "<a href='?p=deletarTrecho&id=$t->id'><button type='button' class='btn btn-danger'>Deletar</button></a>";
    echo "</div>";
  }
  ?>

</div>

<hr>

<div class="row text-center">
  
  <div class="col-lg-12">
    <ul class="pagination">
      <li><a href="#">&laquo;</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>        
  </div>

</div>

