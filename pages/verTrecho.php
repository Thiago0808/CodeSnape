<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header"><?=$t->titulo?> <small><?=$t->linguagens?></small></h1>
  </div>

    <div class="col-lg-12">
        <code><?=$t->texto?></code>
        <br>
          <?php
            $tagsMap = [];
            foreach ($tags as $tag) {
                $tagsMap[$tag->id] = $tag;
            }

            echo "<div>";
              if (!empty($t->tags)) {
                foreach ($t->tags as $tagId) {
                  if (isset($tagsMap[$tagId])) {
                    $tagObj = $tagsMap[$tagId];
                    echo "<h4 class='tag tag-pequena' style='background-color: {$tagObj->color}'>" . htmlspecialchars($tagObj->tag) . "</h4>";
                  }
                }
              }
            echo "</div>";
          ?>
        <br>
        <div class='botoes'>
          <a href='?p=deletarTrecho&id=<?=$t->id?>'><button type='button' class='btn btn-dark'>Delete</button></a>
          <a href='?p=editarTrecho&id=<?=$t->id?>'><button type='button' class='btn btn-outline-dark'>Edit</button></a>
        </div>
    </div>

</div>
