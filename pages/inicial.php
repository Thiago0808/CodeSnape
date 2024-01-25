
<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header">3 Col Portfolio <small>Showcase Your Work</small></h1>
  </div>

</div>




<div class="row">

  <?php
  foreach ($trechos as $t){
    $codigo = str_replace("&#13;&#10;", "<br />", $t->texto);
    echo "<div class='col-md-4 portfolio-item'>";
      echo "<code>$codigo</code>";
      //echo "<a href=''><img class='img-responsive' src='http://placehold.it/700x400'></a>";
      echo "<h3><a href=''>$t->titulo</a></h3>";
      echo "<p>$t->linguagem</p>";
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

